@extends('layouts.backendlayouts')

@section('your_backend_section')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header">
                <h3>Edit Color of <span style="color:{{ $edit_color->color_code }}">{{ $edit_color->color_name }}</span></h3>
              </div>

              {{-- Edited Successfully  --}}
              @if (session('product_edited'))
              <div class="alert alert-warning">
                {{ session('product_edited') }}
              </div>
              @endif

              <div class="card-body">
                <form action="{{ url('edit/color/insert') }}" method="post">
                    @csrf
                    <div class="form-group">
                      <label>Color Name</label>
                      <input type="hidden" class="form-control" name="color_id" value="{{ $edit_color->id }}">
                      <input type="text" class="form-control" name="color_name" value="{{ $edit_color->color_name }}">
                    </div>
                    <div class="form-group">
                      <label>Color Code</label>
                      <input type="text" class="form-control" name="color_code" value="{{ $edit_color->color_code }}">
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                    <a href="{{ url('add/color/view') }}" class="btn btn-sm btn-success">Back</a>
                </form>
              </div>
          </div>
      </div>
    </div>
</div>
@endsection
