<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Book;
class BookController extends Controller
{
    //display all books
    public function index()
    {
       $books= Book::orderBy('id','desc')->paginate(4);

       return view("books/index",compact('books'));
    }
    
    //display one book with id
    public function show($id)
    {
        $book=Book::findOrFail($id);
        
         return view('books.show',compact('book'));
        //dd($book);
    }

    //create new book (view the create form)
    public function create()
    {
       return  view('books.create');
    }
    //store the new book in db and redirect to view
    public function store(Request $request)
    {
      
        //validation
        $request->validate
        (
          [
            'title'=>'required|max:100|string',
            'desc'=>'required|string',
            'img'=>'required|image'
          ]
        );

        //upload image
        $img=$request->img;
        $imgOriginalName=$img->getClientOriginalName();
        $imgNewName="Book-".uniqid()."".time().$imgOriginalName;
       // dd($imgNewName);
        $img->move(public_path('uploads/books'),$imgNewName);
       

        $title=$request->title;
        $desc=$request->desc;

        Book::create
        (
          [
            'title'=>$title,
            'desc'=>$desc,
            'img'=>$imgNewName
          ]
        );
        return redirect(route('allbooks'));

    }

    //func edit form 
    public function edit($id)
    {
      //$book=Book::where('id','=',$id)->first();
      $book=Book::findOrFail($id);
      return view('books/edit',compact('book'));
    }

    //func update book in db and redirect
    public function update(Request $request,$id)
    {
      //validation
      $request->validate
      (
        ['title'=>'required|max:100|string',
         'desc'=>'required|string',
         'img'=>'nullable|image'
        ]
      );

      $book=Book::findOrFail($id);
      $imgName=$book->img;
      //dd($imgName);
      if($request->hasFile('img'))
      {
        if($imgName!==null)
        {
          unlink(public_path('uploads/books/').$imgName);
        }
        $img=$request->img;
        $imgName=$img->getClientOriginalName();
        $imgName='Book-'.uniqid().time().$imgName;
        $img->move(public_path('uploads/books/'),$imgName);
      }
      

      //get the book from db
      $book->update
      (
        [
          'title'=>$request->title,
          'desc'=>$request->desc,
          'img'=>$imgName
        ]
      );
     
      //redirect to the show page with id of the book
      return  redirect(route('onebook',$id));
    }



    //func delete book from db and redirect
    public function delete($id)
    {
      $book=Book::findOrFail($id);
      if($book->img!==null)
      {
        unlink(public_path('uploads/books/').$book->img);
      }
      
      $book->delete();
      return redirect(route('allbooks'));
     //return back();
    }







}
