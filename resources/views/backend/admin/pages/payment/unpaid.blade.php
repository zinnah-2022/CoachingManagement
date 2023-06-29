@extends('backend.admin.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body" id="refresh">
                            <table id="example" class="table table-responsive-md table-responsive-md table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Subject</th>
                                    <th>Admission</th>
                                    <th>DueMouth</th>
                                    <th>Time</th>
                                    <th class="col-1">Unpaid</th>
                                    <th class="col-1">Payment</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($unpaid as $index => $data)
                                    <tr>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->name}}</td>
                                        <td>{{$data->subject}}</td>
                                        <td>{{ \Carbon\Carbon::parse($data->date)->format('d-F-y')}}</td>
                                        <td>{{ \Carbon\Carbon::parse($data->unpaid_date)->format('d-F-y')}}</td>
                                        <td>{{$data->time}}</td>
                                        <td>
                                            <a href="#" onclick="sendSMS('{{$data->user_id}}')"  class="btn btn-sm btn-primary"><i class="fa fa-envelope"> SMS</i> </a>

                                        </td>
                                        <td>
                                            <a href="#" onclick="paymentID('{{$data->id}}')" class="btn btn-sm btn-info"><i class="fa fa-coins"> PAY</i> </a>
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center"> No Data Found</td>
                                    </tr>
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
        function paymentID(id){
            let month=500;
            let data={month:month};
            var url = "/dashboard/student/monthly/paid/success/" +id;
            axios.post(url, data)
                .then(function (response) {
                    console.log(response);
                    window.location.reload();

                })
                .catch(function (error) {
                    console.log(error);
                });
        }
        function sendSMS(id){
            var url="/dashboard/student/monthly/sms/"+id;
            axios.post(url)
                .then(function (response){
                    console.log(response);
                    toastr["success"]("Message Send Successfully!");
                })
                .catch(function (error){
                    console.log(error)
                })

        }

    </script>
@endsection
