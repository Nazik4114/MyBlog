<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('MyBlog') }}
        </h2>
    </x-slot>
    <div class="container "> 
    <div class="row p-12 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
      <div class="col-lg-7 p-3 p-lg-5 pt-lg-3 ">
        <form method="post" action="{{route('coment-update',[$coment->id,$post_id])}}">
         @csrf
         @method('PUT')
         <textarea name="coment" id="" cols="30" rows="2" class="form-control mb-4">{{$coment->body}}</textarea>
         <input type="submit" class="form-control mb-4 btn btn-success">
         </form>     
      </div>
    </div>
</x-app-layout>
