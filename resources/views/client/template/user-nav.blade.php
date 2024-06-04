<div class="col-3">
    <nav class="nav flex-column">
        <a class="nav-link {{ Request::is('information') ? 'text-warning' : 'text-dark' }}"  href="{{ route('information') }}">Thông tin tài khoản</a>
        <a class="nav-link {{ Request::is('information/orders') ? 'text-warning' : 'text-dark' }}" href="{{ route('orders') }}">Đơn hàng</a>
        <a class="nav-link text-dark" href="{{ url('/logout') }}">Đăng xuất</a>
        
      </nav>
</div>