@extends('backend.user.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div  class="row">
                                <div class="col-md-12">
                                    <table class="table table-responsive-md table-bordered table-hover">
                                        <tbody>
                                        @forelse($noteView as $index=>$data)
                                            <tr>
                                                <th>{{$index +1}}</th>
                                                <th><a href="{{route('postShow', $data->id)}}"> {{$data->title}}</a></th>
                                            </tr>
                                        @empty
                                            <td colspan="3" class="text-center">Note Not Found</td>
                                        @endforelse
                                        </tbody>
                                    </table>
                                    {!! $noteView->links() !!}
                                </div>
                            </div>

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
