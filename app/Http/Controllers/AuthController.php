<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }
    public function registerpost(Request $request){
        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('login')->with('success', 'register successfully');
    }
    public function login(){
        return view('auth.login');
    }
    public function loginpost(Request $request){
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($credentials)) {
            return redirect('/')->with('success' , 'Login successful');
        }
        return back()->with('error', 'Login failed');
    }
    public function logout(){
        Auth::logout();
        return redirect('login')->with('success', 'Logout successful');
    }

}
