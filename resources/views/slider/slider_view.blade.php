@extends('layouts.backendlayouts')

@section('your_backend_section')
<div class="container">
    <div class="row">
        <div class="col-lg-4">
          <div class="card">
              <div class="card-header">
                Add Slider
              </div>
              <div class="card-body">
                <form action="{{ url('add/slider/insert') }}" method="post" enctype="multipart/form-data">
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
                      <input type="number" class="form-control" name="starting_price" placeholder="Enter Starting Price" value="{{ old('starting_price') }}">
                    </div>
                    <div class="form-group">
                      <label>Collection Year</label>
                      <input type="number" class="form-control" name="collection_year" placeholder="Enter Collection Year" value="{{ old('collection_year') }}">
                    </div>
                    <div class="form-group">
                      <label>Collection Name</label>
                      <input type="text" class="form-control" name="collection_name" placeholder="Enter Collection Name" value="{{ old('collection_name') }}">
                    </div>
                    <div class="form-group">
                      <label>Button Name</label>
                      <input type="text" class="form-control" name="button_name" placeholder="Enter Button Name" value="{{ old('button_name') }}">
                    </div>
                    <div class="form-group">
                      <label>Button Link</label>
                      <input type="text" class="form-control" name="button_link" placeholder="Enter Button Link" value="{{ old('button_link') }}">
                    </div>
                    <div class="form-group">
                      <label>Slider Photo</label>
                      <input type="file" class="form-control" name="slider_photo" placeholder="Enter Slider Photo" value="{{ old('slider_photo') }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
          </div>
        <div class="col-lg-8">
            <div class="card mb-5">
                <div class="card-header">
                Product List
                </div>
                <div class="card-body">

                  @if (session('delete_status'))
                  <div class="alert alert-danger">
                    {{ session('delete_status') }}
                  </div>
                  @endif

                  <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th>ID</th>
                        <th>Price</th>
                        <th>C Year</th>
                        <th>C Name</th>
                        <th>B Name</th>
                        <th>B Link</th>
                        <th>Photo</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($sliders as $slider)
                        <tr>
                          <th>{{ $slider->id }}</th>
                          <th>{{ title_case($slider->starting_price) }}</th>
                          <th>{{ $slider->collection_year }}</th>
                          <th>{{ $slider->collection_name }}</th>
                          <th>{{ $slider->button_name }}</th>
                          <th>{{ str_limit($slider->button_link, 5) }}</th>
                          <th><img width="50" src="{{ asset('uploads/slider_photos') }}/{{ $slider->slider_photo }}" alt="photo" ></th>
                          <th>
                            <div class="btn-group">
                              <a href="{{ url('slider/delete') }}/{{ $slider->id }}" type="button" class="btn btn-sm btn-danger">Del</a>
                              <a href="{{ url('slider/edit') }}/{{ $slider->id }}" type="button" class="btn btn-sm btn-secondary">Edit</a>
                            </div>
                          </th>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                  {{ $sliders->links() }}


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
                        <th>Price</th>
                        <th>C Year</th>
                        <th>C Name</th>
                        <th>B Name</th>
                        <th>B Link</th>
                        <th>Photo</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($deleted_sliders as $deleted_slider)
                        <tr>
                          <th>{{ $deleted_slider->id }}</th>
                          <th>{{ title_case($deleted_slider->starting_price) }}</th>
                          <th>{{ $deleted_slider->collection_year }}</th>
                          <th>{{ $deleted_slider->collection_name }}</th>
                          <th>{{ $deleted_slider->button_name }}</th>
                          <th>{{ str_limit($deleted_slider->button_link, 5) }}</th>
                          <th><img width="50" src="{{ asset('uploads/slider_photos') }}/{{ $deleted_slider->slider_photo }}" alt="photo" ></th>
                          <th>
                            <div class="btn-group">
                              <a href="{{ url('slider/restore') }}/{{ $deleted_slider->id }}" type="button" class="btn btn-sm btn-success">Restore</a>
                            </div>
                          </th>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                  {{ $sliders->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
