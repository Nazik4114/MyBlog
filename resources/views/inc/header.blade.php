<header class="py-3 mb-4 border-bottom shadow">
<div class="container-fluid d-flex flex-wrap ">
      <ul class="nav nav-pills mheaderL">
        <li class="nav-item"><a href="{{ route('home') }}" class="nav-link active mr-4" aria-current="page">Home</a></li>
        <li class="nav-item "><a href="{{ route('login') }}" class="nav-link  px-2 fw-b mr-4">Login</a></li>
        <li class="nav-item"><a href="{{ route('register') }}" class="nav-link px-2 mr-4">Sign up</a></li>
      </ul>
      <div class="container d-flex flex-wrap justify-content-center">
      <a href="/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
      <div class="shrink-0 flex items-center">
                    <a href="\">
                        <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                    </a>
                </div>&nbsp;
        <span class="fs-4 mr-9">MyBlog</span>
      </a> 
      <form method="get" class="col-12 col-lg-auto mb-3 mb-lg-0 mheaderR" action="{{route('search')}}">
      @csrf
        <input type="search" class="form-control" placeholder="Search...(by name book)" name="search" aria-label="Search">
      </form>
    </div>
    </div> 
   

    
     
  </header> 
