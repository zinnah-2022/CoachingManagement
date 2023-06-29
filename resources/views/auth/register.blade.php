@extends('layouts.app')
@section('content')
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="../../index2.html" class="h1"><b>SCC</b></a>
            </div>
            <div class="card-body">
                @if(count($errors) > 0 )
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <ul class="p-0 m-0" style="list-style: none;">
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('registerUser') }}" method="post" enctype="multipart/form-data" id="myform">
                    @csrf
                    <div class="input-group">
                        <div class="form-outline mb-3">
                            <input type="file" name="image" class="form-control" required id="customFile"/>
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="form-outline mb-3">
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required/>
                            <label class="form-label" for="name">Full Name</label>
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="form-outline mb-3">
                            <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}" required/>
                            <label class="form-label" for="email">Phone Number</label>
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="form-outline mb-3">
                            <input type="password" name="password" id="form2Example1" class="form-control"/>
                            <label class="form-label" for="password">Password</label>
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="form-outline mb-3">
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                   class="form-control"/>
                            <label class="form-label" for="password_confirmation">Confirm Password</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <select class="form-select" name="subject" id="subject" aria-label="Default select example"
                                value="{{ old('subject') }}" required>
                            <option value="" selected>Select Subject</option>
                            <option value="ICT">ICT</option>
                            <option value="Accounting">Accounting</option>
                            <option value="Economics">Economics</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <div class="form-outline mb-3">
                            <input type="date" name="date" id="date" class="form-control"/>
                            <label class="form-label" for="adDate">Admission Date</label>
                        </div>
                    </div>
                    <div class="input-group">
                            <div class="col-6" style="padding-left: 0">
                                    <select class="form-select" name="day" aria-label="Default select example" required>
                                        <option class="font-weight-bold" value="" selected>Select day</option>
                                        @foreach($makeday as $data)
                                        <option value="{{$data->name}}">{{$data->name}}</option>
                                        @endforeach

                                    </select>
                            </div>
                            <div class="col-6 " style="padding-right: 0">
                                    <select class="form-select" name="time" aria-label="Default select example" required>
                                        @foreach($maketime as $data)
                                            <option value="{{$data->time}}">{{$data->time}}</option>
                                        @endforeach
                                    </select>
                            </div>
                    </div>
                    <div class="social-auth-links text-center">
                        <input type="submit" class="btn btn-block btn-primary" value="submit">

                    </div>
                </form>

                <a href="{{route('login')}}" class="text-center">I already have a membership?</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
@endsection
