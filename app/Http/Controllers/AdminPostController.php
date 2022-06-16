<?php

namespace App\Http\Controllers;

use App\Models\Post2;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post2::paginate(100)
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {   
        // dd($this);
        $attributes = array_merge($this->validatePost(), [
                'user_id' => request()->user()->id,
                'thumbnail' => request()->file('thumbnail')->store('thumbnails')
            ]);
        // dd($attributes);
        // Post2::create(array_merge($this->validatePost(), [
        //     'user_id' => request()->user()->id,
        //     'thumbnail' => request()->file('thumbnail')->store('thumbnails')
        // ]));
        Post2::create($attributes);
        return redirect('/posts');
    }

    public function edit(Post2 $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post2 $post)
    {
        $attributes = $this->validatePost($post);

        if ($attributes['thumbnail'] ?? false) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return back()->with('success', 'Post Updated!');
    }

    public function destroy(Post2 $post)
    {
        $post->delete();
        return back()->with('success', 'Post Deleted!');
    }

    protected function validatePost(?Post2 $post = null): array
    {
        $post ??= new Post2();

        return request()->validate([
            'title' => 'required',
            'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
            'slug' => ['required', Rule::unique('post2s', 'slug')->ignore($post)],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'published_at' => 'required'
        ]);
    }
}
