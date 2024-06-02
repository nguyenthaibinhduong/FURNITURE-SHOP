@extends('client.layout.master')
@section('title', 'Thanh toán')


@section('content')
<div class="container" style="margin-top:180px;">
    <h2><a class="text-warning" href="{{ route('cart') }}">Giỏ Hàng</a> > <a class="text-dark" href="">Thanh toán</a></h2>
</div>
<section class="checkout_area section_gap">
    <div class="container">    
        <div class="billing_details">
            <div class="row">
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h3>Thông Tin đặt hàng</h3>
                            <a href="{{ url('/information/edit') }}">Chỉnh sửa thông tin cá nhân</a>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('cart.order.create') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                  <label for="name" class="form-label">Họ và tên:</label>
                                  <input value="{{ Auth::user()->name }}" type="text" class="form-control" id="name" name="c_name" placeholder="Nhập họ và tên">
                                </div>
                                <div class="mb-3">
                                  <label for="email" class="form-label">Email:</label>
                                  <input value="{{ Auth::user()->email }}" type="email" class="form-control" id="email" name="c_email" placeholder="Nhập email">
                                </div>
                                <div class="mb-3">
                                  <label for="phone" class="form-label">Số điện thoại:</label>
                                  <input value="{{ $customer->phone_number }}" type="tel" class="form-control" id="phone" name="c_tel" placeholder="Nhập số điện thoại">
                                </div>
                                <div class="mb-3">
                                  <label for="address" class="form-label">Địa chỉ:</label>
                                  <textarea class="form-control" id="address" name="c_address" rows="3" placeholder="Nhập địa chỉ">{{ $customer->address }}</textarea>
                                </div>
                                
                              
                        </div>
                </div>
                </div>
                <div class="col-lg-5">
                    <div class="order_box">
                        <h2>Đơn hàng của bạn </h2>
                        <input  type="number" name="cart_id" value="{{ $cart_id }}" hidden>
                        <ul class="list">
                            <li><a href="#">Sản phẩm <span>Thành tiền</span></a></li>
                            @foreach($cartproduct as $cart)
                            <li><a href="#">{{ $cart->product_name }} <span class="middle">x {{ $cart->quantity }}</span> <span class="last">{{ $cart->product_price*$cart->quantity }}$</span></a></li>
                            @endforeach
                        </ul>
                        
                        <ul class="list list_2">
                            <li><a href="#">Tổng tiền: <span>{{ $oldtotal }}$</span></a></li><input  type="text" name="total" value="{{ $oldtotal }}" hidden>
                            <li><a href="#"><i>Giảm giá:</i> <span ><i>-{{ session('discount') }}$</i></span></a></li><input  type="text" name="discount" value="{{  session('discount') }}" hidden>
                            <li><a class="text-success" href="#">Thanh toán: <span  class="text-success">{{ $subtotal }}$</span></a></li>
                            <input type="text" value="{{ $subtotal }}" name="subtotal" hidden>
                        </ul>
                        <div class="payment_item">
                            <div class="radion_btn">
                                <input checked type="radio" value="1" id="f-option5" name="payment_method">
                                <label for="f-option5">Tiền mặt</label>
                                <div class="check"></div>
                            </div>
                        </div>
                        <div class="payment_item active">
                            <div class="radion_btn">
                                <input type="radio" value="0" id="f-option6" name="payment_method">
                                <label for="f-option6">Chuyển khoản</label>
                                <img src="img/product/card.jpg" alt="">
                                <div class="check"></div>
                            </div>
                        </div>
                        <div class="d-flex w-100 justify-content-center">
                            <input type="submit" class="primary-btn border-0 " value="THANH TOÁN" >
                        </div>
                        
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
