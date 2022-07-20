@extends('layouts.admin')
@section('title') Dashboard @endsection
@section('dashboard') active @endsection

@section('main-content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                 <h3>{{ $totalUser }}</h3>
                                <p>User</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-user" aria-hidden="true" style="font-size:50px !important;color:#fff;"></i>
                            </div>
{{--                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                 <h3>{{ $totalDept }}</h3>
                                <p>Department</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-university" aria-hidden="true" style="font-size:50px !important;color:#fff;"></i>
                            </div>
{{--                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <!-- Transaction -->
                        <div class="card ">
                            <div class="card-header border-0 bg-gradient-info">
                                <h3 class="card-title">
                                    <i class="fas fa-check"></i>
                                    Last 10 visitors
                                </h3>
                                <!-- tools card -->
                                <div class="card-tools">
                                    <!-- button with a dropdown -->
                                    <button type="button" class="btn btn-info btn-sm" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-info btn-sm" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                                <!-- /. tools -->
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
                                        <th>Visiting reason</th>
                                        <th>Visiting date</th>
                                        <th>Entry time</th>
                                        <th>Exit time</th>
                                        <th>Print card</th>
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

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div> <!-- end card -->
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
