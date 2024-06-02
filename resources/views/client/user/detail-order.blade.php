@extends('client.layout.master')
@section('title', 'Đơn hàng')


@section('content')
<section class="order_details section_gap">
    <div class="container">
        <h3 class="title_confirmation mt-5">Thank you. Your order has been received.</h3>
        <div class="row order_d_inner">
            <div class="col-lg-4">
                <div class="details_item">
                    <h4>Thông tin đơn hàng</h4>
                    <ul class="list">
                        <li><a href="#"><span>ID Đơn hàng</span> : {{ $order->order_code }}</a></li>
                        @php
                        use Carbon\Carbon;
                        @endphp
                        <li><a href="#"><span>Ngày</span> : {{ Carbon::parse($order->created_at)->format('d/m/Y') }}</a></li>
                        <li><a href="#"><span>Tổng hóa đơn</span> :{{ $order->total_price }}$</a></li>
                        <li><a href="#"><span>Hình thức thanh toán</span> : {{ ($order->payment_method==1)?'Tiền mặt':'Chuyển khoản' }}</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="details_item">
                    <h4>Địa chỉ</h4>
                    <ul class="list">
                        <li><a href="#"><span>Street</span> : 56/8</a></li>
                        <li><a href="#"><span>City</span> : Los Angeles</a></li>
                        <li><a href="#"><span>Country</span> : United States</a></li>
                        <li><a href="#"><span>Postcode </span> : 36952</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="details_item">
                    <h4>Shipping Address</h4>
                    <ul class="list">
                        <li><a href="#"><span>Street</span> : 56/8</a></li>
                        <li><a href="#"><span>City</span> : Los Angeles</a></li>
                        <li><a href="#"><span>Country</span> : United States</a></li>
                        <li><a href="#"><span>Postcode </span> : 36952</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="order_details_table">
            <h2>Chi tiết đơn hàng</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Sản phẩm</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order_detail as $orders)
                        <tr>
                            <td>
                                <p>{{ $orders->product->name }}</p>
                            </td>
                            <td>
                                <h5>x {{ $orders->quantity }}</h5>
                            </td>
                            <td>
                                <p>${{ $orders->price }}</p>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td>
                                <h4>Tổng tiền</h4>
                            </td>
                            <td>
                                <h5></h5>
                            </td>
                            <td>
                                <p>${{ $order->total }}</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Giảm giá</h4>
                            </td>
                            <td>
                                <h5></h5>
                            </td>
                            <td>
                                <p>-${{ $order->discount }}</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Tổng thanh toán:</h4>
                            </td>
                            <td>
                                <h5></h5>
                            </td>
                            <td>
                                <h4  class="text-success" >${{ $order->total_price }}</h4>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection