@extends('layouts.admin')
@section('profileSetting')
    menu-open
@endsection
@section('title')
    User Profile
@endsection
@section('user_profile')
    active
@endsection
@section('styles')
    <style>
        .card-primary.card-outline {
            border-top: 3px solid #ff002b;
        }

        .nav-pills .nav-link {
            border-radius: 5px !important;
        }

    </style>
@endsection
@section('main-content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">User Profile</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">User Profile</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        
        @if (Session::get('message'))
            <script>
                alert('{{ Session::get('message') }}')
            </script>
        @endif
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                        src="{{ asset('img/bankLogo/One_bank.jpg') }}" alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

                                <p class="text-muted text-center">{{ Auth::user()->position }}</p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Branch</b> <a class="float-right">{{ Auth::user()->branch->name }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Department</b> <a
                                            class="float-right">{{ Auth::user()->department->name }}</a></a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#about"
                                            data-toggle="tab">About</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#password"
                                            data-toggle="tab">Password</a></li>

                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class=" active tab-pane" id="about">
                                       
                                        <form class="form-horizontal" method="Post"
                                            action="{{ route('userProfileUpdate') }}">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-3 col-form-label">Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="name" class="form-control" id="inputName"
                                                        value="{{ Auth::user()->name }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control" id="inputEmail" name="email"
                                                        value="{{ Auth::user()->email }}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName2" class="col-sm-3 col-form-label">Contact
                                                    Number</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputName2" name="contact"
                                                        value="{{ Auth::user()->contact }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-info">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class=" tab-pane" id="password">
                                      
                                        <form class="form-horizontal" method="POST" action="{{ route('UserPassword') }}">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-3 col-form-label">Old Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control" id="inputName"
                                                        name="old_password">
                                                </div>
                                                @error('old_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail" class="col-sm-3 col-form-label">New Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control" id="inputEmail"
                                                        name="new_password">
                                                </div>
                                                @error('new_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName2" class="col-sm-3 col-form-label">Confirmation
                                                    Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control" id="inputName2"
                                                        name="password_confirmation">
                                                </div>
                                                @error('password_confirmation')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-info">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
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
