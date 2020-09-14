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


<textarea class="form-control mb-4" placeholder="Description"  name="desc"  cols="30" rows="7">{{old('desc')}}</textarea>
        @if ($errors->first('desc'))
        <div class="alert alert-danger" role="alert">
            <strong>{{$errors->first('desc')}}</strong>
        </div>
         @endif

    <div class="form-group">
     <input type="file" name="img" class="form-control-file" value="{{old('img')}}">
      <small  class="form-text text-muted">Upload Image</small>
    </div> 

    @if ($errors->first('img'))
    <div class="alert alert-danger" role="alert">
        <strong>{{$errors->first('img')}}</strong>
    </div>
     @endif

     <h4>Select Categories:</h4>
     
     @foreach ($categories as $category)
     <div class="form-check">
       <label class="form-check-label"> 
       <input type="checkbox" class="form-check-input" name="category_ids[]" id="" value="{{$category->id}}" >
       {{$category->name}}
    </div> 
    
    @endforeach
    @if ($errors->first('category_ids'))
    <div class="alert alert-danger" role="alert">
        <strong>{{$errors->first('category_ids')}}</strong>
    </div>
     @endif 
       
     

    <div class="text-center w-100" >
        <button class="btn btn-dark w-25" type="submit">Add Book</button>
    </div>
</form>
@endsection