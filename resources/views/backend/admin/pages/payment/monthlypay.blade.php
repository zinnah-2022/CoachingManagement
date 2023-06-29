@extends('backend.admin.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-responsive-md table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Day</th>
                                    <th>Time</th>
                                    <th class="col-3">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($groups as $index => $data)
                                    <tr>
                                        <td>{{$index +1}}</td>
                                        <td>{{$data->day}}</td>
                                        <td>{{$data->time}}</td>
                                        <td>
                                            <a href="{{route('payment',$data->time)}}" class="btn btn-sm btn-primary"><i class="fa fa-eye"> Unpaid Batch</i> </a>
                                        </td>
                                    </tr>
                                @empty
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
