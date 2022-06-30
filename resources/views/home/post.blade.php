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
						@if(session()->has('message'))
						<p class="alert alert-success"> {{ session()->get('message') }}</p>
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
							No Posts Yet.
						  </div>
							@else
							@foreach ($posts as $post)
							<article class="post" data-postid="{{$post->id}}">
								<div class="container" style="margin-top: 10px;">
									<div class="row">
										<div class="col-md-8">
											<div class="media g-mb-30 media-comment">
												<div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
												  <div class="g-mb-15">
													<a href="{{route('user.profile',$post->user->user_name)}}"> <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15" style="border-radius: 20px" src="{{asset($post->user->profile->photo)}}" alt="Image Description"></a>
													 <div class="pull-right">
														 <form>
															 <a href="#" id="isSave" data-id="{{$post->id}}" type="submit" class="save fa fa-bookmark" style="margin-right:20px;"> Save</a>
														 </form>
													  </div>
													 {{-- <span class="g-color-gray-dark-v4">123 Followers - </span> todo --}}
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
													<li class="list-inline-item g-mr-20">
														<form>
															{{-- <div>{{$post->id}}</div> --}}
															<div class="interaction">
																{{-- {{$post->likes->where('like', 1)->count()}} <a href="#" id="isLike" data-id="{{$post->id}}" type="submit" class="like fa fa-thumbs-up g-pos-rel g-top-1 g-mr-3" style="margin-right:20px; ">Like</a> todo--}}
																{{-- {{$post->likes->where('like', 0)->count()}} <a href="#" id="isLike"  data-id="{{$post->id}}" type="submit" class="like fa fa-thumbs-down g-pos-rel g-top-1 g-mr-3" style="margin-right:20px">Dislike</a> --}}
																{{-- <input  id="post_id" class="post_id" type="hidden" name="post_id" value="{{$post->id}}"> --}}
																@if (Auth::user() == $post->user)
																	<a href="{{ route('post.edit', ['post' => $post->id]) }}" class="edit">Edit</a> |
																	<a href="{{ route('post.delete', ['post' => $post->id]) }}" class="delete">Delete</a>
																@endif
															</div>

														</form>
														{{-- <form>
															<div class="interaction">
																	 <a href="#home" ><i class="fa fa-bookmark g-pos-rel g-top-1 g-mr-3s"></i> Save</a>
															</div>

														</form> --}}
													</li>
													<li class="list-inline-item ml-auto">
													  <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="{{route('post.comments',$post)}}">
														<span><i class="fa fa-comment"></i></span>
														Comments
													  </a>
													</li>
													<form class="ajaxComment">
														@csrf
														<div class="d-flex flex-row add-comment-section mt-4 mb-4" style="margin-top:20px;margin-bottom:10px">
															<input type="text" id='comment_input' class="comment form-control mr-3" placeholder="Add comment"  name="content" maxlength="80">
															<button class="btn btn-info" data-post_id="{{$post->id}}" type="submit" id="comment" ><span><i class="fa fa-reply g-pos-rel g-top-1 g-mr-3"></i></span></button>
														</div>
													</form>
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
						   </style>
					<script>

						// like count
// 						$(document).ready(function() {
//     function updateDataCount(){
//       $('#datacount').load('getDataCount.php');
//     }
//     updateDataCount(); //set the datacount as soon as the page is loaded
//     setInterval( "updateDataCount()", 10000 ); //update the datacount every 10 seconds
//   });



												/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
						var postId = 0;
						// $('.post').find('.interaction').find('.delete').on('click',function(event){
						// 	event.preventDefault();
							// postId = event.target.parentNode.parentNode.dataset['postid'];
						// });
						$('div.message').delay(4000).slideUp(300); //time to success message
						// Like Dislike Actions
						//  var urlLike = '{{route('post.like')}}';
						// $('.like').on('click',function(event){
						// 	event.preventDefault();
						// 	var isLike = event.target.previousElementSibling == null;
						// 	// console.log(isLike);
						// 	$.ajaxSetup({
						// 		headers: {
						// 			'X-CSRF-TOKEN': "{{ csrf_token() }}"
						// 			}
						// 		});
						// 		var formData = {
						// 			post_id: $(this).data("id"),
						// 			isLike: isLike,
						// 			contentType: "application/json; charset=utf-8",
						// 			enctype: 'multipart/form-data',
						// 		};
						// 		console.log(formData);
						// 	$.ajax({
						// 		type: 'POST',
						// 		url: urlLike,
						// 		data: formData,
						// 		success:function(data){
						// 		$("#msg").html(data.msg);
						// 		},
						// 		error:function(reject){
						// 		}
						// 		 //Post Id For Learn Which Post We Do actions On ther.
						// 	})
						// 		.done(function(){
						// 			//Change The Page
						// 			event.target.innerText = isLike ? event.target.innerText == 'Like' ? 'Liked' : 'Like' : event.target.innerText == 'Dislike' ? 'Disliked' : 'Dislike' ;
						// 			if(isLike){
						// 				event.target.nextElementSibling.innerText == 'Dislike';
						// 			}else{
						// 				event.target.previousElementSibling.innerText == 'Like';
						// 			}
						// 			// if(isLike){
						// 			// 	$('a.like.fa-thumbs-up').bind('style', function(e) {
						// 			// 		console.log( $(this).attr('style') );
						// 			// 	});
						// 			// 	$('a.like.fa-thumbs-up').css('color','#0080F0');
						// 			// }else{
						// 			// 	event.target.previousElementSibling.innerText == 'Like';
						// 			// }
						// 		});
						// });

						//Post Save
						var urlSave = '{{route('post.save')}}';
						$('.save').on('click',function(event){
							event.preventDefault();
							var isSave = event.target.previousElementSibling == null;
							console.log(isSave);
							$.ajaxSetup({
								headers: {
									'X-CSRF-TOKEN': "{{ csrf_token() }}"
									}
								});
								var formData = {
									post_id: $(this).data("id"),
									isSave: isSave,
									contentType: "application/json; charset=utf-8",
									enctype: 'multipart/form-data',
								};
								console.log(formData);
							$.ajax({
								type: 'POST',
								url:urlSave,
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
									// event.target.innerText = isSave ? event.target.innerText == 'Save' ? 'Saved' : 'Save';
									// if(isSave){
										// event.target.innerText == 'Saved';
									// }else{
										// event.target.previousElementSibling.innerText == 'Save';
									// }
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

						//post comments
						var urlComment = '{{route('post.comment')}}';
						$.ajaxSetup({
							headers: {
								'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							}
						});
						$(document).on('click','#comment',function(e){
							e.preventDefault();
							let form = $(this).closest('.ajaxComment');
							let comment_input = form.find("input[name=content]").val();
							// var comment_input = $('#comment_input').val();        
							var formData = {
								post_id: $(this).data("post_id"),
								content:  comment_input,
								_token: "{{ csrf_token() }}",               
								dataType: 'json', 
								contentType:'application/json',
						};     
								$.ajax({ 
									type : 'POST',
									url : urlComment,
									data: formData,
									success:function(data){
											$("#msg").html(data.msg);
									},
									error:function(reject){
						
									}
								})
								.done(function(){
									$('input[id="comment_input"]').val('');
								});
							});
							
						// /Like Dislike Actions
					</script>
						   {{-- End Post Page --}}
						 {{-- end right nav --}}
@endsection
