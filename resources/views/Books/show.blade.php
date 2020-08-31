@extends('layout')
@section('title')
    Show
@endsection

@section('content')


<h1>{{$book->id}}</h1>  
<h4>{{$book->title}}</h4> 
<p>{{$book->desc}}</p>  
<a href="{{route('books.edit',$book->id)}}"><button  class="btn btn-primary" >Update Info</button></a>
<a href="{{route('books.delete',$book->id)}}"><button  class="btn btn-danger" >Delete</button></a>

<hr>    
<a href="{{route('allbooks')}}">Back</a> 


@endsection

