<?php

namespace App\Http\Controllers;

use App\Models\Post2;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post2::latest()->filter(request(['search','category', 'author']))->get()
        ]);
    }

    
    public function show(Post2 $post)
    {
        return view('posts.show', [
            'post' => $post 
        ]);
    }
}
