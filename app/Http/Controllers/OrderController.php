<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderStatus;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::all();
        return view('admin.order.index',compact('orders'));
    }
    public function detail($id){
        $status = OrderStatus::all();
        $order = Order::find($id);
        $order_detail = OrderDetail::where('order_id','=',$id)->get();
        return view('admin.order.detail',compact('order','order_detail','status'));
    }
    public function updateStatus($id,Request $request){
        Order::find($id)->update([
            'status'=>$request->status
        ]);
        return redirect()->route('order.index');
    }
}
