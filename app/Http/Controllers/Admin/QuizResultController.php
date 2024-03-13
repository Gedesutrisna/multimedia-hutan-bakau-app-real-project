<?php

namespace App\Http\Controllers\admin;

use App\Models\Quiz;
use App\Models\QuizResult;
use Illuminate\Routing\Controller;
use App\Http\Requests\StoreQuizResultRequest;
use App\Http\Requests\UpdateQuizResultRequest;

class QuizResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quiz_results = QuizResult::latest()->paginate(7)->withQueryString();
        return view('dashboard.quiz_result.index',compact('quiz_results'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuizResultRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(QuizResult $quizResult)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(QuizResult $quizResult)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuizResultRequest $request, QuizResult $quizResult)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(QuizResult $quiz_result)
    {
        $quiz_result->delete();
        return back()->with('success','Quiz Result Deleted Successfully!');
    }
}
