<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();

        return view('users.edit-user-roles', compact('user', 'roles'));
    }

    public function assignRole(Request $request, User $user)
    {
        $role = Role::findOrFail($request->role_id);
        $user->assignRole($role);

        return redirect()->back()->with('status', 'Роль была успешно назначена пользователю.');
    }

    public function removeRole(Request $request, User $user)
    {
        $role = Role::findOrFail($request->role_id);
        $user->removeRole($role);

        return redirect()->back()->with('status', 'Роль была успешно удалена у пользователя.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->back()->with('status', 'Пользователь был успешно удален.');
    }
}
