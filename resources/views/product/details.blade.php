@extends('layouts.frontendlayouts')
@section('your_section')
  <!-- Page Info -->
	<div class="page-info-section page-info" style="padding-top:150px">
		<div class="container">
			<div class="site-breadcrumb">
				<a href="">Home</a> /
				<a href="">{{ $product_info->relation_to_category_table->category_name }}</a> /
				<span>{{ $product_info->product_name }}</span>
			</div>
			<img src="{{ asset('frontend_asset/img/page-info-art.png') }}" alt="" class="page-info-art">
		</div>
	</div>
	<!-- Page Info end -->


	<!-- Page -->
	<div class="page-area product-page spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<figure>
						<img class="product-big-img" src="{{ asset('uploads/product_photos') }}/{{ $product_info->product_photo }}" alt="">
					</figure>
					<div class="product-thumbs">
						<div class="product-thumbs-track">
							<div class="pt" data-imgbigurl="img/product/1.jpg"><img src="{{ asset('uploads/product_photos') }}/{{ $product_info->product_photo }}" alt=""></div>
							<div class="pt" data-imgbigurl="img/product/2.jpg"><img src="{{ asset('uploads/product_photos') }}/{{ $product_info->product_photo }}" alt=""></div>
							<div class="pt" data-imgbigurl="img/product/3.jpg"><img src="{{ asset('uploads/product_photos') }}/{{ $product_info->product_photo }}" alt=""></div>
							<div class="pt" data-imgbigurl="img/product/4.jpg"><img src="{{ asset('uploads/product_photos') }}/{{ $product_info->product_photo }}" alt=""></div>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<form action="{{ url('add/to/cart') }}" method="post">
					@csrf
					<input type="hidden" name="product_id" value="{{ $product_info->id }}">
					<div class="product-content">
						<h2>{{ $product_info->product_name }}</h2>
						<div class="pc-meta">
							<h4 class="price">${{ $product_info->product_price }}</h4>
						</div>
						<p>{{ $product_info->product_description }}</p>
						<div class="color-choose">
							<span>Colors:</span>
							@foreach ( json_decode($product_info->available_colors) as $available_color)
								@php
									$color_name = App\Color::find($available_color)->color_name;
									$color_code = App\Color::find($available_color)->color_code;
								@endphp
								<div class="cs-item">
									<input type="radio" value="{{ $available_color }}" name="cs" id="{{ $color_name }}-color" checked>
									<label class="cs-{{ $color_name }}" for="{{ $color_name }}-color"></label>
									<style media="screen">
									.product-content .color-choose label.cs-{{ $color_name }} {
										background: {{ $color_code }};
										}
										.product-content .color-choose label.cs-{{ $color_name }}:after {
										border: 1px solid {{ $color_code }};
										}
									</style>
								</div>
							@endforeach
						</div>
						<button type="submit" class="site-btn btn-line">ADD TO CART</button>
					</div>
				</form>
			</div>
			</div>
			<div class="product-details">
				<div class="row">
					<div class="col-lg-10 offset-lg-1">
						<ul class="nav" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="1-tab" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Description</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="2-tab" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Additional information</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="3-tab" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">Reviews (0)</a>
							</li>
						</ul>
						<div class="tab-content">
							<!-- single tab content -->
							<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab-1">
								<p>{{ $product_info->product_description }}</p>
							</div>
							<div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab-2">
								<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
							</div>
							<div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="tab-3">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="text-center rp-title">
				<h5>Related products</h5>
			</div>
			<div class="row">
				@foreach ($cats_products as $value)
				<div class="col-lg-3">
					<div class="product-item">
						<figure style="height:240px">
							<img src="{{ asset('uploads/product_photos') }}/{{ $value->product_photo }}" alt="">
							<div class="pi-meta">
								<div class="pi-m-left">
									<img src="{{ asset('frontend_asset/img/icons/eye.png') }}" alt="">
									<p>view</p>
								</div>
								<div class="pi-m-right">
									<img src="{{ asset('frontend_asset/img/icons/heart.png') }}" alt="">
									<p>save</p>
								</div>
							</div>
						</figure>
						<div class="product-info">
							<h6>{{ $value->product_name }}</h6>
							<p>${{ $value->product_price }}</p>
							<a href="{{ url('product') }}/{{ $value->id }}" class="site-btn btn-line">ADD TO CART</a>
						</div>
					</div>
				</div>
			@endforeach
			</div>
		</div>
	</div>
	<!-- Page end -->
@endsection
