@extends('layouts.admin')
@section('visitor')
    menu-open
@endsection
@section('title')
    New visitor
@endsection
@section('new-visitor')
    active
@endsection

@section('styles')
    {{-- <link rel="stylesheet" href="{{ asset('support_files/plugins/bs-stepper/css/bs-stepper.min.css') }}"> --}}
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('support_files/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('support_files/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    {{-- webcam image cdn link --}}
   
    <script src="{{ asset('support_files/plugins/webcam/webcam.min.js') }}"></script>

    <style type="text/css">
        #results {
            padding: 20px;
            border: 1px solid;
            background: #ccc;
        }
        img{
            margin-left: 13px;
        }

    </style>
@endsection

@section('main-content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Visitor</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Visitor</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                        @include('admin.inc.message')
                        @include('admin.inc.danger')
                        <form action="{{ route('visitors.store') }}" method="POST">
                            @csrf
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Employee Details</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="employee_id"> Employee ID</label>
                                                <select class="form-control select2bs4" style="width: 100%;" name="user_id"
                                                    id="get_emp_id">
                                                    <option selected="selected">--Select--</option>
                                                    @foreach ($users as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach

                                                </select>
                                                @error('employee_id')
                                                    <span class="text-danger">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="employee_id">Employee Name</label>
                                                <input type="text" class="form-control" id="emp_name" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="employee_id"> Employee Dept.</label>
                                                <input type="text" class="form-control" id="emp_dept" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="employee_id">Employee Phone Number</label>
                                                <input type="text" class="form-control" id="phone_no" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Add visitor</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-body">
                                            <div class="row">

                                                <table class="table table-bordered" id="dynamicAddRemove">
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Phone No.</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="moreFields[0][v_name]"
                                                                placeholder="Enter name" class="form-control" /></td>
                                                        <td><input type="email" name="moreFields[0][v_email]"
                                                                placeholder="Enter email" class="form-control" /></td>
                                                        <td><input type="text" name="moreFields[0][v_contact]"
                                                                placeholder="Enter phone number" class="form-control" />
                                                        </td>
                                                        <td><button type="button" name="add" id="add-btn"
                                                                class="btn btn-info">Add More</button></td>
                                                    </tr>
                                                </table>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <button type="button" name="images" data-toggle="modal"
                                                            data-target="#AddImage" class="btn btn-info">Add
                                                            Picture</button>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="visiting_reason">Visiting Reason</label>
                                                        <textarea name="visiting_reason" id="" cols="10" rows="6" class="form-control"
                                                            placeholder="Enter visiting reason..."></textarea>
                                                        @error('visiting_reason')
                                                            <span class="text-danger">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="device_carried">Device Carried</label>
                                                        <textarea name="device_carried" id="" cols="10" rows="6" class="form-control"
                                                            placeholder="Enter device carrided..."></textarea>
                                                        @error('device_carried')
                                                            <span class="text-danger">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="v_company">Company Name</label>
                                                        <input type="text" class="form-control" name="v_company"
                                                            placeholder="Enter visitor email...">
                                                        @error('v_company')
                                                            <span class="text-danger">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="card_no">Card Number</label>
                                                        <input type="text" class="form-control" name="card_no"
                                                            placeholder="Enter visitor card number...">
                                                        @error('card_no')
                                                            <span class="text-danger">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="floor_no">Floor Number</label>
                                                        <input type="text" class="form-control" name="floor_no"
                                                            placeholder="Enter visitor floor number...">
                                                        @error('floor_no')
                                                            <span class="text-danger">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="v_start_time">Start Time</label>
                                                        <input type="time" class="form-control" name="v_start_time"
                                                            placeholder="Enter visitor meeting start time...">
                                                        @error('v_start_time')
                                                            <span class="text-danger">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <input type="hidden" id="webcam_image" name="webcam_image">
                                                {{-- <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="v_end_time">End Time</label>
                                                        <input type="time" class="form-control" name="v_end_time"
                                                            placeholder="Enter visitor meeting end time...">
                                                        @error('v_end_time')
                                                            <span class="text-danger">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">Submit</button>
                                </div>
                        </form>
                    </div>
                </div>

                <!-- /.col -->
            </div>
            <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
@endsection
@section('scripts')
    {{-- input multiple feilds --}}
    <script type="text/javascript">
        var i = 0;
        $("#add-btn").click(function() {
            ++i;
            $("#dynamicAddRemove").append('' +
                '<tr>' +
                '<td><input type="text" name="moreFields[' + i +
                '][v_name]" placeholder="Enter name" class="form-control" /></td>' +
                '<td><input type="email" name="moreFields[' + i +
                '][v_email]" placeholder="Enter email" class="form-control" /></td>' +
                '<td><input type="text" name="moreFields[' + i +
                '][v_contact]" placeholder="Enter phone number" class="form-control" /></td>' +
                '<td><button type="button" class="btn btn-danger remove-tr">Remove</button></td>' +
                '</tr>');
        });
        $(document).on('click', '.remove-tr', function() {
            $(this).parents('tr').remove();
        });
    </script>

    <script src="{{ asset('support_files/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })
    </script>

    {{-- Employee data onlyread ajax code --}}
    <script>
        $("#get_emp_id").on("change", function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
            });

            var emp_id = $("#get_emp_id").val();

            var formData = {
                emp_id: emp_id
            };


            $.ajax({
                type: 'POST',
                url: "{{ url('admin/visitor/readonly') }}",
                data: formData,
                success: function(data) {
                    console.log(data);
                    var get_data = JSON.parse(data);

                    $("#emp_name").val(get_data.name);
                    $("#emp_dept").val(get_data.department_name);
                    $("#phone_no").val(get_data.contact);

                    //    alert(get_data.name);

                },
            });

        });
    </script>
    {{-- webcam image insert js --}}
    <script language="JavaScript">
        Webcam.set({
            width: 300,
            height: 290,
            image_format: 'jpeg',
            jpeg_quality: 90
        });
        Webcam.attach('#my_camera');

        function take_snapshot() {
            Webcam.snap(function(data_uri) {
                $(".image-tag").val(data_uri);
                $("#webcam_image").val(data_uri);
                document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';
            });
        }
    </script>
@endsection
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="AddImage" tabindex="-1" role="dialog" aria-labelledby="AddImageLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddImageLabel">Add Picture</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form method="POST" action="{{route('visitors.store')}}">
                        <div class="row">
                            <div class="col-md-6">
                                <div id="my_camera"></div>
                                <br />
                                <input type=button value="Take Photo" onClick="take_snapshot()">
                                <input type="hidden" name="v_image" class="image-tag">
                            </div>
                            <div class="col-md-6">
                                <div id="results">View Photo</div>
                            </div>
                            <div class="col-md-12 text-right">
                                <br />
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-info" data-dismiss="modal">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
