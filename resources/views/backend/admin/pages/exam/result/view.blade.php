@extends('backend.admin.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="text-center">
                                <a href="{{route('indexSubject')}}">Create Quize </a>
                            </h6>
                            <table class="table table-responsive-md table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Batch</th>
                                    <th>Subject</th>
                                    <th>Lesson</th>
                                    <th>Correct</th>
                                    <th>Total</th>
                                    <th>Percentage</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($viewMark as $data)
                                    <tr>
                                        <td>{{$data->user->name}}</td>
                                        <td>{{$data->user->time}}</td>
                                        <td>{{$data->user->subject}}</td>
                                        <td>{{Str::limit($data->quize->quiz_name, 20)}}</td>
                                        <td>{{$data->yes_ans}}</td>
                                        <td>{{$data->total_mark}}</td>
                                        <td>{{number_format(($data->yes_ans*100)/$data->total_mark, 2, '.', ',')}}%</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center"> No Data Found</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                            <div class="d-flex">
                                {!! $viewMark->links() !!}
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
