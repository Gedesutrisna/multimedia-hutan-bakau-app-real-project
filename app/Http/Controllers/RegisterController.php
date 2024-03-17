<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }
    public function store(RegisterRequest $request){
        $validateData = $request->validated();

        $validateData['password'] = bcrypt($validateData['password']);

        User::create($validateData);
        return redirect('/login')->with('success, Register Berhasil');
    }
}
