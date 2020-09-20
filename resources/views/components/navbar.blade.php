 {{-- navbar --}}
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{route('allbooks')}}">@lang('site.library')</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{route('allbooks')}}">@lang('site.home') <span class="sr-only">(current)</span></a>
        </li>
        @if (Auth::check()&&Auth::user()->is_admin==1)
            <li class="nav-item">
              <a class="nav-link" href="{{route('books.create')}}">@lang('site.addBook')</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  @lang('site.cats')
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @foreach ($cats as $cat)
                <a class="dropdown-item" href="{{route('categories.show',$cat->id)}}">{{$cat->name}}</a>  
                    @endforeach
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="{{route('categories.create')}}">@lang('site.addCat')</a>
            </li>
        @endif
       
      </ul> 
              {{-- on the right --}}

      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Lang
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{route('lang.en')}}">En</a> 
          <a class="dropdown-item" href="{{route('lang.ar')}}">Ar</a>   
      </li> 
        @guest 
        <li class="nav-item">
          <a class="nav-link" href="{{route('auth.register')}}">@lang('site.register')</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{route('auth.login')}}">@lang('site.login')</a>
        </li>   
        @endguest
        {{-- ---------if authorized --}}
        @auth
        <li class="nav-item">
          <a class="nav-link disabled" >{{Auth::user()->name}}</a>
        </li> 
        <li class="nav-item">
          <a class="nav-link" href="{{route('auth.logout')}}">@lang('site.logout')</a>
        </li> 
      @endauth
      
    </ul>
    
    </div>
    
   
</nav>
{{-- end of navbar --}}