
@extends('layouts.home')
@section('home')

<body>
	
<div class="fh5co-loader"></div>

<div id="page">


<div id="fh5co-contact">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-push-1 animate-box">
				
				<div class="fh5co-contact-info">
					<a href="{{route('admin.dashboard')}}" style="color:black"><h3>Users</h3></a>
					<ul>
						{{-- <li class="address">198 West 21th Street, <br> Suite 721 New York NY 10016</li> --}}
                        <h4>{{$users}}</h4>
					</ul>
				</div>
				<div class="fh5co-contact-info">
					<a href="{{route('admin.quizzes')}}" style="color:black"><h3>Quizzes</h3></a>
					<ul>
						{{-- <li class="address">198 West 21th Street, <br> Suite 721 New York NY 10016</li> --}}
                        <h4>{{$quizzes}}</h4>
					</ul>
				</div>
				<div class="fh5co-contact-info">
					<a href="{{route('admin.posts')}}" style="color:black"><h3>Posts</h3></a>
					<ul>
						{{-- <li class="address">198 West 21th Street, <br> Suite 721 New York NY 10016</li> --}}
                        <h4>{{$posts->count()}}</h4>
					</ul>
				</div>
				<div class="fh5co-contact-info">
					<h3>All results count</h3>
					<ul>
						{{-- <li class="address">198 West 21th Street, <br> Suite 721 New York NY 10016</li> --}}
                        <h4>{{$catched_quizzes}}</h4>
					</ul>
				</div>

			</div>
			<div class="col-md-6 animate-box">
				@php
					$count = 1;
				@endphp
				<h3>Posts</h3>
				<table class="table" style=" overflow-y:scroll;
				height:500px;
                width:600px;
				display:block;">
					<thead>
					  <tr>
						<th scope="col">#</th>
						<th scope="col">content</th>
						<th scope="col">Action</th>
					  </tr>
					</thead>
					<tbody>
						@foreach ($posts as $post)
					  <tr id='{{$post->id}}'>
						<th scope="row">{{$count++}}</th>
						<td>{{$post->content}}</td>
                        <td>
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
                        </td> 
						<form>
							@csrf
							<td style="width: 20px"><a class="btn btn-danger" id="delete_post" data-post_id="{{$post->id}}" href="{{route('admin.delete.post',$post)}}">delete</a></td>
						</form>
					  </tr>
					  @endforeach
					</tbody>
				  </table>
					{{--online users  --}}
			</div>
		</div>
		
	</div>
</div>

</div>

<div class="gototop js-top">
	<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>

<script>
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
                            var urlDeletePost = '{{route('admin.delete.post',':post_id')}}';
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
</script>

</body>
@endsection
