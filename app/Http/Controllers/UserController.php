<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('created_at','desc')->get();
  return view('users.index', compact([
            'users'
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::where('name', '!=', 'super-admin')->orderBy('name')->get();

        return view('users.edit', compact([
            'user',
            'roles',
        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $request->validated();

        $user->update([
            'name' => $request->name,
        ]);
        $role = Role::find($request->role_id);

        $user->syncRoles([$role->name]);

        return redirect()->back()->with('status', 'User updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $duser=User::find($user->id);
        $duser->delete();
        return redirect()->route('users.index')
        ->with('status', 'User deleted successfully');
    }
        /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function warning(User $user)
    {
        return view('users.warning',['user'=>$user]);
    }
}
