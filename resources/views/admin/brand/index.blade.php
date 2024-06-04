@extends('admin.layout.master')
@section('title', 'Thương hiệu')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Thương hiệu sản phẩm</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên thương hiệu</th>
                        <th>Email nhà cung cấp</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th><a class="btn btn-success" href="{{ route('brand.create') }}">Thêm thương hiệu mới</a></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($brands as $brand)
                       <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $brand->name }}</td>
                        <td>{{ $brand->email }}</td>
                        <td>{{ $brand->phone }}</td>
                        <td>{{ $brand->address }}</td>
                        <td><a class="text-danger" href="{{ route('brand.delete',['id'=>$brand->id]) }}">Xóa</a> | <a  href="{{ route('brand.edit',['id'=>$brand->id]) }}">Sửa</a></td>
                       </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection