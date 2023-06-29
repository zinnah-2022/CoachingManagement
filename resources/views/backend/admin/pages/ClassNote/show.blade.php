@extends('backend.admin.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body px-5">
                            <h2>{{$posts->title}}</h2>
                            <span>{{$posts->quize->quiz_name}}</span>
                            <p>{{strip_tags($posts->body)}}</p>

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
