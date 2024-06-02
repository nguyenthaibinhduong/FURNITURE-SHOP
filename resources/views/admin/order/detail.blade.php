@extends('admin.layout.master')
@section('title', 'Đơn hàng')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary text-center">Đơn hàng {{ $order->order_code }}</h3>
    </div>
    <div class="card-body">
        <h6 class="m-0 font-weight-bold text-primary">Cập nhât trạng thái</h6><br>
        
        <form action="{{ route('order.detail.update',['id'=>$order->id]) }}" method="post">
            @csrf
            <div class="row">
                <div class="col-xl-10">
                    <select name="status" id="" class="form-control">
                        @foreach($status as $status)
                        @if($status->id==$order->status)
                        <option selected value="{{ $status->id }}">{{ $status->name }}</option>
                        @else
                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-xl-2 d-flex justify-content-end">
                    <button class="btn btn-primary" type="submit">Cập nhật</button>
                </div>
            </div>
            
        </form>
    </div>
    <div class="card-body">
        <h6 class="m-0 font-weight-bold text-primary">Thông tin mua hàng</h6><br>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tbody>
                    @php
                        use Carbon\Carbon;
                    @endphp
                    <tr>
                        <td>Mã đơn hàng</td>
                        <td>{{ $order->order_code }}</td>
                    </tr>
                    <tr>
                        <td>Thời gian đặt hàng </td>
                        <td>{{ Carbon::parse($order->created_at)->format('d/m/Y') }}</td>
                    </tr>
                    <tr>
                        <td>Tên tài khoản</td>
                        <td>{{ $order->user->name }}</td>
                    </tr>
                    <tr>
                        <td>Tên khách hàng</td>
                        <td>{{ $order->customer_name }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{ $order->customer_email }}</td>
                    </tr>
                    <tr>
                        <td>Số điện thoại</td>
                        <td>{{ $order->customer_tel }}</td>
                    </tr>
                    <tr>
                        <td>Địa chỉ</td>
                        <td>{{ $order->customer_address }}</td>
                    </tr>
                    <tr>
                        <td>Hình thức thanh toán</td>
                        <td>{{ ($order->payment_method==1)?'Tiền mặt':'Chuyển khoản' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-body">
        <h6 class="m-0 font-weight-bold text-primary">Sản phẩm mua</h6><br>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order_detail as $orders)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $orders->product->name }}</td>
                        <td>{{ $orders->quantity }}</td>
                        <td>${{ $orders->price }}</td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-body">
        <h6 class="m-0 font-weight-bold text-primary">Đơn giá</h6><br>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tbody>
                    <tr>
                       
                        <td>Tổng đơn giá</td>
                        <td>${{ $order->total }}</td>
                    </tr>
                    <tr>
                        
                        <td>Khấu trừ</td>
                        <td>-${{ $order->discount }}</td>
                    </tr>
                    <tr>
                        <td><p class="text-dark" style="font-weight: 800">Tổng hóa đơn</p></td>
                        <td><p class="text-dark" style="font-weight: 800">${{ $order->total_price }}</p></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection