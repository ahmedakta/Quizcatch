@extends('layouts.main')
@section('main')	
<style>
	.list-group-item.active, .list-group-item.active:hover, .list-group-item.active:focus {
    z-index: 2;
    color: #fff;
    background-color: #f95959;
    border-color: #337ab7;
}
.list-group-item.active, .list-group-item.active:focus, .list-group-item.active:hover {
    z-index: 2;
    color: #fff;
    background-color:  #f95959;
    border-color: #337ab7;
}

</style>
						   {{-- Start Post Page --}}
						   @if (count($quizzes)==0)
						   <div class="alert alert-light" role="alert">
							No Quiz Yet.
						  </div>
							@else
							@foreach ($quizzes as $quiz)
							{{$quiz->id}}
							@endforeach

						   @endif
						   {{-- End Post Page --}}
						 {{-- end right nav --}}
                            
@endsection