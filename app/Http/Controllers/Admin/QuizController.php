<?php

namespace App\Http\Controllers\admin;

use App\Models\Quiz;
use App\Models\QuizAnswer;
use App\Models\QuizQuestion;
use Illuminate\Support\Carbon;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreQuizRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateQuizRequest;

class QuizController extends Controller
{
    public function index()
    {
        // $quizzes = Quiz::latest()->filter(request(['search']))->paginate(7)->withQueryString();
        $quizzes = Quiz::all();
        return view('dashboard.quiz.index',compact('quizzes'));
    }
    public function show(Quiz $quiz)
    {
        return view('dashboard.quiz.show', [
            'quiz' => $quiz,
        ]);
    }
    public function create()
    {
        return view('dashboard.quiz.create');
    }
    public function edit(Quiz $quiz)
    {
        return view('dashboard.quiz.edit',[
            'quiz' => $quiz,
        ]);
    }
    // public function store(StoreQuizRequest $request)
    // {
    //     $validatedData = $request->validated();
    //     if($request->hasFile('image')){
    //         $fileExtension = $request->file('image')->getClientOriginalExtension();
    //         $randomFileName = hash('md5', time()) . '.' . $fileExtension;
    //         $request->file('image')->move('images/', $randomFileName);
    //     }
    //     $validatedData['admin_id'] = auth()->guard('admin')->user()->id;
    //     if(isset($randomFileName)) {
    //         $validatedData['image'] = $randomFileName;
    //     }
    //     Quiz::create($validatedData);
    //     return redirect('/dashboard/quizzes')->with('success','Kuis Berhasil Ditambahkan!');
    // }
    public function store(StoreQuizRequest $request)
    {
        $validatedData = $request->validated();
        if($request->hasFile('image')){
            $fileExtension = $request->file('image')->getClientOriginalExtension();
            $randomFileName = hash('md5', time()) . '.' . $fileExtension;
            $request->file('image')->move('images/', $randomFileName);
        }
        $validatedData['admin_id'] = auth()->guard('admin')->user()->id;
        if(isset($randomFileName)) {
            $validatedData['image'] = $randomFileName;
        }
        $quiz = Quiz::create($validatedData);

        //create question
        $questionsToInsert = [];
        $questionIds = [];
        for ($i = 0, $j = 1; $i < 15; $i++, $j++) {
            $question = [
                'quiz_id' => $quiz->id,
                'question' => "question $j", 
                'image' => null,    
                'correct' => "A",    
                'created_at' => Carbon::now(),    
                'updated_at' => Carbon::now(),    
            ];
            $createdQuestion = QuizQuestion::create($question);
            $questionsToInsert[] = $createdQuestion;
            $questionIds[] = $createdQuestion->id;
        }
        
        $answersToInsert = [];
        $optionLetters = ['A', 'B', 'C', 'D'];
        foreach ($questionIds as $questionId) {
            foreach ($optionLetters as $optionLetter) {
                $answer = [
                    'quiz_question_id' => $questionId,
                    'option' => $optionLetter,
                    'answer_text' => null, 
                    'answer_image' => null,    
                    'created_at' => Carbon::now(),    
                    'updated_at' => Carbon::now(),    
                ];
                $answersToInsert[] = $answer;
            }
        }
        QuizAnswer::insert($answersToInsert);
        
        return redirect('/dashboard/quizzes')->with('success','Kuis Berhasil Ditambahkan!, beserta pertanyaan dan jawabannya');
        
    }
    

    

    public function update(UpdateQuizRequest $request, Quiz $quiz)
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
            $oldImagePath = public_path('images/') . $quiz->image;
            if(File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }
        }
        $quiz->update($validatedData);
        return redirect('/dashboard/quizzes')->with('success','Kuis Berhasil Diupdate!');
    }
    public function destroy(Quiz $quiz)
    {
        $relatedQuestionsCount = QuizQuestion::where('quiz_id', $quiz->id)->count();
        if ($relatedQuestionsCount > 0) {
            return back()->with('error', 'Tidak bisa menghapus kuis. Karena memiliki relasi dengan pertanyaan dan jawaban.')->withInput();
        }
        $quiz->delete();
        return back()->with('success','Kuis Berhasil Dihapus!');
    }
}
