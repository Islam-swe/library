@extends('layout')

@section('title')
   edit- {{$book->title}}
@endsection


@section('content')


<form  action="{{route('books.update',$book->id)}}" method="POST" enctype="multipart/form-data">
      @csrf
   <div class="container">
      <div class="row">
         <div class="col-md-6">

            <div class="form-group">
               <input type="text" class="form-control my-1" value="{{old('title')??$book->title}}" name="title" placeholder="Title">
                    @if ($errors->first('title'))
                       <div class="alert border-danger text-danger py-1" role="alert">
                          <strong>{{$errors->first('title')}}</strong>
                       </div>
                    @endif 
              </div>
              
           
           
               <textarea class="form-control mb-1"  placeholder="Description" name="desc"  cols="30" rows="15">{{$book->desc}}</textarea>
                 @if ($errors->first('desc'))
                     <div class="alert border-danger text-danger py-1" role="alert">
                        <strong>{{$errors->first('desc')}}</strong>
                     </div>
                 @endif


         </div>
         <div class="col-md-6">


            <img style="height:50vh" class="w-100 my-3" src="{{asset('uploads/books/'.$book->img)}}" alt="" srcset="">
      
            <div class="form-group">
               <input type="file"  class="form-control-file w-50 m-auto" name="img" >
            </div>

               @if ($errors->first('img'))
                  <div class="alert border-danger text-danger py-1" role="alert">
                     <strong>{{$errors->first('img')}}</strong>
                  </div>
               @endif

               <h4>Update Categories:</h4>
               @foreach ($categories as $category)
                   <div class="form-check">
                  <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" name="category_ids[]" value="{{$category->id}}">
                    {{$category->name}}
                  </label>
                </div> 
               @endforeach
               @if ($errors->first('category_ids'))
               <div class="alert alert-danger" role="alert">
                  <strong>{{$errors->first('category_ids')}}</strong>
               </div>
               @endif
               
         </div>
      </div>
     
      <button class="btn btn-dark w-100" type="submit">Update</button>
   </div>
   

</form>
@endsection