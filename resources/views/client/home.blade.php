<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	@include('client.template.meta',['namepage'=>'Home Page'])
	@include('client.template.css')
	<!--
		CSS
		============================================= -->	
	
</head>

<body>

	<!-- Start Header Area -->
	@include('client.template.header')

	<!-- End Header Area -->

	<!-- start banner Area -->
	<section class="banner-area">
		<div class="container">
			<div class="row fullscreen align-items-center justify-content-start">
				<div class="col-lg-12">
					<div class="active-banner-slider owl-carousel">
						<!-- single-slide -->
						@foreach($banners as $banner)
						<div class="row single-slide align-items-center d-flex">
							<div class="col-lg-5 col-md-6">
								<div class="banner-content">
									<h1>{{ $banner->title }}</h1>
									<p>{{ $banner->sub_title }}</p>
									<div class="add-bag d-flex align-items-center">
										<a href="{{ route('shop') }}" class="primary-btn">Shop Now</a>
									</div>
								</div>
							</div>
							<div class="col-lg-7">
								<div class="banner-img">
									<img class="img-fluid h-100" src="{{ asset($banner->image) }}" alt="">
								</div>
							</div>
						</div>
						@endforeach
						<!-- single-slide -->

					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- start features Area -->
	<section class="features-area section_gap">
		<div class="container">
			<div class="row features-inner">
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="{{ asset('client/img/features/f-icon1.png') }}" alt="">
						</div>
						<h6>Giao hàng miễn phí</h6>
						<p>Miễn phí cho tất cả đơn hàng</p>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="{{ asset('client/img/features/f-icon2.png') }}" alt="">
						</div>
						<h6>Chính sách hoàn trả</h6>
						<p>Free Shipping on all order</p>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="{{ asset('client/img/features/f-icon3.png') }}" alt="">
						</div>
						<h6>Hỗ trợ 24/7</h6>
						<p>Free Shipping on all order</p>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="{{ asset('client/img/features/f-icon4.png') }}" alt="">
						</div>
						<h6>Secure Payment</h6>
						<p>Free Shipping on all order</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="owl-carousel active-product-area pt-0">
		@foreach($categories as $category)
		<!-- single product slide -->
		<div class="single-product-slider">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-6 text-center">
						<div class="section-title">
							<h1>{{ $category->name }}</h1>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
								dolore
								magna aliqua.</p>
						</div>
					</div>
				</div>
				<div class="row">
					<!-- single product -->
					@foreach($products as $product)
					@if($product->category_id == $category->id)
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							@foreach($images as $image)
                            @if($image->product_id == $product->id)
                            <a href="{{ route('product.detail',['id'=>$product->id]) }}"><img class="img-fluid" src="{{ asset($image->url) }}" alt=""></a>
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
					@endif
					@endforeach
					<!-- single product -->

				</div>
			</div>
		</div>
		@endforeach
		<!-- single product slide -->
		
	</section>
	<section class="owl-carousel active-product-area pt-0">
		@foreach($brands as $brand)
		<!-- single product slide -->
		<div class="single-product-slider">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-6 text-center">
						<div class="section-title">
							<h1>{{ $brand->name }}</h1>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
								dolore
								magna aliqua.</p>
						</div>
					</div>
				</div>
				<div class="row">
					@foreach($products as $product)
					@if($product->brand_id == $brand->id)
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							@foreach($images as $image)
                            @if($image->product_id == $product->id)
                            <a href="{{ route('product.detail',['id'=>$product->id]) }}"><img class="img-fluid" src="{{ asset($image->url) }}" alt=""></a>
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
					@endif
					@endforeach
					<!-- single product -->

				</div>
			</div>
		</div>
		@endforeach
		<!-- single product slide -->
		
	</section>
	

	<!-- start footer Area -->
	@include('client.template.footer')
	<!-- End footer Area -->

	@include('client.template.script')
</body>

</html>