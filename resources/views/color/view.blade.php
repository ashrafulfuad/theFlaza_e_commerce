@extends('layouts.backendlayouts')

@section('your_backend_section')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-5">
                <div class="card-header">
                <h4>Color List</h4>
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
                        <th>Color Name</th>
                        <th>Color Code</th>
                        <th>Option</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($color as $colour)
                        <tr>
                          <th style="color:{{ $colour->color_code }}">{{ $colour->id }}</th>
                          <th style="color:{{ $colour->color_code }}; text-transform: capitalize">{{ $colour->color_name }}</th>
                          <th style="color:{{ $colour->color_code }}">{{ $colour->color_code }}</th>
                          <th>
                            <div class="btn-group">
                              <a href="{{ url('color/delete') }}/{{ $colour->id }}" type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                              <a href="{{ url('color/edit') }}/{{ $colour->id }}" type="button" class="btn btn-sm btn-secondary" ><i class="fa fa-edit"></i></a>
                            </div>
                          </th>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
            <div class="card mt-5">
                <div class="card-header">
                <h4>Deleted Color List</h4>
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
                        <th>Color Name</th>
                        <th>Color Code</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($deleted_color as $deleted_colour)
                        <tr>
                          <th style="color:{{ $deleted_colour->color_code }}">{{ $deleted_colour->id }}</th>
                          <th style="color:{{ $deleted_colour->color_code }}">{{ $deleted_colour->color_name }}</th>
                          <th style="color:{{ $deleted_colour->color_code }}">{{ $deleted_colour->color_code }}</th>
                          <th>
                            <div class="btn-group">
                              <a href="{{ url('color/restore') }}/{{ $deleted_colour->id }}" type="button" class="btn btn-sm" style="background:#085400; color:#fff">Restore</a>
                            </div>
                          </th>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                  Add Color
                </div>
                <div class="card-body">
                  <form action="{{ url('add/color/insert') }}" method="post" enctype="multipart/form-data">
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
                        <label>Color Name</label>
                        <input type="text" class="form-control" name="color_name" placeholder="Enter Color Name">
                      </div>
                      <div class="form-group">
                        <label>Color Code</label>
                        <input type="text" class="form-control" name="color_code" placeholder="Enter Color Code">
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
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
