@extends('layouts.main')
@section('main')
<div class="panel" style="margin:15px;border-radius:20px">
    <div style="margin: 20px">
        <form action="{{route('quiz.update',$quiz)}}" method="POST" enctype="multipart/form-data">
            @csrf
        @if ($quiz->image != null)
        <img src="{{URL::asset($quiz->image)}}" style="height:auto; width:100%; margin:10px;">
        <label style="color:#f95959" >
            <i class="fa fa-camera" style="margin-top: 15px"></i>
            <input name="image" class="custom-file-input" type="file" accept="image/*">
          </label>
        @endif
        <div style="margin-top: 50px">
            Title
            <input type="text" value="{{$quiz->title}}" name="title" id="">
            <hr style="border-width:3px;border-color:#f95959">
                <textarea name="explanation" id="explanation" cols="30" rows="3">{{$quiz->explanation}}</textarea>
        </div>
        <div class="g-mb-15">
        {{$quiz->questions()->count()}} Questions <br>
        <hr>
        <br>
        @foreach ($quiz->questions()->get() as $item)
        <div id='{{$item->id}}'>{{$item->title}}
            <form>
            @csrf
            <button class="btn btn-danger" data-question_id="{{$item->id}}" type="submit" id="delete_question" ><span><i class="fa fa-1x fa-trash"></i></span></button>
          </form>
        </div>
        @endforeach
        <br>
        {{$quiz->result()->count()}} Catch count
        </div>
        @if ($quiz->end_time != null)    
        <h3>
            stopped at
        </h3>
        <div>
            <input type="datetime-local" value="{{$quiz->end_time}}" class="form-control" name="end_time">
        </div>
        @endif
        <button class="btn btn-primary pull-left" type="submit">Save Changes</button>
            <a href="{{url()->previous()}}" class="btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
        </form>
    </div>
</div>
<script>
                            $(document).on('click','#delete_question',function(e){
							e.preventDefault();
							// var comment_input = $('#comment_input').val();        
							var formData = {
                                question_id : $(this).data("question_id"),
								_token: "{{ csrf_token() }}",               
								dataType: 'json', 
								contentType:'application/json',
						};     
						var question_id = $(this).data("question_id");
						var urlDeleteQuestion = '{{route('question.delete',':question_id')}}';
								$.ajax({ 
									type : 'DELETE',
									url : urlDeleteQuestion,
									data: formData,
									success:function(data){
									document.getElementById(question_id).style.display = "none";
						},
									error:function(reject){
						
									}
								})
							});
</script>
@endsection