<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post2;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts', [
            'posts' => Post2::latest()->filter(request(['search']))->get(),
            'categories' => Category::all()
        ]);
    }

    public function show(Post2 $post)
    {
        return view('post', [
            'post' => $post
        ]);
    }
}
