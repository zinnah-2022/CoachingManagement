@extends('backend.user.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="card px-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-xs-12">
                                    @foreach($exam as $key=> $data)
                                        <br>
                                        <h6> {{$key+1}}. {{$data->quesion->question}}</h6>
                                        <ol class="ul-list mb-2" style="list-style-type: lower-alpha;">
                                            @foreach($data->quesion->option as $opt)
                                                <li>&nbsp;&nbsp;<input
                                                        type="radio"  {{$opt->option==$data->ans ? 'checked' : ''}}  /> {{$opt->option}}
                                                </li>
                                            @endforeach
                                        </ol>
                                        <span class="text-bold text-success py-5">উত্তরঃ {{$data->quesion->answer}}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection

