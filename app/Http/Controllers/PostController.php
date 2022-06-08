<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post2;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('main_site', [
            'main_site' => Post2::latest()->filter(request(['search','category']))->get()
        ]);
    }

    public function show(Post2 $post)
    {
        return view('post', [
            'post' => $post
        ]);
    }
}
