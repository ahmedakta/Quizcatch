@extends('layouts.main')
@section('main')
<title>Posts | Quiz Catch </title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

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
							@foreach ($posts as $saved_post)								
							<article class="post" data-postid="{{$saved_post->id}}">
								<div class="container" id='{{$saved_post->id}}' style="margin-top: 10px; ">
									<div class="row">
										<div class="col-md-8">
											<div class="media g-mb-30 media-comment">
												<div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
												  <div class="g-mb-15">
													<a href="{{route('user.profile',$saved_post->post->user->user_name)}}"><img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15" src="{{asset($saved_post->post->user->profile->photo)}}" alt="Image Description"></a>
													 <div class="dropdown pull-right">
														<i class="fa fa-bookmark"></i> {{$saved_post->created_at->diffForHumans()}}
													  </div>
													 <span class="g-color-gray-dark-v4" >{{$saved_post->post->created_at->diffForHumans()}} - </span>
													 <span class="g-color-gray-dark-v4" >
														 @if ($saved_post->post->private != 0)
														 <i class="fa fa-lock"></i>
														 @else
														 <i class="fa fa-globe" aria-hidden="true"></i>
														 @endif	 
														</span>
														<h5 class="h5 g-color-gray-dark-v1 mb-0">{{$saved_post->post->user->name}}</h5>
													
													</div>
													<p>{{$saved_post->post->content}}</p>
													@if ($saved_post->post->image != null)
													<img class="media-body card-img-top" src="{{URL::asset($saved_post->post->image)}}" alt="Card image cap"  style="max-width:100%;height:auto; margin-bottom:10px">
													@elseif($saved_post->post->video != null)
													<div style="max-width:100%;height:auto;">
															<video width="100%" height="auto" controls>
																<source src="{{URL::asset($saved_post->post->video)}}" type="video/mp4" >
															</video>
													</div>
														{{-- @if ($errors->has('video'))
															{{$errors->first('video')}}
														@endif --}}
													@endif
												  <ul class="list-inline d-sm-flex my-0">
													<li class="list-inline-item g-mr-20">
														<form>
															@csrf
															<button class="btn btn-danger" data-post_id="{{$saved_post->id}}" type="submit" id="delete_saved_post" ><span><i class="fa fa-trash"></i></span></button>
															{{-- <div>{{$post->id}}</div> --}}
															<div class="interaction">
																{{-- {{$post->likes->where('like', 1)->count()}} <a href="#" id="isLike" data-id="{{$post->id}}" type="submit" class="like fa fa-thumbs-up g-pos-rel g-top-1 g-mr-3" style="margin-right:20px; ">Like</a> todo--}}
																{{-- {{$post->likes->where('like', 0)->count()}} <a href="#" id="isLike"  data-id="{{$post->id}}" type="submit" class="like fa fa-thumbs-down g-pos-rel g-top-1 g-mr-3" style="margin-right:20px">Dislike</a> --}}

															</div>
															
														</form>
														
													</li>
													<li class="list-inline-item ml-auto">
														<a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="{{route('post.comments',$saved_post->post)}}">
															<span><i class="fa fa-comment"></i></span>
															Comments
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
						//delete post
						$(document).on('click','#delete_saved_post',function(e){
							e.preventDefault();
							// var comment_input = $('#comment_input').val();        
							var formData = {
								 save_id : $(this).data("post_id"),
								_token: "{{ csrf_token() }}",               
								dataType: 'json', 
								contentType:'application/json',
						};     
						var post_id = $(this).data("post_id");
						var urlDeleteSave = '{{route('saved.delete',':post_id')}}';
								$.ajax({ 
									type : 'DELETE',
									url : urlDeleteSave,
									data: formData,
									success:function(data){
									document.getElementById(post_id).style.display = "none";
						},
									error:function(reject){
						
									}
								})
							});


					</script>
						   {{-- End Post Page --}}
						 {{-- end right nav --}}                             
@endsection