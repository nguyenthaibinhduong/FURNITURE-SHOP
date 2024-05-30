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
                        <li class="nav-item {{ Request::is('/') ? 'active' : '' }}"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                        <li class="nav-item {{ Request::is('shop') ? 'active' : '' }}">
                            <a href="{{ url('/shop') }}" class="nav-link">Shop</a>
                        </li>
                        <li class="nav-item submenu dropdown">
                            <a href="client/#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                             aria-expanded="false">Blog</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="client/blog.html">Blog</a></li>
                                <li class="nav-item"><a class="nav-link" href="client/single-blog.html">Blog Details</a></li>
                            </ul>
                        </li>
                        <li class="nav-item submenu dropdown">
                            <a href="client/#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                             aria-expanded="false">Pages</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="client/login.html">Login</a></li>
                                <li class="nav-item"><a class="nav-link" href="client/tracking.html">Tracking</a></li>
                                <li class="nav-item"><a class="nav-link" href="client/elements.html">Elements</a></li>
                            </ul>
                        </li>
                       
                        <li class="nav-item"><a class="nav-link" href="client/contact.html">Contact</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item"><a href="{{ route('cart') }}" class="cart"><span class="ti-bag"></span></a></li>
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
            {{-- <hr>
            <div class="row">
                <div class="col-1 d-flex">
                    <img width="60" height="60" src="" alt="">
                </div>
                <div class="col-6 d-flex flex-column justify-content-start">
                    <div class="row">
                       <h4>Title</h4>
                    </div>
                    <div class="row">
                        <span>asdasdadsasdasd</span>
                     </div>
                </div>
            </div> --}}
            
        </div>
    </div>
</header>