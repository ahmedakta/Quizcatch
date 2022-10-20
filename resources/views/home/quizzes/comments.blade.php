@extends('layouts.main')
@section('main')

<div class="panel panel-default">
    <a href="{{route('quiz.show',$quiz)}}">
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
            @if ($quiz->end_time != null)
            Quiz End At : {{$quiz->end_time}}
            @endif
        </div>
      </div>
      {{-- <div class="panel-footer">
        <div class="row">
          ...
        </div>
      </div> --}}
    </a>
</div>
<h3>comments and ratings</h3>
<form class="ajaxComment">
    @csrf
    <div class="d-flex flex-row add-comment-section mt-4 mb-4" style="margin-top:20px;margin-bottom:10px">
        <input type="text" id='comment_input' class="comment form-control mr-3" placeholder="Add comment"  name="content" maxlength="80">
        <button class="btn btn-info" data-post_id="{{$quiz->id}}" type="submit" id="comment" ><span><i class="fa fa-reply g-pos-rel g-top-1 g-mr-3"></i></span></button>
    </div>
</form>
  
{{-- @foreach ($quiz->comments()->get() as $item)
    {{$item->content}}
    {{$item->star_rating}}
@endforeach --}}

<script>
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
							
</script>
@endsection