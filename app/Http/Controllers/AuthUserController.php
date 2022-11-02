<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Image;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('auth-user.auth-show-all-posts', ['posts' => Post::latter()->paginate(15), 'search' => ""]);
    }

    /**
     * Display the specified resource.
     *
     * @param User $id
     * @param Post $post_id
     * @return void
     */
    public function aboutAuthor(User $id, Post $post_id)
    {

        return view('auth-user.auth-about-author', [
            'post_id' => $post_id->id,
            'author' => $id,
            'images' => Image::all(),

        ]);
    }

    public function search(Request $req)
    {
        $req->validate([
            'search' => 'required|max:255',
        ]);
        return view('auth-user.auth-show-all-posts', [
            'posts' => Post::where('title', 'LIKE', '%' . $req->search . '%')->latter()->paginate(15),
            'search' => $req->search,
        ]);
    }

    public function profile()
    {
        return view('auth-user.profile', [
            'posts' => Post::where('user_id', '=', Auth::user()->id)->latter()->paginate(9),
            'author' => Auth::user(),
            'images' => Image::all(),
        ]);
    }

    public function updateProfile()
    {
        return view('auth-user.update-profile', [
            'user' => Auth::user(),
        ]);
    }

    public function postUpdateProfile(UserRequest $request)
    {
        $request->validated();
        $users = User::find(Auth::user()->id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->user_name = $request->user_name;
        $users->city = $request->city;
        $users->street = $request->street;
        $users->phone = $request->phone;
        $users->save();
        return redirect()->back()->with('status', 'User information update!');
    }
}
