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
                                    <th>Question</th>
                                    <th>Option-1</th>
                                    <th>Option-2</th>
                                    <th>Option-3</th>
                                    <th>Option-4</th>
                                    <th class="col-3">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($singleview as $index => $data)
                                    <tr>
                                        <td>{{$index + 1}}</td>
                                        <td>{{$data->title}}</td>
                                        <td>{{$data->option1}}</td>
                                        <td>{{$data->option2}}</td>
                                        <td>{{$data->option3}}</td>
                                        <td>{{$data->option4}}</td>
                                        <td>
                                            <a href="#" onclick="deletesing('{{$data->id}}')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </a>
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
    <script>
        function deletesing(id){
            let url="/dashboard/question/delete/" +id;
            axios.post(url)
                .then(function (response) {
                    console.log(response);
                    toastr["success"]("Data SuccessFully Insert!");

                })
                .catch(function (error) {
                    console.log(error);
                });

        }
    </script>
@endsection
