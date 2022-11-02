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
      <div class="col-lg-5 p-3 p-lg-5 pt-lg-3 ">

        <form method="post" action="{{route('posts.store')}}">
            @csrf
        <label for="title" class="lead fw-bold">Title</label>
        <input type="text" class="form-control mb-4" id="title" name="title" placeholder="Enter title your post">
        <textarea name="body" class="form-control mb-4" id="body" cols="30" rows="10" placeholder="Enter your post "></textarea>
        <input type="submit" class="btn btn-success btn-lg" value="Create">
        </form>
      </div>
    </div>
</x-app-layout>
