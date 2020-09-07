<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //display all categorys
    public function index()
    {
       $categories= Category::orderBy('id','DESC')->get();

       return view("categories/index",compact('categories'));
    }
    
    //display one category with id
    public function show($id)
    {
        $category=Category::findOrFail($id);
        
         return view('categories.show',compact('category'));
        //dd($category);
    }

    //create new category (view the create form)
    public function create()
    {
       return  view('categories.create');
    }
    //store the new category in db and redirect to view
    public function store(Request $request)
    {
      
        //validation
        $request->validate
        (
          [
            'name'=>'required|max:100|string'
           
          ]
        );
    
        $name=$request->name;
        Category::create
        (
          [
            'name'=>$name
           
          ]
        );
        return redirect(route('categories.index'));

    }

    //func edit form 
    public function edit($id)
    {
      //$category=Category::where('id','=',$id)->first();
      $category=Category::findOrFail($id);
      return view('categories/edit',compact('category'));
    }

    //func update category in db and redirect
    public function update(Request $request,$id)
    {
      //validation
      $request->validate
      (
        ['name'=>'required|max:100|string'
        ]
      );

      $category=Category::findOrFail($id);
     
      

      //get the category from db
      $category->update
      (
        [
          'name'=>$request->name,
    
        ]
      );
     
      //redirect to the show page with id of the category
      return  redirect(route('categories.show',$id));
    }



    //func delete category from db and redirect
    public function delete($id)
    {
      $category=Category::findOrFail($id);
      $category->delete();
      return redirect(route('categories.index'));
     //return back();
    }







}
