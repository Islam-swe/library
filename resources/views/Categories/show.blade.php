@extends('layout')
@section('title')
Category-{{$category->name}}
@endsection

@section('content')


        

        
            <h1>{{$category->name}}</h1>  
            <h4>Books</h4>
            <ul>
                @foreach ($category->books as $book)
                <li>{{$book->title}}</li>
                @endforeach
            </ul>
            
            <p></p> 
            <a class="btn btn-primary" href="{{route('categories.edit',$category->id)}}">Update Info</a>
            <a class="btn btn-danger"  href="{{route('categories.delete',$category->id)}}">Delete</a> 
            <a class="btn btn-info" href="{{route('allbooks')}}">Back</a> 
       


 



@endsection

