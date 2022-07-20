@extends('layouts.admin')
@section('settings') menu-open @endsection
@section('title') New user @endsection
@section('new_user') active @endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('support_files/plugins/bs-stepper/css/bs-stepper.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('support_files/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('support_files/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection
@section('main-content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">User Create</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Create</li>
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
                    <div class="col-md-8">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title font-weight-bold">User create</h3>
                            </div>

                            <form method="POST" action="{{ route('admin.user_store') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Name <span class="text-red">*</span></label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter user name"required
                                             />
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Email <span class="text-red">*</span></label>
                                        <input type="email" name="email" class="form-control"
                                            placeholder="Enter user email" required />
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Password <span class="text-red">*</span></label>
                                        <input type="text" name="password" class="form-control"
                                            placeholder="Enter user password" required />
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Position<span class="text-red">*</span></label>
                                        <input type="text" name="position" class="form-control"
                                            placeholder="Enter user position" required />
                                        @error('position')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Contact Number <span class="text-red">*</span></label>
                                        <input type="text" name="contact" class="form-control"
                                            placeholder="Enter user contact number" required />
                                        @error('contact')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Branch ID <span class="text-red">*</span></label>
                                        <select name="branch_id" id="branch_id" class="form-control select2bs4" required>
                                            <option value="">--select--</option>
                                            @foreach ($branches as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('branch_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Department ID <span class="text-red">*</span></label>
                                        <select name="department_id" id="department_id" class="form-control select2bs4" required>
                                            <option value="">--select--</option>
                                            @foreach ($departments as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('department_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Role <span class="text-red">*</span></label>
                                        <select name="role_id" id="role_id" class="form-control select2bs4" required>
                                            <option value="">--select--</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('role_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- <div class="form-group">
                                        <label>User ID <span class="text-red">*</span></label>
                                        <input type="text" name="user_id" class="form-control" placeholder="Enter user id"
                                            required />
                                        @error('user_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div> --}}

                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">Create User</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('support_files/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })
    </script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select').select2({
                theme: 'bootstrap4'
            })
        })
    </script>
@endsection
