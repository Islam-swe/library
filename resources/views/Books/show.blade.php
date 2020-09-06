@extends('layout')
@section('title')
Book-{{$book->title}}
@endsection

@section('content')


    <div class="row">
        <div class="col-md-6">
            <img class="w-100" src="{{asset('uploads/books').'/'.$book->img}}" alt="" srcset="">
        </div>

        <div class="col-md-6">
            <h1>{{$book->id}}</h1>  
            <h4>{{$book->title}}</h4> 
            <p>{{$book->desc}}</p>  
            <a class="btn btn-primary" href="{{route('books.edit',$book->id)}}">Update Info</a>
            <a class="btn btn-danger"  href="{{route('books.delete',$book->id)}}">Delete</a> 
            <a class="btn btn-info" href="{{route('allbooks')}}">Back</a> 
        </div>


    </div>



@endsection

