@extends('layouts.backendlayouts')

@section('your_backend_section')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-5">
                <div class="card-header">
                <h4>Category List</h4>
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
                        <th>Category Name</th>
                        <th>Option</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($categories as $category)
                        <tr>
                          <th>{{ $category->id }}</th>
                          <th>{{ $category->category_name }}</th>
                          <th>
                            <div class="btn-group">
                              <a href="{{ url('category/delete') }}/{{ $category->id }}" type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                              <a href="{{ url('category/edit') }}/{{ $category->id }}" type="button" class="btn btn-sm btn-secondary"><i class="fa fa-edit"></i></a>
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
                <h4>Deleted Category List</h4>
                </div>
                <div class="card-body">

                  {{-- Restored Successfully --}}
                  @if (session('restore_status'))
                  <div class="alert" style="color:#014D0E; border: 1px solid #014D0E">
                    {{ session('restore_status') }}
                  </div>
                  @endif

                  <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($deleted_categories as $deleted_category)
                        <tr>
                          <th>{{ $deleted_category->id }}</th>
                          <th>{{ $deleted_category->category_name }}</th>
                          <th>
                            <div class="btn-group">
                              <a href="{{ url('category/restore') }}/{{ $deleted_category->id }}" type="button" class="btn btn-sm" style="background:#014D0E; color:#fff">Restore</a>
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
                  Add Category
                </div>
                <div class="card-body">
                  <form action="{{ url('add/category/insert') }}" method="post" enctype="multipart/form-data">
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
                        <label>Category Name</label>
                        <input type="text" class="form-control" name="category_name" placeholder="Enter Category">
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
