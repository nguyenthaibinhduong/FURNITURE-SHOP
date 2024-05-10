<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        $roles = DB::table('users')
        ->join('role_user','users.id','=','role_user.user_id')
        ->join('roles','roles.id','=','role_user.role_id')->get()->toArray();
        return view('admin.user.index',compact('users','roles'));
    }
    public function create(){
        $roles = Role::all();
        return view('admin.user.create',compact('roles'));
    }
    public function store(Request $request){
        $request->merge(['password'=>Hash::make($request->password)]);
        // dd($request->all());
        $userCreate =User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password
        ]);
        $userCreate->roles()->attach($request->role);
        return redirect()->route('user.index');
    }
    public function edit($id){
        $roles = Role::all();
        $user = User::find($id);
        $getAllRolesOfUser = DB::table('role_user')->where('user_id',$id)->pluck('role_id');
        return view('admin.user.edit',compact('user','roles','getAllRolesOfUser'));
    }
    public function update($id,Request $request){
       $user = User::find($id);
       if(!empty($request->password)){
            $request->merge(['password'=>Hash::make($request->password)]);
       }else{
            $request->merge(['password'=>$user->password]);
       }
       
       $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password
       ]);
       $user->roles()->detach();
       $user->roles()->attach($request->role);
        return redirect()->route('user.index');
    }
    public function delete($id){
        $user = User::find($id);
        $user->delete();
        $user->roles()->detach();
        return redirect()->route('user.index');
    }
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
