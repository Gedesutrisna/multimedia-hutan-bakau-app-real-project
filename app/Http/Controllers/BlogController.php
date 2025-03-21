<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Routing\Controller;
use App\Http\Requests\StoreBlogRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Quiz;
use App\Models\Vlog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with(['category'])->latest()->filter(request(['search']))->get();
        return view('blog.index',compact('blogs'));
    }
    public function show(Blog $blog)
    {
        return view('blog.show', [
            'blog' => $blog,
        ]);
    }
}
