<?php

namespace App\Http\Controllers\admin;

use App\Models\Quiz;
use App\Models\QuizAnswer;
use App\Models\QuizQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreQuizQuestionRequest;
use App\Http\Requests\UpdateQuizQuestionRequest;

class QuizQuestionController extends Controller
{
    public function index()
    {
        $questions = QuizQuestion::latest()->filter(request(['search']))->get();
        return view('dashboard.quiz_question.index',compact('questions'));
    }
    public function show(Quiz $quiz, QuizQuestion $question)
    {
        return view('dashboard.quiz_question.show', [
            'quiz' => $quiz,
            'question' => $question,
        ]);
    }
    public function create()
    {
        $quizzes = Quiz::all();
        return view('dashboard.quiz_question.create',compact('quizzes'));
    }
    public function bulkCreate()
    {
        $quizzes = Quiz::all();
        return view('dashboard.quiz_question.bulk_create',compact('quizzes'));
    }
    public function bulkCreateDumy()
    {
        $quizzes = Quiz::all();
        return view('dashboard.quiz_question.bulk_create_dumy',compact('quizzes'));
    }
    public function edit(QuizQuestion $question)
    {
        $quizzes = Quiz::all();
        return view('dashboard.quiz_question.edit',compact('quizzes'),[
            'question' => $question,
        ]);
    }
    public function store(StoreQuizQuestionRequest $request)
    {
        $validatedData = $request->validated();
        $quizId = $validatedData['quiz_id'];
        $existingQuestionCount = Quiz::findOrFail($quizId)->questions()->count();

        if ($existingQuestionCount >= 15) {
            return redirect()->back()->with('error', 'Tidak dapat menambahkan pertanyaan lagi. Kuis sudah memiliki jumlah pertanyaan maksimum.');
        }
        
        $validatedData['admin_id'] = auth()->guard('admin')->user()->id;
        if($request->hasFile('image')){
            $fileExtension = $request->file('image')->getClientOriginalExtension();
            $randomFileName = hash('md5', time()) . '.' . $fileExtension;
            $request->file('image')->move('images/', $randomFileName);
        }
        if(isset($randomFileName)) {
            $validatedData['image'] = $randomFileName;
        }
        QuizQuestion::create($validatedData);
        return back()->with('success','Pertanyaan Berhasil Ditambahkan!');
    }

    public function bulkStore(Request $request)
    {
        $validatedData = $request->validate([
            'quiz_id' => 'required|exists:quizzes,id',
            'questions.*.question' => 'required|string',
            'questions.*.image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $quizId = $validatedData['quiz_id'];
        $existingQuestionCount = Quiz::findOrFail($quizId)->questions()->count();

        if ($existingQuestionCount >= 15) {
            return redirect()->back()->with('error', 'Tidak dapat menambahkan pertanyaan lagi. Kuis sudah memiliki jumlah pertanyaan maksimum.');
        }

        $questionsToInsert = [];
        foreach ($validatedData['questions'] as $questionData) {
            $question = [
                'quiz_id' => $quizId,
                'question' => $questionData['question'],
            ];

            if (isset($questionData['image'])) {
                $fileExtension = $questionData['image']->getClientOriginalExtension();
                $randomFileName = hash('md5', time()) . '.' . $fileExtension;
                $questionData['image']->move('images/', $randomFileName);
                $question['image'] = $randomFileName;
            }

            $questionsToInsert[] = $question;
        }

        QuizQuestion::insert($questionsToInsert);

        return redirect('/dashboard/questions')->with('success','Pertanyaan Berhasil Ditambahkan!');
    }
    public function bulkStoreDumy(Request $request)
    {
        $validatedData = $request->validate([
            'quiz_id' => 'required|exists:quizzes,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $quizId = $validatedData['quiz_id'];
        $existingQuestionCount = Quiz::findOrFail($quizId)->questions()->count();

        if ($existingQuestionCount >= 15) {
            return back()->with('error', 'Tidak bisa menambahkan teks jawaban dan gambar jawaban secara bersamaan, cukup pilih salah satu.');
        }

        $questionsToInsert = [];
        $quantity = $validatedData['quantity'];

        for ($i = 0, $j = 1; $i < $quantity; $i++ , $j++) {
            $question = [
                'quiz_id' => $quizId,
                'question' => "question $j", 
                'image' => null,    
                'created_at' => Carbon::now(),    
                'updated_at' => Carbon::now(),    
            ];

            $questionsToInsert[] = $question;
        }

        QuizQuestion::insert($questionsToInsert);

        return redirect('/dashboard/questions')->with('success','Pertanyaan Berhasil Ditambahkan!');
    }


    public function update(UpdateQuizQuestionRequest $request, QuizQuestion $question)
    {
        $validatedData = $request->validated();
        $validatedData['admin_id'] = auth()->guard('admin')->user()->id;
        if($request->hasFile('image')){
            $fileExtension = $request->file('image')->getClientOriginalExtension();
            $randomFileName = hash('md5', time()) . '.' . $fileExtension;
            $request->file('image')->move('images/', $randomFileName);
        }
        if(isset($randomFileName)) {
            $validatedData['image'] = $randomFileName;
            $oldImagePath = public_path('images/') . $question->image;
            if(File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }
        }
        $question->update($validatedData);
        return back()->with('success','Pertanyaan Berhasil Diupdate!');
    }
    public function destroy(QuizQuestion $question)
    {
        $relatedAnswersCount = QuizAnswer::where('quiz_question_id', $question->id)->count();
        if ($relatedAnswersCount > 0) {
            return back()->with('error', 'Tidak bisa menghapus Pertanyaan. Karena memiliki relasi dengan jawaban.')->withInput();
        }
        $question->delete();
        return back()->with('success', 'Pertanyaan Berhasil Dihapus!');
    }
}
