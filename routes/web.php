<?php

use App\Models\Post2;
use App\Models\User;
use App\Models\Category;
use App\Http\Controllers\PostController;
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

Route::get('main_site', [PostController::class, 'index'])->name('home');
Route::get('posts/{post:slug}', [PostController::class, 'show']);


// Route::get('categories/{category:slug}', function(Category $category)
// {
//     return view('main_site', [
//         'main_site' => $category->posts,
//         'currentCategory' => $category,
//         'categories' => Category::all()     
//     ]);
// })->name('category');


Route::get('authors/{author:username}', function(User $author){
    //dd($author);
    return view('main_site', [ 
        'main_site' => $author->posts
    ]); 
});