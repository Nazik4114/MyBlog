<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Coment;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
class AuthUserController extends Controller
{
    
    public function index(){
        return view('auth-user.auth-show-all-posts',['posts'=>Post::orderBy('created_at','desc')->paginate(15),'search'=>""]);        
    }
    public function aboutAuthor(User $id, Post $post_id){

        return view('auth-user.auth-about-author',[
            'post_id'=>$post_id->id,
            'author'=>$id,
        ]);
    }
    public function search(Request $req){
        $req->validate([
            'search'=>'required|max:255',
        ]);
        return view('auth-user.auth-show-all-posts',[
            'posts'=> Post::where('title', 'LIKE', '%'.$req->search.'%')->orderBy('created_at','desc')->paginate(15),
            'search'=>$req->search
        ]);
    }
    public function profile(){
        return view('auth-user.profile',[
            'posts'=>Post::where('user_id', '=', Auth::user()->id)->orderBy('created_at','desc')->paginate(9),
            'author'=>Auth::user(),
        ]);
    }

    public function updateProfile(){
        return view('auth-user.update-profile',[
            'user'=>Auth::user(),
        ]);
    }
    public function postUpdateProfile(UserRequest $request){
        $request->validated();
        $users=User::find(Auth::user()->id);
        $users->name=$request->name;
        $users->email=$request->email;
        $users->user_name=$request->user_name;
        $users->city=$request->city;
        $users->street=$request->street;
        $users->phone=$request->phone;
        $users->save();
        return redirect()->back()->with('status', 'User information update!');    }
}
