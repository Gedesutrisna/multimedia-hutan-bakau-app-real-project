<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            setcookie("email", $credentials["email"], time() + (7 * 24 * 60 * 60));
            setcookie("password", $credentials["password"], time() + (7 * 24 * 60 * 60));  
            return redirect('/')->with('success','Login Behasil !');
        }
        return back()->with('error','Login Failed !');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('succes','Logout Successfully !');
    }
}
