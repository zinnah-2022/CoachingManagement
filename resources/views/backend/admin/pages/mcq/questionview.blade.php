<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>শিক্ষানীড় কোচিং সেন্টার</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<div class="container text-center mt-2">
    <h5>শিক্ষানীড় কোচিং সেন্টার</h5>
    <small>অধ্যায়ঃ {{$lemcq->name}}</small>
</div>
<hr>
<div class="row">
@forelse($mcq as $index=> $data)
    <div class="col-md-1"></div>
       <div class="col-md-4 gap-2 px-2">
           <br><h6>{{$index +1}}. {{$data->title}}</h6>
         (ক) <label class="col-4">{{$data->option1}}</label>
         (খ) <label class="col-4">{{$data->option2}}</label><br>
         (গ) <label class="col-4">{{$data->option3}}</label>
         (ঘ) <label class="col-4">{{$data->option4}}</label>
    </div>
        <div class="col-md-1"></div>

@empty
@endforelse
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
<div class="row">
    <div class="col-md-1"></div>
        @forelse($mcq as $index=>$ans)
        <div class="col-1">
            <span>{{$index +1}}. {{$ans->ans}}</span>
        </div>
        @empty
        @endforelse
    <div class="col-md-1"></div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
