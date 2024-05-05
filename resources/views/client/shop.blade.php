<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
    @include('client.template.meta',['namepage' => "Shop Page"])
	<!-- Site Title -->
    @include('client.template.css')
	<!--
            CSS
            ============================================= -->

</head>

<body id="category">

	<!-- Start Header Area -->
    @include('client.template.header')
	<!-- End Header Area -->

	<!-- Start Banner Area -->
    @include('client.template.banner')
	<!-- End Banner Area -->
	<div class="container">
		<div class="row">
			<div class="col-xl-3 col-lg-4 col-md-5">
				<div class="sidebar-categories">
					<div class="head">Browse Categories</div>

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
								<img class="img-fluid" src="{{ asset('image/product/'.$product->image) }}" alt="">
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
	</div>

	<!-- Start related-product Area -->

	<!-- End related-product Area -->

	<!-- start footer Area -->
    @include('client.template.footer')
	<!-- End footer Area -->

	<!-- Modal Quick Product View -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="container relative">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<div class="product-quick-view">
					<div class="row align-items-center">
						<div class="col-lg-6">
							<div class="quick-view-carousel">
								<div class="item" style="background: url(img/organic-food/q1.jpg);">

								</div>
								<div class="item" style="background: url(img/organic-food/q1.jpg);">

								</div>
								<div class="item" style="background: url(img/organic-food/q1.jpg);">

								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="quick-view-content">
								<div class="top">
									<h3 class="head">Mill Oil 1000W Heater, White</h3>
									<div class="price d-flex align-items-center"><span class="lnr lnr-tag"></span> <span class="ml-10">$149.99</span></div>
									<div class="category">Category: <span>Household</span></div>
									<div class="available">Availibility: <span>In Stock</span></div>
								</div>
								<div class="middle">
									<p class="content">Mill Oil is an innovative oil filled radiator with the most modern technology. If you are
										looking for something that can make your interior look awesome, and at the same time give you the pleasant
										warm feeling during the winter.</p>
									<a href="#" class="view-full">View full Details <span class="lnr lnr-arrow-right"></span></a>
								</div>
								<div class="bottom">
									<div class="color-picker d-flex align-items-center">Color:
										<span class="single-pick"></span>
										<span class="single-pick"></span>
										<span class="single-pick"></span>
										<span class="single-pick"></span>
										<span class="single-pick"></span>
									</div>
									<div class="quantity-container d-flex align-items-center mt-15">
										Quantity:
										<input type="text" class="quantity-amount ml-15" value="1" />
										<div class="arrow-btn d-inline-flex flex-column">
											<button class="increase arrow" type="button" title="Increase Quantity"><span class="lnr lnr-chevron-up"></span></button>
											<button class="decrease arrow" type="button" title="Decrease Quantity"><span class="lnr lnr-chevron-down"></span></button>
										</div>

									</div>
									<div class="d-flex mt-20">
										<a href="#" class="view-btn color-2"><span>Add to Cart</span></a>
										<a href="#" class="like-btn"><span class="lnr lnr-layers"></span></a>
										<a href="#" class="like-btn"><span class="lnr lnr-heart"></span></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



    @include('client.template.script')
</body>

</html>