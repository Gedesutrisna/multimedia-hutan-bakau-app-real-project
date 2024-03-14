<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function index(){
        $blogs = Blog::with(['category'])->latest()->filter(request(['search']))->paginate(7)->withQueryString();
        return view('index',compact('blogs'));
    }
}
