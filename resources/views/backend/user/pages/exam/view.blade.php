@extends('backend.user.master')
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
                                    <section class=" " oncopy="return false;" oncut="return false;"
                                             onpaste="return false;" oncontextmenu="return false;">
                                        <!-- PAGE CONTENT BEGINS -->
                                        <hr>
                                        <form action="{{route('examPost')}}" method="post" class="mb-2">
                                            @csrf
                                            @forelse($questions as $key=> $ques)
                                                <input type="hidden" name="questions_id{{$key+1}}" value="{{$ques->id}}">
                                                <input type="hidden" name="ans{{$key+1}}" value="0">
                                                <h6> {{$key+1}}. {{$ques->question}}</h6>
                                                <ol class="ul-list" style="list-style-type: lower-alpha;">
                                                    @foreach($ques->option as $opt)
                                                        <li><input type="radio" name="ans{{$key+1}}"
                                                                   value="{{$opt->option}}"
                                                                   style="transform: scale(1)"
                                                                   class="mx-2"/> {{$opt->option}}   </li>
                                                    @endforeach

                                                </ol>
                                            <input type="hidden" name="index" value="<?php echo $key+1 ?>">
                                            <input type="hidden" name="quize_id" value="{{$quize->id}}">

                                            @empty
                                                <h2>Quesion No view</h2>
                                            @endforelse
                                            <button type="submit" class="btn btn-primary btn-md">Submit</button>
                                        </form>
                                    </section>
                                </div><!-- /.col -->
                            </div>


                            <!-- /.row -->
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

