<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sản phẩm</title>
    @include('admin.template.style')

</head>

<body id="page-top">
    @include('admin.template.navbar')
    @include('admin.template.topbar')
    <div class="container-fluid">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm sản phẩm</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Tên sản phẩm</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Giá</label>
                    <input type="number" class="form-control" id="price" name="price" required>
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Số lượng</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Mô tả</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Danh mục sản phẩm</label>
                    <select class="form-control" id="category" name="category_id" required>
                        <option value="0">Chọn danh mục sản phẩm</option>
                        {!! $option !!}
                    </select>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Hình ảnh</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                </div>
                <button type="submit" class="btn btn-primary">Thêm</button>
                <a href="" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>               
    @include('admin.template.footer')
    @include('admin.template.script')
</body>

</html>