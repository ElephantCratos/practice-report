<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::withoutRole('SuperAdmin')->get();
        $roles = Role::all();
        return view('users.index', compact('users', 'roles'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        $groups = Group::all();
        return view('users.edit-user-roles', compact('user', 'roles', 'groups'));
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

    public function updatePosition(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'position' => 'required',
        ]);

        $user->update($validatedData);

        return redirect()->back()->with('status', 'Должность была изменена.');
    }

    public function updateGroup(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'group_id' => 'required',
        ]);

        $user->update($validatedData);

        return redirect()->back()->with('status', 'Группа была изменена.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->back()->with('status', 'Пользователь был успешно удален.');
    }
}
