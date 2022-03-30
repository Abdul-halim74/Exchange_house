@extends('layouts.admin')
@section('title') Transaction authorize @endsection
@section('t_info')has-treeview menu-open @endsection
@section('t_info_a') active @endsection
@section('t_auth') active @endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('support_files/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('support_files/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('support_files/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Transaction auth</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Transaction</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        @if(Session::get('message1'))
            <input type="hidden" value="{{Session::get('message')}}" id="print">
            <script>
                if(confirm('Do you want print')) {
                    alert('{{ Session::get('message1') }}')
                    var printId = $('#print').val();
                    window.open('/exchange-house/admin/transaction-voucher-print/'+printId)
                }
            </script>
        @endif

        @if(Session::get('message2'))
            <script>alert('{{ Session::get('message2') }}')</script>
        @endif

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Transaction</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Sender name</th>
                                    <th>Sender contact</th>
                                    <th>Sender country</th>
                                    <th>Sender amount</th>
                                    <th>Sender currency</th>
                                    <th>Sending cost</th>
                                    <th>Order number</th>
                                    <th>Receiver name</th>
                                    <th>Receiver contact</th>
                                    <th>Receiver country</th>
                                    <th>Received currency</th>
                                    <th>Received amount</th>
                                    <th>Entry by</th>
                                    <th>Entry date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i = 1)
                                @foreach($transactions as $transaction)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $transaction->sender_name }}</td>
                                        <td>{{ $transaction->sender_contact }}</td>
                                        <td>{{ $transaction->sender_country }}</td>
                                        <td>{{ $transaction->originated_amount }}</td>
                                        <td>{{ $transaction->sCurrency->name }}</td>
                                        <td>{{ $transaction->originated_customer_fee }} {{ $transaction->sCurrency->name }}</td>
                                        <td>{{ $transaction->order_no }}</td>
                                        <td>{{ $transaction->receiver_name }}</td>
                                        <td>{{ $transaction->receiver_contact }}</td>
                                        <td>{{ $transaction->country->name }}</td>
                                        <td>{{ $transaction->currency->name }}</td>
                                        <td>{{ $transaction->disbursement_amount }}</td>
                                        <td>{{ $transaction->entry_by }}</td>
                                        <td>{{ $transaction->entry_date }}</td>
                                        <td>
                                            @isset(auth()->user()->role->permission['permission']['remittance.decline']['decline'])
                                                <a href="{{ url('/admin/transaction-declined/'.$transaction->id) }}" class="btn btn-sm btn-danger" title="Declined"> <i class="fas fa-times"></i> Declined</a>
                                            @endisset
                                            @isset(auth()->user()->role->permission['permission']['remittance.auth']['auth'])
                                                <a href="{{ url('/admin/transaction-authorized/'.$transaction->id) }}" class="btn btn-sm custom_btn" title="Authorized"> <i class="fas fa-check"></i> Authorized</a>
                                            @endisset
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Sl</th>
                                    <th>Sender name</th>
                                    <th>Sender contact</th>
                                    <th>Sender country</th>
                                    <th>Sender amount</th>
                                    <th>Sender currency</th>
                                    <th>Sending cost</th>
                                    <th>Order number</th>
                                    <th>Receiver name</th>
                                    <th>Receiver contact</th>
                                    <th>Receiver country</th>
                                    <th>Received currency</th>
                                    <th>Received amount</th>
                                    <th>Entry by</th>
                                    <th>Entry date</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('support_files/plugins/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('support_files/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('support_files/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('support_files/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('support_files/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('support_files/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('support_files/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('support_files/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('support_files/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('support_files/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('support_files/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('support_files/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('support_files/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <script>
        $(function () {
            $("#example1").DataTable({
                destroy: true,
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": [ "csv", "excel"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endpush
