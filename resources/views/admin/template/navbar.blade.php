<div id="wrapper">
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admins/index.html">
        <div class="sidebar-brand-text mx-3">Admin</div>
    </a>


    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
        <a class="nav-link" href="admins/index.html">
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('category.index') }}">
            <span>Quản lý danh mục</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('product.index') }}">
            <span>Quản lý sản phẩm</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('user.index') }}">
            <span>Quản lý người dùng</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('role.index') }}">
            <span>Quản lý vai trò</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('coupon.index') }}">
            <span>Quản lý mã giảm giá</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('order.index') }}">
            <span>Quản lý đơn hàng</span></a>
    </li>
</ul>
<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">