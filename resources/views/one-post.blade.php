@extends('layouts.master')
@section('title')One Post @endsection 
@section('content')
<div class="container my-5">
    <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
      <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
        <h2 class="display-4 fw-bold lh-1">{{$post->title}}</h2><br>
        <p class="lead fw-bold">Authors: {{$author->user_name}}&nbsp;<a class="btn btn-sm btn-outline-secondary" href="/aboutAuthor/{{$author->id}}/{{$post->id}}">About author</a></p>        
        <p class="lead" >{{$post->body}}</p>
        <small class="text-muted"><span class="lead">Update at: </span>{{$post->created_at}}</small>
        <br><br>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
        </div>
      </div>
      <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg">
          <img class="mimgOnePost" alt="" src="{{$post->image_url}}" width="325">
      </div>
    </div>
  </div>
  
<div class="row d-flex justify-content-center">  
  <div class="col-md-8 col-lg-6">
     
    <div class="card shadow-0 border" style="background-color: #f0f2f5;">
    
      <div class="card-body p-4">
@foreach($coments as $com)
        <div class="card mb-4">
          <div class="card-body">
            <p>{{$com->body}}</p>
            <small class="text-muted"><span class="lead">Created at: </span>{{$com->created_at}}</small><br><br>
            <div class="d-flex justify-content-between">
              <div class="d-flex flex-row align-items-center">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20({{rand(0,33)}}).webp" alt="avatar" width="25"
                  height="25" />
                <p class="small mb-0 ms-2">{{$com->name}}</p>
              </div>
              <div class="d-flex flex-row align-items-center">
                <p class="small text-muted mb-0">Upvote?</p>
                <i class="far fa-thumbs-up mx-2 fa-xs text-black" style="margin-top: -0.16rem;"></i>
                <p class="small text-muted mb-0">{{rand(0,121)}}</p>
              </div>
            </div>
          </div>
        </div>  
        @endforeach
      </div>
    </div>
  </div>
</div>
  @endsection

