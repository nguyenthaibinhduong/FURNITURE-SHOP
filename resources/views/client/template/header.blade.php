<header class="header_area sticky-header">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light main_box">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="{{ route('home') }}">
                    <img src="{{ asset('client/img/logo.png') }}" alt="">
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item {{ Request::is('/') ? 'active' : '' }}"><a class="nav-link" href="{{ url('/') }}">Trang chủ</a></li>
                        <li class="nav-item {{ Request::is('shop') ? 'active' : '' }}">
                            <a href="{{ url('/shop') }}" class="nav-link">Cửa hàng</a>
                        </li>
                        <li class="nav-item {{ Request::is('cart') ? 'active' : '' }}">
                            <a href="{{ route('cart') }}" class="nav-link">Giỏ hàng</a>
                        </li>
                        <li class="nav-item {{ Request::is('information/orders') ? 'active' : '' }}">
                            <a href="{{ route('orders') }}" class="nav-link">Đơn hàng </a>
                        </li>
                        <li class="nav-item {{ Request::is('information') ? 'active' : '' }}">
                            <a href="{{ route('information') }}" class="nav-link">Thông tin </a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item">
                            <button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
                        </li>
                        @if(Auth::check())
                        <li  class="nav-item">
                        <a href="{{ route('information') }}"><i style="font-size: 18px; color:black" class="fa fa-user-circle-o" aria-hidden="true"></i><span></span></a>
                        
                        </li>
                        <li class="nav-item ">
                            <a href="{{ url('/logout') }}" class ="text-dark">Đăng xuất<span></span></a>
                        </li>
                        @else
                        <li class="nav-item {{ Request::is('login') ? 'active' : '' }}">
                            <a href="{{ url('/login') }}" class="text-warning" >Đăng nhập<span></span></a>
                        </li>
                            
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="search_input" id="search_input_box">
        <div class="container">
            <form class="d-flex justify-content-between">
                <input type="text" class="form-control ajaxSearch" id="search_input" placeholder="Search Here">
                <button type="submit" class="btn"></button>
                <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
            </form>
            <div class="ajaxResult">
                
            </div>
        </div>
    </div>
</header>