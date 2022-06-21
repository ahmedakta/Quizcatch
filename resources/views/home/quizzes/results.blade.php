@extends('layouts.main')
@section('main')

<div class="panel" style="margin:15px;border-radius:20px">
    <div style="margin: 20px">
        @foreach ($quizzes as $quiz)
            @if($quiz->result != null)
            quiz : {{$quiz->title}}
            <br>
            result : {{$quiz->result->where('quiz_id',$quiz->id)->first()->result}} 
            <br>
            @endif
        @endforeach
        <a href="{{url()->previous()}}" class="btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
    </div>
</div>


@endsection