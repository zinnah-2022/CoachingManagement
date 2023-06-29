@extends('backend.admin.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 container justify-content-center">
                    <div class="card">
                        <div class="card-body " >
                            <form action="{{route('ustd.update',$estudent->id )}}" method="post">
                                @csrf
                                @method('put')
                                <div class="row container justify-content-center py-5">
                                    <div class="col-md-8" data-select2-id="30">
                                        <h5>Update Student</h5>
                                        <div class="input-group mb-3">
                                        <span class="input-group-text"
                                              id="basic-addon3">St Name</span>
                                            <input type="text" name="name"  class="form-control" id="basic-url"
                                                   aria-describedby="basic-addon3" value="{{$estudent->name}}" placeholder="Lessen">
                                        </div>
                                        <div class="input-group mb-3">
                                        <span class="input-group-text"
                                              id="basic-addon3">Adm: Date</span>
                                            <input type="date" name="date" class="form-control" id="basic-url"
                                                   aria-describedby="basic-addon3" value="{{$estudent->date}}" placeholder="Lessen">
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

@endsection
