<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('MyBlog') }}
        </h2>
    </x-slot>

    <div class="container my-5">
    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger mt-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
    <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
      <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">

        <h2 class="display-4 fw-bold lh-1">{{$author->name}}</h2><br>
        <p class="lead fw-bold">User-name: <span class="lead">{{$author->user_name}}</span></p>
        <h3 class="information" >Details information:</h3><br>
        <div class="row">
<div class="col-6">
<p class="lead fw-bold">Email: <span class="lead">{{$author->email}}</span></p>
<p class="lead fw-bold">Phone: <span class="lead">{{$author->phone}}</span></p>
</div>
<div class="col-6">
<p class="lead fw-bold">City: <span class="lead">{{$author->city}}</span></p>
<p class="lead fw-bold">Street: <span class="lead">{{$author->street}}</span></p>
</div>
<a href="{{route('edit-profile')}}">corect profile</a>
        </div><br>
        <small class="text-muted"><span class="lead">Registred at: </span>{{$author->created_at}}</small>
        <br><br>
        <a href="{{route('posts.create')}}" class="btn btn-success">New Post</a>
      </div>
      <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg">
          <img class="rounded-lg-3" alt="" src="{{asset($images[rand(0,19)]['path'])}}" width="425">
      </div>
    </div>
  </div>
  <div class="conteiner myform">
  <h1>Your Posts:</h1><br><br>
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
  @foreach($posts as $post)
        <div class="col">
          <div class="card shadow-sm ">
		 	<img alt="" src="{{$post->image_url}}">
            <div class="card-body mdiv" style="height: 210px;">
              <h3 class="card-text">{{$post->title}}</h3>
              <p class="card-text"></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="{{route('posts.show', $post->id)}}" class="btn btn-sm btn-outline-secondary">View</a>
                </div>
                <small class="text-muted">{{$post->created_at}}</small>
              </div>
              <div class="mbtn">
              <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary">Edit</a>
              <a href="{{route('post-warning',$post->id)}}" class="btn btn-danger">Delete</a>
              </div>
            </div>

          </div>
        </div>
      @endforeach
      </div>

</div>
<br>
<div class="paginator pb-3">
{{$posts->links()}}
</div>
</div>
</x-app-layout>
