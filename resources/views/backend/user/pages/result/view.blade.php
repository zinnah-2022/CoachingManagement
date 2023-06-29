@extends('backend.user.master')
@section('content')
    @push('prevent')
        <script type="text/javascript">
            function preback(){
                window.history.forward();
                setTimeout('preback()', 0);
                window.onunload=function (){null};
            }
        </script>
    @endpush
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 container justify-content-center">
                    <div class="card ">
                        <div class="card-header">
                            <div class="rounded-lg text-center">
                                <img src="{{asset('user/image/'.\Illuminate\Support\Facades\Auth::user()->image)}}" class="img-circle elevation-2" alt="User Image">
                            </div>
                            <div class="text-center mt-2">
                                <h6>শিক্ষার্থীর নামঃ<span class="text-blue"> {{\Illuminate\Support\Facades\Auth::user()->name}}</span></h6>
                                <h6>বিষয়ঃ তথ্য ও যোগাযোগ প্রযুক্তি</h6>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row container justify-content-center py-2">
                                <div class="col-md-8 text-center " data-select2-id="30">
                                    <span class="badge bg-secondary">শিক্ষানীড় কোচিং সেন্টার</span>
                                    @if( $result->total_mark>'20' )
                                        <h4 class="text-green">Congratulation</h4>
                                    @else
                                        <h5 class="text-danger">IMPROVE YOURSELF</h5>
                                    @endif
                                    <h4 class=" border-bottom border-primary">Total Mark: {{$result->total_mark}} </h4>
                                    <table width="100%">
                                        <tr style="font-size: 20px">
                                            <td>Correct Answer:</td>

                                            <th> {{$result->yes_ans}}</th>
                                        </tr>
                                        <tr style="font-size: 20px">
                                            <td>Wrong Answer:</td>
                                            <th class=" text-red"> {{$result->no_ans}}</th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center p-3">
                            <a href="{{route('exam.index')}}" class="btn btn-info btn-sm">পরিক্ষা শুরু করুন</a>
                            <button type="button"  class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">
                                উত্তর দেখুন !
                            </button>
                        </div>
                    </div>
                </div>
            </div>
{{--            Model--}}
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><h6>বিষয়ঃ তথ্য ও যোগাযোগ প্রযুক্তি</h6></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-body ">
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    @foreach($exam as $key=> $data)
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
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
