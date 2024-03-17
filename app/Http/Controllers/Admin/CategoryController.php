<?php

namespace App\Http\Controllers\admin;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Routing\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->filter(request(['search']))->paginate(7)->withQueryString();
        return view('dashboard.category.index',compact('categories'));
    }
    public function show(Category $category)
    {
        return view('dashboard.category.show', [
            'category' => $category,
        ]);
    }
    public function create()
    {
        return view('dashboard.category.create');
    }
    public function edit(Category $category)
    {
        return view('dashboard.category.edit',[
            'category' => $category,
        ]);
    }
    public function store(StoreCategoryRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['admin_id'] = auth()->guard('admin')->user()->id;
        Category::create($validatedData);
        return redirect('/dashboard/categories')->with('success','Kategori Berhasil Ditambahkan!');
    }
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $validatedData = $request->validated();
        $validatedData['admin_id'] = auth()->guard('admin')->user()->id;
        $category->update($validatedData);
        return redirect('/dashboard/categories')->with('success','Kategori Berhasil Diupdate!');
    }
    public function destroy(Category $category)
    {
        $relatedBlogsCount = Blog::where('category_id', $category->id)->count();
        if ($relatedBlogsCount > 0) {
            return back()->with('error', 'Tidak bisa menghapus kategori. Karena memiliki relasi dengan blog.')->withInput();
        }
        $category->delete();
        return back()->with('success', 'Kategori Berhasil Dihapus!');
    }
}
