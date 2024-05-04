<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function loginadmin(){
        return view('auth.loginadmin');
    }
    public function register(){
        return view('auth.register');
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        return redirect()->route('home');
    }
    public function post_register(Request $request){
        $request->merge(['password'=>Hash::make($request->password)]);
        User::create($request->all());
        return redirect()->route('login');
    }
    public function post_login(Request $request){
        if (Auth::attempt(['email' => $request->email, 'password' =>$request->password])) {
            return redirect()->route('home');
        }
        return redirect()->back()->withErrors(['email' => 'Email hoặc mật khẩu không đúng.']);
    }
    public function post_loginadmin(Request $request){
        if (Auth::attempt(['email' => $request->email, 'password' =>$request->password])) {
            return redirect()->route('admin');
        }
        return redirect()->back()->withErrors(['email' => 'Email hoặc mật khẩu không đúng.']);
    }
}
