@extends('client.layout.master')
@section('title', 'Tài khoản')
@section('banner')
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Tài khoản</h1>
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
       <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h3>Thông Tin Khách Hàng</h3>
            <a href="{{ url('/information/edit') }}">Chỉnh sửa thông tin</a>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-sm-2"><strong>Tên: </strong></div>
                <div class="col-sm-10">{{ Auth::user()->name }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-2"><strong>Email:</strong></div>
                <div class="col-sm-10">{{ Auth::user()->email }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-2"><strong>Số Điện Thoại:</strong></div>
                
                <div class="col-sm-10">{{ ($customer->phone_number) }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-2"><strong>Địa Chỉ:</strong></div>
                <div class="col-sm-10">{{ $customer->address }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-2"><strong>Giới Tính:</strong></div>
                <div class="col-sm-10">
                    @if($customer->gender == null)
    
                    @elseif($customer->gender == 1)
                    Nữ
                    @else
                    Nam
                    @endif
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-2"><strong>Ngày Sinh:</strong></div>
                @php
                use Carbon\Carbon;
                @endphp
                @if($customer->birth_date!=null)
                <div class="col-sm-10">{{ Carbon::parse($customer->birth_date)->format('d/m/Y') }}</div>
                @endif
            </div>
        </div> 
    </div>
</div>
    </div>

</div>
@endsection