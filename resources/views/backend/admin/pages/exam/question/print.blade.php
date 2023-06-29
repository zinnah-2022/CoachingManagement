<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>শিক্ষানীড় কোচিং সেন্টার</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<div class="container text-center mt-2">
    <h5>শিক্ষানীড় কোচিং সেন্টার</h5>
    <small>অধ্যায়ঃ {{$quize->quiz_name}}</small>
</div>
<hr>
<div class="container">
    <div class="row">
        @forelse($questions as $key=> $data)
            <div class="col-6">
                <h6 class="mb-2"> {{$key+1}}. {{$data->question}}</h6>
                @foreach($data->option as $opt)
                    <label class="col-md-5 mb-1">
                        &nbsp;&nbsp;<input
                            type="radio"/> {{$opt->option}}
                    </label>
                @endforeach

            </div>
        @empty

        @endforelse
    </div>
</div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="container">
    <div class="row">
        @forelse($questions as $index=>$ans)
            <div class="col-2">
                <span>{{$index +1}}. {{$ans->answer}}</span>
            </div>
        @empty
        @endforelse
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>
</html>

