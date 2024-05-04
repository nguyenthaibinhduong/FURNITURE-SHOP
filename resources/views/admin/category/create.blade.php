<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Danh mục sản phẩm</title>
    @include('admin.template.style')

</head>

<body id="page-top">
    @include('admin.template.navbar')
    @include('admin.template.topbar')
    <div class="container-fluid">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm danh mục sản phẩm</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('category.store') }}">
                @csrf
    
                <div class="mb-3">
                    <label for="name" class="form-label">Tên danh mục</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
    
                <div class="mb-3">
                    <label for="parent_id" class="form-label">Danh mục cha</label>
                    <select class="form-control" id="parent_id" name="parent_id">
                        <option value="0">Chọn danh mục cha</option>
                        {!! $option !!}
                    </select>
                </div>
    
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a href="{{ route('category.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>               
    @include('admin.template.footer')
    @include('admin.template.script')
</body>

</html>