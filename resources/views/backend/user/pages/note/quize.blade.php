@extends('backend.user.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                @forelse($quizes as $data)
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info py-2">
                        <div class="inner">
                            <h6>{{$data->quiz_name}}</h6>

                            <p class="text-black-50">Notes/Suggestion</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{route('noteShow',$data->id)}}" class="small-box-footer">Click Here <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                @empty
                @endforelse
            </div>
        </div>
    </section>
@endsection
