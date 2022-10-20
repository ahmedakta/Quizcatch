@extends('layouts.main')
@section('main')
<div class="panel" style="margin:15px;border-radius:20px">
    <div style="margin: 20px">
        <div>
            @if ($class->image != null)
            <img src="{{URL::asset($class->image)}}" style="height:auto; width:100%; margin:10px;">
            @else
                <img src="{{URL::asset('media/class.png')}}" style="height:auto; width:100%; margin:10px;">
            @endif
        </div>
        <a href="{{route('user.profile',$class->user->user_name)}}"><img class="pull-left d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15" style="border-radius: 20px" src="{{asset($class->user->profile->photo)}}" alt="Image Description"></a>
        <h3>{{$class->user->name}}</h3>
        <div style="margin-top: 50px">
            <h4>{{$class->name}}</h4>
            <hr style="border-width:3px;border-color:#f95959">
            <p>
                {{$class->description}} <br>
                Members <a href="">({{$class->users->count()}})</a>
            </p>

        </div>
        <div class="g-mb-15">
        {{-- {{$quiz->questions()->count()}} Questions <br> --}}
        {{-- {{$quiz->result()->count()}} Catch count --}}

        </div>
        {{-- @if ($quiz->end_time != null/)     --}}

        <div>
            {{-- {{$quiz->end_time}} --}}
        </div>
        {{-- @endif --}}
        {{-- <a href="{{url()->previous()}}" class="btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i></a> --}}
        {{-- <a href="{{route('quiz.catch',['quiz_id'=>$quiz->id,'quiz'=>$quiz->slug])}}" class="btn btn-info" onclick=" return confirm('Quiz has will start , Are you ready ');">Catch</a> --}}
    </div>
</div>

@endsection