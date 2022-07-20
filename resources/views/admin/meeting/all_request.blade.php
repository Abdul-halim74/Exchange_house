@extends('layouts.admin')
@section('meeting_request') menu-open @endsection
@section('title') Visitor list @endsection
@section('all-meeting') active @endsection
@section('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('support_files/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('support_files/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('support_files/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('main-content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Visitor list</h1>
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

        @if (Session::get('message'))
            <script>
                alert('{{ Session::get('message') }}')
            </script>
        @endif

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Visitor details</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Visitor name</th>
                                        <th>Visitor email</th>
                                        <th>Visitor phone no.</th>
                                        <th>Visiting reason</th>
                                        <th>Visiting date</th>
                                        <th>Entry time</th>
                                        <th>Exit time</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($visitors as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->v_name }}</td>
                                            <td>{{ $item->v_email }}</td>
                                            <td>{{ $item->v_contact }}</td>
                                            <td>{{ $item->visiting_reason }}</td>
                                            <td>{{ $item->visitingDay }}</td>
                                            <td>
                                                @php
                                                    $time = date("g:i A", strtotime($item->v_start_time));
                                                @endphp
                                                {{ $time }}
                                            </td>

                                            <td>
                                                @if($item->v_end_time != null)
                                                    @php
                                                        $eTime = date("g:i A", strtotime($item->v_end_time));
                                                    @endphp
                                                    {{ $eTime }}
                                                @else
                                                    <a href="{{ url('/admin/visitor-exit-time/'.$item->v_id) }}" class="btn btn-xs custom_btn" title="Exit"><i class="fas fa-walking"></i> Exit</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Visitor name</th>
                                        <th>Visitor email</th>
                                        <th>Visitor phone no.</th>
                                        <th>Visiting reason</th>
                                        <th>Visiting date</th>
                                        <th>Entry time</th>
                                        <th>Exit time</th>
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
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@section('scripts')
    <!-- DataTables  & Plugins -->
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
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
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
@endsection

