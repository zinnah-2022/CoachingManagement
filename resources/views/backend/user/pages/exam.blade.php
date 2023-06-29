@extends('backend.user.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-center">Online Exam</h5>
                            <div  class="row">
                                <div class="col-md-12">
                                    <table class="table table-responsive-md table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>Subject</th>
                                            <th>Lession</th>
                                            <th class="col-4">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($examDate as $data)
                                            <tr>
                                                <td>{{$data->subject}}</td>
                                                <td>{{$data->lessen}}</td>
                                                <td>
                                                    <a href="{{$data->question}}" target="_blank" class="btn btn-info btn-sm">Click Here </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <td colspan="3" class="text-center">Exam Not Found</td>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>

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
