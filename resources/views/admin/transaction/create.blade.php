@extends('layouts.admin')
@section('title') Transaction create @endsection
@section('t_info')has-treeview menu-open @endsection
@section('t_info_a') active @endsection
@section('t_add') active @endsection

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
                        <h1 class="m-0">Transaction Information</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>

                            <li class="breadcrumb-item active">Transaction Information</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        @if(Session::get('message'))
            <script>alert('{{ Session::get('message') }}')</script>
        @endif
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.transaction_store') }}">
                            @csrf
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title font-weight-bold">Sender Information</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th width="25%">Sender name</th>
                                                    <td width="25%">{{ $dataNew->name }}</td>
                                                    <input type="hidden" name="sender_name" value="{{ $dataNew->name }}">
                                                </tr>
                                            </table>
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th width="25%">Phone number</th>
                                                    <td width="25%">{{ $dataNew->contact_number }}</td>
                                                    <input type="hidden" name="sender_contact" value="{{ $dataNew->contact_number }}">
                                                    <th width="25%">Email address</th>
                                                    <td width="25%">{{ $dataNew->email }}</td>
                                                    <input type="hidden" name="sender_email" value="{{ $dataNew->email }}">
                                                </tr>
                                            </table>
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th width="15%">Sender country</th>
                                                    <td width="20%">{{ $dataNew->country }}</td>
                                                    <input type="hidden" name="sender_country" value="{{ $dataNew->country }}">
                                                    <th width="10%">Sender city</th>
                                                    <td width="15%">{{ $dataNew->city }}</td>
                                                    <input type="hidden" name="sender_sub_country_level_1" value="{{ $dataNew->city }}">
                                                    <th width="17%">Present address</th>
                                                    <td width="23%">{{ $dataNew->present_address == '' ? $dataNew->company_address : $dataNew->present_address }}</td>
                                                    <input type="hidden" name="sender_address_line" value="{{ $dataNew->present_address == '' ? $dataNew->company_address : $dataNew->present_address }}">
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title font-weight-bold">Receiver Information</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <b> Receiver Basic Information </b><hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Receiver name <span class="text-red">*</span></label>
                                                        <input type="text" name="receiver_name" class="form-control" placeholder="Enter receiver name" required />
                                                        @error('receiver_name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Receiver Country <span class="text-red">*</span></label>
                                                        <select name="receiver_country" id="receiver_country" onchange="get_sub_country(this.value); receiver_bank_from_country(this.value); get_agent_bank(this.value);" class="form-control select2bs4" required>
                                                            <option value="">--select--</option>
                                                            @foreach($countries as $single_country_info)
                                                                <option value="{{$single_country_info->id}}">{{$single_country_info->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('receiver_country')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Receiver Sub Country/Division <span class="text-red">*</span></label>
                                                        <select name="receiver_sub_country" id="receiver_sub_country" class="form-control select2bs4" onchange="show_city(this.value);" required>
                                                            <option value="">--select--</option>
                                                        </select>
                                                        @error('receiver_sub_country')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Receiver City/District <span class="text-red">*</span></label>
                                                        <select name="receiver_city" id="receiver_city" class="form-control select2bs4" style="width: 100%;" required>
                                                            <option value="">--select--</option>
                                                        </select>
                                                        @error('receiver_city')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Receiver Address <span class="text-red">*</span></label>
                                                        <textarea name="receiver_address" id="receiver_address" class="form-control" placeholder="Enter receiver address" rows="3" required></textarea>
                                                        @error('receiver_address')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Receiver Contact Number <span class="text-red">*</span></label>
                                                        <input type="text" name="receiver_contact" class="form-control" placeholder="Enter receiver contact number" required>
                                                        @error('receiver_contact')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group" >
                                                        <label>Sender & Receiver Relation <span class="text-red">*</span></label>
                                                        <input type="text" name="sender_receiver_relation" class="form-control" placeholder="Relation between sender and receiver" required>
                                                        @error('sender_receiver_relation')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-5">
                                            <b> Receiver Account Information </b><hr>

                                            <div class="col-md-12">
                                                <div class="form-group" >
                                                    <label>Purpose of Sending <span class="text-red">*</span></label>
                                                    <input type="text" name="purpose_of_sending" class="form-control" placeholder="Enter purpose of sending money" required>
                                                    @error('purpose_of_sending')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group" >
                                                    <label>Payment mode <span class="text-red">*</span></label>
                                                    <select name="payment_mode" id="payment_mode" class="form-control" required>
                                                        <option value="">-select-</option>
                                                        <option value="1">Cash pickup</option>
                                                        <option value="2">Bank deposit</option>
                                                    </select>
                                                    @error('payment_mode')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group" >
                                                    <label>Receiver bank</label>
                                                    <select name="receiver_bank" id="receiver_bank" class="form-control select2bs4">
                                                        <option value="">-select-</option>
                                                    </select>
                                                    @error('receiver_bank')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group" >
                                                    <label>Receiver bank branch</label>
                                                    <select name="receiver_bank_branch" id="receiver_bank_branch" class="form-control select2bs4">
                                                        <option value="">-select-</option>
                                                    </select>
                                                    @error('receiver_bank_branch')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group" >
                                                    <label>Receiver Account Number</label>
                                                    <input type="text" class="form-control" name="receiver_acc_no" id="receiver_acc_no" placeholder="Receiver account number">
                                                    @error('receiver_acc_no')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Remarks</label>
                                                    <textarea name="remarks" id="remarks" class="form-control" placeholder="Add remarks" rows="3"></textarea>
                                                    @error('remarks')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5">
                                    <div class="card card-info">
                                        <div class="card-header">
                                            <h3 class="card-title font-weight-bold">Amount information</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Agent Bank Name <span class="text-red">*</span></label>
                                                        <select name="agent_bank_name" id="agent_bank_name" class="form-control select2" onchange="data_reset3()">
                                                            <option value="">--select--</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Total Amount with sending cost</label>
                                                        <input type="text" name="entry_amount" id="entry_amount" class="form-control" readonly>
                                                        @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-7">
                                    <div class="card card-info">
                                        <div class="card-header">
                                            <h3 class="card-title font-weight-bold">Calculator</h3>
                                        </div>

                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Send Currency <span class="text-red">*</span></label>
                                                        <select name="from_currency" id="from_currency" class="form-control select2bs4" onchange="data_reset();">
                                                            <option value="">--select--</option>
                                                            @foreach($currencyInfo as $single_currency_info)
                                                                <option value="{{ $single_currency_info->id}}"> {{ $single_currency_info->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('from_currency')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Receive Currency <span class="text-red">*</span></label>
                                                        <select name="to_currency" id="to_currency" class="form-control select2bs4" onchange="data_reset2();">
                                                            <option value="0" >Select</option>
                                                            @foreach($currencyInfo as $single_currency_info)
                                                                <option value="{{ $single_currency_info->id}}"> {{ $single_currency_info->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('to_currency')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Send Amount <span class="text-red">*</span></label>
                                                        <input type="text" name="from_amount" id="from_amount" class="form-control" onkeyup="showAmount(); TotalCost()">
                                                        @error('from_amount')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Receive Amount </label>
                                                        <input type="text" name="to_amount" id="to_amount" class="form-control" readonly>
                                                        @error('to_amount')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn custom_btn">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </section>
    </div>



@endsection

@push('scripts')
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
        //Get sub country based on country
        function get_sub_country(country_id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
            });

            var formData = {
                country_id:country_id
            };

            $.ajax({
                type: 'POST',
                url: "{{ url('/admin/transaction-get-sub-country') }}",
                data: formData,

                success: function(data) {
                    console.log(data);
                    $("#receiver_sub_country").html(data);
                },
            });
        }

        //Get city based on sub country
        function show_city(subcountry_id){
            var receiver_country_id = $("#receiver_country").val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
            });

            var formData = {
                receiver_country_id:receiver_country_id,
                subcountry_id:subcountry_id
            };

            $.ajax({
                type: 'POST',
                url: "{{ url('/admin/transaction-get-city') }}",
                data: formData,
                success: function(data) {
                    $("#receiver_city").html(data);
                },
            });
        }

        //For the calculation
        function showAmount() {
            var from_amount = $("#from_amount").val();
            var from_currency = $("#from_currency").val();
            var to_currency = $("#to_currency").val();
            var agent_bank_name = $("#agent_bank_name").val();
            var receiver_country = $("#receiver_country").val();
            //alert(from_currency + to_currency + agent_bank_name + receiver_country);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
            });

            $.ajax({
                type:'POST',
                url:"{{ route('admin.rate-calculation') }}",
                data:{
                    from_currency:from_currency,
                    to_currency:to_currency,
                    from_amount:from_amount,
                    agent_bank_name:agent_bank_name,
                    receiver_country:receiver_country,
                },
                success:function(data){
                    $("#to_amount").val(data);
                    //$("#entry_amount").val(data);
                }
            });
        }

        //For the total cost
        function TotalCost() {
            var from_amount = $("#from_amount").val();
            var from_currency = $("#from_currency").val();
            var receiver_country = $("#receiver_country").val();
            //alert(from_currency + + receiver_country);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
            });

            $.ajax({
                type:'POST',
                url:"{{ route('admin.total_cost') }}",
                data:{
                    from_currency:from_currency,
                    from_amount:from_amount,
                    receiver_country:receiver_country,
                },
                success:function(data){
                    $("#entry_amount").val(data);
                }
            });
        }

        //Get bank name based on country
        function receiver_bank_from_country(id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
            });

            var formData = {
                id:id
            };

            $.ajax({
                type: 'POST',
                url: "{{ url('/admin/transaction-get-receiver-bank-from-country') }}",
                data: formData,

                success: function(data) {
                    $("#receiver_bank").html(data);
                },
            });
        }

        //Get bank branch based on bank
        $("#receiver_bank").on("change", function() {
            var bank_id = $("#receiver_bank").val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
            });

            var formData = {
                bank_id:bank_id
            };
            $.ajax({
                type: 'POST',
                url: "{{ url('/admin/transaction-get-receiver-bank-branch-from-country') }}",
                data: formData,

                success: function(data) {
                    $("#receiver_bank_branch").html(data);
                },
            });
        });

        //Get agent name based on country
        function get_agent_bank(country_id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
            });

            var formData = {
                country_id:country_id
            };

            $.ajax({
                type: 'POST',
                url: "{{ url('/admin/transaction-get-agent-bank-name-from-country') }}",
                data: formData,
                success: function(data) {
                    $("#agent_bank_name").html(data);
                },
            });
        }
    </script>

    <script>
        function data_reset() {
            $("#from_amount").val('');
            $("#to_amount").val('');
            $("#entry_amount").val('');

            $("#to_currency option[value='0']").remove();
            $("#to_currency").prepend('<option value="0" selected >Select</option>');
        }
    </script>

    <script>
        function data_reset2() {
            $("#from_amount").val('');
            $("#to_amount").val('');
            $("#entry_amount").val('');
        }
    </script>

    <script>
        function data_reset3() {
            $("#from_amount").val('');
            $("#to_amount").val('');
            $("#entry_amount").val('');

            $("#from_currency option[value='0']").remove();
            $("#from_currency").prepend('<option value="0" selected >Select</option>');

            $("#to_currency option[value='0']").remove();
            $("#to_currency").prepend('<option value="0" selected >Select</option>');
        }
    </script>
@endpush
