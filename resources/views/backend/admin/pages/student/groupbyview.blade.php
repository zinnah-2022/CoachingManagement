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
                                    <th>Name</th>
                                    <th>Subject</th>
                                    <th>Adm date</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($groupbyview as $index => $data)
                                    <tr>
                                        <td>{{$index + 1}}</td>
                                        <td>{{$data->name}}</td>
                                        <td>{{$data->subject}}</td>
                                        <td>{{ \Carbon\Carbon::parse($data->date)->format('d-F-y')}}</td>
                                        <td align="center">
                                            <img src="{{asset('public/user/image/'.$data->image)}}" width="40px">
                                        </td>
                                        <td class="col-1">
                                            @if($data->status == '1')
                                                <a href="#" id="active" onclick="StatusActive('{{$data->id}}')" class="btn btn-xs btn-success">Active</a>
                                            @else
                                                <a href="#" id="Inactive" onclick="StatusInactive('{{$data->id}}')" class="btn btn-xs btn-danger">Inactive</a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="tel:{{$data->email}}" class="btn btn-sm btn-primary"><i class="fa fa-phone"></i> </a>
                                            <a href="#" onclick="smsClose('{{$data->id}}')" class="btn btn-sm btn-info"><i class="fa fa-envelope"></i> </a>
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
         function StatusActive(id){
            let vl=0;
            let data={status:vl}
            var url = "/dashboard/group/view/update/active/" +id;
            axios.post(url, data)
                .then(function (response) {
                    console.log(response);
                    toastr["success"]("Data SuccessFully Insert!");

                })
                .catch(function (error) {
                    console.log(error);
                });
        }
         function StatusInactive(id){
             let vl=1;
             let data={status:vl}
             var url = "/dashboard/group/view/update/active/" +id;
             axios.post(url, data)
                 .then(function (response) {
                     console.log(response);
                     toastr["success"]("Data SuccessFully Insert!");

                 })
                 .catch(function (error) {
                     console.log(error);
                 });
         }
         function smsClose(id){
             var url = "/dashboard/student/active/sms/" +id;
             axios.get(url)
                 .then(function (response) {
                     console.log(response);
                      toastr["success"]("SMS Send SuccessFully!");

                 })
                 .catch(function (error) {
                     console.log(error);
                 });
         }
    </script>








@endsection
