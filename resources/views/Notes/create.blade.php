@extends('layout')

@section('title')
    Add Note
@endsection


@section('content')
    
<form  action="{{route('notes.store')}}" method="POST" >
   @csrf
    <div class="form-group">
    <textarea type="text" class="form-control" value="{{old('content')}}" name="content" placeholder="content">
    
    </textarea>
    </div>

    @if ($errors->first('name'))
    <div class="alert alert-danger" role="alert">
        <strong>{{$errors->first('name')}}</strong>
    </div>
    @endif


 
    <div class="text-center w-100" >
        <button class="btn btn-dark w-25" type="submit">Add Note</button>
    </div>
</form>
@endsection