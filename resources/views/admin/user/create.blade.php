@extends('admin.layout.master')
@section('title', 'Người dùng')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Thêm người dùng</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Tên người dùng</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Mật khẩu</label>
                <input type="password" class="form-control" id="password" name ="password" required>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Vai trò</label>
                <select multiple class="form-control" size="{{ $roles->count() }}" name="role[]" required>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
            <a href="" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection