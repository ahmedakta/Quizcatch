@extends('layouts.home')
@section('home')
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

@if (count($questions)>0)
@foreach ($questions as $item)
{{-- <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30" style=" margin:auto;">
    @if ($item->image != null)
				<img class="card-img-top" src="{{URL::asset($item->image)}}" alt="Card image cap" style="height: 230px; width:350px; margin-bottom:10px">
    @endif
<div style="color:black;">{{$item->title}}</div>
    @foreach ($item->options()->get() as $item)
    -{{$item->option_text}}
    <input type="radio" name="selected">
    <br>
    @endforeach
</div> --}}
<!------ Include the above in your HEAD tag ---------->
<div class="container">
  <h1  id="timer" style="text-align:center"></h1>
	<div class="row">
	    <br/>
        <div class="panel panel-danger">
             <div class="panel">
                @if ($item->image != null)
                  <img class="center card-img-top" src="{{URL::asset($item->image)}}" alt="Card image cap" style="display: block;  max-width:70%; height:540px; margin:auto; ">
                @endif
                <div>
                      <pre>
{{$item->title}} ?
                      </pre>
                </div>
             </div><!--.panel-heading-->

           <form action="{{route('quiz.submit',['quiz_id'=>$item->quiz_id])}}" method="POST">
             @csrf
            <ul class = "list-group">
              <li class = "list-group-item">
                {{-- @php
                    $options_list = array($item->options());
                @endphp
                @foreach($options_list as $options_list)
                <li>
                  <input type="checkbox"  name= "selected[]"  value= {{ 
                         $options_list }}>
                  <label>
                  <!-- some code here -->
                  </label>
                </li>
                @endforeach --}}
                      @foreach ($item->options()->get() as $option)
                        <input type="radio" id="{{$option->id}}" name="selected[].{{$item->id}}" value="{{$option->id}}" style="accent-color:#f95959"/>
                        <label for="checkbox">
                            {{$option->option_text}}
                        </label>
                      <br>
                      @endforeach
              </li>
             </ul>
             @if ($item->hint!=null)
                  Hint : {{$item->hint}}
             @endif
                  </div>
          </div>
          </div>
          {{-- Rate The Quiz --}}
          @endforeach
          <li  class = "list-group-item"> 
           Rating System
          </li>
          <li class = "list-group-item">
            <button id="submitQuiz" type="submit" class="btn btn-primary submit">Submit</button>
          </li>
           </form>
          @else
          <div class="alert alert-danger" role="alert">
              Quiz Dont Have Questions.
            </div>
          @endif
<style>
    @import('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.0/css/bootstrap.min.css')

.funkyradio div {
  clear: both;
  overflow: hidden;
}
.panel .panel-heading {
    color: #fff;
    background-color: #f95959;
    border-color: white;
}
.funkyradio label {
  width: 100%;
  border-radius: 3px;
  border: 1px solid #D1D3D4;
  font-weight: normal;
}

.funkyradio input[type="radio"]:empty,
.funkyradio input[type="checkbox"]:empty {
  display: none;
}

.funkyradio input[type="radio"]:empty ~ label,
.funkyradio input[type="checkbox"]:empty ~ label {
  position: relative;
  line-height: 2.5em;
  text-indent: 3.25em;
  margin-top: 2em;
  cursor: pointer;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
}

.funkyradio input[type="radio"]:empty ~ label:before,
.funkyradio input[type="checkbox"]:empty ~ label:before {
  position: absolute;
  display: block;
  top: 0;
  bottom: 0;
  left: 0;
  content: '';
  width: 2.5em;
  background: #D1D3D4;
  border-radius: 3px 0 0 3px;
}

.funkyradio input[type="radio"]:hover:not(:checked) ~ label,
.funkyradio input[type="checkbox"]:hover:not(:checked) ~ label {
  color: #888;
}

.funkyradio input[type="radio"]:hover:not(:checked) ~ label:before,
.funkyradio input[type="checkbox"]:hover:not(:checked) ~ label:before {
  content: '\2714';
  text-indent: .9em;
  color: #C2C2C2;
}

.funkyradio input[type="radio"]:checked ~ label,
.funkyradio input[type="checkbox"]:checked ~ label {
  color: #777;
}

.funkyradio input[type="radio"]:checked ~ label:before,
.funkyradio input[type="checkbox"]:checked ~ label:before {
  content: '\2714';
  text-indent: .9em;
  color: #333;
  background-color: #ccc;
}

.funkyradio input[type="radio"]:focus ~ label:before,
.funkyradio input[type="checkbox"]:focus ~ label:before {
  box-shadow: 0 0 0 3px #999;
}

.funkyradio-default input[type="radio"]:checked ~ label:before,
.funkyradio-default input[type="checkbox"]:checked ~ label:before {
  color: #333;
  background-color: #ccc;
}

.funkyradio-primary input[type="radio"]:checked ~ label:before,
.funkyradio-primary input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #337ab7;
}

.funkyradio-success input[type="radio"]:checked ~ label:before,
.funkyradio-success input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #5cb85c;
}

.funkyradio-danger input[type="radio"]:checked ~ label:before,
.funkyradio-danger input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #d9534f;
}

.funkyradio-warning input[type="radio"]:checked ~ label:before,
.funkyradio-warning input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #f0ad4e;
}

.funkyradio-info input[type="radio"]:checked ~ label:before,
.funkyradio-info input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #5bc0de;
}

</style>
@endsection
