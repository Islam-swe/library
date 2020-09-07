@extends('layout')

@section('title')
    Create Category
@endsection


@section('content')
    
<form  action="{{route('categories.store')}}" method="POST" >
   @csrf
    <div class="form-group">
    <input type="text" class="form-control" value="{{old('name')}}" name="name" placeholder="Name">
    </div>

    @if ($errors->first('name'))
    <div class="alert alert-danger" role="alert">
        <strong>{{$errors->first('name')}}</strong>
    </div>
    @endif


 
    <div class="text-center w-100" >
        <button class="btn btn-dark w-25" type="submit">Add Category</button>
    </div>
</form>
@endsection