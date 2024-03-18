<?php

namespace App\Http\Controllers\admin;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreBlogRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateBlogRequest;

class BlogController extends Controller
{
    public function index()
    {
        // $blogs = Blog::with(['category'])->latest()->filter(request(['search']))->paginate(7)->withQueryString();
        $blogs = Blog::all();
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
        if(isset($randomFileName)) {
            $validatedData['assets'] = $randomFileName;
        }
        $validatedData['admin_id'] = auth()->guard('admin')->user()->id;
        Blog::create($validatedData);
        return redirect('/dashboard/blogs')->with('success', 'Blog Berhasil Ditambahkan!');
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
            $oldImagePath = public_path('images/') . $blog->assets;
            if(File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }
        }
        $blog->update($validatedData);
        return redirect('/dashboard/blogs')->with('success','Blog Berhasil Diupdate!');
    }
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return back()->with('success','Blog Berhasil Dihapus!');
    }
}
