@extends('client.layout.master')
@section('title', 'Giỏ hàng')


@section('content')
<div class="container" style="margin-top:180px;">
    <h2>Giỏ hàng</h2>
</div>
<div class="container ">
    
    <div class="cart_inner">
        <form action="{{ route('cart.update') }}" method="post">
            @csrf
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr >
                            <th scope="col">Sản phẩm</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Thành tiền</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($cartproduct)>0)
                        @foreach($cartproduct as $cart)
                        <tr>
                            <td>
                                <div class="media">
                                    <div class="d-flex">
                                        @foreach($images as $image)
                                        @if($image->product_id == $cart->product_id)
                                        <img width="80" height="100" src="{{ asset($image->url) }}" alt="">
                                        @endif
                                        @endforeach
                                       
                                    </div>
                                    <div class="media-body">
                                        <p>{{ $cart->product_name }}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h5>{{ $cart->product_price }}$</h5>
                            </td>
                            <td>
                                <div class="product_count">
                                    <input type="text" name="product_id[]" value="{{ $cart->product_id }}" hidden>
                                    <input type="text" name="quantity[]" id="sst{{ $loop->iteration }}" maxlength="12" value=" {{ $cart->quantity }} " title="Quantity:"
                                        class="input-text qty">
                                    <button onclick="var result = document.getElementById('sst{{ $loop->iteration }}'); var sst{{ $loop->iteration }} = result.value; if( !isNaN( sst{{ $loop->iteration }} )) result.value++;return false;"
                                        class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                                    <button onclick="var result = document.getElementById('sst{{ $loop->iteration }}'); var sst{{ $loop->iteration }} = result.value; if( !isNaN( sst{{ $loop->iteration }} ) &amp;&amp; sst{{ $loop->iteration }} > 0 ) result.value--;return false;"
                                        class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
                                </div>
                            </td>
                            <td>
                                <h5>{{ $cart->product_price*$cart->quantity }}$</h5>
                            </td>
                            <td >
                                <h5><a href="{{ route('cart.delete',['id'=>$cart->product_id]) }}" class="text-dark"><i style="font-size: 20px" class="fa fa-trash-o" aria-hidden="true"></i></a></h5>
                            </td>
                        </tr>
                        @endforeach
                        <tr class="bottom_button">
                            <td>
                                <input class="gray_btn" type="submit" name="update" value="Cập nhật giỏ hàng">
                            </form>
                        </td>
                            <td>

                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>
                                    <form class="cupon_text d-flex align-items-center" action="{{ route('cart.coupon') }}" method="post">
                                        @csrf
                                        <input type="text" value="{{ session('coupon') }}" name="coupon" placeholder="Coupon Code" {{ (session('coupon') )?'disabled':'' }}>
                                        <input type="submit" value="Apply" class="primary-btn">
                                        <a class="gray_btn" href="{{ route('cart.coupon.delete') }}">Close</a>
                                        
                                    </form>

                            </td>
                        </tr>
                        @if (session('message'))
                        <tr>
                            <td colspan="3"></td>
                            <td colspan="2"><h4 class="">{{ session('message') }}</h4></td>
                        </tr>  
                        @endif
                        <tr>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td> 
                                <h5>Tổng tiền:</h5>
                                <h5>Giảm giá:</h5>
                                <ii >Voucher (nếu có)</ii    >
                                <h5>Tổng thanh toán:</h5>
                            </td>
                            <td>
                                <h5>{{ $oldtotal }}$</h5>
                                <h5>{{ session('discount') }}$</h5>
                                <i>{{ (session('coupon'))?session('coupon'):'Không' }} </i>
                                <h5>{{ $subtotal }}$</h5>
                            </td>
                        </tr>
                        
                        
                        <tr class="out_button_area">
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <div class="checkout_btn_inner d-flex align-items-center">
                                    <a class="gray_btn" href="{{ route('shop') }}">Continue Shopping</a>
                                    <a class="primary-btn" href="{{ route('cart.checkout') }}">Proceed to checkout</a>
                                </div>
                            </td>
                        </tr>
                        @else
                        <tr><i>Chưa có dữ liệu giỏ hàng</i></tr>
                        @endif
                    </tbody>

                </table>
            </div>
        
    </div>
    
</div>
@endsection