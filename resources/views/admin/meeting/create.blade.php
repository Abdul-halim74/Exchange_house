@extends('layouts.admin')
@section('meeting_request') menu-open @endsection
@section('title') Visitor list @endsection
@section('create-meeting') active @endsection

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
                        <form action="{{ route('visitors.store') }}" method="POST">
                            @csrf
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Add visitor</h3>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-bordered" id="dynamicAddRemove">
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone No.</th>
                                                    <th>Action</th>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="moreFields[0][v_name]" placeholder="Enter name" class="form-control" /></td>
                                                    <td><input type="email" name="moreFields[0][v_email]" placeholder="Enter email" class="form-control" /></td>
                                                    <td><input type="text" name="moreFields[0][v_contact]" placeholder="Enter phone number" class="form-control" /></td>
                                                    <td><button type="button" name="add" id="add-btn" class="btn btn-info">Add More</button></td>
                                                </tr>
                                            </table>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="visiting_reason">Visiting Reason</label>
                                                <textarea name="visiting_reason" id="" cols="10" rows="6" class="form-control" placeholder="Enter visiting reason..."></textarea>
                                                @error('visiting_reason')
                                                    <span class="text-danger"> {{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="device_carried">Device Carried</label>
                                                <textarea name="device_carried" id="" cols="10" rows="6" class="form-control" placeholder="Enter device carrided..."></textarea>
                                                @error('device_carried')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="v_company">Company Name</label>
                                                <input type="text" class="form-control" name="v_company" placeholder="Enter visitor email...">
                                                @error('v_company')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="card_no">Card Number</label>
                                                <input type="text" class="form-control" name="card_no" placeholder="Enter visitor card number...">
                                                @error('card_no')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="floor_no">Floor Number</label>
                                                <input type="text" class="form-control" name="floor_no" placeholder="Enter visitor floor number...">
                                                @error('floor_no')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="v_start_time">Start Time</label>
                                                <input type="time" class="form-control" name="v_start_time" placeholder="Enter visitor meeting start time...">
                                                @error('v_start_time')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('scripts')
    {{-- input multiple feilds --}}
    <script type="text/javascript">
        var i = 0;
        $("#add-btn").click(function(){
            ++i;
            $("#dynamicAddRemove").append('' +
                '<tr>' +
                '<td><input type="text" name="moreFields['+i+'][v_name]" placeholder="Enter name" class="form-control" /></td>' +
                '<td><input type="email" name="moreFields['+i+'][v_email]" placeholder="Enter email" class="form-control" /></td>' +
                '<td><input type="text" name="moreFields['+i+'][v_contact]" placeholder="Enter phone number" class="form-control" /></td>' +
                '<td><button type="button" class="btn btn-danger remove-tr">Remove</button></td>' +
                '</tr>');
        });
        $(document).on('click', '.remove-tr', function(){
            $(this).parents('tr').remove();
        });
    </script>
@endsection
