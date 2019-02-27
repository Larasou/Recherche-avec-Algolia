<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        $posts = Post::search(request('q'))->get();

        return view('search.index', ['posts' => $posts]);
    }
}
