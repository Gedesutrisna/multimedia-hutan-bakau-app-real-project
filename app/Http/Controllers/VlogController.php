<?php

namespace App\Http\Controllers;

use App\Models\Vlog;
use App\Models\Category;
use Illuminate\Routing\Controller;
use App\Http\Requests\StoreBlogRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Quiz;

class VlogController extends Controller
{
    public function show(Vlog $vlog)
    {
        return view('vlog.show', [
            'vlog' => $vlog,
        ]);
    }
}
