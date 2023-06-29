@extends('backend.user.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info py-2">
                        <div class="inner">
                            <h4>{{ \Carbon\Carbon::parse($authuser->date)->format('d-M-y')}}</h4>

                            <p>ADMISSION DATE</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">01 <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$authuser->month}}<sup style="font-size: 20px">MONTH</sup></h3>

                            <p>COUNT OF MONTH</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">02 <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{$paid->count()*500}}</h3>

                            <p>TOTAL PAYMENT</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">03 <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{$unpaid->count()*500}}</h3>

                            <p> TOTAL UNPAID</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">04 <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">Unpaid Fee Overview</h3>
                            <div class="card-tools">
                                <a href="#" class="btn btn-tool btn-sm">
                                    <i class="fas fa-download"></i>
                                </a>
                                <a href="#" class="btn btn-tool btn-sm">
                                    <i class="fas fa-bars"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-valign-middle">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>FEE</th>
                                    <th>MONTH</th>
                                    <th>STATUS</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($unpaid as $index=>$data)
                                <tr>
                                    <td>{{$index +1}}</td>
                                    <td>{{$data->amount}}</td>
                                    <td>{{ \Carbon\Carbon::parse($data->unpaid_date)->format('d-F-y')}}</td>
                                    <td>
                                        <span class="badge bg-danger P-2">UNPAID</span>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">No Data View</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col-md-6 -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">Paid Fee Overview</h3>
                            <div class="card-tools">
                                <a href="#" class="btn btn-sm btn-tool">
                                    <i class="fas fa-download"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-tool">
                                    <i class="fas fa-bars"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-valign-middle">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>FEE</th>
                                    <th>MONTH</th>
                                    <th>STATUS</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($paid as $index=>$data)
                                    <tr>
                                        <td>{{$index +1}}</td>
                                        <td>{{$data->amount}}</td>
                                        <td>{{ \Carbon\Carbon::parse($data->pay_date)->format('d-F-y')}}</td>
                                        <td>
                                            <span class="badge bg-info P-2">PAID</span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">No Data View</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>

        </div>
    </section>
@endsection
