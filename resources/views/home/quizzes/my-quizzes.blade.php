@extends('layouts.main')
@section('main')
<table class="table">
      @php
          $count = 1;
      @endphp
    @if ($quiz_count >0)
      @foreach ($quizzes as $item)
      <div class="container" style="margin-top: 10px; ">
        <div class="row">
          <div class="col-md-8">
            <div class="media g-mb-30 media-comment">
              <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">        
                <div class="pull-left">
                  @if ($item->image != null)
                      <img class="card-img-top" src="{{URL::asset($item->image)}}" style="height: 130px; width:150px; margin-bottom:10px">
                  @endif
               </div>
        <h3> {{$item->title}}</h3>
        <p>{{$item->explanation}}</p>
        <a href="{{route('questions.form',['id'=>$item->id,'slug'=>$item->slug])}}" class="btn btn-primary pull-right">({{$item->questions()->count()}}) Add Questions To Quiz</a>
        <a type="btn btn-primary" class="btn btn-info pull-right" href="{{route('quiz.show',['quiz_slug'=>$item->slug,'quiz_id'=>$item->id])}}">Show</a>
               </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
      {{-- @foreach ($quizzes as $item)
      <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30" style="float: right; margin:20px;width:850px">
        <div class="pull-left">
        @if ($item->image != null)
						<img class="card-img-top" src="{{URL::asset($item->image)}}" style="height: 130px; width:150px; margin-bottom:10px">
        @endif
        </div>
        <h3> {{$item->title}}</h3>
        <p>{{$item->explanation}}</p>
        <a href="{{route('questions.form',['id'=>$item->id,'slug'=>$item->slug])}}" class="btn btn-primary pull-right">({{$item->questions()->count()}}) Add Questions To Quiz</a>
        <a type="btn btn-primary" class="btn btn-info pull-right" href="#">Show</a>
      </div>
      @endforeach --}}
    @else
    <div class="alert alert-warning" role="alert">
      You Dont Have Any Quiz Yet !
      Create <a href="#">Now</a>
    </div>
    @endif
    </tbody>
  </table>
@endsection