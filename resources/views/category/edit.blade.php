@extends('layouts.backendlayouts')

@section('your_backend_section')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header">
                <h3>Edit Category</h3>
              </div>

              {{-- Edited Successfully  --}}
              @if (session('product_edited'))
              <div class="alert alert-warning">
                {{ session('product_edited') }}
              </div>
              @endif

              <div class="card-body">
                <form action="{{ url('edit/category/insert') }}" method="post">
                    @csrf
                    <div class="form-group">
                      <label>Category Name</label>
                      <input type="hidden" class="form-control" name="category_id" value="{{ $category_edit->id }}">
                      <input type="text" class="form-control" name="category_name" value="{{ $category_edit->category_name }}">
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                    <a href="{{ url('add/category/view') }}" class="btn btn-sm btn-success">Back</a>
                </form>
              </div>
          </div>
      </div>
    </div>
</div>
@endsection
