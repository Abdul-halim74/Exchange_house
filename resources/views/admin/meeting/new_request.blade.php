@extends('layouts.admin')
@section('meeting_request') menu-open @endsection
@section('title') Visitor list @endsection
@section('new-meeting') active @endsection
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
                                        <th>Action</th>
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
                                            <td class="btn-group">
                                                @if($item->request_status == '0' )
                                                    <a href="{{ url('/admin/meeting-accept/'.$item->v_id) }}" class="btn btn-xs btn-primary" title="Accept"><i class="fas fa-check"></i> Accept</a>
                                                    <button type="button" data-toggle="modal" data-target="#the-modal" class="btn btn-xs btn-danger ml-2" title="Decline"><i class="fas fa-times"></i> Decline</button>
                                                    <div id="the-modal" class="modal fade" data-backdrop="static">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="{{ route('admin.decline-visitor') }}" method="get">
                                                                    <div class="modal-body">
                                                                        @csrf
                                                                        <input type="hidden" name="vId" value="{{ $item->v_id }}">
                                                                        <label>Please provide the reason to cancel:</label>
                                                                        <textarea name="remarks" rows="3" class="form-control field"></textarea>
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-primary" disabled>Save Changes</button>
                                                                    </div>
                                                                </form>
                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div>
                                                @else
                                                    <button disabled class="btn btn-xs btn-success"><i class="fas fa-check-double"></i> Already Accepted</button>
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


        // var dReason = prompt("Reason for decline");
        // if(dReason == null || dReason == "") {
        //     txt = "No reason provided";
        // }

        $("#the-modal")
            .on("show.bs.modal", function() {
                // When the modal is about to be shown, clear the field
                $(this).find(".field").val("");
                $(this).find(".btn-primary").prop("disabled", true);
            })
            .on("shown.bs.modal", function() {
                // When the modal has been shown, focus the field
                $(this).find(".field").focus();
            })
            .on("hide.bs.modal", function() {
                // When the modal is closed, display the field's value
                display("Done, entered value: " + $(this).find("input").val());
            })
            .find(".field").on("keypress input paste change", function() {
            // When the field's value changes in any way, enable/disable
            // the 'Save Changes' button
            $("#the-modal .btn-primary").prop(
                "disabled",
                $.trim($(this).val()).length == 0
            );
        });

        function display(msg) {
            $("<p>").html(String(msg)).appendTo(document.body);
        }
    </script>
@endsection

