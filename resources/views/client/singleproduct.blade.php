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
			<li class="nav-item">
				<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
				 aria-selected="false">Specification</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
				 aria-selected="false">Comments</a>
			</li>
			<li class="nav-item">
				<a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
				 aria-selected="false">Reviews</a>
			</li>
		</ul>
		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
				{!! $product->longdescription !!}
			</div>
			<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
				<div class="table-responsive">
					<table class="table">
						<tbody>
							<tr>
								<td>
									<h5>Width</h5>
								</td>
								<td>
									<h5>128mm</h5>
								</td>
							</tr>
							<tr>
								<td>
									<h5>Height</h5>
								</td>
								<td>
									<h5>508mm</h5>
								</td>
							</tr>
							<tr>
								<td>
									<h5>Depth</h5>
								</td>
								<td>
									<h5>85mm</h5>
								</td>
							</tr>
							<tr>
								<td>
									<h5>Weight</h5>
								</td>
								<td>
									<h5>52gm</h5>
								</td>
							</tr>
							<tr>
								<td>
									<h5>Quality checking</h5>
								</td>
								<td>
									<h5>yes</h5>
								</td>
							</tr>
							<tr>
								<td>
									<h5>Freshness Duration</h5>
								</td>
								<td>
									<h5>03days</h5>
								</td>
							</tr>
							<tr>
								<td>
									<h5>When packeting</h5>
								</td>
								<td>
									<h5>Without touch of hand</h5>
								</td>
							</tr>
							<tr>
								<td>
									<h5>Each Box contains</h5>
								</td>
								<td>
									<h5>60pcs</h5>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
				<div class="row">
					<div class="col-lg-6">
						<div class="comment_list">
							<div class="review_item">
								<div class="media">
									<div class="d-flex">
										<img src="img/product/review-1.png" alt="">
									</div>
									<div class="media-body">
										<h4>Blake Ruiz</h4>
										<h5>12th Feb, 2018 at 05:56 pm</h5>
										<a class="reply_btn" href="#">Reply</a>
									</div>
								</div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
									dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
									commodo</p>
							</div>
							<div class="review_item reply">
								<div class="media">
									<div class="d-flex">
										<img src="img/product/review-2.png" alt="">
									</div>
									<div class="media-body">
										<h4>Blake Ruiz</h4>
										<h5>12th Feb, 2018 at 05:56 pm</h5>
										<a class="reply_btn" href="#">Reply</a>
									</div>
								</div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
									dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
									commodo</p>
							</div>
							<div class="review_item">
								<div class="media">
									<div class="d-flex">
										<img src="img/product/review-3.png" alt="">
									</div>
									<div class="media-body">
										<h4>Blake Ruiz</h4>
										<h5>12th Feb, 2018 at 05:56 pm</h5>
										<a class="reply_btn" href="#">Reply</a>
									</div>
								</div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
									dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
									commodo</p>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="review_box">
							<h4>Post a comment</h4>
							<form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
								<div class="col-md-12">
									<div class="form-group">
										<input type="text" class="form-control" id="name" name="name" placeholder="Your Full name">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input type="text" class="form-control" id="number" name="number" placeholder="Phone Number">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<textarea class="form-control" name="message" id="message" rows="1" placeholder="Message"></textarea>
									</div>
								</div>
								<div class="col-md-12 text-right">
									<button type="submit" value="submit" class="btn primary-btn">Submit Now</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
				<div class="row">
					<div class="col-lg-6">
						<div class="row total_rate">
							<div class="col-6">
								<div class="box_total">
									<h5>Overall</h5>
									<h4>4.0</h4>
									<h6>(03 Reviews)</h6>
								</div>
							</div>
							<div class="col-6">
								<div class="rating_list">
									<h3>Based on 3 Reviews</h3>
									<ul class="list">
										<li><a href="#">5 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
												 class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
										<li><a href="#">4 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
												 class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
										<li><a href="#">3 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
												 class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
										<li><a href="#">2 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
												 class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
										<li><a href="#">1 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
												 class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="review_list">
							<div class="review_item">
								<div class="media">
									<div class="d-flex">
										<img src="img/product/review-1.png" alt="">
									</div>
									<div class="media-body">
										<h4>Blake Ruiz</h4>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
								</div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
									dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
									commodo</p>
							</div>
							<div class="review_item">
								<div class="media">
									<div class="d-flex">
										<img src="img/product/review-2.png" alt="">
									</div>
									<div class="media-body">
										<h4>Blake Ruiz</h4>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
								</div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
									dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
									commodo</p>
							</div>
							<div class="review_item">
								<div class="media">
									<div class="d-flex">
										<img src="img/product/review-3.png" alt="">
									</div>
									<div class="media-body">
										<h4>Blake Ruiz</h4>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
								</div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
									dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
									commodo</p>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="review_box">
							<h4>Add a Review</h4>
							<p>Your Rating:</p>
							<ul class="list">
								<li><a href="#"><i class="fa fa-star"></i></a></li>
								<li><a href="#"><i class="fa fa-star"></i></a></li>
								<li><a href="#"><i class="fa fa-star"></i></a></li>
								<li><a href="#"><i class="fa fa-star"></i></a></li>
								<li><a href="#"><i class="fa fa-star"></i></a></li>
							</ul>
							<p>Outstanding</p>
							<form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
								<div class="col-md-12">
									<div class="form-group">
										<input type="text" class="form-control" id="name" name="name" placeholder="Your Full name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Full name'">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input type="email" class="form-control" id="email" name="email" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address'">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input type="text" class="form-control" id="number" name="number" placeholder="Phone Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone Number'">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<textarea class="form-control" name="message" id="message" rows="1" placeholder="Review" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Review'"></textarea></textarea>
									</div>
								</div>
								<div class="col-md-12 text-right">
									<button type="submit" value="submit" class="primary-btn">Submit Now</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection