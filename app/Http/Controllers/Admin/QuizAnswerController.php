<?php

namespace App\Http\Controllers\admin;

use App\Models\Quiz;
use App\Models\QuizAnswer;
use App\Models\QuizQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreQuizAnswerRequest;
use App\Http\Requests\UpdateQuizAnswerRequest;

class QuizAnswerController extends Controller
{
    public function index()
    {
        $answers = QuizAnswer::latest()->filter(request(['search']))->get();
        return view('dashboard.quiz_answer.index',compact('answers'));
    }
    public function show(Quiz $quiz, QuizQuestion $question, QuizAnswer $answer)
    {
        return view('dashboard.quiz_answer.show', [
            'quiz' => $quiz,
            'question' => $question,
            'answer' => $answer,
        ]);
    }
    public function create()
    {
        $questions = QuizQuestion::all();
        return view('dashboard.quiz_answer.create',compact('questions'));
    }
    public function bulkCreate()
    {
        $questions = QuizQuestion::all();
        return view('dashboard.quiz_answer.bulk_create',compact('questions'));
    }

    public function bulkCreateDumy()
    {
        $quizzes = Quiz::all();
        $questions = QuizQuestion::all();
        return view('dashboard.quiz_answer.bulk_create_dumy',compact('questions','quizzes'));
    }
    public function edit(QuizAnswer $answer)
    {
        $questions = QuizQuestion::all();
        return view('dashboard.quiz_answer.edit',compact('questions'),[
            'answer' => $answer,
        ]);
    }
    public function store(StoreQuizAnswerRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['admin_id'] = auth()->guard('admin')->user()->id;
        if($request->hasFile('answer_image')){
            $fileExtension = $request->file('answer_image')->getClientOriginalExtension();
            $randomFileName = hash('md5', time()) . '.' . $fileExtension;
            $request->file('answer_image')->move('images/', $randomFileName);
        }
        if(isset($randomFileName)) {
            $validatedData['answer_image'] = $randomFileName;
        }
        QuizAnswer::create($validatedData);
        return redirect('/dashboard/answers')->with('success','Jawaban Berhasil Ditambahkan!');
    }
    
    public function bulkStore(Request $request)
    {
        $validatedData = $request->validate([
            'quiz_question_id' => 'required|exists:quiz_questions,id',
            'answers.*.answer_text' => 'nullable|string|max:255',
            'answers.*.answer_image' => 'nullable|image',
            'answers.*.is_correct' => 'required',
        ]);

        $isCorrectCount = 0;
        foreach ($validatedData['answers'] as $answerData) {
            if ($answerData['is_correct'] == "true") {
                $isCorrectCount++;
            }
            if (isset($answerData['answer_text']) && isset($answerData['answer_image'])) {
                return back()->with('error', 'Tidak bisa menambahkan teks jawaban dan gambar jawaban secara bersamaan, cukup pilih salah satu.');
            }
        }

        if ($isCorrectCount != 1) {
            return back()->with('error', 'Hanya satu jawaban yang dapat ditandai benar.');
        }

        $questionId = $validatedData['quiz_question_id'];

        $existingAnswerCount = QuizQuestion::findOrFail($questionId)->answers()->count();

        if ($existingAnswerCount >= 4) {
            return back()->with('error', 'Tidak dapat menambahkan jawaban lagi. Jawabannya sudah memiliki jumlah jawaban maksimal.');
        }

        $answersToInsert = [];
        foreach ($validatedData['answers'] as $answerData) {
            $answer = [
                'quiz_question_id' => $questionId,
                'is_correct' => $answerData['is_correct'],
                'answer_text' => null,
                'answer_image' => null, 
            ];

            // Cek apakah ada teks jawaban
            if (isset($answerData['answer_text'])) {
                $answer['answer_text'] = $answerData['answer_text'];
            }

            // Cek apakah ada gambar jawaban
            if (isset($answerData['answer_image'])) {
                $fileExtension = $answerData['answer_image']->getClientOriginalExtension();
                $randomFileName = hash('md5', time()) . '.' . $fileExtension;
                $answer['answer_image'] = $randomFileName;
                $answerData['answer_image']->move('images/', $randomFileName);
            }
            $answersToInsert[] = $answer;
        }

        QuizAnswer::insert($answersToInsert);

        return redirect('/dashboard/answers')->with('success','Jawaban Berhasil Ditambahkan!');
    }

    public function bulkStoreDumy(Request $request)
    {
        $validatedData = $request->validate([
            'quiz_question_id' => 'required|exists:quiz_questions,id',
            'quantity' => 'required|integer|min:1', 
        ]);

        $questionId = $validatedData['quiz_question_id'];
        $existingAnswerCount = QuizQuestion::findOrFail($questionId)->answers()->count();

        if ($existingAnswerCount >= 4) {
            return back()->with('error', 'Tidak dapat menambahkan jawaban lagi. Jawabannya sudah memiliki jumlah jawaban maksimal.');
        }

        $answersToInsert = [];
        $quantity = $validatedData['quantity'];

        for ($i = 0; $i < $quantity; $i++) {
            $answer = [
                'quiz_question_id' => $questionId,
                'is_correct' => "false",
                'answer_text' => null, 
                'answer_image' => null,    
                'created_at' => Carbon::now(),    
                'updated_at' => Carbon::now(),    
            ];

            $answersToInsert[] = $answer;
        }

        QuizAnswer::insert($answersToInsert);

        return redirect('/dashboard/answers')->with('success','Jawaban Berhasil Ditambahkan!');
    }
    
    // public function update(UpdateQuizAnswerRequest $request, QuizAnswer $answer)
    // {
    //     $validatedData = $request->validated();
    //     $validatedData['admin_id'] = auth()->guard('admin')->user()->id;
    //     if($request->hasFile('answer_image')){
    //         $fileExtension = $request->file('answer_image')->getClientOriginalExtension();
    //         $randomFileName = hash('md5', time()) . '.' . $fileExtension;
    //         $request->file('answer_image')->move('images/', $randomFileName);
    //     }
    //     if(isset($randomFileName)) {
    //         $validatedData['answer_image'] = $randomFileName;
    //         $oldImagePath = public_path('images/') . $answer->answer_image;
    //         if(File::exists($oldImagePath)) {
    //             File::delete($oldImagePath);
    //         }
    //     }
    //     $answer->update($validatedData);
    //     return redirect('/dashboard/answers')->with('success','Jawaban Berhasil Diupdate!');
    // }
    public function update(UpdateQuizAnswerRequest $request, QuizAnswer $answer)
    {
        $validatedData = $request->validated();
        $validatedData['admin_id'] = auth()->guard('admin')->user()->id;

        if (!empty($validatedData['answer_text']) && !empty($validatedData['answer_image'])) {
            return back()->with('error', 'Tidak bisa menambahkan teks jawaban dan gambar jawaban secara bersamaan, cukup pilih salah satu.');
        }
        
        if($request->hasFile('answer_image')){
            $fileExtension = $request->file('answer_image')->getClientOriginalExtension();
            $randomFileName = hash('md5', time()) . '.' . $fileExtension;
            $request->file('answer_image')->move('images/', $randomFileName);
        }
        if(isset($randomFileName)) {
            $validatedData['answer_image'] = $randomFileName;
            $oldImagePath = public_path('images/') . $answer->answer_image;
            if(File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }
        }

        $answer->update($validatedData);
        return back()->with('success', 'Jawaban Berhasil Dipdate!');
    }
    public function destroy(QuizAnswer $answer)
    {
        $answer->delete();
        return back()->with('success','Jawaban Berhasil Dihapus!');
    }
}
