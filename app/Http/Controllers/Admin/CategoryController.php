<?php

namespace App\Http\Controllers\admin;

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
        return redirect('/dashboard/categories')->with('success','Category Added Successfully!');
    }
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $validatedData = $request->validated();
        $validatedData['admin_id'] = auth()->guard('admin')->user()->id;
        $category->update($validatedData);
        return redirect('/dashboard/categories')->with('success','Category Updated Successfully!');
    }
    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('success','Category Deleted Successfully!');
    }
}
