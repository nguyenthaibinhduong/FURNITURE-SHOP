@extends('client.layout.master')
@section('title', 'Cửa hàng')
{{-- @section('banner')
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Sản Phẩm</h1>
                <nav class="d-flex align-items-center">
                    <a href="{{ route('home') }}">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                    <a href="#">Đăng nhập/Đăng ký
                </nav>
            </div>
        </div>
    </div>
</section>
@endsection --}}
@section('content')
<section class="login_box_area section_gap mt-5">
    <div class="container">
        <div class="row">

            <div class="col-lg-6">
                <div class="login_form_inner">
                    <h3>Đăng ký</h3>
                    <form class="row login_form" action="" method="post" id="contactForm" novalidate="novalidate">
                        @csrf
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Tên người dùng" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="name" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="name" name="password" placeholder="Mật khẩu" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="name" name="repassword" placeholder="Nhập lại mật khẩu" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
                        </div>
                        
                        <div class="col-md-12 form-group">
                            <button type="submit" value="submit" class="primary-btn">Đăng kí</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login_box_img">
                    <img class="img-fluid" src="{{ asset('client/img/login.jpg') }}" alt="">
                    <div class="hover">
                        <h4>Bạn chưa có tài khoản ?</h4>
                        <p>Hãy đăng ký và tận hưởng mua sắm từ cửa hàng chúng tôi</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection