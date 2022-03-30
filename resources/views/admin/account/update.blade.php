@extends('layouts.admin')
@section('title') Update accout @endsection
@section('a_info')has-treeview menu-open @endsection
@section('a_info_a') active @endsection
@section('a_update') active @endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('support_files/plugins/bs-stepper/css/bs-stepper.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('support_files/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('support_files/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush

@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Customer Update</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Update</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        @if(Session::get('message'))
            <script>alert('{{ Session::get('message') }}')</script>
        @endif

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title">Search <span class="font-weight-bold">{{ $search }}</span></h3>
                            </div>
                        </div>

                        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.account_update') }}">
                            @csrf
                            <input type="hidden" name="account_id" value="{{ $account->id }}">
                            <input type="hidden" name="account_no" value="{{ $account->account_no }}">

                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title font-weight-bold">Customer Information</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th width="25%">Customer name</th>
                                                    <td width="25%">{{ $account->customer->name }}</td>
                                                    <th width="25%">Customer type</th>
                                                    <td width="25%">{{ $account->customer->customer_type }}</td>
                                                </tr>
                                                @if($account->customer->customer_type == 'Individual')
                                                <tr>
                                                    <th width="25%">Date of birth</th>
                                                    <td width="25%">{{ $account->customer->dob }}</td>
                                                    <th width="25%">Place of birth</th>
                                                    <td width="25%">{{ $account->customer->place_of_birth }}</td>
                                                </tr>
                                            </table>
                                            <table  class="table table-bordered">
                                                <tr>
                                                    <th>Customer gender</th>
                                                    <td>{{ $account->customer->gender }}</td>
                                                    <th>Marital status</th>
                                                    <td>{{ $account->customer->marital_status }}</td>
                                                    <th>Customer occupation</th>
                                                    <td>{{ $account->customer->occupation_id == ''? '' : $account->customer->occupation->name }}</td>
                                                </tr>
                                            </table>
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th width="25%">Father name</th>
                                                    <td width="25%">{{ $account->customer->father_name }}</td>
                                                    <th width="25%">Mother name</th>
                                                    <td width="25%">{{ $account->customer->mother_name }}</td>
                                                </tr>
                                                <tr>
                                                    <th width="25%">Present address</th>
                                                    <td width="25%">{{ $account->customer->present_address }}</td>
                                                    <th width="25%">Permanent address</th>
                                                    <td width="25%">{{ $account->customer->permanent_address }}</td>
                                                </tr>
                                                @endif
                                                <tr>
                                                    <th width="25%">Customer Id type</th>
                                                    <td width="25%">{{ $account->customer->identification->name }}</td>
                                                    <th width="25%">Id number</th>
                                                    <td width="25%">{{ $account->customer->id_number }}</td>
                                                </tr>
                                                <tr>
                                                    <th width="25%">Phone number</th>
                                                    <td width="25%">{{ $account->customer->contact_number }}</td>
                                                    <th width="25%">Email address</th>
                                                    <td width="25%">{{ $account->customer->email }}</td>
                                                </tr>
                                                <tr>
                                                    <th width="25%">Customer country</th>
                                                    <td width="25%">{{ $account->customer->country->name }}</td>
                                                    <th width="25%">Customer city</th>
                                                    <td width="25%">{{ $account->customer->city->name }}</td>
                                                </tr>
                                            </table>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Customer signature old</label> <br>
                                                <img src="{{ asset($account->signature_image) }}" alt="" width="200px">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Customer signature</label>
                                                <input type="file" name="signature_image" class="form-control" placeholder="Customer signature" />
                                                @error('signature_image')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title font-weight-bold">Nominee Information</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nominee name</label>
                                                <input type="text" value="{{ $account->nominee_name }}" name="nominee_name" class="form-control" placeholder="Enter nominee name" />
                                                @error('nominee_name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nominee NID number </label>
                                                <input type="text" value="{{ $account->nominee_nid_number }}" name="nominee_nid_number" class="form-control" placeholder="Enter NID number" />
                                                @error('nominee_nid_number')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Relation with nominee </label>
                                                <input type="text" value="{{ $account->relation_with_nominee }}" name="relation_with_nominee" class="form-control" placeholder="Enter customer relation with nominee" />
                                                @error('relation_with_nominee')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Nominee date of birth</label>
                                                <input type="date" value="{{ $account->nominee_dob }}" name="nominee_dob" class="form-control" placeholder="Enter nominee date of birth" />
                                                @error('nominee_dob')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Nominee contact no</label>
                                                <input type="text" value="{{ $account->nominee_contact_no }}" name="nominee_contact_no" class="form-control" placeholder="Enter nominee contact number" />
                                                @error('nominee_contact_no')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nominee father name</label>
                                                <input type="text" value="{{ $account->nominee_father_name }}" name="nominee_father_name" class="form-control" placeholder="Enter nominee father name" />
                                                @error('nominee_father_name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> Nominee mother name</label>
                                                <input type="text" value="{{ $account->nominee_mother_name }}" name="nominee_mother_name" class="form-control" placeholder="Enter nominee mother name" />
                                                @error('nominee_mother_name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nominee address </label>
                                                <textarea name="nominee_address" class="form-control" rows="3" placeholder="Enter nominee address">{{ $account->nominee_address }}</textarea>
                                                @error('nominee_address')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title font-weight-bold">Transaction Profile</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Account type</label>
                                                <select name="account_type_id" class="form-control select2bs4" style="width: 100%;" required >
                                                    <option label="Select">--Select--</option>
                                                    @foreach($account_types as $account_type)
                                                        <option value="{{ $account_type->id }}" {{$account->account_type_id == $account_type->id ? 'selected' : '' }}>{{ $account_type->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('account_type_id')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Interest rate</label>
                                                <select name="interest_rate" class="form-control select2bs4" style="width: 100%;" required >
                                                    <option label="Select">--Select--</option>
                                                    <option value="{{ $account->interest_rate }}">{{ $account->interest_rate }}</option>
                                                </select>
                                                @error('interest_rate')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Probably monthly income</label>
                                                <input value="{{ $account->probably_monthly_income }}" name="probably_monthly_income" type="text" class="form-control" placeholder="Enter probably monthly income" required />
                                                @error('probably_monthly_income')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Probably monthly transaction</label>
                                                <input value="{{ $account->probably_monthly_transaction }}" type="text" name="probably_monthly_transaction" class="form-control" placeholder="Enter probably monthly transaction" required />
                                                @error('probably_monthly_transaction')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn custom_btn">Create Account</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="account_type_id"]').on('change', function(){
                var id = $(this).val();
                if(id) {
                    $.ajax({
                        url: "{{  url('/admin/get-rate') }}/"+id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            var d =$('select[name="interest_rate"]').empty();
                            $.each(data, function(key, value)
                            {
                                $('select[name="interest_rate"]').append('<option value="'+ value.interest_rate +'">' + value.interest_rate + '</option>');
                            });
                        },
                    });
                } else
                {
                    alert('danger');
                }
            });
        });
    </script>
@endpush

