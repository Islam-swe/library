@extends('layout')

@section('title')
   edit- {{$book->title}}
@endsection


@section('content')
    
<form class="text-center" action="{{route('books.update',$book->id)}}" method="POST">
   @csrf
    <div class="form-group">
    <input type="text" class="form-control" value="{{$book->title}}" name="title" placeholder="Title">
    </div>

    <textarea class="form-control mb-4"  placeholder="Description" name="desc"  cols="30" rows="7">{{$book->desc}}</textarea>

    <button class="btn btn-dark w-50 m-auto" type="submit">Update</button>
</form>
@endsection