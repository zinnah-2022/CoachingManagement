@extends('backend.admin.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="card px-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-body ">
                            <div class="page-header text-center">
                                <h4>শিক্ষানীড় কোচিং সেন্টার</h4>
                                <small>কলেজ রোড, দেওয়ানগঞ্জ</small><br>
                                <h5>অধ্যায়ঃ {{$quize->quiz_name}}</h5>
                            </div><!-- /.page-header -->
                            <div class="row">
                                <div class="col-xs-12">
                                    @foreach($questions as $key=> $data)
                                        <h6> {{$key+1}}. {{$data->question}}</h6>
                                        <ol class="ul-list" style="list-style-type: lower-alpha;">
                                            @foreach($data->option as $opt)
                                                <li>&nbsp;&nbsp;<input
                                                        type="radio" {{$opt->option==$data->answer ? 'checked' : ''}} /> {{$opt->option}}
                                                </li>
                                            @endforeach
                                        </ol>
                                    @endforeach
                                </div>
                            </div>
                            <div class="d-flex">
                                {!! $questions->links() !!}
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

