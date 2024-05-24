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

	</div>
	<div class="col-xl-9 col-lg-8 col-md-7">
		<!-- Start Filter Bar -->
		<div class="filter-bar d-flex flex-wrap align-items-center">
			<div class="sorting">
				<select>
					<option value="1">Default sorting</option>
					<option value="1">Default sorting</option>
					<option value="1">Default sorting</option>
				</select>
			</div>
			<div class="sorting mr-auto">
				<select>
					<option value="1">Show 12</option>
					<option value="1">Show 12</option>
					<option value="1">Show 12</option>
				</select>
			</div>
		</div>
		<!-- End Filter Bar -->
		<!-- Start Best Seller -->
		<section class="lattest-product-area pb-40 category-list">
			<div class="row">
				<!-- single product -->
				@foreach ($products as $product)
				<div class="col-lg-3 col-md-6">
					
					<div class="single-product">
						<a href="{{ route('product.detail',['id'=>$product->id]) }}"><img class="img-fluid" src="{{ asset('image/product/'.$product->image) }}" alt=""></a>
						<div class="product-details">
							<h6>{{ $product->name }}</h6>
							<div class="price">
								<h6>${{ $product->price }}</h6>
							</div>
							<div class="prd-bottom">

								<a href="" class="social-info">
									<span class="ti-bag"></span>
									<p class="hover-text">add to bag</p>
								</a>
								<a href="" class="social-info">
									<span class="lnr lnr-heart"></span>
									<p class="hover-text">Wishlist</p>
								</a>
								<a href="" class="social-info">
									<span class="lnr lnr-sync"></span>
									<p class="hover-text">compare</p>
								</a>
								<a href="" class="social-info">
									<span class="lnr lnr-move"></span>
									<p class="hover-text">view more</p>
								</a>
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
		
				@if($products->count()>=4)
				<div class="filter-bar d-flex flex-wrap align-items-center justify-content-center">
					<div class="pagination">
						{{ $products->links() }}
					</div>
				</div>
				
				@endif
			
		<!-- End Filter Bar -->
	</div>
</div>
@endsection