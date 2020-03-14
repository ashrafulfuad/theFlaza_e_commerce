@extends('layouts.backendlayouts')

@section('your_backend_section')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header">
                <h3>Create Coupon</h3>
              </div>

              {{-- Edited Successfully  --}}
              {{-- @if (session('product_edited'))
              <div class="alert alert-warning">
                {{ session('product_edited') }}
              </div>
              @endif --}}

              <div class="card-body">
                <form action="{{ url('coupon/insert') }}" method="post">
                    @csrf
                    <div class="form-group">
                      @if ($errors->all())
                      <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                      </div>
                      @endif
                      <label>Coupon Name</label>
                      <input type="text" class="form-control" name="coupon_name" placeholder="Enter Coupon" value="">
                    </div>
                    <div class="form-group">
                      <label>Valid Till</label>
                      <input type="date" class="form-control" name="valid_till" placeholder="Enter Valid Till" value="">
                    </div>
                    <div class="form-group">
                      <label>Coupon Amount</label>
                      <input type="number" class="form-control" name="coupon_amount" placeholder="Enter Coupon Amount" value="">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
          </div>
      </div>
    </div>
</div>
@endsection
