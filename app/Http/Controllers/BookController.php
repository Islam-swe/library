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
        $title=$request->title;
        $desc=$request->desc;
        Book::create
        (
          [
            'title'=>$title,
            'desc'=>$desc,
          ]
        );

        // $book=new Book();
        // $book->title=$title;
        // $book->desc=$desc;
        // $book->save();
        return redirect(route('allbooks'));

    }

    //edit form 
    public function edit($id)
    {
      //$book=Book::where('id','=',$id)->first();
      $book=Book::findOrFail($id);
      return view('books/edit',compact('book'));
    }
    //update book in db and redirect
    public function update(Request $request,$id)
    {
      Book::findOrFail($id)->update(['title'=>$request->title,'desc'=>$request->desc]);
      return  redirect(route('onebook',$id));
    }

    //delete book from db and redirect
    public function delete($id)
    {
      Book::findOrFail($id)->delete();
      return redirect(route('allbooks'));
     //return back();
    }











}
