@extends('admin.layout.master')
@section('title', 'Giảm giá')
@section('content')
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Thêm giảm giá</h6>
</div>
<div class="card-body">
    <form action="{{ route('coupon.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Tên giảm giá</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Loại giảm giá</label>
            <select class="form-control" id="type" name="type" required>
                <option value="VND">Giảm giá theo VND</option>
                <option value="%">Giảm giá theo %</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="value" class="form-label">Giá trị</label>
            <input type="number" class="form-control" id="value" name="value" required>
        </div>
        
        <div class="mb-3">
            <label for="expiration_date" class="form-label">Ngày hết hạn</label>
            <input type="datetime-local" class="form-control" id="expiration_date" name="expiration_date"  required>
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
        <a href="{{ route('coupon.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection