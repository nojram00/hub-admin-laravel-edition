<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function index($endpoint)
    {
        $view = match ($endpoint) {
            'login' => 'user-login',
            'register' => '',
            'admin' => ''
        };

        return view($view);
    }

    public function createAccount(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['confirmed', 'required', 'alpha_num']
        ]);

        $credentials['password'] = bcrypt($credentials['password']);


        $user = User::create($credentials);

        // if (Auth::attempt($user)) {
        //     return auth()->user()->role_id;
        // }

        // login user:
        try {
            auth()->login($user);
            return auth()->user()->role_id;
        } catch (Exception $e) {
            abort(403);
        }
    }


    public function loginUser(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        // $credentials['password'] = bcrypt($credentials['password']);

        // auth()->login($credentials);
        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();
            // $user = Auth::user();
            // return $user->role_id;
            // dd($user);
            // return redirect('/');
            return 'success';
        } else {
            // return back()->with('message');
            // dd($credentials);
            return 'failed';
            // abort(403);
        }
        // try {
        //     auth()->login($credentials);
        //     return auth()->user()->role_id;
        // } catch (Exception $e) {
        //     abort(403);
        // }
    }
}
