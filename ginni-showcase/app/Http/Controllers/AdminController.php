<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.projects.index')   
             ->with('projects', Project::all())
             ->with('users', User::all())
             ->with('categories', Category::all())
             ->with('tags', Tag::all());

        
    }

    public function show($project)
    {
        return view('admin.projects.project', ['project' => $project]);
    }
}
