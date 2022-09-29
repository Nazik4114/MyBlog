<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Post;
use App\Models\User;

class GuestController extends Controller
{

    public function show()
    {
        return view('show-all-posts', ['posts' => Post::latter()->paginate(15), 'search' => ""]);
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
            'posts' => Post::where('title', 'LIKE', '%' . $req->search . '%')->latter()->paginate(15),
            'search' => $req->search,
        ]);
    }

}
