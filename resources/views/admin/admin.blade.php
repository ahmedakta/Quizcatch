
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
                        <h4>{{$users->count()}}</h4>
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
                        <h4>{{$posts}}</h4>
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
				<h3>Online Users</h3>
                @foreach ($users as $item)
                        @if ($item->isOnline())
                        {{$item->name}} | {{$item->email}} <br>
                        @endif
                @endforeach
				<h3>Users</h3>
				<table class="table" style=" overflow-y:scroll;
				height:300px;
				display:block;">
					<thead>
					  <tr>
						<th scope="col">#</th>
						<th scope="col">Name</th>
						<th scope="col">User Name</th>
						<th scope="col">Email</th>
						<th scope="col">Action</th>
					  </tr>
					</thead>
					<tbody>
						@foreach ($users as $user)
					  <tr id='{{$user->id}}'>
						<th scope="row">{{$count++}}</th>
						<td>{{$user->name}}</td>
						<td>{{$user->user_name}}</td>
						<td style="width: 20px">{{$user->email}}</td>
						<form>
							@csrf
							<td style="width: 20px"><a class="btn btn-danger" id="delete_user" data-user_id="{{$user->id}}" href="{{route('admin.delete.user',$user)}}">delete</a></td>
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
							$(document).on('click','#delete_user',function(e){
							e.preventDefault();
							// var comment_input = $('#comment_input').val();        
							var formData = {
								 user_id : $(this).data("user_id"),
								_token: "{{ csrf_token() }}",               
								dataType: 'json', 
								contentType:'application/json',
						};     
						var user_id = $(this).data("user_id");
						console.log(user_id);
						var urlDeleteUser = '{{route('admin.delete.user',':user_id')}}';
								$.ajax({ 
									type : 'DELETE',
									url : urlDeleteUser,
									data: formData,
									success:function(data){
									document.getElementById(user_id).style.display = "none";
						},
									error:function(reject){
						
									}
								})
							});
</script>

</body>
@endsection
