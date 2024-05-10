@extends('admin.layout.master')
@section('title', 'Vai trò')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Thêm vai trò</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('role.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Tên vai trò</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="display_name" class="form-label">Tên chức vụ</label>
                <input type="text" class="form-control" id="display_name" name="display_name" required>
            </div>
            <div class="mb-3">
                <label for="group" class="form-label">Danh mục vai trò</label>
                <select class="form-control" id="group" name="group" required>
                    <option value="system">Hệ thống</option>
                    <option value="user">Người dùng</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="group" class="form-label">Phân quyền</label>
                <div class="row">
                    @foreach ($permissions as $groupName => $permission)
                        <div class="col-5">
                            <h4>{{ $groupName }}</h4>

                            <div>
                                @foreach ($permission as $item)
                                    <div class="form-check">
                                        <input class="form-check-input" name="permissions[]" type="checkbox"
                                            value="{{ $item->id }}">
                                        <label class="form-label"
                                            for="customCheck1">{{ $item->display_name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
            <a href="" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

</div>
@endsection