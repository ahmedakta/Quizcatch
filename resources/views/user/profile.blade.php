@extends('layouts.home')
@section('home')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container bootstrap snippets bootdey">
    <div class="row profile">
        <div class="col-md-3" id="profileCol">
			<div class="profile-sidebar">
				<div class="profile-userpic">
					<img src="https://bootdey.com/img/Content/User_for_snippets.png" class="img-responsive" alt="">
				</div>
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						<h1>{{Auth::user()->name}}</h1>
					</div>
				</div>
				<div class="profile-userbuttons">
					<button type="button" class="btn btn-info btn-sm">
                        <i class="fa fa-user-plus"></i>
                        Follow
                    </button>
				</div>
                    {{-- <ul class="nav-news-feed">
                        <li><i class="fa fa-user icon3"></i><div><a href="#">Profile</a></div></li>
                        <li><i class="fa fa-list-alt icon1"></i><div><a href="#">Quizzes</a></div></li>
                        <li><i class="fa fa-user icon3"></i><div><a href="#">Friends</a></div></li>
                        <li><i class="fa fa-comments icon4"></i><div><a href="#">Messages</a></div></li>
                        <li><i class="fa fa-picture-o icon5"></i><div><a href="#">Posts</a></div></li>
                      </ul><!--news-feed links ends--> --}}
			</div>
		</div>
		<div class="col-md-9" id="contentCol">
            <div class="profile-content">
                <div class="row hidden-xs hidden-sm">
                    <a href="#" class="btn btn-primary" id="toggle-link">
                        <i class="fa fa-arrow-left"></i>
                        Hide menu
                    </a>
                    <hr class="hr-sep">
                </div>
                <div class="row ">
                    {{-- starts right nav --}}
                    <div class="card-footer tab-card-header">
                        <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                          <li class="nav-item">
                              <a class="nav-link" id="one-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="One" aria-selected="true">Profile</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="Two" aria-selected="false">Quizzes</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="Three" aria-selected="false">Friends</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="Three" aria-selected="false">Messages</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="Three" aria-selected="false">Posts</a>
                          </li>
                        </ul>
                      </div>
                      
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active p-3" id="profile" role="tabpanel" aria-labelledby="one-tab">
                          <h5 class="card-title">Tab Card One</h5>
                          <form class="form" action="##" method="post" id="registrationForm">
                            <div class="form-group">
                                
                                <div class="col-xs-6">
                                    <label for="first_name"><h4>First name</h4></label>
                                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" title="enter your first name if any.">
                                </div>
                            </div>
                            <div class="form-group">
                                
                                <div class="col-xs-6">
                                  <label for="last_name"><h4>Last name</h4></label>
                                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" title="enter your last name if any.">
                                </div>
                            </div>
                
                            <div class="form-group">
                                
                                <div class="col-xs-6">
                                    <label for="phone"><h4>Phone</h4></label>
                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="enter phone" title="enter your phone number if any.">
                                </div>
                            </div>
                
                            <div class="form-group">
                                <div class="col-xs-6">
                                   <label for="mobile"><h4>Mobile</h4></label>
                                    <input type="text" class="form-control" name="mobile" id="mobile" placeholder="enter mobile number" title="enter your mobile number if any.">
                                </div>
                            </div>
                            <div class="form-group">
                                
                                <div class="col-xs-6">
                                    <label for="email"><h4>Email</h4></label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email.">
                                </div>
                            </div>
                            <div class="form-group">
                                
                                <div class="col-xs-6">
                                    <label for="email"><h4>Location</h4></label>
                                    <input type="email" class="form-control" id="location" placeholder="somewhere" title="enter a location">
                                </div>
                            </div>
                            <div class="form-group">
                                
                                <div class="col-xs-6">
                                    <label for="password"><h4>Password</h4></label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
                                </div>
                            </div>
                            <div class="form-group">
                                
                                <div class="col-xs-6">
                                  <label for="password2"><h4>Verify</h4></label>
                                    <input type="password" class="form-control" name="password2" id="password2" placeholder="password2" title="enter your password2.">
                                </div>
                            </div>
                            <div class="form-group">
                                 <div class="col-xs-12">
                                      <br>
                                        <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                         <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                                  </div>
                            </div>
                        </form>                          <a href="#" class="btn btn-primary">Go somewhere</a>              
                        </div>
                        <div class="tab-pane fade p-3" id="two" role="tabpanel" aria-labelledby="two-tab">
                          <h5 class="card-title">Tab Card Two</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>              
                        </div>
                        <div class="tab-pane fade p-3" id="three" role="tabpanel" aria-labelledby="three-tab">
                          <h5 class="card-title">Tab Card Three</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>              
                        </div>
                        <div class="tab-pane fade p-3" id="three" role="tabpanel" aria-labelledby="three-tab">
                          <h5 class="card-title">Tab Card Three</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>              
                        </div>
                        <div class="tab-pane fade p-3" id="three" role="tabpanel" aria-labelledby="three-tab">
                          <h5 class="card-title">Tab Card Three</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>              
                        </div>
                      </div>
                    {{-- end right nav --}}
                </div>
            </div>
		</div>
	</div>
</div>                                
<script>
                            $(function(){
    $("#toggle-link").click(function(e) {
        e.preventDefault();
        $("#profileCol").toggleClass("hidden");
        if($("#profileCol").hasClass('hidden')){
            
            $("#contentCol").removeClass('col-md-9');
            $("#contentCol").addClass('col-md-12 fade in');
            $(this).html('Show Menu <i class="fa fa-arrow-right"></i>');
        }else {
            $("#contentCol").removeClass('col-md-12');
            $("#contentCol").addClass('col-md-9');
            $(this).html('<i class="fa fa-arrow-left"></i> Hide Menu');
        }
    });
    $('.tip').tooltip();
});
                                    
  
                                    
</script>
@endsection