<?php

namespace App\Http\Controllers\admin;

use App\Models\Admin;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;

class AdminController extends Controller
{
    public function index()
    {
        return view('dashboard.profile.index');
    }
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        $validatedData = $request->validated();
        if($request->hasFile('image')){
            $fileExtension = $request->file('image')->getClientOriginalExtension();
            $randomFileName = hash('md5', time()) . '.' . $fileExtension;
            $request->file('image')->move('images/', $randomFileName);
        }
        if(isset($randomFileName)) {
            $validatedData['image'] = $randomFileName;
            if (auth()->guard('admin')->user()->image) {
                Storage::delete('images/' . auth()->guard('admin')->user()->image);
            }
        }

        auth()->guard('admin')->user()->update($validatedData);
        return back()->with('toast_success', 'Profile berhasil diperbaharui!');
    }
}
