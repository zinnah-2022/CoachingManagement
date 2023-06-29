@extends('backend.admin.master')
@section('content')
    @push('editor')
        <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    @endpush
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-body ">
                            <form action="{{route('notes.store')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12" data-select2-id="30">
                                        <input type="text" hidden name="subject_id" class="form-control"
                                               value="{{$subject->id}}">
                                        <div class="form-group">
                                            <select class="form-control select2 select2-hidden-accessible"
                                                    id="quize_id" name="quize_id"
                                                    style="width: 100%;" data-select2-id="1" tabindex="-1"
                                                    aria-hidden="true">
                                                <option value="" selected>Selected</option>
                                                @forelse($quizes as $data)
                                                    <option value="{{$data->id}}">{{$data->quiz_name}}</option>
                                                @empty
                                                @endforelse
                                            </select>
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="text" name="title" class="form-control" id="title"
                                                   aria-describedby="basic-addon3" placeholder="Title">
                                        </div>
                                        <textarea id="editor" name="body" class="text"></textarea>
                                        <button type="submit" class="btn btn-info btn-md  mt-2">submit</button>
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
        CKEDITOR.replace('editor');
    </script>
@endsection
