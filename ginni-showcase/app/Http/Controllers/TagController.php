<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Tag;


class TagController extends Controller
{
    public function create() {
        return view('admin.tags.create')
        ->with('tag', null);
    }

    public function store(Request $request){      

        $attributes = request()->validate([
            'name' => 'required',
                       
        ]);

         // Generate the slug from the name
         $attributes['slug'] = Str::slug($attributes['name']);
  

         // create the category 
         Tag::create($attributes);

         // set a flash message
         session()->flash("success","Tag Created Successfully");

         // redirect to admin board
         return redirect("/admin/projects");
    }    

    public function edit(Tag $tag) {
        return view('admin.tags.create')
        ->with('tag', $tag);
    }


    public function update(Tag $tag,Request $request) {

        $attributes = request()->validate([
            'name' => ['required','unique:tags,name,'.$tag->id],
        ]);

     // Generate the slug from the name
     $attributes['slug'] = Str::slug($attributes['name']);
  

     // update the category 
     $tag->update($attributes);

     // set a flash message
     session()->flash("success","Tag updated Successfully");

     // redirect to admin board
     return redirect("/admin/projects");

    }
    
    public function destroy(Tag $tag) {
        $tag->delete();

        // Set a flash message
        session()->flash('success','Tag Deleted Successfully');

        // Redirect to the Admin Dashboard
        return redirect("/admin/projects");
    }


    public function getTagsJSON()
    {
        $tags = Tag::all();
        return response()->json($tags);
    }

}
