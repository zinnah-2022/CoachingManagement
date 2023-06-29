@extends('backend.admin.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="example" class="table table-responsive-md table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Admission Date</th>
                                    <th>Pay date</th>
                                    <th>Time</th>
                                    <th>Image</th>
                                    <th>Fee</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($paid as $index => $data)
                                    <tr>
                                        <td>{{$data->user_id}}</td>
                                        <td>{{$data->name}}</td>
                                        <td>{{ \Carbon\Carbon::parse($data->date)->format('d-F-y')}}</td>
                                        <td>{{ \Carbon\Carbon::parse($data->pay_date)->format('d-F-y')}}</td>
                                        <td>{{$data->time}}</td>
                                        <td align="center">
                                            <img src="{{asset('public/user/image/'.$data->image)}}" width="40px">
                                        </td>
                                        <td>{{$data->amount}}</td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-trash"> DELETE</i> </a>
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center"> No Data Found</td>
                                    </tr>
                                @endforelse
                                </tbody>
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
@endsection
