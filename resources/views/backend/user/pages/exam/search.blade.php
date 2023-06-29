@extends('backend.user.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 container justify-content-center">
                    <div class="card card-primary card-outline">
                        <div class="card-body " >
                            <form action="{{route('exam.store')}}" method="post">
                                @csrf
                                <div class="row container justify-content-center py-5">
                                    <div class="col-md-8" data-select2-id="30">
                                        <h5>Select Exam</h5>
                                        <div class="form-group">
                                            <select class="form-control select2 select2-hidden-accessible" id="subject_id" name="subject_id"
                                                    style="width: 100%;" data-select2-id="1" tabindex="-1"
                                                    aria-hidden="true">
                                                <option value="" selected>Selected </option>
                                                @forelse($subject as $data)
                                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                                @empty
                                                @endforelse
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control select2 select2-hidden-accessible" id="lesson_id" name="lesson_id"
                                                    style="width: 100%;" data-select2-id="1" tabindex="-1"
                                                    aria-hidden="true">


                                            </select>
                                        </div>
                                        <div class="form-group">
                                        <select class="form-control select2 select2-hidden-accessible" id="search" name="Number"
                                                style="width: 100%;" data-select2-id="1" tabindex="-1"
                                                aria-hidden="true">
                                        </select>
                                        </div>
                                        <button type="submit" class="btn btn-info btn-md">submit</button>
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
        document.getElementById('subject_id').addEventListener('change',function (){
            let subject_id=document.getElementById('subject_id').value;
            axios.get('/dashboard/alluser/mcq/onlineexam')
                .then((res)=>bookData(res.data))
                .catch((error)=>console.log(error))

            function bookData(dd){
                let subCategory='<option>Please Class</option>'
                dd.forEach(function (value){
                    if (subject_id == value.subject_id){
                        console.log(value.id);
                        subCategory+='<option value="'+value.id+'">' +value.quiz_name+ '<oprion>';
                    }
                })
                document.getElementById('lesson_id').innerHTML=subCategory;
            }
                //search

                var option1 =document.getElementById('subject_id').value;
            let search="";
                if (option1==1){
                    search=`<option value="25">25<oprion>`
                }else {
                    search=` <option value="30">30<oprion>`
                }
            document.getElementById('search').innerHTML=search;

        })

    </script>

@endsection
