@extends('layouts.frontendlayouts')
@section('your_section')
  <!-- Hero section -->
  <section class="hero-section set-bg" data-setbg="{{ asset('frontend_asset/img/bg.jpg') }}">
    <div class="hero-slider owl-carousel">
      @foreach ($sliders as $slider)
      <div class="hs-item">
        <div class="hs-left"><img src="{{ asset('uploads/slider_photos') }}/{{ $slider->slider_photo }}" alt=""></div>
        <div class="hs-right">
          <div class="hs-content">
            <div class="price">from ${{ $slider->starting_price }}</div>
            <h2><span>{{ $slider->collection_year }}</span> <br>{{ $slider->collection_name }}</h2>
            <a href="" class="site-btn">{{ $slider->button_name }}!</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </section>
  <!-- Hero section end -->


  <!-- Intro section -->
  <section class="intro-section spad pb-0">
    <div class="section-title">
      <h2>premium products</h2>
      <p>We recommend</p>
    </div>
    <div class="intro-slider">
      <ul class="slidee">
        @foreach ($products as $product)
        <li>
          <div class="intro-item">
            <figure >
              <a href="{{ url('product') }}/{{ $product->id }}">
                <img src="{{ asset('uploads/product_photos') }}/{{ $product->product_photo }}" alt="#">
              </a>
            </figure>
            <div class="product-info">
              <h5>{{ $product->product_name }}</h5>
              <p>${{ $product->product_price }}</p>
              <a href="{{ url('product') }}/{{ $product->id }}" class="site-btn btn-line">ADD TO CART</a>
            </div>
          </div>
        </li>
        @endforeach
      </ul>
    </div>
    <div class="container">
      <div class="scrollbar">
        <div class="handle">
          <div class="mousearea"></div>
        </div>
      </div>
    </div>
  </section>
  <!-- Intro section end -->



  <!-- Product section -->
  <section class="product-section spad">
    <div class="container">
      <ul class="product-filter controls">
        <li class="control" data-filter=".all">All</li>
        @foreach ($categories as $category)
          <li class="control" data-filter=".fuad-{{ $category->id }}">{{ $category->category_name }}</li>
        @endforeach
      </ul>
      <div class="row" id="product-filter">
        @foreach ($products as $product)
        <div class="mix col-lg-3 col-md-6 all fuad-{{ $product->category_id }}">
          <div class="product-item">
            <figure style="height:240px">
              <img src="{{ asset('uploads/product_photos') }}/{{ $product->product_photo }}" alt="">
              <div class="pi-meta">
                <a href="{{ url('product') }}/{{ $product->id }}">
                  <div class="pi-m-left">
                    <img src="{{ asset('frontend_asset/img/icons/eye.png') }}" alt="">
                    <p>view</p>
                  </div>
                </a>
                <div class="pi-m-right">
                  <img src="{{ asset('frontend_asset/img/icons/heart.png') }}" alt="">
                  <p>save</p>
                </div>
              </div>
            </figure>
            <div class="product-info">
              <h6>{{ $product->product_name }}</h6>
              <p>${{ $product->product_price }}</p>
              <a href="{{ url('product') }}/{{ $product->id }}" class="site-btn btn-line">ADD TO CART</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  <!-- Product section end -->
@endsection
