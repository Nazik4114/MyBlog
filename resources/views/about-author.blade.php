@extends('layouts.master')
@section('title')About Author @endsection 
@section('content')
<div class="container my-5">
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
        </div><br>
        <small class="text-muted"><span class="lead">Registred at: </span>{{$author->created_at}}</small>
        <br><br>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
          <a href="/onePost/{{$post_id}}" class="btn btn-primary btn-lg px-4 me-md-2 fw-bold">Go back</a>
        </div>
      </div>
      <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg">
          <img class="rounded-lg-3" alt="" src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20({{rand(0,33)}}).webp" width="325">
      </div>
    </div>
  </div>
  @endsection