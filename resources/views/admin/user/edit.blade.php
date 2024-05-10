@extends('admin.layout.master')
@section('title', 'Người dùng')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Sửa người dùng</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('user.update',['id'=>$user->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Tên người dùng</label>
                <input value="{{ $user->name }}" type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Email</label>
                <input value="{{ $user->email }}" type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Mật khẩu mới</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Vai trò</label>
                <select multiple class="form-control" size="{{ $roles->count() }}" name="role[]" required>
                    @foreach ($roles as $role)
                        @if($getAllRolesOfUser->contains($role->id))
                        <option selected value="{{ $role->id }}">{{ $role->name }}</option>
                        @else
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Sửa</button>
            <a href="{{ route('user.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection