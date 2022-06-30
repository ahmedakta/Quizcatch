@extends('layouts.main')
@section('main')
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
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container" style="margin-top: 10px;">
    <div class="row">
        <div class="col-md-8">
            <div class="media g-mb-30 media-comment">
                        <h3>comments</h3>
                        {{-- <p>{{$item->}}</p> --}}
            </div>
        </div>
    </div>
</div>
@if ($comments->count() > 0)            
        @foreach ($comments as $item)
        <div class="container" id='{{$item->id}}' style="margin-top: 10px;">
            <div class="row">
                <div class="col-md-8">
                    <div class="media g-mb-30 media-comment">
                        <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                        <div class="g-mb-15">
                            <a href="{{route('user.profile',$item->user->user_name)}}"> <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15" style="border-radius: 20px" src="{{asset($item->user->profile->photo)}}" alt="Image Description"></a>
                            {{-- <span class="g-color-gray-dark-v4">123 Followers - </span> todo --}}
                            <span class="g-color-gray-dark-v4" >{{$item->created_at->diffForHumans()}}</span>
                            <h5 class="h5 g-color-gray-dark-v1 mb-0">{{$item->user->name}}</h5>
                            </div>
                            <p>{{$item->content}}</p>
                            @if ($post->user_id == Auth::user()->id)
                                <form>
                                    @csrf
                                    <button class="btn btn-danger pull-right" data-comment_id="{{$item->id}}" type="submit" id="delete_comment" ><span><i class="fa fa-trash"></i></span></button>
                                    {{-- <div>{{$post->id}}</div> --}}
                                    <div class="interaction">
                                        {{-- {{$post->likes->where('like', 1)->count()}} <a href="#" id="isLike" data-id="{{$post->id}}" type="submit" class="like fa fa-thumbs-up g-pos-rel g-top-1 g-mr-3" style="margin-right:20px; ">Like</a> todo--}}
                                        {{-- {{$post->likes->where('like', 0)->count()}} <a href="#" id="isLike"  data-id="{{$post->id}}" type="submit" class="like fa fa-thumbs-down g-pos-rel g-top-1 g-mr-3" style="margin-right:20px">Dislike</a> --}}
                                    </div>
                                </form>
                            @elseif($item->user_id == Auth::user()->id)
                                <form>
                                    @csrf
                                    <button class="btn btn-danger pull-right" data-comment_id="{{$item->id}}" type="submit" id="delete_comment" ><span><i class="fa fa-trash"></i></span></button>
                                    {{-- <div>{{$post->id}}</div> --}}
                                    <div class="interaction">
                                        {{-- {{$post->likes->where('like', 1)->count()}} <a href="#" id="isLike" data-id="{{$post->id}}" type="submit" class="like fa fa-thumbs-up g-pos-rel g-top-1 g-mr-3" style="margin-right:20px; ">Like</a> todo--}}
                                        {{-- {{$post->likes->where('like', 0)->count()}} <a href="#" id="isLike"  data-id="{{$post->id}}" type="submit" class="like fa fa-thumbs-down g-pos-rel g-top-1 g-mr-3" style="margin-right:20px">Dislike</a> --}}
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
@else
<div class="container" style="margin-top: 10px;">
    <div class="row">
        <div class="col-md-8">
            <div class="alert alert-danger" role="alert">
    No comments yet.
            </div>
        </div>
    </div>
</div>
@endif
        <script>
            //delete post comments
            $(document).on('click','#delete_comment',function(e){
                e.preventDefault();
                // var comment_input = $('#comment_input').val();        
                var formData = {
                    comment_id : $(this).data("comment_id"),
                    _token: "{{ csrf_token() }}",               
                    dataType: 'json', 
                    contentType:'application/json',
            };     
            var comment_id = $(this).data("comment_id");
            var urlDeleteComment = '{{route('comment.delete',':comment_id')}}';
                    $.ajax({ 
                        type : 'DELETE',
                        url : urlDeleteComment,
                        data: formData,
                        success:function(data){
                        document.getElementById(comment_id).style.display = "none";
            },
                        error:function(reject){
            
                        }
                    })
                });
        </script>
@endsection