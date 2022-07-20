@extends('layouts.admin')
@section('settings') menu-open @endsection
@section('title') Branch Edit @endsection
@section('branch') active @endsection
@section('main-content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Branch</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Branch</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        @include('admin.inc.message')
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Edit Branch</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{route('admin.branch_update')}}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name"> Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{$branch_edit->name}}"
                                            placeholder="Enter branch name...">
                                        @error('name')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="branch_code"> Code</label>
                                        <input type="text" class="form-control" name="branch_code"value="{{$branch_edit->branch_code}}" placeholder="Enter branch code...">
                                        @error('branch_code')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" name="phone"value="{{$branch_edit->phone}}" placeholder="Enter branch number...">
                                        @error('phone')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="location">Address</label>
                                        <textarea name="location" id="" cols="10" rows="5" class="form-control" placeholder="Enter branch address...">{{$branch_edit->location}}</textarea>
                                        @error('location')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <input type="hidden" name="update_id" class="form-control" value="{{ $branch_edit->id }}" />
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

