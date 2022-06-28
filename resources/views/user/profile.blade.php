@extends('layouts.home')
@section('home')
<title>{{Auth::user()->name}} | Quiz Catch </title>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<section id="content" class="container">
    <!-- Begin .page-heading -->
    <div class="page-heading">
      @if(session()->has('message'))
      <p class="alert alert-success"> {{ session()->get('message') }}</p>
      @endif
        <div class="media clearfix">
          <div class="media-left pr30">
              <img class="media-object mw150" style="width:200px" src="{{asset($profile->photo)}}" alt="...">
          </div>                      
          <div class="media-body va-m">
            <h2 class="media-heading">{{$user->name}}</h2>
            <small> - Profile</small>
            <p>User Name :  {{$user->user_name}}</p>
            <p class="lead">{{$user->profile->about}}</p>
            {{-- <div class="media-links">
              <ul class="list-inline list-unstyled">
                <li>
                  <a href="#" title="facebook link">
                    <span class="fa fa-facebook-square fs35 text-primary"></span>
                  </a>
                </li>
                <li>
                  <a href="#" title="twitter link">
                    <span class="fa fa-twitter-square fs35 text-info"></span>
                  </a>
                </li>
                <li>
                  <a href="#" title="google plus link">
                    <span class="fa fa-google-plus-square fs35 text-danger"></span>
                  </a>
                </li>
                <li class="hidden">
                  <a href="#" title="behance link">
                    <span class="fa fa-behance-square fs35 text-primary"></span>
                  </a>
                </li>
                <li class="hidden">
                  <a href="#" title="pinterest link">
                    <span class="fa fa-pinterest-square fs35 text-danger-light"></span>
                  </a>
                </li>
                <li class="hidden">
                  <a href="#" title="linkedin link">
                    <span class="fa fa-linkedin-square fs35 text-info"></span>
                  </a>
                </li>
                <li class="hidden">
                  <a href="#" title="github link">
                    <span class="fa fa-github-square fs35 text-dark"></span>
                  </a>
                </li>
                <li class="">
                  <a href="#" title="phone link">
                    <span class="fa fa-phone-square fs35 text-system"></span>
                  </a>
                </li>
                <li>
                  <a href="#" title="email link">
                    <span class="fa fa-envelope-square fs35 text-muted"></span>
                  </a>
                </li>
                <li class="hidden">
                  <a href="#" title="external link">
                    <span class="fa fa-external-link-square fs35 text-muted"></span>
                  </a>
                </li>
              </ul>
            </div> --}}
          </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
          <div class="panel">
            <div class="panel-heading">
              <span class="panel-icon">
              </span>
              <span class="panel-title">About
              @if (Auth::user()->id == $user->id)
              <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModalLong">
                <i class="fa fa-pencil"></i> Edit Profile
               
              </button>
                @endif

                
              </span>
            </div>
            <div class="panel-body pb5">
              <h4>Gender : {{$user->profile->gender}}</h4>
              <h4>Birth Date : {{$user->profile->date_of_birth}}</h4>
              <h4>Phone Number : {{$user->profile->phone_number}}</h4>
              <h4>{{$user->quizzes->count()}} Quizzes</h4>
              <h4>{{$user->posts->count()}} Posts</h4>
              <hr class="short br-lighter">
              <h6>Education</h6>

              <h4>{{$user->profile->education}}</h4>

              <hr class="short br-lighter">

              <h6>Rewards</h6>
              {{-- @if ($accomplishment_status['text']) --}}
              {{-- {{$accomplishment_status}}  --}}
              {{-- @endif --}}
              @if (is_array($accomplishment_status))
                  @foreach($accomplishment_status as $imagePath)
                        <img style="width:80px" src="{{$imagePath}}" alt="">
                  @endforeach
              @else
              <div>{{$accomplishment_status}}</div>
              @endif
              <p class="text-muted pb10"> 
                <br>
              </p>

            </div>
          </div>
        </div>
        <div class="col-md-8">

          <div class="tab-block">
            <ul class="nav nav-tabs">
              <li class="active">
                <a href="#quizzes" data-toggle="tab">Quizzes</a>
              </li>
              <li>
                <a href="#posts" data-toggle="tab">Posts</a>
              </li>
              {{-- <li>
                <a href="#messages" data-toggle="tab">Messages</a>
              </li>
              <li>
                <a href="#follow" data-toggle="tab">Follow</a>
              </li> todo --}}
            </ul>
            <div class="tab-content p30" style="height: 730px;">
              <div id="quizzes" class="tab-pane active">
              @if (count($quizzes)>0)
                @foreach ($quizzes as $quiz)
                <div class="container" style="margin-top: 10px;  ">
                  <div class="row">
                    <div class="col-md-8">
                      <div class="media g-mb-30 media-comment" style="border-radius: 25px;"">
                        <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                          <div class="g-mb-15">
                           <br>
                           <h1 class="h3 g-color-gray-dark-v1 mb-0" >{{$quiz->title}}</h1>
                           <p>{{$quiz->questions()->count()}} Questions</p>
                           <p>{{$quiz->result()->count()}} Catch count</p>
                          <span class="h5 g-color-gray-dark-v4 g-font-size-8">{{$quiz->created_at->diffForHumans()}}</span>
                        </div>
                        <div style="margin:5px;">
                          <a href="{{route('quiz.show',$quiz)}}" class="btn btn-info pull-left" type="submit" ><span><i class="fa fa-eye"></i></span></a>
                        </div>
                          <ul class="list-inline d-sm-flex my-0">
                            @if (Auth::user()->id == $user->id)
                            <div style="margin:5px;">
                              <a href="{{route('quiz.show',$quiz)}}" class="btn btn-info pull-left" type="submit" ><i class="fa fa-pencil"></i></a>
                              <form action="{{route('quiz.delete',$quiz)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit">
                                  <span>
                                    <i class="fa fa-trash"></i>
                                  </span>
                                </button>
                              </form>
                            </div>
                            @endif
                          </ul>
                          <hr style="border-width:1px;border-color:#191717">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>	
                @endforeach
              @else
              <div class="alert alert-warning" role="alert">
                  No Quizzes Yet. 
                  @if (Auth::user()->id == $user->id)
                  <a href="{{route('quiz.create')}}">Create</a>
                  @endif
              </div>
              @endif
              </div>
              <div id="posts" class="tab-pane">
                <div class="media-body">
                  @if (count($posts)>0)
                  @foreach ($posts as $post)
                  {{-- @if ($post->private !=)
                      
                  @endif --}}
                  <h5 class="media-heading mb20">{{$user->name}}
                    <small> {{$post->created_at->diffForHumans()}}</small>
                  </h5>
                  {{-- Content --}}
                  <div style="margin-bottom:10px">
                    {{$post->content}}
                  </div>
                  @if ($post->image != null)
                  <img class="media-body card-img-top" src="{{URL::asset($post->image)}}" alt="Card image cap"  style="max-width:100%;height:auto; margin-bottom:10px">
                  @elseif($post->video != null)
                  <div style="max-width:100%;height:auto;">
														<video width="100%" height="auto" controls>
															<source src="{{URL::asset($post->video)}}" type="video/mp4" >
														</video>
                  </div>
                    @endif
                    <span><span><i class="fa fa-comment"></i></span></span> {{$post->comments->count()}}
                  <ul class="list-inline d-sm-flex my-0">
                        @if (Auth::user()->id == $user->id)
                        <div style="margin:5px;">
                          <a href="#" class="btn btn-info pull-left" type="submit" ><i class="fa fa-pencil"></i></a>
                          <form action="{{route('post.delete',$post)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" type="submit">
                              <span>
                                <i class="fa fa-trash"></i>
                              </span>
                            </button>
                          </form>
                        </div>
                        @endif
                  </ul>
                  <div>
                    {{-- {{$post->likes->where('like', 1)->count()}} <span><i class="fa fa-thumbs-up"></i></span> todo--}}
                    {{-- {{$post->likes->where('like', 0)->count()}} <span><i class="fa fa-thumbs-down"></i></span> --}}
                  </div>
                  <hr>
                  {{-- /Content --}}
                  @endforeach
                  @else
                  <div class="alert alert-warning" role="alert">
                    No Posts Yet.
                        @if (Auth::user()->id == $user->id)                    
                      <a href="{{route('home.posts')}}">Post Now</a>
                        @endif
                  @endif
                </div>              
                </div>
              </div>
              {{-- <div id="messages" class="tab-pane">Messages</div>
              <div id="follow" class="tab-pane">Follow</div> todo --}}
            </div>
          </div>
        </div>
      </div>
      <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="panel-body pb5">
          <form action="{{route('profile.update',$user)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <img src="{{asset($profile->photo)}}" style="width: 100px;" alt="">
            <input type="file" accept="image/*" name="image" style="margin-bottom: 10px">
            <h4>Name :  <input name="name" type="text" value="{{$user->name}}" required></h4>
          <h4>Gender : <input type="radio" {{($profile->gender == 'Female') ? 'checked' :''}}  value="Female" name="gender"> Female
            <input type="radio" {{($profile->gender == 'Male') ? 'checked' :''}}  value="Male" name="gender"> Male </h4>

          <h4>About :  <textarea name="about" id="" cols="30" rows="2">{{$user->profile->about}}</textarea></h4>
          <h4>Birth Date : <input class="m-20" type="date" value="{{$profile->date_of_birth}}" name="date_of_birth"></h4>
          <h4>Email : <input class="m-20" type="email" value="{{$user->email}}" name="email" required></h4>
          <h4>Phone Number : <input type="tel" id="phone" name="phone"
       value="{{$profile->phone_number}}"
       >
      </h4>
          <hr class="short br-lighter">
          <h6>Education <i class="fa fa-graduation-cap"></i> </h6>

          <h4><textarea name="education" id="" cols="30" rows="2">{{$profile->education}}</textarea></h4>
          <hr class="short br-lighter"> 
        </div>

{{-- 
        <label for="About" style="margin: 10px">About </label> <textarea class="m-20" type="text">{{$user->profile->about}}</textarea><br>
        <label class="labels" style="margin: 10px">Gender</label>
        <select id="cars" class="col-md-6" style="color: black; height:30px;" name="gender">                  
          <option selected>{{$user->profile->gender}}</option>
           @foreach ($genderArray as $item)
          <option  value="{{$item}}" {{($user->profile->gender == $item) ? 'selected' :''}}  style="color: black">{{$item}}</option> 
          @endforeach
        </select>    <br>
        <label for="About" style="margin: 10px">Birthdate </label><input class="m-20" type="date" value="{{$user->profile->date_of_birth}}"> <br>
        <label for="About" style="margin: 10px">Phone Number </label> <input class="m-20" type="text" value="{{$user->profile->phone_number}}"> <br>
        <label for="About" style="margin: 10px">Email </label> <input class="m-20" type="email" value="{{$user->email}}"> <br>
        <label for="About" style="margin: 10px">Education </label> <input class="m-20" type="text" value="{{$user->profile->education}}"> <br> --}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin: 15px">Close</button>
        <button class="btn btn-primary pull-right" type="submit" style="margin: 15px">Save Changes</button>
      </form>

      </div>
    </div>
  </div>
</div>
  </section>
                            <style>
                                body{margin-top:20px;
background:#eee;
}
.fs35 {
    font-size: 35px !important;
}

.mw50 {
    max-width: 50px !important;
}
.mn {
    margin: 0 !important;
}
.mw140 {
    max-width: 140px !important;
}
.mb20 {
    margin-bottom: 20px !important;
}
.mr25 {
    margin-right: 25px !important;
}

.mw40 {
    max-width: 40px !important;
}

.p30 {
    padding: 30px !important;
}

.page-heading {
  position: relative;
  padding: 30px 40px;
  margin: -25px -20px 25px;
  border-bottom: 1px solid #d9d9d9;
  background-color: #f2f2f2;
}
.page-tabs {
  margin: -25px -20px 30px;
  padding: 15px 25px 0;
  border-bottom: 1px solid #ddd;
  background: #e9e9e9;
}
.page-tabs .nav-tabs {
  border-bottom: 0;
}
.page-tabs .nav-tabs > li > a {
  color: #AAA;
  padding: 10px 20px;
}
.page-tabs .nav-tabs > li:hover > a,
.page-tabs .nav-tabs > li:focus > a {
  border-color: #ddd;
}
.page-tabs .nav-tabs > li.active > a,
.page-tabs .nav-tabs > li.active > a:hover,
.page-tabs .nav-tabs > li.active > a:focus {
  color: #666;
  font-weight: 600;
  background-color: #eee;
  border-bottom-color: transparent;
}
@media (max-width: 800px) {
  .page-tabs {
    padding: 25px 20px 0;
  }
  .page-tabs .nav-tabs li {
    float: none;
    margin-bottom: 5px;
  }
  .page-tabs .nav-tabs li:last-child,
  .page-tabs .nav-tabs li.active:last-child {
    margin-bottom: 10px;
  }
  .page-tabs .nav-tabs > li > a:hover,
  .page-tabs .nav-tabs > li > a:focus {
    border: 1px solid #DDD;
  }
  .page-tabs .nav-tabs > li.active > a,
  .page-tabs .nav-tabs > li.active > a:hover,
  .page-tabs .nav-tabs > li.active > a:focus {
    border-bottom-color: #ddd;
  }
}
.panel {
  position: relative;
  margin-bottom: 27px;
  background-color: #ffffff;
  border-radius: 3px;
}
.panel.panel-transparent {
  background: none;
  border: 0;
  margin: 0;
  padding: 0;
}
.panel.panel-border {
  border-style: solid;
  border-width: 0;
}
.panel.panel-border.top {
  border-top-width: 5px;
}
.panel.panel-border.right {
  border-right-width: 5px;
}
.panel.panel-border.bottom {
  border-bottom-width: 5px;
}
.panel.panel-border.left {
  border-left-width: 5px;
}
.panel.panel-border > .panel-heading {
  background-color: #fafafa;
  border-color: #e2e2e2;
  border-top: 1px solid transparent;
}
.panel.panel-border > .panel-heading > .panel-title {
  color: #999999;
}
.panel.panel-border.panel-default {
  border-color: #DDD;
}
.panel.panel-border.panel-default > .panel-heading {
  border-top: 1px solid transparent;
}
.panel-menu {
  background-color: #fafafa;
  padding: 12px;
  border: 1px solid #e2e2e2;
}
.panel-menu.dark {
  background-color: #f8f8f8;
}
.panel-body .panel-menu {
  border-left: 0;
  border-right: 0;
}
.panel-heading + .panel-menu,
.panel-menu + .panel-body,
.panel-body + .panel-menu,
.panel-body + .panel-body {
  border-top: 0;
}
.panel-body {
  position: relative;
  padding: 15px;
  border: 1px solid #e2e2e2;
}
.panel-body + .panel-footer {
  border-top: 0;
}
.panel-heading {
  position: relative;
  height: 52px;
  line-height: 49px;
  letter-spacing: 0.2px;
  color: #999999;
  font-size: 15px;
  font-weight: 400;
  padding: 0 8px;
  background: #fafafa;
  border: 1px solid #e2e2e2;
  border-top-right-radius: 3px;
  border-top-left-radius: 3px;
}
.panel-heading + .panel-body {
  border-top: 0;
}
.panel-heading > .dropdown .dropdown-toggle {
  color: inherit;
}
.panel-heading .widget-menu .btn-group {
  margin-top: -3px;
}
.panel-heading .widget-menu .form-control {
  margin-top: 6px;
  font-size: 11px;
  height: 27px;
  padding: 2px 10px;
  border-radius: 1px;
}
.panel-heading .widget-menu .form-control.input-sm {
  margin-top: 9px;
  height: 22px;
}
.panel-heading .widget-menu .progress {
  margin-top: 11px;
  margin-bottom: 0;
}
.panel-heading .widget-menu .progress-bar-lg {
  margin-top: 10px;
}
.panel-heading .widget-menu .progress-bar-sm {
  margin-top: 15px;
}
.panel-heading .widget-menu .progress-bar-xs {
  margin-top: 17px;
}
.panel-icon {
  padding-left: 5px;
}
.panel-title {
  padding-left: 6px;
  margin-top: 0;
  margin-bottom: 0;
}
.panel-title > .fa,
.panel-title > .glyphicon,
.panel-title > .glyphicons,
.panel-title > .imoon {
  top: 2px;
  min-width: 22px;
  color: inherit;
  font-size: 14px;
}
.panel-title > a {
  color: inherit;
}
.panel-footer {
  padding: 10px 15px;
  background-color: #fafafa;
  border: 1px solid #e2e2e2;
  border-bottom-right-radius: 2px;
  border-bottom-left-radius: 2px;
}
.panel > .list-group {
  margin-bottom: 0;
}
.panel > .list-group .list-group-item {
  border-radius: 0;
}
.panel > .list-group:first-child .list-group-item:first-child {
  border-top-right-radius: 2px;
  border-top-left-radius: 2px;
}
.panel > .list-group:last-child .list-group-item:last-child {
  border-bottom-right-radius: 2px;
  border-bottom-left-radius: 2px;
}
.panel-heading + .list-group .list-group-item:first-child {
  border-top-width: 0;
}
.panel-body + .list-group .list-group-item:first-child {
  border-top-width: 0;
}
.list-group + .panel-footer {
  border-top-width: 0;
}
.panel > .table,
.panel > .table-responsive > .table,
.panel > .panel-collapse > .table {
  margin-bottom: 0;
}
.panel > .table:first-child,
.panel > .table-responsive:first-child > .table:first-child {
  border-top-right-radius: 2px;
  border-top-left-radius: 2px;
}
.panel > .table:first-child > thead:first-child > tr:first-child td:first-child,
.panel > .table-responsive:first-child > .table:first-child > thead:first-child > tr:first-child td:first-child,
.panel > .table:first-child > tbody:first-child > tr:first-child td:first-child,
.panel > .table-responsive:first-child > .table:first-child > tbody:first-child > tr:first-child td:first-child,
.panel > .table:first-child > thead:first-child > tr:first-child th:first-child,
.panel > .table-responsive:first-child > .table:first-child > thead:first-child > tr:first-child th:first-child,
.panel > .table:first-child > tbody:first-child > tr:first-child th:first-child,
.panel > .table-responsive:first-child > .table:first-child > tbody:first-child > tr:first-child th:first-child {
  border-top-left-radius: 2px;
}
.panel > .table:first-child > thead:first-child > tr:first-child td:last-child,
.panel > .table-responsive:first-child > .table:first-child > thead:first-child > tr:first-child td:last-child,
.panel > .table:first-child > tbody:first-child > tr:first-child td:last-child,
.panel > .table-responsive:first-child > .table:first-child > tbody:first-child > tr:first-child td:last-child,
.panel > .table:first-child > thead:first-child > tr:first-child th:last-child,
.panel > .table-responsive:first-child > .table:first-child > thead:first-child > tr:first-child th:last-child,
.panel > .table:first-child > tbody:first-child > tr:first-child th:last-child,
.panel > .table-responsive:first-child > .table:first-child > tbody:first-child > tr:first-child th:last-child {
  border-top-right-radius: 2px;
}
.panel > .table:last-child,
.panel > .table-responsive:last-child > .table:last-child {
  border-bottom-right-radius: 2px;
  border-bottom-left-radius: 2px;
}
.panel > .table:last-child > tbody:last-child > tr:last-child td:first-child,
.panel > .table-responsive:last-child > .table:last-child > tbody:last-child > tr:last-child td:first-child,
.panel > .table:last-child > tfoot:last-child > tr:last-child td:first-child,
.panel > .table-responsive:last-child > .table:last-child > tfoot:last-child > tr:last-child td:first-child,
.panel > .table:last-child > tbody:last-child > tr:last-child th:first-child,
.panel > .table-responsive:last-child > .table:last-child > tbody:last-child > tr:last-child th:first-child,
.panel > .table:last-child > tfoot:last-child > tr:last-child th:first-child,
.panel > .table-responsive:last-child > .table:last-child > tfoot:last-child > tr:last-child th:first-child {
  border-bottom-left-radius: 2px;
}
.panel > .table:last-child > tbody:last-child > tr:last-child td:last-child,
.panel > .table-responsive:last-child > .table:last-child > tbody:last-child > tr:last-child td:last-child,
.panel > .table:last-child > tfoot:last-child > tr:last-child td:last-child,
.panel > .table-responsive:last-child > .table:last-child > tfoot:last-child > tr:last-child td:last-child,
.panel > .table:last-child > tbody:last-child > tr:last-child th:last-child,
.panel > .table-responsive:last-child > .table:last-child > tbody:last-child > tr:last-child th:last-child,
.panel > .table:last-child > tfoot:last-child > tr:last-child th:last-child,
.panel > .table-responsive:last-child > .table:last-child > tfoot:last-child > tr:last-child th:last-child {
  border-bottom-right-radius: 2px;
}
.panel > .panel-body + .table,
.panel > .panel-body + .table-responsive {
  border-top: 1px solid #eeeeee;
}
.panel > .table > tbody:first-child > tr:first-child th,
.panel > .table > tbody:first-child > tr:first-child td {
  border-top: 0;
}
.panel > .table-bordered,
.panel > .table-responsive > .table-bordered {
  border: 0;
}
.panel > .table-bordered > thead > tr > th:first-child,
.panel > .table-responsive > .table-bordered > thead > tr > th:first-child,
.panel > .table-bordered > tbody > tr > th:first-child,
.panel > .table-responsive > .table-bordered > tbody > tr > th:first-child,
.panel > .table-bordered > tfoot > tr > th:first-child,
.panel > .table-responsive > .table-bordered > tfoot > tr > th:first-child,
.panel > .table-bordered > thead > tr > td:first-child,
.panel > .table-responsive > .table-bordered > thead > tr > td:first-child,
.panel > .table-bordered > tbody > tr > td:first-child,
.panel > .table-responsive > .table-bordered > tbody > tr > td:first-child,
.panel > .table-bordered > tfoot > tr > td:first-child,
.panel > .table-responsive > .table-bordered > tfoot > tr > td:first-child {
  border-left: 0;
}
.panel > .table-bordered > thead > tr > th:last-child,
.panel > .table-responsive > .table-bordered > thead > tr > th:last-child,
.panel > .table-bordered > tbody > tr > th:last-child,
.panel > .table-responsive > .table-bordered > tbody > tr > th:last-child,
.panel > .table-bordered > tfoot > tr > th:last-child,
.panel > .table-responsive > .table-bordered > tfoot > tr > th:last-child,
.panel > .table-bordered > thead > tr > td:last-child,
.panel > .table-responsive > .table-bordered > thead > tr > td:last-child,
.panel > .table-bordered > tbody > tr > td:last-child,
.panel > .table-responsive > .table-bordered > tbody > tr > td:last-child,
.panel > .table-bordered > tfoot > tr > td:last-child,
.panel > .table-responsive > .table-bordered > tfoot > tr > td:last-child {
  border-right: 0;
}
.panel > .table-bordered > thead > tr:first-child > td,
.panel > .table-responsive > .table-bordered > thead > tr:first-child > td,
.panel > .table-bordered > tbody > tr:first-child > td,
.panel > .table-responsive > .table-bordered > tbody > tr:first-child > td,
.panel > .table-bordered > thead > tr:first-child > th,
.panel > .table-responsive > .table-bordered > thead > tr:first-child > th,
.panel > .table-bordered > tbody > tr:first-child > th,
.panel > .table-responsive > .table-bordered > tbody > tr:first-child > th {
  border-bottom: 0;
}
.panel > .table-bordered > tbody > tr:last-child > td,
.panel > .table-responsive > .table-bordered > tbody > tr:last-child > td,
.panel > .table-bordered > tfoot > tr:last-child > td,
.panel > .table-responsive > .table-bordered > tfoot > tr:last-child > td,
.panel > .table-bordered > tbody > tr:last-child > th,
.panel > .table-responsive > .table-bordered > tbody > tr:last-child > th,
.panel > .table-bordered > tfoot > tr:last-child > th,
.panel > .table-responsive > .table-bordered > tfoot > tr:last-child > th {
  border-bottom: 0;
}
.panel > .table-responsive {
  border: 0;
  margin-bottom: 0;
}
.panel-group {
  margin-bottom: 19px;
}
.panel-group .panel-title {
  padding-left: 0;
}
.panel-group .panel-heading,
.panel-group .panel-heading a {
  position: relative;
  display: block;
  width: 100%;
}
.panel-group.accordion-lg .panel + .panel {
  margin-top: 12px;
}
.panel-group.accordion-lg .panel-heading {
  font-size: 14px;
  height: 54px;
  line-height: 52px;
}
.panel-group .accordion-icon {
  padding-left: 35px;
}
.panel-group .accordion-icon:after {
  position: absolute;
  content: "\f068";
  font-family: "FontAwesome";
  font-size: 12px;
  font-style: normal;
  font-weight: normal;
  -webkit-font-smoothing: antialiased;
  color: #555;
  left: 10px;
  top: 0;
}
.panel-group .accordion-icon.collapsed:after {
  content: "\f067";
}
.panel-group .accordion-icon.icon-right {
  padding-left: 10px;
  padding-right: 30px;
}
.panel-group .accordion-icon.icon-right:after {
  left: auto;
  right: 5px;
}
.panel-group .panel {
  margin-bottom: 0;
  border-radius: 3px;
}
.panel-group .panel + .panel {
  margin-top: 5px;
}
.panel-group .panel-heading + .panel-collapse > .panel-body {
  border-top: 0;
}
.panel-group .panel-footer {
  border-top: 0;
}
.panel-group .panel-footer + .panel-collapse .panel-body {
  border-bottom: 1px solid #eeeeee;
}


.media {
  color: #999999;
  font-weight: 600;
  margin-top: 15px;
}
.media:first-child {
  margin-top: 0;
}
.media-right,
.media > .pull-right {
  padding-left: 10px;
}
.media-left,
.media > .pull-left {
  padding-right: 10px;
}
.media-left,
.media-right,
.media-body {
  display: table-cell;
  vertical-align: top;
}
.media-middle {
  vertical-align: middle;
}
.media-bottom {
  vertical-align: bottom;
}
.media-heading {
  color: #555555;
  margin-top: 0;
  margin-bottom: 5px;
}
.media-list {
  padding-left: 0;
  list-style: none;
}

/*===============================================
  Tabs
================================================= */
/* Tabs Wrapper */
.tab-block {
  position: relative;
}
/* Tabs Content */
.tab-block .tab-content {
  overflow: auto;
  position: relative;
  z-index: 10;
  min-height: 125px;
  padding: 16px 12px;
  border: 1px solid #e2e2e2;
  background-color: #FFF;
}
/*===============================================
  Tab Navigation
================================================= */
.tab-block .nav-tabs {
  position: relative;
  border: 0;
}
/* nav tab item */
.tab-block .nav-tabs > li {
  float: left;
  margin-bottom: -1px;
}
/* nav tab link */
.tab-block .nav-tabs > li > a {
  z-index: 9;
  position: relative;
  color: #AAA;
  font-size: 14px;
  font-weight: 400;
  padding: 14px 20px;
  margin-right: -1px;
  border-color: #e2e2e2;
  border-radius: 0;
  background: #fafafa;
}
.tab-block .nav-tabs > li:first-child > a {
  margin-left: 0;
}
/* nav tab link:hover */
.tab-block .nav-tabs > li > a:hover {
  background-color: #f4f4f4;
}
/* nav tab active link:focus:hover */
.tab-block .nav-tabs > li.active > a,
.tab-block .nav-tabs > li.active > a:hover,
.tab-block .nav-tabs > li.active > a:focus {
  cursor: default;
  position: relative;
  z-index: 12;
  color: #555555;
  background: #FFF;
  border-color: #e2e2e2;
  border-bottom: 1px solid #FFF;
}
/*===============================================
  Tab Navigation - Tabs Left
================================================= */
.tabs-left {
  float: left;
}
/* nav tab item */
.tabs-left > li {
  float: none;
  margin: 0 -1px -1px 0;
}
/* nav tab item link */
.tabs-left > li > a {
  padding: 14px 16px;
  color: #777;
  font-weight: 600;
  border: 1px solid transparent;
  border-color: #DDD;
  background: #fafafa;
}
/* nav tab link:hover */
/* nav tab active link:focus:hover */
.tab-block .tabs-left > li.active > a,
.tab-block .tabs-left > li.active > a:hover,
.tab-block .tabs-left > li.active > a:focus {
  color: #555;
  border-color: #DDD #FFF #DDD #DDD;
  cursor: default;
  position: relative;
  z-index: 12;
  background: #FFF;
}
/*===============================================
  Tab Navigation - Tabs Right
================================================= */
.tabs-right {
  float: right;
}
/* nav tab item */
.tabs-right > li {
  float: none;
  margin: 0 0 -1px -1px;
}
/* nav tab item link */
.tabs-right > li > a {
  padding: 14px 16px;
  color: #777;
  font-weight: 600;
  border: 1px solid transparent;
  border-color: #DDD;
  background: #fafafa;
}
/* nav tab link:hover */
/* nav tab active link:focus:hover */
.tab-block .tabs-right > li.active > a,
.tab-block .tabs-right > li.active > a:hover,
.tab-block .tabs-right > li.active > a:focus {
  color: #555;
  border-color: #DDD #DDD #DDD #FFF;
  cursor: default;
  position: relative;
  z-index: 12;
  background: #FFF;
}
/*===============================================
  Tab Navigation - Tabs Right
================================================= */
.tabs-below {
  position: relative;
}
/* nav tab item */
.tabs-below > li {
  float: left;
  margin-top: -1px;
}
/* nav tab item link */
.tabs-below > li > a {
  position: relative;
  z-index: 9;
  margin-right: -1px;
  padding: 11px 16px;
  color: #777;
  font-weight: 600;
  border: 1px solid #DDD;
  background: #fafafa;
}
/* nav tab link:hover */
/* nav tab active link:focus:hover */
.tab-block .tabs-below > li.active > a,
.tab-block .tabs-below > li.active > a:hover,
.tab-block .tabs-below > li.active > a:focus {
  cursor: default;
  position: relative;
  z-index: 12;
  color: #555555;
  background: #FFF;
  border-color: #DDD;
  border-top: 1px solid #FFF;
}
                              </style>                                      
                                                
<script>
  $('#exampleModalLong').click(function(){
    .modal('show')
  });
    //open comment input
//      $(document).ready(function() {
//         // Hide menu once we know its width
//         $('#customSwitch1').click(function() {
//             var $hiddenInput = $('#hiddenInput');
//             if ($hiddenInput.is(':invisible')) {
//                 $hiddenInput.show();

//             }
//         });
//     });


//                             $(function(){
//     $("#toggle-link").click(function(e) {
//         e.preventDefault();
//         $("#profileCol").toggleClass("hidden");
//         if($("#profileCol").hasClass('hidden')){
            
//             $("#contentCol").removeClass('col-md-9');
//             $("#contentCol").addClass('col-md-12 fade in');
//             $(this).html('Show Menu <i class="fa fa-arrow-right"></i>');
//         }else {
//             $("#contentCol").removeClass('col-md-12');
//             $("#contentCol").addClass('col-md-9');
//             $(this).html('<i class="fa fa-arrow-left"></i> Hide Menu');
//         }
//     });
//     $('.tip').tooltip();
    

// });
                                    
  
                                    
</script>
@endsection