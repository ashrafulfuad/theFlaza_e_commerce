@extends('layouts.backendlayouts')

@section('your_backend_section')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header">
                <h3>Edit Product of</h3> {{ $edit_products->product_name }}
              </div>

              {{-- Edited Successfully  --}}
              @if (session('product_edited'))
              <div class="alert alert-warning">
                {{ session('product_edited') }}
              </div>
              @endif

              <div class="card-body">
                <form action="{{ url('edit/product/insert') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label>Product Name</label>
                      <input type="hidden" class="form-control" name="product_id" value="{{ $edit_products->id }}">
                      <input type="text" class="form-control" name="product_name" placeholder="Enter Product Name" value="{{ $edit_products->product_name }}">
                    </div>
                    <div class="form-group">
                      <label>Product Description</label>
                      <textarea type="next" class="form-control" name="product_description" placeholder="Enter Product Description">{{ $edit_products->product_description }}</textarea>
                    </div>
                    <div class="form-group">
                      <label>Product Price</label>
                      <input type="next" class="form-control" name="product_price" placeholder="Enter Product Price" value="{{ $edit_products->product_price }}">
                    </div>
                    <div class="form-group">
                      <label>Product Quantity</label>
                      <input type="next" class="form-control" name="product_quantity" placeholder="Enter Product Quantity" value="{{ $edit_products->product_quantity }}">
                    </div>
                    <div class="form-group">
                      <label>Alert Quantity</label>
                      <input type="next" class="form-control" name="alert_quantity" placeholder="Enter Alert Quantity" value="{{ $edit_products->alert_quantity }}">
                    </div>
                    <div class="form-group">
                      <label>Product Photo</label>
                      <input type="file" class="form-control" name="product_photo" value="{{ $edit_products->product_photo }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
          </div>
      </div>
    </div>
</div>
@endsection
