<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\SearchRequest;

class GuestController extends Controller
{

    public function show()
    {
        return view('show-all-posts', ['posts' => Post::orderBy('created_at', 'desc')->paginate(15), 'search' => ""]);
    }

    public function showOne(Post $id)
    {
        return view('one-post', [
            'post' => $id,
            'author' => $id->user,
            'coments' => $id->coments,
        ]);
    }

    public function aboutAuthor(User $id, Post $post_id)
    {

        return view('about-author', [
            'post_id' => $post_id->id,
            'author' => $id,
        ]);
    }

    public function search(SearchRequest $req)
    {
        $req->validated();
        return view('show-all-posts', [
            'posts' => Post::where('title', 'LIKE', '%' . $req->search . '%')->orderBy('created_at', 'desc')->paginate(15),
            'search' => $req->search,
        ]);
    }

}
