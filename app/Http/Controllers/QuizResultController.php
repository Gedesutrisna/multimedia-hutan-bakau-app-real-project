<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\QuizAnswer;
use App\Models\QuizResult;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\StoreQuizResultRequest;
use App\Http\Requests\UpdateQuizResultRequest;

class QuizResultController extends Controller
{
    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'quiz_id' => 'required',
    //         'questions.*.question_id' => 'required',
    //         'answers.*.answer_id' => 'required',
    //     ]);
    //     foreach ($validatedData['questions'] as $question) {

    //     }
    //     $validatedData['user_id'] = auth()->user()->id;
    //     QuizResult::create($validatedData);
    //     return redirect('/quizzes')->with('success','Quiz Added Successfully!');
    // }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'quiz_id' => 'required',
            'questions.*.quiz_question_id' => 'required',
            'answers.*.answer_id' => 'required',
        ]);

        $countQuestions = count($validatedData['questions']);

        $countCorrectAnswers = 0;

        foreach ($validatedData['answers'] as $index => $answer) {
            $answerId = $validatedData['answers'][$index]['answer_id'];

            $answer = QuizAnswer::find($answerId);

            if ($answer && $answer->is_correct) {
                $countCorrectAnswers++;
            }
        }

        $totalPoints = round($countCorrectAnswers / $countQuestions * 100, 2);

        $quizResultData = [
            'quiz_id' => $validatedData['quiz_id'],
            'user_id' => 1,
            'point' => $totalPoints,
        ];

        QuizResult::create($quizResultData);

        $previousResult = QuizResult::where('quiz_id', $validatedData['quiz_id'])
                                    ->where('user_id', 1)
                                    ->first();

        if ($previousResult) {
            $previousResult->delete();
        }
        return redirect('/quizzes')->with('success', 'Quiz Added Successfully!');
    }
}
