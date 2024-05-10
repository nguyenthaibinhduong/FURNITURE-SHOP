@extends('admin.layout.master')
@section('title', 'Người dùng')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Người dùng</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên người dùng</th>
                        <th>Email</th>
                        <th>Vai trò</th>
                        <th><a class="btn btn-success" href="{{ route('user.create') }}">Thêm người dùng mới</a></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                   <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>@foreach($roles as $role)
                        @if($role->user_id==$user->id)
                            {{ $role->name }}
                        @endif
                        @endforeach
                    </td>
                    <td><a class="text-danger" href="{{ route('user.delete',['id'=>$user->id]) }}">Xóa</a> | <a  href="{{ route('user.edit',['id'=>$user->id]) }}">Sửa</a></td>
                   </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection