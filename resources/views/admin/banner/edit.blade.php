@extends('admin.layout.master')
@section('title', 'Banner')
@section('content')
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Sửa banner </h6>
</div>
<div class="card-body">
    <form method="POST" action="{{ route('banner.update',['id'=>$banner->id]) }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Tên Banner</label>
            <input type="text" class="form-control" id="name" value="{{ $banner->name }}" name="name" required>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Tiêu đề</label>
            <textarea class="form-control"  name="title" id="" cols="30" rows="10">{{ $banner->title }}</textarea>
        </div>
        <div class="mb-3">
            <label for="sub_title" class="form-label">Mô tả</label>
            <textarea class="form-control"  name="sub_title" id="" cols="30" rows="10">{{ $banner->sub_title }}</textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Ảnh Banner</label>
            <div class="row">
                <div class="col-xl-7">
                    <input class="form-control" type="file" name="image" >
                </div>
                <div class="col-xl-5">
                    <img width="100%" height="200px" src="{{ asset($banner->image) }}" alt="">
                </div>
            </div>
            
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
            <a href="{{ route('banner.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection