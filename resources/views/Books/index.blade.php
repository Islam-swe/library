@extends('layout')

@section('title')
   All-Books 
@endsection

@section('content')
@if ($books->count()==0)
    No Books found
@endif

<div class="form-group">
  <label for="">Search Books</label>
  <input type="text"class="form-control w-25"  id="keyword"  placeholder="Book Title">
  <div class="form-control w-25">
      <ul id="searchResults">
         {{-- <li></li> --}}
      </ul>
  </div> 
</div>

@auth
 <h5>Notes:</h5>
@foreach (Auth::user()->notes as $note)

   <h6>{{$note->content}}</h6>
 @endforeach   
 <a class="btn btn-success" href="{{route('notes.create')}}">Add Note</a>

@endauth 
<div class="row my-2">
   @foreach($books as $book)
   <div class="col-md-4 my-3">
     

     


      <div class="card" style="width: 18rem;">
         <img class="card-img-top" style="height: 350px" src="{{asset('uploads/books/'.$book->img)}}" alt="{{$book->title}}">
         <div class="card-body">
           <h5 class="card-title">{{$book->title}}</h5>
         <p class="card-text">{{Str::substr($book->desc, 0, 20)."..."}} <a href="{{Route('onebook',$book->id)}}">Read More</a></p>
          
            @if (Auth::check() && Auth::user()->is_admin==1)
               <a href="{{route('books.edit',$book->id)}}" class="btn btn-primary">Update</a>
               <a href="{{route('books.delete',$book->id)}}" class="btn btn-danger" >Delete</a>
             
            @endif
         
           <a href="{{route('onebook',$book->id)}}" class="btn btn-success" >Show</a>
         </div>
       </div>





   
   </div>


   


   @endforeach
</div>
   {{$books->render()}}

   
@endsection

 
@section('scripts')
 <script>
    $('#keyword').keyup(function(){
       let keyword=$(this).val();
       let url="{{route("books.search")}}"+"?keyword="+keyword;
      //  console.log(url);
       $('#searchResults').html()
       $.ajax({
          type:"GET",
          url: url,
          contentType:false,
          processData:false,
          success:function(data)
         {
            $('#searchResults').html()
            for(book of data)
            {
               // $('#searchResults').html(
               //    `<h6>${book.title}</h6>`
               // )
               console.log(book.title)
            
            }
         
         }
       })
    })
    
</script>
@endsection


