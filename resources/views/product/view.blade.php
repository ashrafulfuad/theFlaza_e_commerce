@extends('layouts.backendlayouts')

@section('your_backend_section')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-5">
                <div class="card-header">
                Product List
                </div>
                <div class="card-body">

                  {{-- @if (session('delete_status'))
                  <div class="alert alert-danger">
                    {{ session('delete_status') }}
                  </div>
                  @endif --}}

                  <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th>ID</th>
                        <th>P Name</th>
                        <th>P Description</th>
                        <th>P Price</th>
                        <th>Photo</th>
                        <th>Option</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($products as $product)
                        <tr>
                          <th>{{ $product->id }}</th>
                          <th>{{ title_case($product->product_name) }}</th>
                          <th>{{ str_limit($product->product_description, 5) }}</th>
                          <th>{{ $product->product_price }}</th>
                          <th><img width="50" src="{{ asset('uploads/product_photos') }}/{{ $product->product_photo }}" alt="photo" ></th>
                          <th>
                            <div class="btn-group">
                              <a href="{{ url('product/delete') }}/{{ $product->id }}" type="button" class="btn btn-sm btn-danger">Del</a>
                              <a href="{{ url('product/edit') }}/{{ $product->id }}" type="button" class="btn btn-sm btn-secondary">Edit</a>
                            </div>
                          </th>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                  {{ $products->links() }}
                </div>
            </div>
            <div class="card mt-5">
                <div class="card-header">
                Deleted Product List
                </div>
                <div class="card-body">

                  {{-- Restored Successfully --}}
                  @if (session('restore_status'))
                  <div class="alert alert-success">
                    {{ session('restore_status') }}
                  </div>
                  @endif

                  <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th>ID</th>
                        <th>P Name</th>
                        <th>P Description</th>
                        <th>P Price</th>
                        <th>Photo</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($deleted_products as $deleted_product)
                        <tr>
                          <th>{{ $deleted_product->id }}</th>
                          <th>{{ title_case($deleted_product->product_name) }}</th>
                          <th>{{ str_limit($deleted_product->product_description, 5) }}</th>
                          <th>{{ $deleted_product->product_price }}</th>
                          <th><img width="50" src="{{ asset('uploads/product_photos') }}/{{ $deleted_product->product_photo }}" alt="img"></th>
                          <th>
                            <div class="btn-group">
                              <a href="{{ url('product/restore') }}/{{ $deleted_product->id }}" type="button" class="btn btn-sm btn-success">Restore</a>
                            </div>
                          </th>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                  {{ $products->links() }}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                  Add Product
                </div>
                <div class="card-body">
                  <form action="{{ url('add/product/insert') }}" method="post" enctype="multipart/form-data">
                      @csrf

                      @if (session('status'))
                      <div class="alert alert-success">
                        {{ session('status') }}
                      </div>
                      @endif

                      @if ($errors->all())
                        <div class="alert alert-danger">
                          @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                          @endforeach
                        </div>
                      @endif

                      <div class="form-group">
                        <label>Product Name</label>
                        <input type="hidden" class="form-control" name="product_id">
                        <input type="text" class="form-control" name="product_name" placeholder="Enter Product Name" value="{{ old('product_name') }}">
                      </div>
                      <div class="form-group">
                        <label>Category Name</label>
                        <select class="form-control" name="category_id">
                          @foreach ($categories as $category)
                            <option value="{{ $category->id }}">-{{ $category->category_name }}-</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Color</label>
                        <select class="form-control color_select" name="color_id[]" multiple="multiple">
                          @foreach ($colors as $color)
                            <option style="color:{{ $color->color_code }}; text-transform:capitalize" value="{{ $color->id }}">-{{ $color->color_name }}-</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Product Description</label>
                        <textarea type="next" class="form-control" name="product_description" placeholder="Enter Product Description" value="{{ old('product_description') }}"></textarea>
                      </div>
                      <div class="form-group">
                        <label>Product Price</label>
                        <input type="next" class="form-control" name="product_price" placeholder="Enter Product Price" value="{{ old('product_price') }}">
                      </div>
                      <div class="form-group">
                        <label>Product Quantity</label>
                        <input type="next" class="form-control" name="product_quantity" placeholder="Enter Product Quantity" value="{{ old('product_quantity') }}">
                      </div>
                      <div class="form-group">
                        <label>Alert Quantity</label>
                        <input type="next" class="form-control" name="alert_quantity" placeholder="Enter Alert Quantity" value="{{ old('alert_quantity') }}">
                      </div>
                      <div class="form-group">
                        <label>Product Photo</label>
                        <input type="file" class="form-control" name="product_photo">
                      </div>
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer_scripts')
<script type="text/javascript">
  $(document).ready(function(){
     $('.color_select').select2();
  })
</script>
@endsection
