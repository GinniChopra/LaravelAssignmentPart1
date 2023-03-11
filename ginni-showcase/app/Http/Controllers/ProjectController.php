<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Project;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
   
    public function listByCategory(Category $category)
    {
        return view('projects.index')
        ->with('category', $category)
        ->with('projects', $category->projects);
        //->with('tag', null);
    }

     
    public function listByTag(Tag $tag)
    {
        return view('projects.index')
        //->with('category', null)
        ->with('projects', $tag->projects)
        ->with('tag', $tag->name);
    }


    public function home(){

        return view('home')
        ->with('projects', Project::latest('published_date')->paginate(3)->withQueryString());

    }


    public function index()
    {
        return view('projects.index')
            ->with('projects', Project::latest('published_date')->paginate(6)->withQueryString())
            ->with('categoryName', null)
            ->with('tag', null);
    }

             

    public function show(Project $project)
    {
        return view('projects.project',['project' => $project]);
    }

    public function create() {
        return view('admin.projects.create')
        ->with('project', null)
        ->with('categories', Category::all())
        ->with('tags', Tag::all());
    }

    public function store(Project $project, Request $request){      

// ddd(request()->all());
        $attributes = request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'url' => ['nullable','sometimes','url'],
            'published_date' => ['nullable','sometimes','date'],
            'image' => ['nullable','sometimes','image','mimes:jpg,png,jpeg,gif,svg','max:2048','dimensions:max_width=1200'],
            'thumb' => ['nullable','sometimes','image','mimes:jpg,png,jpeg,gif,svg','max:1024','dimensions:max_width=600'],
            'category_id' => ['nullable','sometimes','exists:categories,id'],
            
        ]);


         // Generate the slug from the title
         $attributes['slug'] = Str::slug($attributes['title']);

         // Save upload in public storage and set path attributes 
        $image_path = $request->file('image')?->storeAs('images',$request->image->getClientOriginalName(), 'public');
        $attributes['image'] = $image_path;
        $thumb_path = $request->file('thumb')?->storeAs('images', $request->thumb->getClientOriginalName(), 'public');
        $attributes['thumb'] = $thumb_path;

         // save it to the dashboard

         $project = Project::create($attributes);
         $project->tags()->attach($request['tags']);

         // set aflash message
         session()->flash("success","Project Created Successfully");

         // redirect to admin board

         return redirect("/admin/projects");
    }    
    
    
    public function edit(Project $project) {
        return view('admin.projects.create')
        ->with('project', $project)
        ->with('categories', Category::all())
        ->with('tags',Tag::all());
    }

    public function update(Project $project, Request $request) {

        $attributes = request()->validate([
            'title' => ['required','unique:projects,title,'.$project->id],
            'excerpt' => 'required',
            'body' => 'required',
            'url' => ['nullable','sometimes','url'],
            'published_date' => ['nullable','sometimes','date'],
            'image' => ['nullable','sometimes','image','mimes:jpg,png,jpeg,gif,svg','max:2048','dimensions:max_width=1200'],
            'thumb' => ['nullable','sometimes','image','mimes:jpg,png,jpeg,gif,svg','max:1024','dimensions:max_width=600'],
            'category_id' => ['nullable','sometimes','exists:categories,id'],
        ]);


         // Generate the slug from the title
         $attributes['slug'] = Str::slug($attributes['title']);

         if($request -> file('image')){
            // Save upload in public storage and set path attributes
    $image_path = $request->file('image')?->storeAs('images',$request->image->getClientOriginalName(), 'public');
    $attributes['image'] = $image_path;
    }
    if($request -> file('thumb')){
    $thumb_path = $request->file('thumb')?->storeAs('images', $request->thumb->getClientOriginalName(), 'public');
    $attributes['thumb'] = $thumb_path;
    }

        // Save updates to the DB
        $project->update($attributes);
        $project->tags()->sync($request['tags']);


        // set a flash message
        session()->flash("success","Project Edited Successfully");

        // redirect to admin board
      
        return redirect("/admin/projects");
    }  


    public function destroy(Project $project) {


        $project->delete();

        // Set a flash message
        session()->flash('success','Project Deleted Successfully');

        // Redirect to the Admin Dashboard
        return redirect("/admin/projects");
    }

    public function getProjectsJSON()
    {
        $projects = Project::with(['category','tags'])->get();
        return response()->json($projects);
    }

}
