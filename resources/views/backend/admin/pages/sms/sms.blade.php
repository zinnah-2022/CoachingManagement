@extends('backend.admin.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('messageUnpaid') }}" method="post">
                                @csrf
                                <div class="row">

                                    <div class="col-md-6">
                                        <label for="unpaid" class="col-md-6 col-form-label">Unpaid message</label>

                                        <textarea type="text" name="unpaid" rows="6" class="form-control"
                                                  id="inputEmail"
                                                  placeholder="Unpaid message Here">{{$smsData->unpaid}}</textarea>

                                    </div>
                                    <div class="col-md-6">
                                        <label for="paid" class="col-md-6 col-form-label">Paid message</label>

                                        <textarea type="text" name="paid" rows="6" class="form-control" id="inputEmail"
                                                  placeholder="Unpaid message Here">{{$smsData->paid}}</textarea>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <label for="close" class="col-md-6 col-form-label">Suspend message</label>

                                        <textarea type="text" name="close" rows="6" class="form-control" id="inputEmail"
                                                  placeholder="Unpaid message Here">{{$smsData->close}}</textarea>

                                    </div>
                                    <div class="col-md-6">
                                        <label for="greeting" class="col-md-6 col-form-label">Greeting Message</label>

                                        <textarea type="text" name="greeting" rows="6" class="form-control"
                                                  id="inputEmail"
                                                  placeholder="Unpaid message Here">{{$smsData->greeting}}</textarea>
                                    </div>

                                </div>
                                <div class="container pt-3">
                                    <button type="submit" class="btn btn-info">Submit</button>
                                </div>

                            </form>

                        </div>
                        <!-- /.card-body -->
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
