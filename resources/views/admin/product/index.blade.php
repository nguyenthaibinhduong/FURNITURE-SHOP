@extends('admin.layout.master')
@section('title', 'Sản phẩm')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Sản phẩm</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Mô tả</th>
                        <th>Thương hiệu</th>
                        <th>Danh mục</th>
                        <th>Hình ảnh</th>
                        <th><a class="btn btn-success" href="{{ route('product.create') }}">Thêm sản phẩm mới</a></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->brand->name }}</td>
                        <td>{{ $product->category->name }}</td>
                        @foreach($images as $image)
                            @if($image->product_id == $product->id)
                            <td><img width="50px" height="50px" src="{{ asset($image->url) }}" alt=""></td>
                            @endif
                        @endforeach
                        <td><a class="text-danger" href="{{ route('product.delete',['id'=>$product->id]) }}">Xóa</a> | <a  href="{{ route('product.edit',['id'=>$product->id]) }}">Sửa</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{ $products->links() }}
</div>
@endsection