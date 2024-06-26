@extends('admin.layout.master')
@section('title', 'Sản phẩm')
@section('content')
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Thêm sản phẩm</h6>
</div>
<div class="card-body">
    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Tên sản phẩm</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Giá</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Số lượng</label>
            <input type="number" class="form-control" id="quantity" name="quantity" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Mô tả</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Mô tả chi tiết</label>
            <textarea id="my-editor" class="form-control" id="description" name="longdescription" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="brand" class="form-label">Thương hiệu sản phẩm</label>
            <select class="form-control" id="brand" name="brand_id" required>
                <option value="0">Chọn thương hiệu sản phẩm</option>
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Danh mục sản phẩm</label>
            <select class="form-control" id="category" name="category_id" required>
                <option value="0">Chọn danh mục sản phẩm</option>
                {!! $option !!}
            </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Hình ảnh</label>
            <input type="file" class="form-control" id="image" name="image" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Hình ảnh chi tiết</label>
            <input type="file" class="form-control" id="image" name="image_detail[]" multiple>
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
        <a href="" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection