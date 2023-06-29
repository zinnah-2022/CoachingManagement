@extends('backend.admin.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <button type="button" class="btn btn-default" data-toggle="modal"
                                data-target="#modal-default">
                            {{$Lessen->name}}
                        </button>
                        <div class="card-body">
                            <table id="table" class="table table-responsive-md table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th class="col-4">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($lessens as $index => $data)
                                    <tr>
                                        <td>{{$index + 1}}</td>
                                        <td>{{$data->name}}</td>
                                        <td>
                                            <a href="{{route('question.show', $data->id)}}" class="btn btn-sm btn-secondary"><i class="fa fa-pen-nib"></i> </a>
                                            <a href="{{route('question.edit',$data->id)}}" class="btn btn-sm btn-info"><i class="fa fa-print"></i> </a>
                                            <a href="{{route('qtView',$data->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> </a>
                                            <a href="{{route('qdelete.edit',$data->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </a>
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
                                <div class="card">
                                    <div class="card-body " >
                                        <form action="{{route('lessen.store')}}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12" data-select2-id="30">
                                                    <h5>Lessen Create</h5>
                                                    <div class="form-group">
                                                        <select class="form-control select2 select2-hidden-accessible" name="subject_id" id="subject_id"
                                                                style="width: 100%;" data-select2-id="1" tabindex="-1"
                                                                aria-hidden="true">
                                                            <option value="{{$Lessen->id}}">{{$Lessen->name}}</option>
                                                        </select>
                                                    </div>
                                                    <div class="input-group mb-12 mb-2">
                                                        <input type="text" name="name" class="form-control" id="name"
                                                               aria-describedby="basic-addon3" placeholder="Lessen">
                                                    </div>
                                                    <button type="submit" id="submit"  class="btn btn-info btn-md">submit</button>
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
                            <!-- /.col -->
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </section>
    <script>

        document.getElementById('submit').addEventListener('click', function (e){
            e.preventDefault();
            let subject_id=document.getElementById('subject_id').value
            let name=document.getElementById('name').value
            let allData={
                subject_id:subject_id,
                name:name,
            };
            let url="/dashboard/lessen";
            axios.post(url, allData)
                .then(function (response) {
                    console.log(response);
                    toastr["success"]("Data SuccessFully Insert!");
                    document.getElementById('subject_id').value=""
                    document.getElementById('name').value=""
                   window.location.reload();
                })
                .catch(function (error) {
                    console.log(error);
                });
        })



    </script>








@endsection
