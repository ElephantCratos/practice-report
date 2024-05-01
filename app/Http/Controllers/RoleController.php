<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::orderBy('name')->where('name', '!=' ,'admin') -> get();
        return view('roles.index', compact([
            'roles'
        ]));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::orderby('name') -> get();
        return view('roles.create', compact([
            'permissions'
        ]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate ([
            'name' => 'required',
            'permissions.*' => 'required|integer|exists:permissions,id',
        ]);

        $newRole = Role::create([
            'name' => $request -> name,
        ]);

        $permissions = Permission::whereIn('id',$request -> permissions) -> get();
        $newRole -> syncPermissions($permissions);

        return redirect() -> back() -> with('status', 'Новая роль была успешно создана!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $role = Role::where('name', '!=' , 'admin') -> findOrFail($role -> id);
        $permissions = Permission::orderby('name') -> get() ;
        return view('roles.edit', compact([
            'permissions',
            'role',
        ]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $role = Role::where('name', '!=' , 'admin')->findOrFail($role->id);
        $role->update([
            'name' => $request->name,
        ]);

        if ($request->has('permissions')) {
            $permissions = Permission::whereIn('id', $request->permissions)->get();
            $role->syncPermissions($permissions);
        } else {
            $role->syncPermissions([]);
        }

        return redirect()->back()->with('status', 'Права роли были успешно изменены!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        Role::findOrFail($role -> id) -> delete();
        return redirect() -> route('roles.index') -> with('status', 'Роль успешно удалена!');
    }
}
