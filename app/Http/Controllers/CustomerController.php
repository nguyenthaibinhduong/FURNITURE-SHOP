<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index(){
        $customer = Customer::where('user_id','=',Auth::user()->id)->first();
        return view('client.user.index',compact('customer'));
    }
    public function edit(){
        $customer = Customer::where('user_id','=',Auth::user()->id)->first();
        return view('client.user.edit',compact('customer'));
    }
    public function update($id,Request $request){
        User::find(Auth::user()->id)->update([
            'name'=>$request->name,
            'email'=>$request->email
        ]);
        Customer::find($id)->update([
            'phone_number'=>$request->phone_number,
            'address'=>$request->address,
            'gender'=>$request->gender,
            'birth_date'=>$request->birth_date
        ]);
        return redirect()->route('information');
    }
}
