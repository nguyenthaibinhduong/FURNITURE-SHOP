@extends('client.layout.master')
@section('title', 'Cửa hàng')
@section('banner')
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Sản Phẩm</h1>
                <nav class="d-flex align-items-center">
                    <a href="{{ route('home') }}">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                    <a href="#">Cửa hàng
                </nav>
            </div>
        </div>
    </div>
</section>
@endsection
@section('content')
<div class="row">
	<div class="col-xl-3 col-lg-4 col-md-5">
		<div class="sidebar-categories">
			<div class="head">Danh mục sản phẩm</div>

			<ul class="main-categories">
				@foreach ($category as $category)
				@if ($category->categoryChildren->count()>0)
				<li class="main-nav-list"><a data-toggle="collapse" href="#cate_{{ $category->id }}" aria-expanded="false" aria-controls="cate_{{ $category->id }}"><span
						 class="lnr lnr-arrow-right"></span>{{ $category->name }}</span></a>
					<ul class="collapse" id="cate_{{ $category->id }}" data-toggle="collapse" aria-expanded="false" aria-controls="cate_{{ $category->id }}">
						@foreach ($category->categoryChildren as $categoryChild)
						<li class="main-nav-list child"><a href="{{ route('showByCategory',['id'=>$categoryChild->id]) }}">{{ $categoryChild->name }}</a></li>
						@endforeach
					</ul>
				</li>
				@else
				<li class="main-nav-list"><a href="{{ route('showByCategory',['id'=>$category->id]) }}"><span
					class="lnr lnr-arrow-right"></span>{{ $category->name }}</span></a>
				   </li>
				@endif
				@endforeach
			</ul>
			
		</div>
		<div class="sidebar-filter mt-50">
			<div class="top-filter-head">Lọc sản phẩm</div>
			<div class="common-filter">
				<div class="head">Thương hiệu</div>
					<ul>
						@if(isset($cate))
						@foreach ($brands as $brand)
						<li class="filter-list"><a class="text-dark" href="{{ route('showByBrand',['cate'=>$cate,'id'=>$brand->id]) }}">{{ $brand->name }}</a></label></li>
						@endforeach
						@else	
						@foreach ($brands as $brand)
						<li class="filter-list"><a class="text-dark" href="{{ route('showByBrand',['cate'=>0,'id'=>$brand->id]) }}">{{ $brand->name }}</a></label></li>
						@endforeach
						@endif
					</ul>
			</div>
		</div>
	</div>
	<div class="col-xl-9 col-lg-8 col-md-7">
		<section class="lattest-product-area pb-40 category-list">
			<div class="row">
				<!-- single product -->
				@foreach ($products as $product)
				<div class="col-lg-3 col-md-6">
					
					<div class="single-product">
						<a href="{{ route('product.detail',['id'=>$product->id]) }}">
							@foreach($images as $image)
                            @if($image->product_id == $product->id)
							<img width="100px" height="200px"  src="{{ asset($image->url) }}" alt=""></a>
                            @endif
                        	@endforeach
							
						<div class="product-details">
							<h6>{{ $product->name }}</h6>
							<div class="price">
								<h6>${{ $product->price }}</h6>
							</div>
							
						</div>
					</div>
				</div>
				@endforeach
				<!-- single product -->
				
			</div>

		</section>
		
		<!-- End Best Seller -->
		<!-- Start Filter Bar -->
		
				@if($products->count()>=8)
				<div class="filter-bar d-flex flex-wrap align-items-center justify-content-center mb-5">
					<div class="pagination">
						{{ $products->links() }}
					</div>
				</div>
				
				@endif
			
		<!-- End Filter Bar -->
	</div>
</div>
@endsection