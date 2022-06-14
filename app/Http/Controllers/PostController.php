<?php

namespace App\Http\Controllers;

use App\Models\Post2;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post2::latest()->filter(request(['search','category', 'author']))->paginate(6)->withQueryString()
        ]);
    }

    public function show(Post2 $post)
    {
        return view('posts.show', [
            'post' => $post 
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }
}
