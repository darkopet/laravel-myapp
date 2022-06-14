<?php

namespace App\Http\Controllers;

use App\Models\Post2;
use Illuminate\Validation\Rule;

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

    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('post2s', 'slug')],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        $attributes['user_id'] = auth()->id();
        
        echo "<pre>";
        var_dump($attributes);
        echo "</pre>";
        
        Post2::create($attributes);

        return redirect('/posts');
    }
}
