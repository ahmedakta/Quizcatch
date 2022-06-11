@extends('layouts.main')
@section('main')
<div class="panel" style="margin:15px;border-radius:20px">
    <div style="margin: 20px">
        <h3>Title</h3>
        <div>
            {{$quiz->title}}
        </div>
        <h3>Explanation</h3>
        <div>
            {{$quiz->explanation}}
        </div>
        <h3>Info</h3>
        <div class="g-mb-15" style="margin: 15px">
            {{$quiz->questions()->count()}} Questions
        </div>
        <div class="g-mb-15" style="margin: 15px">
            [30 minute]
        </div>
        <h3>
            stopped at
        </h3>
        <div>
            {{$quiz->stopped_at}}
        </div>
        <a href="{{url()->previous()}}" class="btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
    </div>
</div>

@endsection