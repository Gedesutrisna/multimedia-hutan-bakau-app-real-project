<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }
    public function update(UpdateUserRequest $request, User $user)
    {
        $validatedData = $request->validated();
        if($request->hasFile('image')){
            $fileExtension = $request->file('image')->getClientOriginalExtension();
            $randomFileName = hash('md5', time()) . '.' . $fileExtension;
            $request->file('image')->move('images/', $randomFileName);
        }
        if(isset($randomFileName)) {
            $validatedData['image'] = $randomFileName;
            if (auth()->user()->image) {
                Storage::delete('images/' . auth()->user()->image);
            }
        }

        auth()->user()->update($validatedData);
        return back()->with('toast_success', 'Profile berhasil diperbaharui!');
    }
}
