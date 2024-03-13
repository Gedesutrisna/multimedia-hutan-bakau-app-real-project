<?php

namespace App\Http\Controllers\admin;

use App\Models\Quiz;
use App\Models\QuizQuestion;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreQuizQuestionRequest;
use App\Http\Requests\UpdateQuizQuestionRequest;

class QuizQuestionController extends Controller
{
    public function index()
    {
        $questions = QuizQuestion::latest()->filter(request(['search']))->paginate(7)->withQueryString();
        return view('dashboard.quiz_question.index',compact('questions'));
    }
    public function show(QuizQuestion $question)
    {
        return view('dashboard.quiz_question.show', [
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
            return redirect()->back()->with('error', 'Cannot add more questions. The quiz already has maximum number of questions.');
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
        return redirect('/dashboard/questions')->with('success','QuizQuestion Added Successfully!');
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
            return redirect()->back()->with('error', 'Cannot add more questions. The quiz already has maximum number of questions.');
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

        return redirect('/dashboard/questions')->with('success','Quiz Questions Added Successfully!');
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
            if ($question->image) {
                Storage::delete('images/' . $question->image);
            }
        }
        $question->update($validatedData);
        return redirect('/dashboard/questions')->with('success','QuizQuestion Updated Successfully!');
    }
    public function destroy(QuizQuestion $question)
    {
        $question->delete();
        return back()->with('success','QuizQuestion Deleted Successfully!');
    }
}
