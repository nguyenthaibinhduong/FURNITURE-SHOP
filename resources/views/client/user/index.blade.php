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
        <div class="col-3">
            <nav class="nav flex-column">
                <a class="nav-link {{ Request::is('information') ? 'text-dark' : '' }}"  href="#">Thông tin tài khoản</a>
                <a class="nav-link" href="#">Link</a>
                <a class="nav-link" href="#">Link</a>
                
              </nav>
        </div>
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
                <div class="col-sm-10">{{ $customer->phone_number }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-2"><strong>Địa Chỉ:</strong></div>
                <div class="col-sm-10">{{ $customer->address }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-2"><strong>Giới Tính:</strong></div>
                <div class="col-sm-10">
                    @if($customer->gender == 1)
                    Nam
                    @else
                    Nữ
                    @endif
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-2"><strong>Ngày Sinh:</strong></div>
                @php
                use Carbon\Carbon;
                @endphp
                <div class="col-sm-10">{{ Carbon::parse($customer->birth_date)->format('d/m/Y') }}</div>
            </div>
        </div>
    </div>
</div>
    </div>

</div>
@endsection