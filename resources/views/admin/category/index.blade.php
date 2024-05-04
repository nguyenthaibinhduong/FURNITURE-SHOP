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
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Danh mục sản phẩm</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên danh mục</th>
                                <th><a class="btn btn-success" href="{{ route('category.create') }}">Thêm danh mục mới</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->name }}</td>
                                <td><a class="text-danger" href="">Xóa</a> | <a  href="{{ route('category.edit',['id'=>$category['id']]) }}">Sửa</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>       
    @include('admin.template.footer')
    @include('admin.template.script')
</body>

</html>