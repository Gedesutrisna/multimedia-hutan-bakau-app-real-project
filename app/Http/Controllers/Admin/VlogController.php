<?php

namespace App\Http\Controllers\admin;

use App\Models\Vlog;
use App\Models\Category;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreVlogRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateVlogRequest;

class VlogController extends Controller
{
    public function index()
    {
        $vlogs = Vlog::latest()->filter(request(['search']))->get();
        return view('dashboard.vlog.index',compact('vlogs'));
    }
    public function show(Vlog $vlog)
    {
        return view('dashboard.vlog.show', [
            'vlog' => $vlog,
        ]);
    }
    public function create()
    {
        return view('dashboard.vlog.create');
    }

    public function store(StoreVlogRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['admin_id'] = auth()->guard('admin')->user()->id;
        Vlog::create($validatedData);
        return redirect('/dashboard/vlogs')->with('success', 'Video Blog Berhasil Ditambahkan!');
    }
    
    public function edit(Vlog $vlog)
    {
        return view('dashboard.vlog.edit',[
            'vlog' => $vlog,
        ]);
    }
    public function update(UpdateVlogRequest $request, Vlog $vlog)
    {
        $validatedData = $request->validated();
        $validatedData['admin_id'] = auth()->guard('admin')->user()->id;
        $vlog->update($validatedData);
        return redirect('/dashboard/vlogs')->with('success','Video Blog Berhasil Diupdate!');
    }
    public function destroy(Vlog $vlog)
    {
        $vlog->delete();
        return back()->with('success','Video Blog Berhasil Dihapus!');
    }
}
