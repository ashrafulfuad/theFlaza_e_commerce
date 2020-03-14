@extends('layouts.backendlayouts')

@section('your_backend_section')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-header">
                Customer Message List
                </div>
                <div class="card-body">

                  @if (session('delete_status'))
                  <div class="alert alert-danger">
                    {{ session('delete_status') }}
                  </div>
                  @endif

                  <table class="table table-bordered">
                    <thead class="thead-dark">
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($all_message as $all_messages)
                        <tr>
                          <th>{{ $all_messages->id }}</th>
                          <th>{{ $all_messages->first_name }}</th>
                          <th>{{ str_limit($all_messages->subject, 15) }}</th>
                          <th>{{ str_limit($all_messages->message, 30) }}</th>
                          <th>
                            @if ($all_messages->status == 1)
                              <a href="{{ url('/message/read') }}/{{ $all_messages->id }}" style="background:red; color:#fff; border-radius:20px; padding:0px 2px 0px 2px">unread</a>
                            @else
                              <a href="" style="background:green; color:#fff; border-radius:20px; padding:0px 2px 0px 2px">read</a>
                            @endif
                          </th>
                          <th>
                            <div class="btn-group">
                              <a href="{{ url('message/delete') }}/{{ $all_messages->id }}" type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                              <a href="{{ url('message/view') }}/{{ $all_messages->id }}" type="button" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
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
                Deleted Message List
                </div>
                <div class="card-body">

                  {{-- Restored Successfully --}}
                  @if (session('restore_status'))
                  <div class="alert alert-success">
                    {{ session('restore_status') }}
                  </div>
                  @endif

                  {{-- <table class="table">
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
                  </table> --}}
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
