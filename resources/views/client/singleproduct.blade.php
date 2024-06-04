@extends('client.layout.master')
@section('title', 'Chi tiết sản phẩm')
@section('banner')
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Chi tiết {{ $product->name }}</h1>
                <nav class="d-flex align-items-center">
                    <a href="{{ route('home') }}">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                    <a href="{{ route('shop') }}">Cửa hàng<span class="lnr lnr-arrow-right"></span></a>
                    <a href="#">Chi tiết sản phẩm</a>
                </nav>
            </div>
        </div>
    </div>
</section>	
@endsection
@section('content')
<div class="product_image_area p-0">
	<div class="container">
		<div class="row ">
			<div class="col-lg-6">
				<div class="s_Product_carousel">
					@foreach($images as $image)
					<div class="single-prd-item">
						<img class="img-fluid" src="{{ asset($image->url) }}" alt="">
					</div>
                    @endforeach
				</div>
			</div>
			<div class="col-lg-5 offset-lg-1">
				<div class="s_product_text mt-0">
					<h3>{{ $product->name }}</h3>
					<h2>${{ $product->price }}</h2>
					<ul class="list">
						<li><a class="active" href="#"><span>Danh mục</span> : {{ $product->category->name }}</a></li>
						<li><a href="#"><span>Còn lại </span> : {{ $product->quantity }} sản phẩm</a></li>
					</ul>
					<p>{{ $product->description }}</p>
					<div class="product_count">
						<form action="{{ route('cart.store') }}" method="post">
						@csrf
						<label for="qty">Quantity:</label>
						<input type="text" name="quantity" id="sst" maxlength="12" value="1" title="Quantity:"
                                    class="input-text qty">
                                <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                                    class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                                <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                                    class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
						<input  type="number" name="id" value="{{ $product->id }}" hidden>
					</div>
					<div class="card_area d-flex align-items-center">
						<input type="submit" class="primary-btn border-0" value="Thêm giỏ hàng">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--================End Single Product Area =================-->

<!--================Product Description Area =================-->
<section class="product_description_area">
	<div class="container">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item">
				<a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
			</li>
		</ul>
		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
				{!! $product->longdescription !!}
			</div>

		</div>
	</div>
</section>
@endsection