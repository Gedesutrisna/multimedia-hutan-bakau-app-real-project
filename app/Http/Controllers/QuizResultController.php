<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\QuizAnswer;
use App\Models\QuizResult;
use App\Models\QuizQuestion;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\StoreQuizResultRequest;
use App\Http\Requests\UpdateQuizResultRequest;

class QuizResultController extends Controller
{
    public function index()
    {
        return view('quiz_result.index');
    }
    public function show(Quiz $quiz)
    {
        return view('quiz.do_quiz', [
            'quiz' => $quiz,
        ]);
    }
    // public function store(Request $request)
    // {
        
    //     $validatedData = $request->validate([
    //         'quiz_id' => 'required',
    //         'questions.*.quiz_question_id' => 'required',
    //         'answers.*.answer_id' => 'required',
    //     ]);
    //     if (!$request->filled('questions') || !$request->filled('answers')) {
    //         $quizResultData = [
    //             'quiz_id' => $validatedData['quiz_id'],
    //             'user_id' => 1,
    //             'point' => 0,
    //         ];
    
    //         QuizResult::create($quizResultData);
    
    //         $previousResult = QuizResult::where('quiz_id', $validatedData['quiz_id'])
    //                                     ->where('user_id', 1)
    //                                     ->first();
    
    //         if ($previousResult) {
    //             $previousResult->delete();
    //         }
    //         return redirect('/quiz/results')->with('success', 'Successfully completed the quiz!');
    //     }

    //     $countQuestions = count($validatedData['questions']);

    //     $countCorrectAnswers = 0;

    //     foreach ($validatedData['answers'] as $index => $answer) {
    //         $answerId = $validatedData['answers'][$index]['answer_id'];

    //         $answer = QuizAnswer::find($answerId);

    //         if ($answer && $answer->is_correct) {
    //             $countCorrectAnswers++;
    //         }
    //     }

    //     $totalPoints = round($countCorrectAnswers / $countQuestions * 100, 2);

    //     $quizResultData = [
    //         'quiz_id' => $validatedData['quiz_id'],
    //         'user_id' => 1,
    //         'point' => $totalPoints,
    //     ];

    //     QuizResult::create($quizResultData);

    //     $previousResult = QuizResult::where('quiz_id', $validatedData['quiz_id'])
    //                                 ->where('user_id', 1)
    //                                 ->first();

    //     if ($previousResult) {
    //         $previousResult->delete();
    //     }
    //     return redirect('/quiz/results')->with('success', 'Successfully completed the quiz!');
    // }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'quiz_id' => 'required',
            'questions.*.quiz_question_id' => 'required',
            'answers.*.answer_id' => 'required',
        ]);

        if (!$request->filled('questions') || !$request->filled('answers')) {
            $quizResultData = [
                'quiz_id' => $validatedData['quiz_id'],
                'user_id' => 1,
                'point' => 0,
            ];

            $previousResult = QuizResult::where('quiz_id', $validatedData['quiz_id'])
                                        ->where('user_id', 1)
                                        ->first();

            if ($previousResult) {
                $previousResult->delete();
            }
            $countQuestions = count($validatedData['questions']);

            $quiz_result = QuizResult::create($quizResultData);

            return redirect('/quiz/results')->with('success', 'Successfully completed the quiz!, You got '.$quiz_result->point.' scores, corret answer 0, from '. $countQuestions.' question');
        }

        $countQuestions = count($validatedData['questions']);

        $countCorrectAnswers = 0;

        foreach ($validatedData['answers'] as $index => $answer) {
            $answerId = $validatedData['answers'][$index]['answer_id'];
            $questionId = $validatedData['questions'][$index]['quiz_question_id'];

            $question = QuizQuestion::find($questionId);
            $correctOption = $question->correct;

            $answer = QuizAnswer::find($answerId);

            if ($answer && $answer->option === $correctOption) {
                $countCorrectAnswers++;
            }
        }

        $totalPoints = round($countCorrectAnswers / $countQuestions * 100, 2);

        $quizResultData = [
            'quiz_id' => $validatedData['quiz_id'],
            'user_id' => 1,
            'point' => $totalPoints,
        ];

        $previousResult = QuizResult::where('quiz_id', $validatedData['quiz_id'])
                                    ->where('user_id', 1)
                                    ->first();

        if ($previousResult) {
            $previousResult->delete();
        }
        $quiz_result = QuizResult::create($quizResultData);


        return redirect('/quiz/results')->with('success', 'Successfully completed the quiz!, You got '.$quiz_result->point.' scores, corret answer '.$countCorrectAnswers.', from '. $countQuestions.' question');
    }

}
