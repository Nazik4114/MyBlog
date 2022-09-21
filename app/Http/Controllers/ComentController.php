<?php

namespace App\Http\Controllers;

use App\Models\Coment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ComentController extends Controller
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
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'coment'=>['required','max:255']
        ]);
        $coment=Coment::create([
            'post_id'=> $post->id,
            'name'=>Auth::user()->name,
            'email'=>Auth::user()->email,
            'body'=>$request->coment,
        ]);
        return redirect()->back()->with('status', 'Coment added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coment  $coment
     * @return \Illuminate\Http\Response
     */
    public function show(Coment $coment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coment  $coment
     * @return \Illuminate\Http\Response
     */
    public function edit(Coment $coment, Post $post)
    {
        $ncoment=Coment::find($coment->id);
       return view('coment.edit',[
        'coment'=>$ncoment,
        'post_id'=>$post->id,
    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coment  $coment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coment $coment, Post $post)
    {
        $request->validate([
            'coment'=>['required','max:255']
        ]);
        $coment->update([
            'body'=>$request->coment,
        ]);
        return redirect()->route('posts.show',$post->id)->with('status', 'Coment update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coment  $coment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coment $coment)
    {
       $ncoment=Coment::find($coment->id);
       $ncoment->delete();
       return redirect()->back()->with('status', 'Coment delete!');
    }
}
