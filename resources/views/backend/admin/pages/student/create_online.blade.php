@extends('backend.admin.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body " data-select2-id="78">
                            <form action="{{route('onlineexam.store')}}" method="post">
                                @csrf
                            <div class="row container justify-content-center" data-select2-id="77">
                                <div class="col-md-6" data-select2-id="30">
                                    <h5>Online Exam Create</h5>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text"
                                              id="basic-addon3">https://</span>
                                        <input type="text" name="question" class="form-control" id="basic-url"
                                               aria-describedby="basic-addon3">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text"
                                              id="basic-addon3">Subject</span>
                                        <input type="text" name="subject" class="form-control" id="basic-url"
                                               aria-describedby="basic-addon3">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text"
                                              id="basic-addon3">Lessen</span>
                                        <input type="text" name="lessen" class="form-control" id="basic-url"
                                               aria-describedby="basic-addon3">
                                    </div>
                                    <div class="form-group" data-select2-id="29">
                                        <select class="form-control select2 select2-hidden-accessible" name="day"
                                                style="width: 100%;" data-select2-id="1" tabindex="-1"
                                                aria-hidden="true">
                                            <option selected="selected" data-select2-id="3">select day</option>
                                            @foreach($makeday as $data)
                                                <option value="{{$data->name}}">{{$data->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <select class="form-control select2 select2-hidden-accessible" name="time"
                                                style="width: 100%;" data-select2-id="4" tabindex="-1"
                                                aria-hidden="true">
                                            <option selected="selected" data-select2-id="6">select time</option>
                                            @foreach($maketime as $data)
                                                <option value="{{$data->time}}">{{$data->time}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" name="status" id="customCheckbox1" value="1">
                                            <label for="customCheckbox1" class="custom-control-label">Acive Question?</label>
                                        </div>
                                    </div>

                                    <!-- /.form-group -->
                                    <button type="submit" class="btn btn-info btn-sm">submit</button>
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

@endsection
