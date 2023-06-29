@extends('backend.admin.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <button type="button" class="btn btn-default" data-toggle="modal"
                                    data-target="#modal-default">
                                {{$quizes->name}}
                            </button>
                            <div class="card-body">
                                <table class="table table-responsive-md  table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th class="col-xs-1">SL</th>
                                        <th class="col-xs-offset-2">Name</th>
                                        <th class="col-xs-1">Time</th>
                                        <th class="col-xs-1">Num of Question</th>
                                        <th class="col-xs-1">Status</th>
                                        <th class="col-3">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($quizzesName as $index => $data)
                                        <tr>
                                            <td>{{$index + 1}}</td>
                                            <td>{{$data->quiz_name}}</td>
                                            <td>{{$data->quiz_time}}</td>
                                            <td>{{$data->quesion->count()}}</td>
                                            <td><input type="checkbox" name="status" class="quiz-status"
                                                       data_id="{{$data->id}}" {{$data->status=='1'?'checked':''}}></td>
                                            <td>
                                                <a href="{{route('showLesson',$data->id)}}"
                                                   class="btn btn-sm btn-secondary"><i class="fa fa-pen-nib"></i> </a>
                                                <a href="{{route('viewMCW',$data->id)}}"
                                                   class="btn btn-sm btn-info"><i class="fa fa-eye"></i> </a>
                                                <a href="{{route('QPrint',$data->id)}}"
                                                   class="btn btn-sm btn-success"><i class="fa fa-print"></i> </a>

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


                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-md">অধ্যায় তৈরি করুন</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-body ">
                                    <form action="{{route('lessonView',$quizes->id )}}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12" data-select2-id="30">
                                                <div class="form-group">
                                                    <select class="form-control select2 select2-hidden-accessible"
                                                            name="subject_id" id="subject_id"
                                                            style="width: 100%;" data-select2-id="1" tabindex="-1"
                                                            aria-hidden="true">
                                                        <option value="{{$quizes->id}}">{{$quizes->name}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-2">
                                                <div class="input-group">
                                                    <input type="text" name="quiz_name" class="form-control" id="name"
                                                           aria-describedby="basic-addon3" placeholder="অধ্যায়ের নাম..">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <input type="text" name="quiz_time" class="form-control"
                                                           id="lesson_time"
                                                           aria-describedby="basic-addon3" placeholder="সময..">
                                                </div>

                                            </div>
                                            <div class="col-md-3 mt-5">
                                                <button type="submit" class="btn btn-info btn-md">submit</button>
                                            </div>
                                            <!-- /.col -->
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->
                                    </form>


                                    <!-- /.row -->
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </section>

@endsection
