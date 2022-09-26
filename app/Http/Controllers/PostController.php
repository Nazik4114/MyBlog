<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $request->validated();
        $post = Post::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'image_url' => $request->image_url,
            'body' => $request->body,
        ]);
        return redirect()->back()->with('status', 'Post added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show', [
            'post' => $post,
            'author' => $post->user,
            'coments' => $post->coments,
            'user' => Auth::user(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('post.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $request->validated();

        $post->update($request->all());
        return redirect()->back()->with('status', 'Post udateted!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $npost = Post::find($post->id);
        $npost->delete();
        return redirect()->route('profile')
            ->with('status', 'Post deleted successfully');
    }
    public function warning(Post $post)
    {
        $npost = Post::find($post->id);
        return view('post.warning', ['post' => $npost]);
    }
    public function admin_destroy(Post $post)
    {
        $npost = Post::find($post->id);
        $npost->delete();
        return redirect()->route('dashboard')
            ->with('status', 'Post deleted successfully');
    }
    public function admin_warning(Post $post)
    {
        $npost = Post::find($post->id);
        return view('post.admin-warning', ['post' => $npost]);
    }
}
