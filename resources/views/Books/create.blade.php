@extends('layout')

@section('title')
    Create Book
@endsection


@section('content')
    
<form  action="{{route('books.store')}}" method="POST" enctype="multipart/form-data">
   @csrf
    <div class="form-group">
    <input type="text" class="form-control" value="{{old('title')}}" name="title" placeholder="Title">
    </div>
    @if ($errors->first('title'))
    <div class="alert alert-danger" role="alert">
        <strong>{{$errors->first('title')}}</strong>
    </div>
    @endif


    <textarea class="form-control mb-4" placeholder="Description"  name="desc"  cols="30" rows="7"></textarea>
        @if ($errors->first('desc'))
        <div class="alert alert-danger" role="alert">
            <strong>{{$errors->first('desc')}}</strong>
        </div>
         @endif

    <div class="form-group">
      <input type="file" name="img" class="form-control-file">
      <small  class="form-text text-muted">Upload Image</small>
    </div> 

    @if ($errors->first('img'))
    <div class="alert alert-danger" role="alert">
        <strong>{{$errors->first('img')}}</strong>
    </div>
     @endif

    <div class="text-center w-100" >
        <button class="btn btn-dark w-25" type="submit">Add Book</button>
    </div>
</form>
@endsection