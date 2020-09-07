@extends('layout')

@section('title')
   All-Categories 
@endsection

@section('content')
<div class="row">
   @foreach($categories as $category)
   <div class="col-md-4">
     

     {{-- {{$category->books}} --}}


      <div class="card" style="width: 18rem;">
         <div class="card-body">
           <h5 class="card-title">{{$category->name}}</h5>
           <a href="{{route('categories.edit',$category->id)}}" class="btn btn-primary">Update</a>
           <a href="{{route('categories.delete',$category->id)}}" class="btn btn-danger" >Delete</a>
           <a href="{{route('categories.show',$category->id)}}" class="btn btn-success" >Show</a>

         </div>
       </div>





   
</div>


   


   @endforeach

</div>
@endsection

