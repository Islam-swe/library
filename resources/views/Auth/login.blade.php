@extends('layout')

@section('title')
    Login
@endsection


@section('content')
    
<form class="w-50 m-auto" action="{{route('auth.handleLogin')}}" method="POST" >
   @csrf
  
   <h1>Login</h1>

   
{{--Email ============================================================== --}}
    <div class="form-group">
        <input type="email" class="form-control" value="{{old('email')}}" name="email" placeholder="Email">
    </div>
    @if ($errors->first('email'))
    <div class="alert alert-danger" role="alert">
        <strong>{{$errors->first('email')}}</strong>
    </div>
    @endif
{{--Password ============================================================== --}}

    <div class="form-group">
        <input type="password" class="form-control" value="{{old('password')}}" name="password" placeholder="Password">
    </div>
    @if ($errors->first('password'))
    <div class="alert alert-danger" role="alert">
        <strong>{{$errors->first('password')}}</strong>
    </div>
    @endif

{{-- ============================================================== --}}

 
    <div class="text-center w-100" >
        <button class="btn btn-dark w-25" type="submit">Submit</button>
    </div>
</form>
@endsection