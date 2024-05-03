<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;

class RegistrationController extends Controller
{
    public function generateRegistrationLink(Request $request)
    {
        $requestingUserRole = auth()->user()->roles->first()->name;
        if ($requestingUserRole === 'head_OPOP') {
            $forbiddenRoles = ['admin', 'head_OPOP', 'superAdmin'];
            if (in_array($request->input('role'), $forbiddenRoles)) {
                abort(403, 'Вы не можете создать ссылку регистрации для этой роли.');
            }
        }

        $token = Str::random(100);
        $user = User::create([
            'name' => 'temp_username' . $token,
            'email' => 'temp_username' . $token . '@example.com',
            'password' => '12345678',
            'registration_token' => $token,
        ]);

        $user->assignRole($request->input('role'));

        $link = route('signUpWithToken', ['token' => $token]);

        return redirect()->route('users.index')->with('registrationLink', $link);
    }

    public function signUpWithToken($token)
    {
        $flag = true;
        $user = User::where('registration_token', $token)->first();
        if (!$user) {
            abort(404);
        }

        if (strpos($user->name, 'temp_username') !== false) {
            $newUser = User::create([
                'name' => 'new_user' . $token,
                'email' => 'new_email' . $token . '@example.com',
                'password' => '12345678',
                'registration_token' => $token
            ]);

            foreach($user->roles as $role) {
                $newUser->assignRole($role);
            }

            $user->delete();
            $flag = false;
        }

        $flag == true ? auth()->login($user) : auth()->login($newUser);

        return redirect()->route('profile.edit');
    }
}
