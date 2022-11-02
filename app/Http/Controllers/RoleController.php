<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $roles = Role::orderBy('name')->where('name', '!=', 'super-admin')->get();

        return view('role.index', [
            'roles' => $roles,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(RoleStoreRequest $request)
    {
        $request->validated();

        $newRole = Role::create([
            'name' => $request->name,
        ]);
        $permissions = Permission::whereIn('id', $request->permissions)->get();
        $newRole->syncPermissions($permissions);

        return redirect()->back()->with('status', 'Role added!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $permissions = Permission::orderBy('name')->get();

        return view('role.create', [
            'permissions' => $permissions,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Role $role
     * @return Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Role $role
     * @return Response
     */
    public function edit(Role $role)
    {
        $role = Role::notAdmin()->findOrFail($role->id);
        $permissions = Permission::orderBy('name')->get();

        return view('role.edit', [
            'permissions' => $permissions,
            'role' => $role,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param \App\Models\Role $role
     * @return Response
     */
    public function update(RoleUpdateRequest $request, Role $role)
    {
        $request->validated();

        $role = Role::notAdmin()->findOrFail($role->id);
        $role->update([
            'name' => $request->name,
        ]);
        $permissions = Permission::whereIn('id', $request->permissions)->get();
        $role->syncPermissions($permissions);

        return redirect()->back()->with('status', 'Role updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Role $role
     * @return Response
     */
    public function destroy(Role $role)
    {
        $drole = Role::find($role->id);
        $drole->delete();
        return redirect()->back()->with('status', 'Role deleted!');
    }
}
