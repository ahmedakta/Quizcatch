@extends('layouts.main')
@section('main')

<title>Tournaments | Quiz Catch </title>

@if (count($tournaments)==0)
    <div class="alert alert-light" role="alert" style="margin: auto">
        No Tournament Yet.
    </div>
@else

    @foreach ($tournaments as $quiz)
    <div class="panel" style="margin:15px;border-radius:20px">
            <a href="#">
              <div class="panel-body">
                @if ($quiz->image != null)
                <img src="{{URL::asset($quiz->image)}}" style="height: 130px; width:150px; margin:10px;" class="pull-left">
                @else
                <img src="{{URL::asset('media/quiz.jpg')}}" style="height: 130px; width:150px; margin:10px;" class="pull-left">
                @endif
                <div class="g-mb-15 " style="margin: 15px">
                    <h3>{{$quiz->title}}</h3>
                </div>
                <div class="g-mb-15" style="margin: 15px">
                    {{$quiz->explanation}}
                </div>
                <div class="g-mb-15" style="margin: 15px">
                  12
                </div>
              </div>
              {{-- <div class="panel-footer">
                <div class="row">
                  ...
                </div>
              </div> --}}
            </a>
            <a href="#" class="btn btn-primary" onclick=" return confirm('Quiz has will start , Are you ready ');"><i class="fa fa-person-to-door fa-lg fa-fw"></i> Join</a>
            <a href="#" class="btn btn-info"><i class="fa fa-star"></i> 4.5</a>
        </div>			

    @endforeach

@endif
                        
@endsection