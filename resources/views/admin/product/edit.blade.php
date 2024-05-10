@extends('admin.layout.master')
@section('title', 'Sản phẩm')
@section('content')
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Sửa sản phẩm</h6>
</div>
<div class="card-body">
    <form action="{{ route('product.update',['id'=>$product->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Tên sản phẩm</label>
            <input value="{{ $product->name }}" type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Giá</label>
            <input value="{{ $product->price }}" type="number" class="form-control" id="price" name="price" required>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Số lượng</label>
            <input value="{{ $product->quantity }}" type="number" class="form-control" id="quantity" name="quantity" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Mô tả</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ $product->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Mô tả chi tiết</label>
            <textarea id="my-editor" class="form-control" id="description" name="longdescription" rows="3">{{ $product->longdescription }}</textarea>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Danh mục sản phẩm</label>
            <select class="form-control" id="category" name="category_id" required>
                {!! $option !!}
                <!-- Add more categories as needed -->
            </select>
        </div>
        <div class="mb-3">
            <div class="row">
                <div class="col-6">
                    <label for="image" class="form-label">Hình ảnh</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*" >
                </div>
                <div class="col-6">
                    <img width="100px" height="100px" src="{{ asset('image/product/'.$product->image) }}" alt="">
                </div>
            </div>

        </div>
        <button type="submit" class="btn btn-primary">Sửa</button>
        <a href="" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection