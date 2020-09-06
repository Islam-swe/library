@extends('layout')

@section('title')
   All-Books 
@endsection

@section('content')
<div class="row">
   @foreach($books as $book)
   <div class="col-md-4">
     

     


      <div class="card" style="width: 18rem;">
         <img class="card-img-top"src="{{asset('uploads/books/'.$book->img)}}" alt="{{$book->title}}">
         <div class="card-body">
           <h5 class="card-title">{{$book->title}}</h5>
           <p class="card-text">{{$book->desc}}</p>
           <a href="{{route('books.edit',$book->id)}}" class="btn btn-primary">Update</a>
           <a href="{{route('books.delete',$book->id)}}" class="btn btn-danger" >Delete</a>
           <a href="{{route('onebook',$book->id)}}" class="btn btn-success" >Show</a>
         </div>
       </div>





   
</div>


   


   @endforeach

   {{$books->render()}}
</div>
@endsection

