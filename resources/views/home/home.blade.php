@extends('layouts.main')
@section('main')
<title>Quizzes | Quiz Catch </title>

						   {{-- Start Post Page --}}
						@if ($message = Session::get('success'))
						<div class="alert alert-success alert-block">
							<button type="button" class="close" data-dismiss="alert">×</button>
								<strong>{{ $message }}</strong>
						</div>
						@endif
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
						   @if (count($quizzes)==NULL)
						   <div class="alert alert-light" role="alert">
							No Quiz Yet.
						  </div>
							@else
							@foreach ($quizzes as $quiz)
							<div class="panel" style="margin:15px;border-radius:20px">
							{{-- <div class="pull-left" style="margin-right: 20px">
								@if ($quiz->image != null)
									<img src="{{URL::asset($quiz->image)}}" style="height: 130px; width:150px; margin-bottom:10px;">
								@endif
							</div>
							<div class="g-mb-15 " style="margin: 15px">
								<h3><a href="#">{{$quiz->title}}</a></h3>
							</div>
							<div class="g-mb-15" style="margin: 15px">
								{{$quiz->explanation}}
							</div>
							<br>
							<div class="g-mb-15" style="margin: 15px">
								Quiz End At : {{$quiz->stopped_at}}
							</div>
							<div class="g-mb-15">
							</div> --}}

							{{-- New Style --}}
							<div class="panel panel-default">
								<a href="{{route('quiz.show',['quiz_slug'=>$quiz->slug])}}">
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
										Quiz End At : {{$quiz->stopped_at}}
									</div>
								  </div>
								  {{-- <div class="panel-footer">
									<div class="row">
									  ...
									</div>
								  </div> --}}
								</a>
							</div>

							<a href="{{route('quiz.catch',['quiz_id'=>$quiz->id,'quiz'=>$quiz->slug])}}" class="btn btn-primary" onclick=" return confirm('Quiz has will start , Are you ready ');">Catch</a>
						  </div>

							  {{-- New Style --}}

							<script>
								  $('#quizShow').on('show.bs.modal', function (event) {
										var button = $(event.relatedTarget) // Button that triggered the modal
										var recipient = button.data('whatever') // Extract info from data-* attributes
										// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
										// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
										var modal = $(this)
										modal.find('.modal-title').text('New Quiz')
										modal.find('.modal-body input').val(recipient)
										})
							</script>
								@endforeach

								  <style>
									  .panel-default a:link, .panel-default a:hover, .panel-default a:visited, .panel-default a:active {
       color: #000;
       text-decoration: none;
}
								  </style>
								{{$quizzes->links()}}
						   @endif
						   {{-- End Post Page --}}
						 {{-- end right nav --}}
@endsection
