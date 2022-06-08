<?php

use App\Models\Post2;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Factories\Factory;
use Spatie\YamlFrontMatter\YamlFrontMatter;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(){
    return view('welcome'); 
});


Route::get('main_site', function()
{                 
    $posts = Post2::latest();
    if(request('search'))
    {
        $posts
            ->where('title', 'like', '%' . request('search') . '%')
            ->orWhere('body', 'like', '%' . request('search') .'%');
    }

    return view('main_site', [ 
        'main_site'=> $posts->get(), 
        'categories' => Category::all() 
    ]);      
})->name('home');


Route::get('posts/{post:slug}', function(Post2 $post)
  {
    return view('post', ['post'=> $post]);  
  });


Route::get('categories/{category:slug}', function(Category $category)
{
    return view('main_site', [
        'main_site' => $category->posts,
        'currentCategory' => $category,
        'categories' => Category::all()     
    ]);
})->name('category');


Route::get('authors/{author:username}', function(User $author){
    //dd($author);
    return view('main_site', [ 
        'main_site' => $author->posts,
        'categories' => Category::all() 
    ]); 
});