@extends('layouts.main')
@section('main')

						   {{-- Start Post Page --}}
						   @if (count($posts)==0)
						   <div class="alert alert-light" role="alert">
							No Posts Yet.
						  </div>
							@else
							@foreach ($posts as $post)
							{{$post->id}}
							@endforeach

						   @endif
						   {{-- End Post Page --}}
						 {{-- end right nav --}}                             
@endsection