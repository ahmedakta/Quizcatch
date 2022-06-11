@extends('layouts.home')
@section('home')

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
        <div class="panel panel-primary">
             <div class="panel-heading">
                @if ($item->image != null)
				<img class="card-img-top" src="{{URL::asset($item->image)}}" alt="Card image cap" style="height: 230px; width:350px; margin-bottom:10px">
                @endif
                  <pre>
{{$item->title}}

                  </pre>
             </div><!--.panel-heading-->

<div class = "panel-body">
           </div>
<ul class = "list-group">
    <li class = "list-group-item">

            @foreach ($item->options()->get() as $item)
            <input type="checkbox" id="checkbox" />
            <label for="checkbox">
                {{$item->option_text}}
            </label>
            <br>
            @endforeach
    </li>
   </ul>
                {{-- <div class="panel-footer">
                    <div class="row">
    <div class="funkyradio">
        <div class="funkyradio-default">
            <input type="radio" name="radio" id="radio1" />
            <label for="radio1">First Option default</label>
        </div>
        <div class="funkyradio-primary">
            <input type="radio" name="radio" id="radio2" checked/>
            <label for="radio2">Second Option primary</label>
        </div>
        <div class="funkyradio-success">
            <input type="radio" name="radio" id="radio3" />
            <label for="radio3">Third Option success</label>
        </div>
        <div class="funkyradio-danger">
            <input type="radio" name="radio" id="radio4" />
            <label for="radio4">Fourth Option danger</label>
        </div>
        <div class="funkyradio-warning">
            <input type="radio" name="radio" id="radio5" />
            <label for="radio5">Fifth Option warning</label>
        </div>
        <div class="funkyradio-info">
            <input type="radio" name="radio" id="radio6" />
            <label for="radio6">Sixth Option info</label>
        </div>
    </div>

                    </div>
                </div> --}}
        </div>
</div>
</div>
@endforeach
<li class = "list-group-item">
    <a class="btn btn-primary" href="#">SUBMIT</a>
</li>
<script>

</script>
@else
<div class="alert alert-danger" role="alert">
    Quiz Dont Have Questions.
  </div>
@endif


  <script>
         function incTimer() {
        var currentMinutes = Math.floor(totalSecs / 60);
        var currentSeconds = totalSecs % 60;
        if(currentSeconds <= 9) currentSeconds = "0" + currentSeconds;
        if(currentMinutes <= 9) currentMinutes = "0" + currentMinutes;
        totalSecs++;
        $("#timer").text(currentMinutes + ":" + currentSeconds);
        setTimeout('incTimer()', 1000);
    }
         $(document).ready(function() {
             setTimeout(myFunction, 3000);
         });
         function myFunction() {
             window.location.href = '/home';
         }
    totalSecs = 0;
    $(document).ready(function() {
            incTimer();
    });
      $(document).ready(function(){
      $('.check').click(function() {
          $('.check').not(this).prop('checked', false);
      });
  });
  </script>
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