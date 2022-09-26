<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('MyBlog') }}
        </h2>
    </x-slot>
    <div class="container">
  
  @if(strlen($search)!=0)
    <h2>Searching by: {{$search}}</h2><br>
  
  @endif
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
  @foreach($posts as $post)
        <div class="col">
          <div class="card shadow-sm ">
		 	<img alt="" class="mimg" src="{{$post->image_url}}">
            <div class="card-body mdiv" style="height: 210px;">
              <h3 class="card-text">{{$post->title}}</h3>
              <p class="card-text"></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="mbtn">
                  <a href="{{route('posts.show', $post->id)}}" class="btn btn-outline-secondary">View</a>
                  @role('super-admin')
                  <a href="{{route('admin-warning',$post->id)}}" class="btn btn-danger tt">Delete</a>
                    @endrole
                  <small class="text-muted data">{{$post->created_at}}</small>
                </div>
                
              
              </div>
            </div>
          </div>
        </div>           
      @endforeach
      </div>

</div>
<br>
<div class="paginator pb-3">
{{$posts->withQueryString()->links()}}
</div>
</x-app-layout>
