@extends('layouts.main')
@section('main')
                        @if (count($errors) > 0)
							<div class="alert alert-danger">
								<strong>Whoops!</strong> There were some problems with your input.
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif
{{-- quiz show --}}
<div class="container" style="margin-top: 10px; ">
    <div class="row">
      <div class="col-md-8">
        <div class="media g-mb-30 media-comment">
          <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">        
            <div class="pull-left" style="margin-right: 15px">
              @if ($quiz->image != null)
                  <img class="card-img-top" src="{{URL::asset($quiz->image)}}" style="height: 130px; width:150px; margin-bottom:10px">
              @endif
           </div>
    <h3> {{$quiz->title}}</h3>
    <p>{{$quiz->explanation}}</p>
    <p>Question Count : ({{$quiz->questions()->count()}})</p>
           </div>
        </div>
      </div>
    </div>
  </div>
  {{-- end quiz show --}}
<form class="form" action="{{route('question.store',['quiz_id' => $quiz_id])}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <div class="col-xs-12">
            <label for="first_name"><h4>Question</h4></label>
            <input type="textarea" class="form-control" name="title" placeholder="Question" required>
            <label for="mobile"><h4>Add Image</h4></label>
            <input type="file" name="image" class="form-control">
        </div>
    </div>
        <div class="form-group">
            <div class="col-xs-6">
              <label for="last_name"><h4>Option 1</h4></label>
              <input type="textarea" class="form-control" name="option_1" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-6">
                <label for="phone"><h4>Option 2</h4></label>
                <input type="textarea" class="form-control" name="option_2" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-6">
               <label for="mobile"><h4>Option 3</h4></label>
               <input type="textarea" class="form-control" name="option_3" required>
            </div>
        </div>
        <div class="form-group">
        <div class="col-xs-6">
            <label for="mobile"><h4>Option 4</h4></label>
            <input type="textarea" class="form-control" name="option_4" required>
        </div>
        </div>
        <div class="form-group">
            <div class="col-xs-6">
              <label for="last_name"><h4>Hint (optional)</h4></label>
              <input type="textarea" class="form-control" name="hint" >
            </div>
        </div>
     {{-- switcher --}}
     {{-- <label ><h4>Private</h4></label>
     <label class="switch switch-flat">
    	<input class="switch-input" type="checkbox" />
    	<span class="switch-label" data-on="On" data-off="Off"></span> 
    	<span class="switch-handle"></span> 
    </label> --}}
    {{-- end swithcer --}}
    {{-- <div class="form-group">
        <div class="col-xs-6">
            <label for="password"><h4>Password</h4></label>
            <input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
        </div>
    </div>
    <div class="form-group">
        
        <div class="col-xs-6">
          <label for="password2"><h4>Verify</h4></label>
            <input type="password" class="form-control" name="password2" id="password2" placeholder="password2" title="enter your password2.">
        </div>
    </div> --}}

<div class="m-10">
    <button class="btn btn-primary pull-right" type="submit" >Create</button>
    <a href="{{route('quiz.my-quizzes')}}" class="btn btn-info pull-right"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
</div>
    <div class="form-group">
         <div class="col-xs-12">
              <br>
              <button class="btn btn-lg" type="reset" 
                 onclick= "document.getElementById(
                  'inputField').value = '' "><i class="glyphicon glyphicon-repeat"></i> Empty</button>
          </div>
    </div>
</form> 
<script>
    document.getElementById("question").value = "";
</script>
@endsection