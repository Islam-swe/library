@extends('layout')

@section('title')
    Create Book
@endsection


@section('content')
    
<form class="text-center" action="{{route('books.store')}}" method="POST">
   @csrf
    <div class="form-group">
    <input type="text" class="form-control" name="title" placeholder="Title">
    </div>

    <textarea class="form-control mb-4" placeholder="Description" name="desc"  cols="30" rows="7"></textarea>

    <button class="btn btn-dark w-50 m-auto" type="submit">Add</button>
</form>
@endsection