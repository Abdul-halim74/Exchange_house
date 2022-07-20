@extends('layouts.admin')
@section('reports')
    menu-open
@endsection
@section('title')
Report|Visitor
@endsection
@section('report_visitor')
    active
@endsection
@section('styles')
    {{-- <link rel="stylesheet" href="{{ asset('support_files/plugins/bs-stepper/css/bs-stepper.min.css') }}"> --}}
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('support_files/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('support_files/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('main-content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Reports</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Reports</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-7">

                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Report Generate</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('admin.vDateShow')}}" method="get">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Start Date</label>
                                        <input type="date" class="form-control" id="name" name="start_date"
                                           >
                                        @error('name')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="branch_code">End Date</label>
                                        <input type="date" class="form-control" name="end_date">
                                        @error('branch_code')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <div class="card-body">
                                    <div class="form-group">
                                        <label for="employee_id"> Company Name</label>
                                        <select class="form-control select2bs4" style="width: 100%;" name="user_id">
                                            <option selected="selected">--Select--</option>
                                            @foreach($visitors as $item)
                                            <option value="{{$item->id}}">{{$item->v_company}}</option>
                                            @endforeach
                                            
                                        </select>
                                        @error('employee_id')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div> --}}
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">Generate</button>
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

@section('scripts')
    <script src="{{ asset('support_files/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })
    </script>
@endsection
