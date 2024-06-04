@extends('admin.layout.master')
@section('title', 'Banner')
@section('content')
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Thêm banner </h6>
</div>
<div class="card-body">
    <form method="POST" action="{{ route('banner.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Tên Banner</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Tiêu đề</label>
            <textarea class="form-control" name="title" id="" cols="30" rows="10"></textarea>
        </div>
        <div class="mb-3">
            <label for="sub_title" class="form-label">Mô tả</label>
            <textarea class="form-control" name="sub_title" id="" cols="30" rows="10"></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Ảnh Banner</label>
            <input class="form-control" type="file" name="image" >
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="{{ route('banner.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection