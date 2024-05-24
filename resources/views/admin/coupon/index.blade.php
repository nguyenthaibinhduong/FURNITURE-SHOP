@extends('admin.layout.master')
@section('title', 'Giảm giá')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Giảm giá</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên giảm giá </th>
                        <th>Loại</th>
                        <th>Giá trị</th>
                        <th>Ngày hết hạn</th>
                        <th><a class="btn btn-success" href="{{ route('coupon.create') }}">Thêm vai trò mới</a></th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($coupons as $coupon)
                       <tr>
                        <td>{{ $loop->iteration }}</td>
                       <td>{{ $coupon->name }}</td>
                       <td>{{ $coupon->type }}</td>
                       <td>{{ $coupon->value }}</td>
                       <td>{{ $coupon->expiration_date}}</td>
                       <td><a class="text-danger" href="{{ route('coupon.delete',['id'=>$coupon->id]) }}">Xóa</a> | <a  href="{{ route('coupon.edit',['id'=>$coupon->id]) }}">Sửa</a></td>
                       </tr>
                   @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection