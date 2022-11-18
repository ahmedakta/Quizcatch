@extends('layouts.main')
@section('main')
<div class="panel" style="margin:15px;border-radius:20px">
    <div style="margin: 20px">
        <div>
            <img src="{{URL::asset($quiz->image)}}" style="height:auto; width:100%; margin:10px;">
        </div>
        <a href="{{route('user.profile',$quiz->user->user_name)}}"><img class="pull-left d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15" style="border-radius: 20px" src="{{asset($quiz->user->profile->photo)}}" alt="Image Description"></a>
        <h3>{{$quiz->user->name}}</h3>
        <div style="margin-top: 50px">
            <h4>{{$quiz->title}}</h4>
            <hr style="border-width:3px;border-color:#f95959">
            <p>
                {{$quiz->explanation}}
            </p>

        </div>
        <div class="g-mb-15">
        {{$quiz->questions()->count()}} Questions <br>
        {{$quiz->result()->count()}} Catch count

        </div>
        <style>
            .checked {
              color: orange;
            }
            </style>
        @if ($quiz->end_time != null)    
        <h3>
            stopped at
        </h3>
        <div>
            {{$quiz->end_time}}
        </div>
        @endif
        <a href="{{url()->previous()}}" class="btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
        <a href="{{route('quiz.catch',['quiz_id'=>$quiz->id,'quiz'=>$quiz->slug])}}" class="btn btn-info" onclick=" return confirm('Quiz has will start , Are you ready ');">Catch</a>
    </div>
</div>

@endsection