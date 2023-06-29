@extends('backend.admin.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 container justify-content-center">
                    <div class="card">
                        <div class="card-body " data-select2-id="78">
                            <form>
                                <div class="row container justify-content-center py-2">
                                    <div class="col-md-8">
                                        <h5>Question Create</h5>
                                        <div class="form-group">
                                            <select class="form-control select2 select2-hidden-accessible" id="lessen_id" name="lessen_id"
                                                    style="width: 100%;" tabindex="-1"
                                                    aria-hidden="true">
                                                <option value="{{$lessen->id}}">{{$lessen->name}}</option>
                                            </select>
                                        </div>
                                        <div class="input-group mb-3">
                                            <textarea type="text" name="title"  class="form-control" id="title"
                                                      aria-describedby="basic-addon3" rows="3" placeholder="Write Question"></textarea>
                                        </div>
                                        <div class="input-group mb-3">
                                        <span class="input-group-text"
                                              id="basic-addon3">(ক)</span>
                                            <input type="text" name="option1" class="form-control" id="option1"
                                                   aria-describedby="basic-addon3" placeholder="Option">
                                        </div>
                                        <div class="input-group mb-3">
                                        <span class="input-group-text"
                                              id="basic-addon3">(খ)</span>
                                            <input type="text" name="option2" class="form-control" id="option2"
                                                   aria-describedby="basic-addon3" placeholder="Option">
                                        </div>
                                        <div class="input-group mb-3">
                                        <span class="input-group-text"
                                              id="basic-addon3">(গ)</span>
                                            <input type="text" name="option3" class="form-control" id="option3"
                                                   aria-describedby="basic-addon3" placeholder="Option">
                                        </div>
                                        <div class="input-group mb-3">
                                        <span class="input-group-text"
                                              id="basic-addon3">(ঘ)</span>
                                            <input type="text" name="option4" class="form-control" id="option4"
                                                   aria-describedby="basic-addon3" placeholder="Option">
                                        </div>
                                        <div class="input-group mb-3">
                                        <span class="input-group-text"
                                              id="basic-addon3">Answer: </span>
                                            <input type="text" name="ans" class="form-control" id="ans"
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
        document.getElementById('submit').addEventListener('click', function (e){
            e.preventDefault();
            let lessen_id=document.getElementById('lessen_id').value
            let title=document.getElementById('title').value
            let option1=document.getElementById('option1').value
            let option2=document.getElementById('option2').value
            let option3=document.getElementById('option3').value
            let option4=document.getElementById('option4').value
            let ans=document.getElementById('ans').value
            let allData={
                lessen_id:lessen_id,
                title:title,
                option1:option1,
                option2:option2,
                option3:option3,
                option4:option4,
                ans:ans
            };
            let url="/dashboard/question";
            axios.post(url, allData)
                .then(function (response) {
                    console.log(response);
                    toastr["success"]("Data SuccessFully Insert!");
                    document.getElementById('title').value=""
                    document.getElementById('option1').value=""
                    document.getElementById('option2').value=""
                    document.getElementById('option3').value=""
                    document.getElementById('option4').value=""
                    document.getElementById('ans').value=""

                })
                .catch(function (error) {
                    console.log(error);
                });
        })
    </script>

@endsection
