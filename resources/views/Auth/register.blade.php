@extends('layout')

@section('title')
    Register
@endsection


@section('content')
    
<form class="w-50 m-auto" action="{{route('auth.handleRegister')}}" method="POST" >
   @csrf
   <h1>Register</h1>

    <div class="form-group">
    <input type="text" class="form-control" value="{{old('name')}}" name="name" placeholder="Name">
    </div>

    @if ($errors->first('name'))
    <div class="alert alert-danger" role="alert">
        <strong>{{$errors->first('name')}}</strong>
    </div>
    @endif
{{-- ============================================================== --}}
    <div class="form-group">
        <input type="text" class="form-control" value="{{old('email')}}" name="email" placeholder="Email">
    </div>
    @if ($errors->first('email'))
    <div class="alert alert-danger" role="alert">
        <strong>{{$errors->first('email')}}</strong>
    </div>
    @endif
{{-- ============================================================== --}}

    <div class="form-group">
        <input type="text" class="form-control" value="{{old('password')}}" name="password" placeholder="Password">
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