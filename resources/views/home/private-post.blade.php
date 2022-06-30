@extends('layouts.main')
@section('main')
<title>Posts | Quiz Catch </title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


{{-- <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <div class="test"></div>
    </div>
  </div>
</nav>

<style>
	.test:after {
  content: '\2807';
  font-size: 3em;
  color: #2e2e2e
}
</style> --}}
						@if ($message = Session::get('success'))
						<div class="message alert alert-success alert-block">
							<button type="button" class="close" data-dismiss="alert"></button>
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
						   {{-- Start Post Page --}}
						   <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
						   @if (count($posts)==0)
						   <div class="alert alert-light" role="alert">
							You Don't Have Private Post Yet.
						  </div>
							@else
							@if (count($errors) > 0)
							<div class = "alert alert-danger">
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
							@endif
							@foreach ($posts as $post)
							<article class="post" data-postid="{{$post->id}}">
								<div class="container" id='{{$post->id}}' style="margin-top: 10px; ">
									<div class="row">
										<div class="col-md-8">
											<div class="media g-mb-30 media-comment">
												<div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
												  <div class="g-mb-15">
													 <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15" src="{{asset($post->user->profile->photo)}}" alt="Image Description">
													 <span class="g-color-gray-dark-v4" >{{$post->created_at->diffForHumans()}} - </span>
													 <span class="g-color-gray-dark-v4" >
														@if ($post->private != 0)
														<i class="fa fa-lock"></i>
														@else
														<i class="fa fa-globe" aria-hidden="true"></i>
														@endif	 
													</span>
													 <h5 class="h5 g-color-gray-dark-v1 mb-0">{{$post->user->name}}</h5>
													
													</div>
													<p>{{$post->content}}</p>
													@if ($post->image != null)
													<img class="media-body card-img-top" src="{{URL::asset($post->image)}}" alt="Card image cap"  style="max-width:100%;height:auto; margin-bottom:10px">
													@elseif($post->video != null)
													<div style="max-width:100%;height:auto;">
															<video width="100%" height="auto" controls>
																<source src="{{URL::asset($post->video)}}" type="video/mp4" >
															</video>
													</div>
														{{-- @if ($errors->has('video'))
															{{$errors->first('video')}}
														@endif --}}
													@endif
												  <ul class="list-inline d-sm-flex my-0">
													@if (Auth::user()->id == $user->id)
													<div style="margin:5px;" >
													  <form>
														@csrf
														<button class="btn btn-danger pull-left" data-post_id="{{$post->id}}" type="submit" id="delete_post" ><span><i class="fa fa-trash"></i></span></button>
													  </form>
													</div>
													@endif
													{{-- <li class="list-inline-item ml-auto">
													  <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
														<i class="fa fa-bookmark"></i>
														Save
													  </a>
													</li> --}}
												  </ul>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div>
								</article>							
							@endforeach
						   @endif
						   <style>
							   .media-body{
								   border-radius:25px;
							   }
							   .dropbtn {
								   
  color: #f95959;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}


.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
						   </style>
					<script>
												/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
						var postId = 0;
						// $('.post').find('.interaction').find('.delete').on('click',function(event){
						// 	event.preventDefault();
							// postId = event.target.parentNode.parentNode.dataset['postid'];
						// });
						$('div.message').delay(4000).slideUp(300); //time to success message
						// Like Dislike Actions



						//delete 
						$(document).on('click','#delete_post',function(e){
							e.preventDefault();
							// var comment_input = $('#comment_input').val();        
							var formData = {
								 post_id : $(this).data("post_id"),
								_token: "{{ csrf_token() }}",               
								dataType: 'json', 
								contentType:'application/json',
						};     
						var post_id = $(this).data("post_id");
						var urlDeletePost = '{{route('post.delete',':post_id')}}';
								$.ajax({ 
									type : 'DELETE',
									url : urlDeletePost,
									data: formData,
									success:function(data){
									document.getElementById(post_id).style.display = "none";
						},
									error:function(reject){
						
									}
								})
							});

						// /Like Dislike Actions
					</script>
						   {{-- End Post Page --}}
						 {{-- end right nav --}}                             
@endsection