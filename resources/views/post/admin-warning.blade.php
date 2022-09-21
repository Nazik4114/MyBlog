<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('MyBlog') }}
        </h2>
    </x-slot>
    <div class="container "> 
    <div class="row p-12 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
      <div class="col-lg-7 p-3 p-lg-5 pt-lg-3 ">
  <h1>Are you shure?</h1><br><br>
  <form method="post" action="{{route('admin-destroy',$post->id)}}">
  @csrf
  @method('DELETE')
  <input type="submit" class="btn btn-success btn-lg" value="Yes">
   <a href="{{route('dashboard')}}"class="btn btn-danger btn-lg">No</a>
  </form>
 
      </div>
    </div>
</x-app-layout>
