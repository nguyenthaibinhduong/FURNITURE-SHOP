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
                    <h3>Thông tin tài khoản</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('information.update',['id'=>$customer->id]) }}" method="post">
                        @csrf
                        <div class="mb-3">
                          <label for="name" class="form-label">Họ và tên:</label>
                          <input value="{{ Auth::user()->name }}" type="text" class="form-control" id="name" name="name" placeholder="Nhập họ và tên">
                        </div>
                        <div class="mb-3">
                          <label for="email" class="form-label">Email:</label>
                          <input value="{{ Auth::user()->email }}" type="email" class="form-control" id="email" name="email" placeholder="Nhập email">
                        </div>
                        <div class="mb-3">
                          <label for="phone" class="form-label">Số điện thoại:</label>
                          <input value="{{ $customer->phone_number }}" type="tel" class="form-control" id="phone" name="phone_number" placeholder="Nhập số điện thoại">
                        </div>
                        <div class="mb-3">
                          <label for="address" class="form-label">Địa chỉ:</label>
                          <textarea class="form-control" id="address" name="address" rows="3" placeholder="Nhập địa chỉ">{{ $customer->address }}</textarea>
                        </div>
                        <div class="mb-3">
                          <label for="gender" class="form-label">Giới tính:</label>
                          <select class="form-select" id="gender" name="gender">
                            @if($customer->gender==1)
                            <option selected value="1">Nam</option>
                            <option  value="0">Nữ</option>
                            @else
                                <option value="1">Nam</option>
                                <option selected value="0">Nữ</option>  
                            @endif
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="birthday" class="form-label">Ngày sinh:</label>
                          <input value="{{ $customer->birth_date }}" type="date" class="form-control" id="birthday" name="birth_date">
                        </div>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                      </form>
                </div>
        </div>
    </div>

</div>
@endsection