@extends('layouts.main')
@section('main')
<div class="panel" style="margin:15px;border-radius:20px">
    <div style="margin: 20px">
        <div>
            <form action="{{route('post.update',$post)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @if ($post->image != null)
            <img src="{{URL::asset($post->image)}}" style="height:auto; width:100%; margin:10px;">
            <label style="color:#f95959" >
                <i class="fa fa-camera" style="margin-top: 15px"></i>
                <input name="image" class="custom-file-input" type="file" accept="image/*">
              </label>
            @elseif($post->video != null)
            <div style="max-width:100%;height:auto;">
                <video width="100%" height="auto" controls>
                    <source src="{{URL::asset($post->video)}}" type="video/mp4" >
                </video>
            </div>
            <label style="color:#f95959" >
                <i class="fa fa-video-camera" style="margin: 15px"></i>
                <input name="video" class="custom-file-input" type="file"  accept="video/*" controls preload>
            </label>            {{-- @if ($errors->has('video'))
                    {{$errors->first('video')}}
                @endif --}}
            @else
            <div>No Media</div>
            @endif
        </div>
        <div style="margin-top: 50px">
            <hr style="border-width:3px;border-color:#f95959">
                <textarea name="content" id="" cols="30" rows="3">{{$post->content}}</textarea>

        </div>
        <div class="g-mb-15">
            <button class="btn btn-primary pull-left" type="submit">Save Changes</button>
            <a href="{{url()->previous()}}" class="btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
        </form>
    </div>
</div>

@endsection