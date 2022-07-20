@extends('layouts.admin')
@section('title')
    Photo Edit
@endsection

@section('styles')
    {{-- <link rel="stylesheet" href="{{ asset('support_files/plugins/bs-stepper/css/bs-stepper.min.css') }}"> --}}
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('support_files/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('support_files/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

    {{-- webcam image cdn link --}}
    <script src="{{ asset('support_files/plugins/webcam/webcam.min.js') }}"></script>

    <style type="text/css">
        #results {
            padding: 20px;
            margin-top: 20px;
            border: 1px solid;
            background: #ccc;
        }

        img{
            margin-left: 10px;
        }
        

    </style>
@endsection
@section('main-content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Photo</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Photo</li>
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
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Edit Photo</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="container">
                                <form method="POST" action="{{ route('visitors.update', $photo_edit->id) }}">
                                    @csrf
                                    @method('put')
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-6" class="padding">
                                            <div id="my_camera"></div>
                                            <br />
                                            <input type=button value="Take Photo" onClick="take_snapshot()">
                                            <input type="hidden" name="v_image" class="image-tag edit-img" id="v_iamge">
                                        </div>
                                        <div class="col-md-4">
                                            <div id="results">View Photo</div>
                                        </div>
                                        <div class="col-md-12 text-right">
                                            <br />
                                            <button style="margin-bottom: 8px;" type="submit"
                                                class="btn btn-info">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

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
