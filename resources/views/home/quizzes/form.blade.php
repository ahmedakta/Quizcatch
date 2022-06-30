@extends('layouts.main')
@section('main')
    <form action="{{route('quiz.store')}}"  method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <div class="col-xs-6">
              <label for="last_name"><h4>Title</h4></label>
              <input type="text" class="form-control" name="title" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-6">
              <label for="last_name"><h4>Deleted At (optional)</h4></label>
              <input type="datetime-local" class="form-control" name="end_time">
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-6">
              <label for="last_name"><h4>explantion (optional)</h4></label>
              <textarea type="text" class="form-control" name="explanation"  placeholder="Type about your quiz"></textarea>
              <label for="mobile"><h4>Quiz Image</h4></label>
              <input type="file" name="image" accept="image/*" class="form-control">
            </div>
        </div>
        <br>
        <button class="btn btn-primary pull-right" type="submit" style="margin: 15px">Create</button>
    </form>
@endsection
