@extends('layouts.main')
@section('main')
<title>Tournaments | Quiz Catch </title>
@if (count($tournaments)==0)
<div class="alert alert-light" role="alert" style="margin: auto">
 No Tournament Yet.
</div>
 @else
 @foreach ($tournaments as $tournament)
 {{$tournament->id}}
 @endforeach
@endif
                        
@endsection