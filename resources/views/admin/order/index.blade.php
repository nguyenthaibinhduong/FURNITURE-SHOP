@extends('admin.layout.master')
@section('title', 'Đơn hàng')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Đơn hàng</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã đơn hàng</th>
                        <th>Khách hàng</th>
                        <th>Giá trị</th>
                        <th>Phương thức thanh toán</th>
                        <th>Thời gian đặt</th>
                        <th>Trạng thái</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        use Carbon\Carbon;
                    @endphp
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->customer_name }}</td>
                        <td>{{ $order->total_price }}</td>
                        <td>{{ ($order->payment_method==1)?'Tiền mặt':'Chuyển khoản' }}</td>
                        <td>{{ Carbon::parse($order->created_at)->format('d/m/Y') }}</td>
                        <td ><i class="text-success">{{$order->statuses->name }}</i></td>
                        <td><a class="text-primary" href="{{ route('order.detail',['id'=>$order->id]) }}">Xem chi tiết</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection