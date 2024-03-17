<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.admin.login');
    }
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        if(Auth::guard('admin')->attempt($credentials))
        {
            $request->session()->regenerate();
            setcookie("email", $credentials["email"], time() + (7 * 24 * 60 * 60));
            setcookie("password", $credentials["password"], time() + (7 * 24 * 60 * 60));  
            return redirect('/dashboard')->with('success','Login Berhasil !');
        }
        return back()->with('error','Login Gagal !');
    }
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login/admin')->with('succes','Logout Berhasil !');
    }
}
