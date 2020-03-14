@extends('layouts.backendlayouts')

@section('your_backend_section')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-header">
                Customer Message Details
                </div>
                <div class="card-body">
                  <table class="table">
                    <tr>
                      <td>Id</td>
                      <td>:    {{ $messagedetails->id }}</td>
                    </tr>
                    <tr>
                      <td>First Name</td>
                      <td>:    {{ $messagedetails->first_name }}</td>
                    </tr>
                    <tr>
                      <td>Last Name</td>
                      <td>:    {{ $messagedetails->last_name }}</td>
                    </tr>
                    <tr>
                      <td>Subject</td>
                      <td>:    {{ $messagedetails->subject }}</td>
                    </tr>
                    <tr>
                      <td>Message</td>
                      <td>:    {{ $messagedetails->message }}</td>
                    </tr>
                  </table>
                  <a href="{{ url('customer/message') }}" class="btn btn-sm btn-info">Back</a>
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
