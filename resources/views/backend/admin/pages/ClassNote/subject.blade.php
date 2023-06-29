@extends('backend.admin.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-responsive-md table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Subject Name</th>
                                    <th class="col-3">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($subject as $index => $data)
                                    <tr>
                                        <td>{{$index + 1}}</td>
                                        <td>{{$data->name}}</td>
                                        <td>

                                            <a href="{{route('notes.show',$data->id)}}" class="btn btn-sm btn-info">Create </a>
                                            <a href="{{route('notes.edit',$data->id)}}" class="btn btn-sm btn-info">View </a>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                                </tbody>
                            </table>
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
