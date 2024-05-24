@extends('client.layout.master')
@section('title', 'Cửa hàng')


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
                        <tr>
                            <th scope="col">Sản phẩm</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Thành tiền</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cartproduct as $cart)
                        <tr>
                            <td>
                                <div class="media">
                                    <div class="d-flex">
                                        <img width="80" height="100" src="{{ asset('image/product/'.$cart->product_image) }}" alt="">
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
                            <td>
                                <h5><a href="{{ route('cart.delete',['id'=>$cart->product_id]) }}">Xóa</a></h5>
                            </td>
                        </tr>
                        @endforeach
                        <tr class="bottom_button">
                            <td>
                                <input class="gray_btn" type="submit" name="update" value="Cập nhật giỏ hàng">
                            </td>
                            <td>

                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td colspan="2">
                                <div class="cupon_text d-flex align-items-center">
                                    <input type="text" placeholder="Coupon Code">
                                    <a class="primary-btn" href="#">Apply</a>
                                    <a class="gray_btn" href="#">Close Code</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <h5>Subtotal</h5>
                            </td>
                            <td>
                                <h5>{{ $subtotal }}$</h5>
                            </td>
                        </tr>
                        {{-- <tr class="shipping_area">
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <h5>Shipping</h5>
                            </td>
                            <td>
                                <div class="shipping_box">
                                    <ul class="list">
                                        <li><a href="#">Flat Rate: $5.00</a></li>
                                        <li><a href="#">Free Shipping</a></li>
                                        <li><a href="#">Flat Rate: $10.00</a></li>
                                        <li class="active"><a href="#">Local Delivery: $2.00</a></li>
                                    </ul>
                                    <h6>Calculate Shipping <i class="fa fa-caret-down" aria-hidden="true"></i></h6>
                                    <select class="shipping_select">
                                        <option value="1">Bangladesh</option>
                                        <option value="2">India</option>
                                        <option value="4">Pakistan</option>
                                    </select>
                                    <select class="shipping_select">
                                        <option value="1">Select a State</option>
                                        <option value="2">Select a State</option>
                                        <option value="4">Select a State</option>
                                    </select>
                                    <a class="gray_btn" href="#">Update Details</a>
                                </div>
                            </td>
                        </tr> --}}
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
                                    <a class="gray_btn" href="#">Continue Shopping</a>
                                    <a class="primary-btn" href="#">Proceed to checkout</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</div>
@endsection