<?php

namespace App\Http\Controllers\admin;

use App\Models\Blog;
use App\Models\Quiz;
use App\Models\QuizAnswer;
use App\Models\QuizQuestion;
use App\Models\QuizResult;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    public function index(){
        $blogs = Blog::all();
        $quizzes = Quiz::all();
        $questions = QuizQuestion::all();
        $answers = QuizAnswer::all();
        $quiz_results = QuizResult::all();
        $users = User::all();
        return view('dashboard.index',compact('blogs','quizzes','questions','answers','quiz_results','users'));
    }
}
