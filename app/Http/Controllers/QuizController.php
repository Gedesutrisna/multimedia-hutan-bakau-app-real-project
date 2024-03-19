<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Routing\Controller;
use App\Http\Requests\StoreQuizRequest;
use App\Http\Requests\UpdateQuizRequest;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::latest()->filter(request(['search']))->get();
        return view('quiz.index',compact('quizzes'));
    }
    public function show(Quiz $quiz)
    {
        return view('quiz.show', [
            'quiz' => $quiz,
        ]);
    }

}
