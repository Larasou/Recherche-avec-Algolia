<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        return view('posts.index', ['posts' => Post::latest()->get()]);
    }

    public function create()
    {
        return view('posts.create', ['categories' => Category::oldest('name')->get()]);
    }

    public function store(Request $request)
    {
        $request['user_id'] = 1;

        $request->validate(['name' => 'required', 'body' => 'required']);

        Post::create($request->all());

        return redirect('/');
    }

    public function show($category, Post $post)
    {
        return view('posts.show', [
            'post' => $post,
            //'posts' => $post->user->posts()->latest()->get()
        ]);
    }

    public function addComment($category, Post $post, Request $request)
    {
        $request->validate(['body' => 'required']);

        $post->comments()->create([
            'user_id' => 1,
            'body' => $request->body,
        ]);

        return back();
    }

}
