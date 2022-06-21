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
              <label for="last_name"><h4>continued</h4></label>
              <input type="number" class="form-control" name="to_be_continued" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-6">
              <label for="last_name"><h4>explantion</h4></label>
              <input type="text" class="form-control" name="explanation"  placeholder="optional" required>
              <label for="mobile"><h4>Image</h4></label>
              <input type="file" name="image" accept="image/*" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-6">
              <label for="last_name"><h4>Started At</h4></label>
              <input type="datetime-local" class="form-control" name="started_at" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-6">
              <label for="last_name"><h4>Stopped At</h4></label>
              <input type="datetime-local" class="form-control" name="stopped_at" required>
            </div>
        </div>
        <br>
        <button class="btn btn-primary pull-right" type="submit" style="margin: 15px">Create</button>
    </form>
@endsection
