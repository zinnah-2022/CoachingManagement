@extends('backend.admin.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div  class="row">
                                <div class="col-md-8">
                                    <table class="table table-responsive-md table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse( $days as $data)
                                            <tr>
                                                <td>01</td>
                                                <td>{{$data->name}}</td>
                                                <td>
                                                    <a href="#" onclick="deleteday('{{$data->id}}')" class="btn btn-info btn-sm"><i class="fa fa-trash"></i> </a>
                                                </td>
                                            </tr>
                                        @empty
                                        @endforelse

                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-4 text-center">
                                    <form action="{{route('daymake.store')}}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text"  class="form-control" name="stm" id="stm" placeholder="Enter Day">
                                        </div>
                                        <button type="submit" id="submit" class="btn btn-info btn-sm">Submit</button>
                                    </form>
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
    <script>
        function deleteday(id) {
            var url = "/dashboard/daymake/" + id;
            axios.delete(url).then(function (response) {
                console.log(response);

            })
                .catch(function (error) {
                    console.log(error);
                });

        }
    </script>
@endsection
