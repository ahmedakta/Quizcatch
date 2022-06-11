@extends('layouts.main')
@section('main')
    <form action="{{route('quiz.store')}}"  method="POST" enctype="multipart/form-data"  onsubmit="return confirm ('Are you sure?')">
        @csrf
        <div class="g-mb-15" style="margin: 20px">
            Title
    <input type="text" name="title">
        </div>
        <div class="g-mb-15" style="margin: 20px">
            continued
            <input type="number" name="to_be_continued">
        </div>
        <div class="g-mb-15" style="margin: 20px">
        explantion
    <input type="text" name="explanation" placeholder="optional">
        </div>
        <div class="g-mb-15" style="margin: 20px">
            Image
    <input type="file" accept="image/*" name="image" >
        </div>
        <div class="g-mb-15" style="margin: 20px">
            started At
    <input type="datetime-local" name="started_at" >
        </div>
        <div class="g-mb-15" style="margin: 20px">
            Stopped At

    <input type="datetime-local" name="stopped_at" >
        </div>
        <br>
        <button class="btn btn-primary pull-right" type="submit" style="margin: 15px">Create</button>
    </form>
@endsection
