@extends('layouts.backendlayouts')

@section('your_backend_section')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="card">
            <div class="card-header">
              Add Slider of {{ $edit_sliders->collection_name }}
            </div>
            <div class="card-body">
              <form action="{{ url('edit/slider/insert') }}" method="post" enctype="multipart/form-data">
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
                    <label>Starting Price</label>
                    <input type="hidden" class="form-control" name="slider_id" placeholder="Enter Starting Price" value="{{ $edit_sliders->id }}">
                    <input type="number" class="form-control" name="starting_price" placeholder="Enter Starting Price" value="{{ $edit_sliders->starting_price }}">
                  </div>
                  <div class="form-group">
                    <label>Collection Year</label>
                    <input type="number" class="form-control" name="collection_year" placeholder="Enter Collection Year" value="{{ $edit_sliders->collection_year }}">
                  </div>
                  <div class="form-group">
                    <label>Collection Name</label>
                    <input type="text" class="form-control" name="collection_name" placeholder="Enter Collection Name" value="{{ $edit_sliders->collection_name }}">
                  </div>
                  <div class="form-group">
                    <label>Button Name</label>
                    <input type="text" class="form-control" name="button_name" placeholder="Enter Button Name" value="{{ $edit_sliders->button_name }}">
                  </div>
                  <div class="form-group">
                    <label>Button Link</label>
                    <input type="text" class="form-control" name="button_link" placeholder="Enter Button Link" value="{{ $edit_sliders->button_link }}">
                  </div>
                  <div class="form-group">
                    {{-- <label>Slider Photo</label>
                    <input type="file" class="form-control" name="slider_photo" value="{{ $edit_sliders->slider_photo }}"> --}}
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
