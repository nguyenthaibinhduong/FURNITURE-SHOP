<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons=Coupon::all();
        return view('admin.coupon.index',compact('coupons'));
    } 

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admin.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Coupon::create($request->all());
        return redirect()->route('coupon.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $coupon = Coupon::find($id);
        return view('admin.coupon.edit',compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Coupon::find($id)->update($request->all());
        return redirect()->route('coupon.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        Coupon::find($id)->delete();
        return redirect()->route('coupon.index');
    }
}
