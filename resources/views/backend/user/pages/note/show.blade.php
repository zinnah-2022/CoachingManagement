@extends('backend.user.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body px-3">

                            <h5 class="text-primary">{{$post->title}}</h5>
                            <span class="badge bg-info P-2">{{$post->quize->quiz_name}}</span>
                            <section class=" " oncopy="return false;" oncut="return false;"
                                     onpaste="return false;" oncontextmenu="return false;">
                                <!-- PAGE CONTENT BEGINS -->
                                <hr>
                            <p class="mt-2">{!! nl2br(@$post->body)!!}</p>
                            </section>
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
