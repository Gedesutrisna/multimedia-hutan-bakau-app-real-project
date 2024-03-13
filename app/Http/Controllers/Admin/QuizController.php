<?php

namespace App\Http\Controllers\admin;

use App\Models\Quiz;
use Illuminate\Routing\Controller;
use App\Http\Requests\StoreQuizRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateQuizRequest;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::latest()->filter(request(['search']))->paginate(7)->withQueryString();
        return view('dashboard.quiz.index',compact('quizzes'));
    }
    public function show(Quiz $quiz)
    {
        return view('dashboard.quiz.show', [
            'quiz' => $quiz,
        ]);
    }
    public function create()
    {
        return view('dashboard.quiz.create');
    }
    public function edit(Quiz $quiz)
    {
        return view('dashboard.quiz.edit',[
            'quiz' => $quiz,
        ]);
    }
    public function store(StoreQuizRequest $request)
    {
        $validatedData = $request->validated();
        if($request->hasFile('image')){
            $fileExtension = $request->file('image')->getClientOriginalExtension();
            $randomFileName = hash('md5', time()) . '.' . $fileExtension;
            $request->file('image')->move('images/', $randomFileName);
        }
        $validatedData['admin_id'] = auth()->guard('admin')->user()->id;
        if(isset($randomFileName)) {
            $validatedData['image'] = $randomFileName;
        }
        Quiz::create($validatedData);
        return redirect('/dashboard/quizzes')->with('success','Quiz Added Successfully!');
    }
    public function update(UpdateQuizRequest $request, Quiz $quiz)
    {
        $validatedData = $request->validated();
        $validatedData['admin_id'] = auth()->guard('admin')->user()->id;
        if($request->hasFile('image')){
            $fileExtension = $request->file('image')->getClientOriginalExtension();
            $randomFileName = hash('md5', time()) . '.' . $fileExtension;
            $request->file('image')->move('images/', $randomFileName);
        }
        if(isset($randomFileName)) {
            $validatedData['image'] = $randomFileName;
            if ($quiz->image) {
                Storage::delete('images/' . $quiz->image);
            }
        }
        $quiz->update($validatedData);
        return redirect('/dashboard/quizzes')->with('success','Quiz Updated Successfully!');
    }
    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        return back()->with('success','Quiz Deleted Successfully!');
    }
}
