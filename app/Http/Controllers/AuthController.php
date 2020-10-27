<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login() {
        $roles = Role::all();

        return view('auth.auth')->with('roles', $roles);
    }

    public function auth(Request $request) {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        }

        $feedback = [
            'error' => true,
            'message' => 'Email/Password Wrong'
        ];

        return redirect()->route('login', $feedback);
    }

    public function register(Request $request) {
        $auth_user = User::firstWhere('email', $request->email);

        if ($auth_user) {
            $feedback = [
                'error' => true,
                'message' => 'Email Already Been Used'
            ];

            return redirect()->route('login', $feedback);
        }
        else{
            try {
                $user = new User;

                foreach ($request->post() as $key => $value) {
                    $user[$key] = $request->post($key);
                }

                $user->password = Hash::make($request->password);
                $user->remember_token = '';
                unset($user->_token);

                $user->save();
            } catch (\Throwable $th) {
                $feedback = [
                    'error' => true,
                    'message' => $th->getMessage()
                ];

                return redirect()->route('login', $feedback);
            }

            $credentials = $request->only('email', 'password');

            Auth::attempt($credentials);

            return redirect()->route('home');
        }
    }
}
