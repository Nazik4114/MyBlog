@extends('layouts.master')
@section('title')All Posts @endsection 
@section('content')
<div class="container">
  <?php
  if(strlen($search)!=0){
    echo "<h2>Searching by: {$search}</h2><br>";
  }
  ?>
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
                  <a href="{{route('one', $post->id)}}" class="btn btn-sm btn-outline-secondary">View</a>
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
<div class="paginator">
{{$posts->withQueryString()->links()}}
</div>
      @endsection