<?php

namespace App\Http\Controllers;
use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class ApiBookController extends Controller
{
    //get all books
    function index()
    {
        $books=Book::select('id','desc')->get();
        return response()->json($books);
    }
   
    //show one book
    function show($id)
    {

        $book=Book::with('categories')->findOrFail($id);
        return response()->json($book);
    }

    function store(Request $request)
    {
        //validation

        $request->validate
        ([
            'title'=>'required|string|max:100',
            'desc'=>'required|string',
            'img'=>'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'category_ids'=>'required',
            'category_ids.*'=>'exists:categories,id'
            
        ]);
        //upload image
        $image=$request->img;
        $imageName=$image->getClientOriginalName();
        $imageName=uniqid().time().$imageName;
        $uploaded=$image->move(public_path('uploads/books'),$imageName);

        if($uploaded==true)
        {
            $book=Book::create
            ([
                'title'=>$request->title,
                'desc'=>$request->desc,
                'img'=>$imageName,
            ]);
            
           // return $pivotTable;
            if($book==true)
            {
                $book->categories()->sync($request->category_ids);
                return response()->json('created successfully');
            }
            
            return response()->json("not succes");
        }
        return 'db problem';

    }




    //func update book in db and redirect
    public function update(Request $request,$id)
    {

        //validation
        $validator = Validator::make($request->all(), [
            'title'=>'required|string|max:100',
            'desc'=>'required|string',
            'img'=>'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'category_ids'=>'required',
            'category_ids.*'=>'exists:categories,id'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $book=Book::findOrFail($id);
        $imgName=$book->img;

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
            ([
            'title'=>$request->title,
            'desc'=>$request->desc,
            'img'=>$imgName
            ]);

        $book->categories()->sync($request->category_ids);
        
        return  response()->json('updated successfully');
    }


    //delte
    function delete($id)
    {
        $book=Book::findOrFail($id);
        if($book->img!==null)
        {
            unlink(public_path('uploads/books/').$book->img);
        }
        $book->categories()->sync([]);
        $book->delete();
        if($book==true)
        {
          return response()->json('deleted successfully');  
        }
        return response()->json('deleted fail');
    }





}