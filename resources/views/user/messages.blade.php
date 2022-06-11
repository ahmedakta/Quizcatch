@extends('layouts.main')
@section('main')
<title>Messages | Quiz Catch </title>

{{-- <div class="list-group" id="list-tab" role="tablist">
    <a
    class="list-group-item list-group-item-action"
    id="list-home-list"
    data-mdb-toggle="list"
    aria-controls="list-home"
    ><i class="fa fa-comment"></i> Online Users</a>
</div>
@foreach ($users as $online_users)
<div class="recent-border mt-4">
    <span class="recent-orders">
    @if($online_users->isOnline())
    {{$online_users->name}}
    <i class="text-success"><i class="fa fa-circle"></i> ONLINE</i>
   @endif
  </span>
</div>
@endforeach --}}
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h3>Oline Users</h3>
<hr>
            <ul class="list-group">
                @foreach ($users as $online_users)
                    @if ($online_users->isOnline())
                    <li class="list-group-item"> <i class="text-success"><i class="fa fa-circle"></i></i>
                        {{$online_users->name}}</li>
                    
                    @endif
                @endforeach
             </ul><!-- end list group -->
        </div><!-- end list -->


        <div class="col-md-9 d-flex flex-column" style  ="height:80vh; background-color:white">
            <div class="h-100 bg-white mb-4 p-5" id="chat" style="overflow-y:scroll;">
                @foreach ($messages as $message)
                <div style="margin-top:5px; width:50px; text-color:white; padding:3px;  {{Auth::user()->id == $message->user_id ? 'float:right ; margin-top:40px; background-color:black' : ''}} ">
                    {{$message->body}}
                </div>
                    
                @endforeach
            </div>
        </div>
    </div><!-- end row -->
    <form action="">

        <input type="text" name="" id="" style="width: 500px" id="chat-text">
        <button class="btn btn-primary">send</button>
    </form>
 </div> <!-- end container -->


@endsection