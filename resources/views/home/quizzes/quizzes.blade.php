@extends('layouts.main')
@section('main')
@foreach ($myQuizzes as $item)
<div class="container" style="margin-top: 10px;  ">
    <div class="row">
        <div class="col-md-8">
            <div class="media g-mb-30 media-comment" style="border-radius: 25px;"">
                <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                  <div class="g-mb-15">
                    <h5 class="h5 g-color-gray-dark-v1 mb-0">{{$item->title}}</h5>
                </div>
                  <p>{{$item->explanation}}</p>
                </div>
                <button class="btn btn-info" type="submit" data-toggle="modal" data-target="#quizShow" data-whatever=""><i class="fa fa-plus"></i> Questions</button>
            </div>
        </div>
    </div>
</div>
<br>
@endforeach
@endsection