@extends('client.layout.master')
@section('title', 'Đơn hàng')
@section('banner')
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Đơn hàng</h1>
                <nav class="d-flex align-items-center">
                    <a href="{{ route('information') }}">Thông tin
                </nav>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<div class="container mt-5">
    <div class="row">
        @include('client.template.user-nav')
        <div class="col-9">    
            <h3 class="mb-30">Đơn hàng</h3>
            <div class="progress-table-wrap">
                <div class="progress-table">
                    <div class="table-head">
                        <div class="serial">STT</div>
                        <div class="country">ID đơn hàng</div>
                        <div class="visit">Tổng tiền</div>
                        <div class="percentage">Ngày đặt</div>
                        <div class="visit">Trạng thái</div>
                        <div class="visit"></div>
                    </div> 
                    @php
                    use Carbon\Carbon;
                    @endphp
                    @foreach($orders as $order)
                    
                    <div class="table-row">
                        <div class="serial">{{ $loop->iteration }}</div>
                        <div class="country">{{ $order->order_code }}</div>
                        <div class="visit">{{ $order->total_price }}</div>
                        <div class="percentage">{{ Carbon::parse($order->created_at)->format('d/m/Y') }}</div>
                        <div class="visit text-success " style="font-weight: 600">{{ $order->statuses->name }}</div>
                        <div class="visit text-success " style="font-weight: 600"><a href="{{ route('orders.detail',['id'=>$order->id]) }}">Xem chi tiết</a></div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</div>
@endsection