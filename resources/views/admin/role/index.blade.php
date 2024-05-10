@extends('admin.layout.master')
@section('title', 'Vai trò')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Vai trò</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên vai trò</th>
                        <th>Tên chức vụ</th>
                        <th>Nhóm</th>
                        <th><a class="btn btn-success" href="{{ route('role.create') }}">Thêm vai trò mới</a></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->display_name }}</td>
                        <td>{{ $role->group }}</td>
                        <td><a class="text-danger" href="{{ route('role.delete',['id'=>$role->id]) }}">Xóa</a> | <a  href="{{ route('role.edit',['id'=>$role->id]) }}">Sửa</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection