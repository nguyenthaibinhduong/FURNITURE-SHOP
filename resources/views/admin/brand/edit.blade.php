@extends('admin.layout.master')
@section('title', 'Danh mục')
@section('content')
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Sửa danh mục sản phẩm</h6>
</div>
<div class="card-body">
    <form method="POST" action="{{ route('brand.update',['id'=>$brand->id]) }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Tên nhà cung cấp</label>
            <input value="{{ $brand->name }}" type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email liên hệ :</label>
            <input value="{{ $brand->email }}" type="text" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Số điện thoại :</label>
            <input value="{{ $brand->phone }}" type="text" class="form-control" id="phone" name="phone" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Địa chỉ :</label>
            <input value="{{ $brand->address }}" type="text" class="form-control" id="address" name="address" required>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
            <a href="{{ route('brand.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection