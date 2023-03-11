<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    
    public function create() {
        return view('admin.categories.create')
        ->with('category', null);
    }


    public function store(Request $request){      

        $attributes = request()->validate([
            'name' => 'required',
                       
        ]);

         // Generate the slug from the name
         $attributes['slug'] = Str::slug($attributes['name']);
  

         // create the category 
         Category::create($attributes);

         // set a flash message
         session()->flash("success","Category Created Successfully");

         // redirect to admin board
         return redirect("/admin/projects");
    }    


    public function edit(Category $category) {
        return view('admin.categories.create')
        ->with('category', $category);
    }


    public function update(Category $category,Request $request) {

        $attributes = request()->validate([
            'name' => ['required','unique:categories,name,'.$category->id],
        ]);

     // Generate the slug from the name
     $attributes['slug'] = Str::slug($attributes['name']);
  

     // update the category 
     $category->update($attributes);

     // set a flash message
     session()->flash("success","Category updated Successfully");

     // redirect to admin board
     return redirect("/admin/projects");

    }
    
    public function destroy(Category $category) {
        $category->delete();

        // Set a flash message
        session()->flash('success','Category Deleted Successfully');

        // Redirect to the Admin Dashboard
        return redirect("/admin/projects");
    }

    public function getCategoriesJSON()
    {
        $categories = Category::all();
        return response()->json($categories);
    }
    
}
