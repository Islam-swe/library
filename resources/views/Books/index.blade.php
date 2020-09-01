@extends('layout')

@section('title')
   All-Books 
@endsection

@section('content')

 @foreach($books as $book)

    <h2 class="text-capitalize">{{$book->title}}</h2>


<p>{{$book->desc}}</p>
<a href="{{route('books.edit',$book->id)}}" class="btn btn-primary">Update</a>
<a href="{{route('books.delete',$book->id)}}" class="btn btn-danger" >Delete</a>
<a href="{{route('onebook',$book->id)}}" class="btn btn-success" >Show</a>

<hr>
@endforeach

{{$books->render()}}
   
@endsection

