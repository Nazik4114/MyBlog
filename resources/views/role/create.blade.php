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
                <form method="post" action="{{route('roles.store')}}">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="name" class="form-control  id="exampleInputEmail1" placeholder="Enter name role">
                    </div>
                    @foreach($permissions as $permission)
                        <div class="form-group form-check" >
                            <input type="checkbox" value="{{$permission->id}}" name="permissions[]" class="form-check-input" id="exampleCheck{{$permission->id}}">
                            <label class="form-check-label" for="exampleCheck{{$permission->id}}">{{$permission->name}}</label>
                        </div>
                    @endforeach
                    <input type="submit" class="form-control mb-4 btn btn-success" value="Create">
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
</x-app-layout>
