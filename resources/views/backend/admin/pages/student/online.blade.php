@extends('backend.admin.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div  class="row">
                                <div class="col-md-12">
                                    <table id="example" class="table table-responsive-md table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Subject</th>
                                            <th>Lessen</th>
                                            <th>Day</th>
                                            <th>Time</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($exams as $data)
                                            <tr>
                                                <td>01</td>
                                                <td>{{$data->subject}}</td>
                                                <td>{{$data->lessen}}</td>
                                                <td>{{$data->day_name}}</td>
                                                <td>{{$data->time_name}}</td>
                                                @if($data->status == '1')
                                                    <td><a href="#" onclick="examActive('{{$data->id}}')" class="badge-primary px-2 py-1 rounded">Actice</a> </td>
                                                @else
                                                    <td><a href="#" onclick="examInactive('{{$data->id}}')" class="badge-danger px-2 py-1">Disable</a> </td>
                                                @endif

                                                <td>
                                                    <a href="#" onclick="deleteexam('{{$data->id}}')" class="btn btn-info btn-sm"><i class="fa fa-trash"></i> </a>
                                                </td>
                                            </tr>
                                        @empty
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
    <script>
        function deleteexam(id) {
            var url = "/dashboard/onlineexam/" + id;
            axios.delete(url).then(function (response) {
                console.log(response);

            })
                .catch(function (error) {
                    console.log(error);
                });

        }

    </script>
    <script>
        function examActive(id){
            let vl=0;
            let data={status:vl}
            var url = "/dashboard/exam/active/" +id;
            axios.post(url, data)
                .then(function (response) {
                    console.log(response);

                })
                .catch(function (error) {
                    console.log(error);
                });
        }
        function examInactive(id){
            let vl=1;
            let data={status:vl}
            var url = "/dashboard/exam/active/" +id;
            axios.post(url, data)
                .then(function (response) {
                    console.log(response);

                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    </script>






@endsection
