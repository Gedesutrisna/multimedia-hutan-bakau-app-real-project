<?php

namespace App\Http\Controllers\admin;

use App\Models\Quiz;
use App\Models\QuizAnswer;
use App\Models\QuizQuestion;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreQuizAnswerRequest;
use App\Http\Requests\UpdateQuizAnswerRequest;

class QuizAnswerController extends Controller
{
    public function index()
    {
        $answers = QuizAnswer::latest()->filter(request(['search']))->paginate(7)->withQueryString();
        return view('dashboard.quiz_answer.index',compact('answers'));
    }
    public function show(QuizAnswer $answer)
    {
        return view('dashboard.quiz_answer.show', [
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
        return redirect('/dashboard/answers')->with('success','QuizAnswer Added Successfully!');
    }
    public function bulkStore(Request $request)
    {
        $validatedData = $request->validate([
            'quiz_question_id' => 'required|exists:quiz_questions,id',
            'answers.*.answer_text' => 'nullable|string|max:255',
            'answers.*.answer_image' => 'nullable|image',
            'answers.*.is_correct' => 'required',
        ]);

        $questionId = $validatedData['quiz_question_id'];
        $existingAnswerCount = QuizQuestion::findOrFail($questionId)->answers()->count();

        if ($existingAnswerCount >= 4) {
            return redirect()->back()->with('error', 'Cannot add more answers. The question already has maximum number of answers.');
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

        return redirect('/dashboard/answers')->with('success','Quiz Questions Added Successfully!');
    }
    public function update(UpdateQuizAnswerRequest $request, QuizAnswer $answer)
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
            if ($answer->answer_image) {
                Storage::delete('images/' . $answer->answer_image);
            }
        }
        $answer->update($validatedData);
        return redirect('/dashboard/answers')->with('success','QuizAnswer Updated Successfully!');
    }
    public function destroy(QuizAnswer $answer)
    {
        $answer->delete();
        return back()->with('success','QuizAnswer Deleted Successfully!');
    }
}
