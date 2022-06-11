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
							You Don't Saved Posts Yet.
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
								<div class="container" style="margin-top: 10px; ">
									<div class="row">
										<div class="col-md-8">
											<div class="media g-mb-30 media-comment">
												<div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
												  <div class="g-mb-15">
													 <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15" src="{{asset('media/photo.jpeg')}}" alt="Image Description">
													 <div class="dropdown pull-right">
														<i class="fa fa-bookmark"></i> {{$post->saves->where('post_id', $post->id)->first()->created_at->diffForHumans()}}
													  </div>
													 <span class="g-color-gray-dark-v4">123 Followers - </span>
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
													<img class="card-img-top" src="{{URL::asset($post->image)}}" alt="Card image cap" style="height: 310px; width:400px; margin-bottom:10px">
													@elseif($post->video != null)
														<video width="350" height="230" >
															<source src="{{URL::asset($post->video)}}" type="video/mp4" >
														</video>
														{{-- @if ($errors->has('video'))
															{{$errors->first('video')}}
														@endif --}}
													@endif
												  <ul class="list-inline d-sm-flex my-0">
													<li class="list-inline-item g-mr-20">
														<form>
															{{-- <div>{{$post->id}}</div> --}}
															<div class="interaction">
																{{$post->likes->where('like', 1)->count()}} <a href="#" id="isLike" data-id="{{$post->id}}" type="submit" class="like fa fa-thumbs-up g-pos-rel g-top-1 g-mr-3" style="margin-right:20px; ">Like</a>
																{{$post->likes->where('like', 0)->count()}} <a href="#" id="isLike"  data-id="{{$post->id}}" type="submit" class="like fa fa-thumbs-down g-pos-rel g-top-1 g-mr-3" style="margin-right:20px">Dislike</a>
																{{-- <input  id="post_id" class="post_id" type="hidden" name="post_id" value="{{$post->id}}"> --}}
																@if (Auth::user() == $post->user)
																	<a href="{{ route('post.edit', ['post' => $post->id]) }}" class="edit">Edit</a> |
																	<a href="{{ route('post.delete', ['post' => $post->id]) }}" class="delete">Delete</a>
																@endif
															</div>
															
														</form>
														
													</li>
													<li class="list-inline-item ml-auto">
													  <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
														<i class="fa fa-reply g-pos-rel g-top-1 g-mr-3"></i>
														Comment
													  </a>
													</li>
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
						 var urlLike = '{{route('post.like')}}';
						$('.like').on('click',function(event){
							event.preventDefault();
							var isLike = event.target.previousElementSibling == null;
							// console.log(isLike);
							$.ajaxSetup({
								headers: {
									'X-CSRF-TOKEN': "{{ csrf_token() }}"
									}
								});
								var formData = {
									post_id: $(this).data("id"),
									isLike: isLike, 
									contentType: "application/json; charset=utf-8",
									enctype: 'multipart/form-data',                
								};   
								console.log(formData);
							$.ajax({
								type: 'POST',
								url: urlLike,
								data: formData,
								success:function(data){
								$("#msg").html(data.msg);
								},
								error:function(reject){
								}
								 //Post Id For Learn Which Post We Do actions On ther.
							})
								.done(function(){
									//Change The Page
									event.target.innerText = isLike ? event.target.innerText == 'Like' ? 'You liked this post' : 'Like' : event.target.innerText == 'Dislike' ? 'You don\'t liked this post' : 'Dislike' ;
									if(isLike){
												event.target.nextElementSibling.innerText == 'Dislike';
									}else{
										event.target.previousElementSibling.innerText == 'Like';
									}
									// if(isLike){
									// 	$('a.like.fa-thumbs-up').bind('style', function(e) {
									// 		console.log( $(this).attr('style') );
									// 	});
									// 	$('a.like.fa-thumbs-up').css('color','#0080F0');
									// }else{
									// 	event.target.previousElementSibling.innerText == 'Like';
									// }
								});
						});


						// /Like Dislike Actions
					</script>
						   {{-- End Post Page --}}
						 {{-- end right nav --}}                             
@endsection