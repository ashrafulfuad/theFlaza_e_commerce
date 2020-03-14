@extends('layouts.frontendlayouts')
@section('your_section')

<!-- Page Info -->
	<div class="page-info-section page-info" style="padding-top:150px;">
		<div class="container">
			<div class="site-breadcrumb">
				<a href="">Home</a> /
				<span>Cart</span>
			</div>
			<img src="{{ asset('frontend_asset/img/page-info-art.png') }}" alt="" class="page-info-art">
		</div>
	</div>
	<!-- Page Info end -->



	<!-- Page -->
	<div class="page-area cart-page spad">
		<div class="container">
			<div class="cart-table">
				<table>
					<thead>
						<tr>
							<th class="product-th">Product Name</th>
							<th>Price</th>
							<th>Quantity</th>
							<th class="total-th">Total</th>
							<th class="total-th">Action</th>
						</tr>
					</thead>
					<tbody>

						@php
							$sub_total = 0;
						@endphp

						@foreach ($cart_items as $cart_item)
						<tr>
							<td class="product-col">
								<img src="{{ asset('uploads/product_photos') }}/{{ $cart_item->relation_to_product_table->product_photo }}" alt="">
								<div class="pc-title">
									<h4>{{ $cart_item->relation_to_product_table->product_name }}</h4>
									<p href="#">{{ $cart_item->relation_to_color_table->color_name }}</p>
								</div>
							</td>
							<td class="price-col">${{ $cart_item->relation_to_product_table->product_price }}</td>
							<td class="quy-col">
								<div class="quy-input">
									<span>Qty</span>
									<input type="number" value="{{ $cart_item->product_quantity }}">
								</div>
							</td>
							<td class="total-col">${{ $cart_item->relation_to_product_table->product_price*$cart_item->product_quantity }}</td>
							<td class="total-col">
								<button type="button" name="button"><a href="{{ url('delete/from/cart') }}/{{ $cart_item->id }}">DELETE</a></button>
							</td>
						</tr>

						@php
						$sub_total = $sub_total +  $cart_item->product_quantity*$cart_item->relation_to_product_table->product_price;
						@endphp

						@endforeach
					</tbody>
				</table>
			</div>
			<div class="row cart-buttons">
				<div class="col-lg-5 col-md-5">
					<div class="site-btn btn-continue">Continue shooping</div>
				</div>
				<div class="col-lg-7 col-md-7 text-lg-right text-left">
					<div class="site-btn btn-clear">Clear cart</div>
					<div class="site-btn btn-line btn-update">Update Cart</div>
				</div>
			</div>
		</div>
		<div class="card-warp">
			<div class="container">
				<div class="row">
					<div class="col-lg-4">
						<div class="shipping-info">
							<h4>Shipping method</h4>
							<p>Select the one you want</p>
							<div class="shipping-chooes">
								<div class="sc-item">
									<input type="radio" name="sc" id="one">
									<label for="one">Next day delivery<span>$4.99</span></label>
								</div>
								<div class="sc-item">
									<input type="radio" name="sc" id="two">
									<label for="two">Standard delivery<span>$1.99</span></label>
								</div>
								<div class="sc-item">
									<input type="radio" name="sc" id="three">
									<label for="three">Personal Pickup<span>Free</span></label>
								</div>
							</div>
							<h4>Cupon code</h4>
							<p>Enter your cupone code</p>
							<div class="cupon-input">
								<input type="text">
								<button class="site-btn">Apply</button>
							</div>
						</div>
					</div>
					<div class="offset-lg-2 col-lg-6">
						<div class="cart-total-details">
							<h4>Cart total</h4>
							<p>Final Info</p>
							<ul class="cart-total-card">
								<li>Subtotal<span>${{ $sub_total }}</span></li>
								<li>Shipping<span>Free</span></li>
								<li class="total">Total<span>$59.90</span></li>
							</ul>
							<a class="site-btn btn-full" href="checkout.html">Proceed to checkout</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Page end -->

  @endsection
