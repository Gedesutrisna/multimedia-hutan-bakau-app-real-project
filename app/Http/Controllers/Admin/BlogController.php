<?php

namespace App\Http\Controllers\admin;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Routing\Controller;
use App\Http\Requests\StoreBlogRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateBlogRequest;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with(['category'])->latest()->filter(request(['search']))->paginate(7)->withQueryString();
        return view('dashboard.blog.index',compact('blogs'));
    }
    public function show(Blog $blog)
    {
        return view('dashboard.blog.show', [
            'blog' => $blog,
        ]);
    }
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.blog.create',compact('categories'));
    }

    public function store(StoreBlogRequest $request)
    {
        $validatedData = $request->validated();
        if($request->hasFile('assets')){
            $fileExtension = $request->file('assets')->getClientOriginalExtension();
            $randomFileName = hash('md5', time()) . '.' . $fileExtension;
            $request->file('assets')->move('images/', $randomFileName);
        }
        $validatedData['admin_id'] = auth()->guard('admin')->user()->id;
        if(isset($randomFileName)) {
            $validatedData['assets'] = $randomFileName;
        }
        Blog::create($validatedData);
        return redirect('/dashboard/blogs')->with('success', 'Blog Added Successfully!');
    }
    
    public function edit(Blog $blog)
    {
        $categories = Category::all();
        return view('dashboard.blog.edit',compact('categories'),[
            'blog' => $blog,
        ]);
    }
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $validatedData = $request->validated();
        $validatedData['admin_id'] = auth()->guard('admin')->user()->id;
        if($request->hasFile('assets')){
            $fileExtension = $request->file('assets')->getClientOriginalExtension();
            $randomFileName = hash('md5', time()) . '.' . $fileExtension;
            $request->file('assets')->move('images/', $randomFileName);
        }
        if(isset($randomFileName)) {
            $validatedData['assets'] = $randomFileName;
            if ($blog->assets) {
                Storage::delete('images/' . $blog->assets);
            }
        }
        $blog->update($validatedData);
        return redirect('/dashboard/blogs')->with('success','Blog Updated Successfully!');
    }
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return back()->with('success','Blog Deleted Successfully!');
    }
}
