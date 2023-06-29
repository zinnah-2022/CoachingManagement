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
                                        @forelse($maketimes as $data)
                                            <tr>
                                                <td>o1</td>
                                                <td>{{$data->time}}</td>
                                                <td>
                                                    <a href="#" onclick="deletetime('{{$data->id}}')" class="btn btn-info btn-sm"><i class="fa fa-trash"></i> </a>
                                                </td>
                                            </tr>

                                        @empty
                                        @endforelse

                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-4 text-center">
                                    <form method="POST" action="{{route('maketime.store')}}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text"  class="form-control" name="tt" id="tt" placeholder="Enter time">
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
        function deletetime(id) {
            var url = "/dashboard/maketime/" + id;
            axios.delete(url).then(function (response) {
                console.log(response);

            })
                .catch(function (error) {
                    console.log(error);
                });

        }
    </script>







@endsection
