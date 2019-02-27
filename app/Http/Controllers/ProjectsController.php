<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        return view('projects.index', ['projects' => Project::latest()->get()]);
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate(['name' => 'required', 'body' => 'required']);

        Post::create([
            'user_id' => 1, //auth()->id()
            'name' => $request->name,
            'body' => $request->body,
        ]);

        return redirect('/');
    }

    public function show($category, Project $project)
    {
        return view('projects.show', [
            'project' => $project,
        ]);
    }

    public function addComment($category, Project $project, Request $request)
    {
        $request->validate(['body' => 'required']);

        $project->comments()->create([
            'user_id' => 1,
            'body' => $request->body,
        ]);

        return back();
    }
}
