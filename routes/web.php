<?php

use App\Models\Post2;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
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
    # return Post::find('my-first-post');
    return view('welcome'); 
});

Route::get('main_site', function()
{                
    // $posts = array_map(function($file)
    // {
    //     $document = YamlFrontMatter::parseFile($file);
    //     return new Post(
    //         $document->title,
    //         $document->excerpt,
    //         $document->date,
    //         $document->body(),
    //         $document->slug
    //     );
    // }, $files);


    // $posts = [];
    // foreach($files as $file)
    // {
    //     $document = YamlFrontMatter::parseFile($file);
    //     $posts[] = new Post(
    //         $document->title,
    //         $document->excerpt,
    //         $document->date,
    //         $document->body(),
    //         $document->slug
    //     );
    // }
    # temporarly log all database queries
    // \Illuminate\Support\Facades\DB::listen(function($query)
    // {
    //     // \Illuminate\Support\Facades\Log::info('foo');
    //     logger($query->sql, $query->bindings);
    // });

    return view('main_site', [ 
        'main_site'=> Post2::latest()->get(), 
        'categories' => Category::all() 
    ]);      
    // posts collection is being rendered to the view-er
    
    //ddd($posts);

    // $document = YamlFrontMatter::parseFile(resource_path('posts/my-fourth-post.html'));
    // ddd($document->body());

    // $posts = Post::all(); inline refactoring of the code
    // ddd($posts);
    

    // return view('main_site', ['main_site'=>Post::all()]); // read posts dir - grab its files - get the content of each of the files  
});

Route::get('posts/{post:slug}', function(Post2 $post) // route for a single post - id is captured as a WILDCARD; then passed to function
{   
    // // # # {post:slug} meaing class::where('slug',$post)->firstOrFail()                  
    // // # # Bining a ROUTE KEY to en ELOQUENT MODEL!
    # Find a !post! by its slug and !pass! it to a !view! called !"post"! ! 
    // find $post by using the means of its slug !!!!
   
    return view('post', ['post'=> $post]);  # find $post to pass to the view called 'post' !!!! Post2::findOrFail()

    // ddd($path);

    // $post = file_get_contents($path);
    // return view('post', [ 
    //     'post' => $post
    // ]);

    // $post = cache()->remember("posts.{$slug}", 1200, function() use($path) {   // rememeber("whatToCache", how long to cache it [sec], function executed)  
    //     // var_dump('file_get_contents');                                                                 // now()->addHour(nmbrhrs);
    //     return file_get_contents($path);                                                                  // now()->addDay();
    // }); SAVING IN CACHE MEMORY WAY                                                                        // now()->addWeek();
                                                                                                             // now()->addWeeks();
                                                                                                             // now()->addMinutes(20);                                             
                                                                                                             // now()->addDays();                                                        
    // $post = file_get_contents(__DIR__ . "/../resources/posts/{$slug}.html");
    // return view('post', [ 
    //     'post' => $post
    // ]);
    # WILDCARD {slug} WAY

    // $post = file_get_contents(__DIR__ . '/../resources/posts/my-first-post.html'); // declaration of $post variable
    // return view('post', [
    //     'post' => $post
    #]); ANOTHER WAY

    // return view('post', [
    //     'post' => file_get_contents(__DIR__ . '/../resources/posts/my-first-post.html') // declaration of $post variable
    # ]); ONE WAY
});


//->where('post', '[A-z_\-]+'); // In brackets [] look for anything alphanumerical from A to z both capitalcase and lowercase 
                                // Plus + find one or more of the preciding characters from the brackets

Route::get('categories/{category:slug}', function(Category $category)
{
    return view('main_site', [
        'main_site' => $category->posts,
        'currentCategory' => $category,
        'categories' => Category::all()     
    ]);
});


Route::get('authors/{author:username}', function(User $author){
    //dd($author);
    return view('main_site', [ 
        'main_site' => $author->posts,
        'categories' => Category::all() 
    ]); 
});


Route::get('/test', function () 
{
    return ['foo' => 'bar'];
});
