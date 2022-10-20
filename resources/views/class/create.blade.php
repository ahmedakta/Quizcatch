@extends('layouts.main')
@section('main')
    <form action="{{route('class.store')}}"  method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <div class="col-xs-6">
              <label for="last_name"><h4>Name</h4></label>
              <input type="text" class="form-control" name="name" placeholder="Enter Class Name.." required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-6">
              <label for="last_name"><h4>Description</h4></label>
              <textarea type="text" class="form-control" name="description" style="margin: 20px"  placeholder="Type about your class.."></textarea>
            </div>
        </div>
        <div class="form-group" >
            <div class="col-xs-6">
                <label for="last_name"><h4>User Limit</h4></label>
                <select name="limit" id="" style="margin-top: 15px; border:0px; background-color:transparent">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select> 
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-6">
                <label ><h4>Class Image</h4></label>
              <input type="file" name="image" accept="image/*" class="form-control">
            </div>
        </div>
        <div class="form-group" >
            <div class="col-xs-6">
                <label for="last_name"><h4>Private</h4></label>
                <input type="radio" id="private" name="private" value="1" style="accent-color:#f95959"/>
                    <label for="checkbox">
                        private
                    </label>
                <input type="radio"  id="global" name="private" value="0" style="accent-color:#f95959"/>
                    <label for="checkbox">
                        global
                    </label>
            </div>
        </div>
        <div class="form-group" id="password" hidden>
            <div class="col-xs-6">
                <label for="last_name"><h4>Password</h4></label>
                    <input class="form-control" type="password" name="password" id="">
            </div>
        </div>
        <br>
        <button class="btn btn-primary pull-right" type="submit" style="margin: 15px">Create</button>
    </form>
    <script>
        $("#private").on("change", function(){
            $("#password").show(); 
        });
        $("#global").on("change", function(){
            $("#password").hide(); 
        });
    </script>
@endsection
