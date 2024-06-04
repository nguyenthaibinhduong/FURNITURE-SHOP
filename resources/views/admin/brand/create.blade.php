@extends('admin.layout.master')
@section('title', 'Thương hiệu')
@section('content')
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Thêm thương hiệu sản phẩm</h6>
</div>
<div class="card-body">
    <form method="POST" action="{{ route('brand.store') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Tên nhà cung cấp</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email liên hệ :</label>
            <input type="text" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Số điện thoại :</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Địa chỉ :</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="{{ route('brand.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection