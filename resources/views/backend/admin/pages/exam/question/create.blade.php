@extends('backend.admin.master')
@section('content')
    @push('radio')
        <link rel="stylesheet" href="{{asset('assets')}}/radio.css">
    @endpush
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 container justify-content-center">
                    <div class="card">
                        <div class="card-body " data-select2-id="78">
                            <form action="{{route('showLesson', $quizId->id)}}" method="post">
                                @csrf
                                <div class="row container justify-content-center py-2">
                                    <div class="col-md-8">
                                        <h5>Question Create</h5>
                                        <input type="text" hidden class="form-control" name="subject_id" value="{{$quizId->subject_id}}">
                                        <div class="form-group">
                                            <select class="form-control select2 select2-hidden-accessible" id="lessen_id" name="quize_id"
                                                    style="width: 100%;" tabindex="-1"
                                                    aria-hidden="true">
                                                <option value="{{$quizId->id}}">{{$quizId->quiz_name}}</option>
                                            </select>
                                        </div>
                                        <div class="input-group mb-3">
                                            <textarea type="text" name="question"  class="form-control" id="title"
                                                      aria-describedby="basic-addon3" rows="3" placeholder="Write Question"></textarea>
                                        </div>
                                        <div class="input-group mb-3">
                                        <span class="input-group-text"
                                              id="basic-addon3">(ক)</span>
                                            <input type="text"  name="option[]" class="form-control" id="option1"
                                                   aria-describedby="basic-addon3" placeholder="Option">
                                            <input type="radio" name="optionb" id="optb1" />
                                        </div>
                                        <div class="input-group mb-3">
                                        <span class="input-group-text"
                                              id="basic-addon3">(খ)</span>
                                            <input type="text" name="option[]" class="form-control" id="option2"
                                                   aria-describedby="basic-addon3" placeholder="Option">
                                            <input type="radio" name="optionb" id="optb2" />
                                        </div>
                                        <div class="input-group mb-3">
                                        <span class="input-group-text"
                                              id="basic-addon3">(গ)</span>
                                            <input type="text" name="option[]" class="form-control" id="option3"
                                                   aria-describedby="basic-addon3" placeholder="Option">
                                            <input type="radio" name="optionb" id="optb3" />
                                        </div>
                                        <div class="input-group mb-3">
                                        <span class="input-group-text"
                                              id="basic-addon3">(ঘ)</span>
                                            <input type="text" name="option[]" class="form-control" id="option4"
                                                   aria-describedby="basic-addon3" placeholder="Option">
                                            <input type="radio"  name="optionb" id="optb4" />
                                        </div>
                                        <div class="input-group mb-3" hidden>
                                        <span class="input-group-text"
                                              id="basic-addon3">Answer: </span>
                                            <input type="text" name="answer" class="form-control" id="ans"
                                                   aria-describedby="basic-addon3" placeholder="Answer">

                                        </div>
                                        <button type="submit" id="submit" class="btn btn-sm btn-success">
                                            Submit
                                        </button>
                                    </div>
                                    <!-- /.col -->
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </form>


                            <!-- /.row -->
                        </div>
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
        document.getElementById('optb1').addEventListener('click', function (){
                var option1 =document.getElementById('option1').value;
                document.getElementById('ans').value = option1;
        })
        document.getElementById('optb2').addEventListener('click', function (){
            document.getElementById('ans').value='';
            var option2 =document.getElementById('option2').value;
            document.getElementById('ans').value = option2;
        })
        document.getElementById('optb3').addEventListener('click', function (){
            document.getElementById('ans').value='';
            var option3 =document.getElementById('option3').value;
            document.getElementById('ans').value = option3;
        })
        document.getElementById('optb4').addEventListener('click', function (){
            document.getElementById('ans').value='';
            var option4 =document.getElementById('option4').value;
            document.getElementById('ans').value = option4;
        })
    </script>


@endsection
