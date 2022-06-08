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
            'main_site'=> $this->getPosts(), 
            'categories' => Category::all() 
        ]);   
    }

    public function show(Post2 $post)
    {
        return view('post', ['post'=> $post]);  
    }

    protected function getPost()
    {
        $posts = Post2::latest();
        if(request('search'))
        {
            $posts
                ->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('body', 'like', '%' . request('search') .'%');
        }
        return $posts->get();
    }
}   
