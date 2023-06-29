@extends('backend.admin.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="table" class="table table-responsive-md table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>suject</th>
                                    <th>Lesson</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($classnotes as $index => $data)
                                    <tr>
                                        <td>{{$index + 1}}</td>
                                        <td>{{$data->subject->name}}</td>
                                        <td>{{$data->quize->quiz_name}}</td>
                                        <td>{{Str::limit($data->title, 15)}}</td>
                                        <td>{{Str::limit(strip_tags($data->body), 30)}}</td>
                                        <td>
                                            <a href="{{route('noteUpdate.edit',$data->id)}}" class="btn btn-sm btn-secondary"><i class="fa fa-pen-nib"></i> </a>
                                            <a href="{{route('noteUpdate.show',$data->id)}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> </a>
                                            <a href="#" onclick="deleteNote('{{$data->id}}')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </a>
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
        function deleteNote(id){
            var url='/dashboard/class/notes/' + id;
            axios.delete(url)
                .then(function (res){
                console.log(res);
                window.location.reload()
                    toastr["success"]("Note Delete Successfully!");
            })
                .catch(function (error){
                    console.log(error)
                })
        }
    </script>
@endsection
