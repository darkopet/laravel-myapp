<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File;

class Post1
{
    public $title;          // My First post1 -> AUTOMATE IT -> my-first-post1
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function all()
    {
        return cache()->rememberForever('posts.all', function()             // 
        {
            return collect(File::files(resource_path("posts")))             // find all files from posts dir & collect them into collection
            ->map(fn($file) => YamlFrontMatter::parseFile($file))           // map (loop) over each file item & pass it into a document
            ->map(fn($document) => new Post1(                                // document in which the mapped over files are being parsed into
                        // $document = YamlFrontMatter::parseFile($file);          
                        $document->title,
                        $document->excerpt,                                 // building a Post object that the program is in controll off 
                        $document->date,                                    // with all of its elements and components    
                        $document->body(),
                        $document->slug
                    ))
            ->sortBy('date');                                               // sorting the articles on page
        });
        
        # return File::files(resource_path("posts"));  // returns file info files, not the actual file content
            // $files = File::files(resource_path("posts/"));

        // array_map(function($file)  // loop over and returning an array
        // {
        //     return $file->getContents();
        // }, $files); // what is being looped over

            // return array_map(fn($file)=>$file->getContents(), $files); // shortened arrow function equivalent from the above lines 15-18
    }

    public static function find($slug)   // method responsible for FINDing A POST !!!!!
    {
        # of all the web site articles, find the one with a slug that matches the one that was requested
        # $posts = static::all();
        # return $posts->firstWhere('slug',$slug);

        return static::all()->firstWhere('slug', $slug);
        
        // // base_path();
        // if (!file_exists($path = resource_path("posts/{$slug}.html")))   // __DIR__ . "/../resources/
        // {
        // // ddd('file does not exists !');
        // // abort(404);
        // // throw_new \Exception;
        //    throw new ModelNotFoundExcpetion();  // Part of ELOQUENT model of LARAVEL
        // // return redirect('main');
        // }
        // return cache()->remember("posts.{$slug}", 1200, fn() => file_get_contents($path));   // get file content - cache it - return it 
    }   

    public static function findOrFail($slug)
    {
        $post1 =  static::find($slug);

        if(!$post1) { throw new ModelNotFoundException(); }

        return $post1;
    }
}