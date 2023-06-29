@extends('backend.user.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <h5>Owner Dashboard</h5>
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                     src="{{asset('user/image/'.$authonly->image)}}" height="100px" alt="User profile picture">
                            </div>
                            <h4 class="profile-username text-center"> {{$authonly->name}}</h4>
                            <p class="text-muted text-bold text-center">বিষয়ঃ  {{$authonly->subject}}</p>
                            <p class="text-muted text-center">অধ্যায়ঃ  {{Str::limit($marks->quize->quiz_name)}}</p>
                            <div class="container">
                                <p>মোট নস্বারঃ &nbsp;&nbsp; {{$marks->total_mark}}</p>
                                <p>সঠিক নম্বারঃ &nbsp;&nbsp; {{$marks->yes_ans}}</p>
                                <p>তারিখঃ &nbsp;&nbsp; {{ \Carbon\Carbon::parse($marks->date)->format('d/M/y')}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h5>Result Dashboard</h5>
            <div class="row">
                @forelse($alls as $data)
                <div class="col-6 col-md-6 col-lg-6">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                     src="{{asset('user/image/'.$data->user->image)}}" height="100px" alt="User profile picture">
                            </div>
                            <h4 class="profile-username text-center"> {{$data->user->name}}</h4>
                            <p class="text-muted text-center">বিষয়ঃ  {{$data->user->subject}}</p>
                            <p class="text-muted text-center">অধ্যায়ঃ  {{Str::limit($data->quize->quiz_name)}}</p>
                            <div class="container">
                                <p>মোট নস্বারঃ &nbsp;&nbsp; {{$data->total_mark}}</p>
                                <p>সঠিক নম্বারঃ &nbsp;&nbsp; {{$data->yes_ans}}</p>
                                <p>তারিখঃ &nbsp;&nbsp; {{ \Carbon\Carbon::parse($data->date)->format('d/M/y')}}</p>
                            </div>
                        </div>
                    </div>

                </div>
                @empty
                    <p>No Data</p>
                @endforelse
                <div class="container">
                    {{ $alls->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
