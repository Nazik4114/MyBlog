<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComentRequest;
use App\Models\Coment;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ComentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Post $post
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(ComentRequest $request, Post $post)
    {
        $request->validated();
        $coment = Coment::create([
            'post_id' => $post->id,
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'body' => $request->coment,
        ]);
        return redirect()->back()->with('status', 'Coment added!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

    }

    /**
     * Display the specified resource.
     *
     * @param Coment $coment
     * @return Response
     */
    public function show(Coment $coment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @param Coment $coment
     * @return Application
     */
    public function edit(Coment $coment, Post $post)
    {
        $ncoment = Coment::find($coment->id);
        return view('coment.edit', [
            'coment' => $ncoment,
            'post_id' => $post->id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Coment $coment
     * @param Post $post
     * @return RedirectResponse
     */
    public function update(ComentRequest $request, Coment $coment, Post $post)
    {
        $request->validated();
        $coment->update([
            'body' => $request->coment,
        ]);
        return redirect()->route('posts.show', $post->id)->with('status', 'Coment update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Coment $coment
     * @return RedirectResponse
     */
    public function destroy(Coment $coment)
    {
        $ncoment = Coment::find($coment->id);
        $ncoment->delete();
        return redirect()->back()->with('status', 'Coment delete!');
    }
}
