@extends('layouts.admin')

@section('title')
    Edit visitor
@endsection
@section('main-content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"> Edit Visitor</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Edit Visitor</li>
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
                        <form action="{{ route('visitors.update',$visitor_edit->id) }}" method="POST">
                            @csrf
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Edit visitor</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-body">
                                      
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="v_name">Name</label>
                                                        <input type="text" class="form-control" name="v_name"
                                                            placeholder="Enter visitor name...">
                                                        @error('v_name')
                                                            <span class="text-danger">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="v_email">Email</label>
                                                        <input type="email" class="form-control" name="v_email"
                                                            placeholder="Enter visitor email...">
                                                        @error('v_email')
                                                            <span class="text-danger">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
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
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="v_contact">Phone Number</label>
                                                        <input type="phone" class="form-control" name="v_contact"
                                                            placeholder="Enter visitor phone number...">
                                                        @error('v_contact')
                                                            <span class="text-danger">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
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
                                                <div class="col-md-6">
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">Update</button>
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


