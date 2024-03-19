<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function index(){
        $blogs = Blog::with(['category'])->latest()->filter(request(['search']))->take(3)->get();
        $quizzes = Quiz::latest()->filter(request(['search']))->take(3)->get();
        return view('index',compact('blogs','quizzes'));
    }
}
