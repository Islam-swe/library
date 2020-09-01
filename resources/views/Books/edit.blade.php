@extends('layout')

@section('title')
   edit- {{$book->title}}
@endsection


@section('content')


<form class="text-center" action="{{route('books.update',$book->id)}}" method="POST" enctype="multipart/form-data">
      @csrf
   
    <div class="form-group">
    <input type="text" class="form-control my-1" value="{{old('title')??$book->title}}" name="title" placeholder="Title">
         @if ($errors->first('title'))
            <div class="alert border-danger text-danger py-1" role="alert">
               <strong>{{$errors->first('title')}}</strong>
            </div>
         @endif 
   </div>
   


    <textarea class="form-control mb-1"  placeholder="Description" name="desc"  cols="30" rows="7">{{$book->desc}}</textarea>
      @if ($errors->first('desc'))
          <div class="alert border-danger text-danger py-1" role="alert">
             <strong>{{$errors->first('desc')}}</strong>
          </div>
      @endif

      <img style="width:400px; height:400px" src="{{asset('uploads/books/'.$book->img)}}" alt="" srcset="">
  
      <div class="form-group">
         <input type="file"  class="form-control-file w-50 m-auto" name="img" >
      </div>

    @if ($errors->first('img'))
          <div class="alert border-danger text-danger py-1" role="alert">
             <strong>{{$errors->first('img')}}</strong>
          </div>
      @endif

    <button class="btn btn-dark w-50 m-auto" type="submit">Update</button>
</form>
@endsection