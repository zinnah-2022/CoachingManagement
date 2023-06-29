@extends('backend.admin.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4>
                                MCQ ADD
                                <small>
                                    <i class="ace-icon fa fa-angle-double-right"></i>
                                    Quiz for front page </small></a>
                            </h4>
                            <table class="table table-responsive-md table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Subject Name</th>
                                    <th class="col-3">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($sbjs as $index => $data)
                                    <tr>
                                        <td>{{$index + 1}}</td>
                                        <td>{{$data->name}}</td>
                                        <td>
                                            <a href="{{route('lessonView', $data->id)}}" class="btn btn-sm btn-primary">Create Lesson</i> </a>
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

    {{--<script>--}}
    {{--    function sendmsms(id){--}}
    {{--            var url = "/dashboard/group/sms/active/"+id;--}}
    {{--            axios.post(url)--}}
    {{--                .then(function (response) {--}}
    {{--                    console.log(response);--}}

    {{--                })--}}
    {{--                .catch(function (error) {--}}
    {{--                    console.log(error);--}}
    {{--                });--}}
    {{--        }--}}

    {{--</script>--}}






@endsection
