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
        if ($request->user()->hasRole('admin')) {
            $role = Role::findOrFail($request->role_id);
            $user->assignRole($role);
            return redirect()->back()->with('status', 'Роль была успешно назначена');
        }
        
        if ($request->user()->hasRole('head_OPOP')) {
            $role = Role::findOrFail($request->role_id);

            $forbiddenRoles = ['admin', 'head_OPOP', 'superAdmin'];
            if (in_array($role->name, $forbiddenRoles)) {
                abort(403, 'Вы не можете назначить эту роль');
            }
        }
        $user->assignRole($role);
        return redirect()->back()->with('status', 'Роль была успешно назначена');
    }


    public function removeRole(Request $request, User $user)
    {
        if ($request->user()->hasRole('admin')) {
            $role = Role::findOrFail($request->role_id);
            $user->removeRole($role);
            return redirect()->back()->with('status', 'Роль была успешно удалена у юзера');
        }

        if ($request->user()->hasRole('head_OPOP')) {
            $role = Role::findOrFail($request->role_id);

            $forbiddenRoles = ['admin', 'head_OPOP', 'superAdmin'];
            if (in_array($role->name, $forbiddenRoles)) {
                abort(403, 'Вы не можете удалить эту роль у юзера');
            }
        }

        $user->removeRole($role);

        return redirect()->back()->with('status', 'Роль была успешно удалена у юзера');
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
