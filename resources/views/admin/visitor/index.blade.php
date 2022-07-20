@extends('layouts.admin')
@section('visitor') menu-open @endsection
@section('title') Visitor list @endsection
@section('all-visitor') active @endsection
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
                                        <th>Visiting name</th>
                                        <th>Visitor name</th>
                                        <th>Visitor email</th>
                                        <th>Visitor phone no.</th>
                                        <th>Visitor Image</th>
                                        <th>Visiting reason</th>
                                        <th>Visiting date</th>
                                        <th>Entry time</th>
                                        <th>Exit time</th>
                                        <th>Print card</th>
                                        <th>Capture Image</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($visitors as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->v_name }}</td>
                                            <td>{{ $item->v_email }}</td>
                                            <td>{{ $item->v_contact }}</td>
                                            <td>
                                                @if ($item->v_image !== null)
                                                <img style="width: 80px;height: 80px" src="{{asset($item->v_image)}}" alt="{{$item->v_image}}">
                                                @else  
                                                <img style="width: 80px;height: 80px" src="{{asset('img/bankLogo/One_bank.jpg')}}" alt="{{$item->v_image}}"> 
                                                @endif
                                                
                                            </td>
                                            <td>{{ $item->visiting_reason }}</td>
                                            <td>
                                                @php
                                                    $time = date("g:i A", strtotime($item->v_start_time));
                                                @endphp
                                                {{ $time }}
                                            </td>
                                            <td>{{ $item->visitingDay }}</td>
                                            <td>
                                                @if($item->v_end_time != null)
                                                    @php
                                                        $eTime = date("g:i A", strtotime($item->v_end_time));
                                                    @endphp
                                                    {{ $eTime }}
                                                @else
                                                    <a href="{{ url('/admin/visitor-exit-time/'.$item->v_id) }}" class="btn btn-sm custom_btn" title="Exit"><i class="fas fa-walking"></i> Exit</a>
                                                @endif
                                            </td>
                                            <td>
                                                @if($item->voucher_print == 0)
                                                    <a href="{{ url('/admin/generate-card/'.$item->v_id) }}" class="btn btn-sm custom_btn" title="Print"><i class="fas fa-print"></i> Print</a>
                                                @else
                                                    <h5>Printed</h5>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->v_image == null)
                                                <a href="{{ route('visitorPhoto', $item->v_id) }}"
                                                    class="btn btn-sm  custom_btn" title="editPhoto">Photo</a>
                                                    @else
                                                    <h5>Already exist.</h5>
                                                @endif

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Visiting name</th>
                                        <th>Visitor name</th>
                                        <th>Visitor email</th>
                                        <th>Visitor phone no.</th>
                                        <th>Visitor Image</th>
                                        <th>Visiting reason</th>
                                        <th>Visiting date</th>
                                        <th>Entry time</th>
                                        <th>Exit time</th>
                                        <th>Print card</th>
                                        <th>Capture Image</th>
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

        let clicks = 0;
        function countClick() {
            clicks = clicks + 1;
            document.getElementById("clicks").innerHTML = clicks;
            if(clicks == 1) {
                //We will disable the button
                document.getElementById('myBtn').disabled = true;
                document.getElementById('myBtn').innerHTML = '<p>Print complete</p>'
            }
        };


        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["csv", "excel"]
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

