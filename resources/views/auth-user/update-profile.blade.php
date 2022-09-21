<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('MyBlog') }}
        </h2>
    </x-slot>

    <div class="container "> 
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
    <div class="row p-12 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
      <div class=" p-3 p-lg-5 pt-lg-3 ">
  
        <form method="post" action="{{route('update-profile')}}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col">
        <label for="name" class="lead fw-bold">Name</label>
        <input type="text" class="form-control mb-4" id="name" name="name" value="{{$user->name}}">
        <label for="email" class="lead fw-bold">Email</label>
        <input type="text" class="form-control mb-4" id="email" name="email" value="{{$user->email}}">
        <label for="city" class="lead fw-bold">City</label>
        <input type="text" class="form-control mb-4" id="city" name="city" value="{{$user->city}}">
        
        </div>
<div class="col-2"></div>
        <div class="col">
        <label for="user_name" class="lead fw-bold">User name</label>
        <input type="text" class="form-control mb-4" id="user_name" name="user_name" value="{{$user->user_name}}">
        <label for="phone" class="lead fw-bold">Phone</label>
        <input type="text" class="form-control mb-4" id="phone" name="phone" value="{{$user->phone}}">
        <label for="street" class="lead fw-bold">Street</label>
        <input type="text" class="form-control mb-4" id="street" name="street" value="{{$user->street}}">
        </div>
        <input type="submit" class="btn btn-success btn-lg" value="Update">
        </div>
        </form>      
      </div>
    </div>
</x-app-layout>
