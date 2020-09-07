@extends('layout')

@section('title')
   edit- {{$category->name}}
@endsection


@section('content')


<form  action="{{route('categories.update',$category->id)}}" method="POST" enctype="multipart/form-data">
      @csrf
   <div class="container">

            <div class="form-group">
               <input type="text" class="form-control my-1" value="{{old('name')??$category->name}}" name="name" placeholder="name">
                    @if ($errors->first('name'))
                       <div class="alert border-danger text-danger py-1" role="alert">
                          <strong>{{$errors->first('name')}}</strong>
                       </div>
                    @endif 
              </div>
              

      <button class="btn btn-dark w-100" type="submit">Update</button>
   </div>
   

</form>
@endsection