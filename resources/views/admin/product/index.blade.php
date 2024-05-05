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
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Sản phẩm</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Mô tả</th>
                                <th>Danh mục</th>
                                <th>Hình ảnh</th>
                                <th><a class="btn btn-success" href="{{ route('product.create') }}">Thêm sản phẩm mới</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td><img width="50px" height="50px" src="{{ asset('image/product/'.$product->image) }}" alt=""></td>
                                <td><a class="text-danger" href="{{ route('product.delete',['id'=>$product->id]) }}">Xóa</a> | <a  href="{{ route('product.edit',['id'=>$product->id]) }}">Sửa</a></td>
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