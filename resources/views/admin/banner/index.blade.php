@extends('admin.layout.master')
@section('title', 'Banner')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Banner</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên Banner</th>
                        <th>Tiêu đề</th>
                        <th>Mô tả </th>
                        <th>Ảnh</th>
                        <th><a class="btn btn-success" href="{{ route('banner.create') }}">Thêm Banner mới</a></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($banners as $banner)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $banner->name }}</td>
                            <td>{{ $banner->title }}</td>
                            <td>{{ $banner->sub_title }}</td>
                            <td><img width="100px" height="50px" src="{{ asset($banner->image) }}" alt=""></td>
                            <td><a class="text-danger" href="{{ route('banner.delete',['id'=>$banner->id]) }}">Xóa</a> | <a  href="{{ route('banner.edit',['id'=>$banner->id]) }}">Sửa</a></td>
                        </tr>
                       
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection