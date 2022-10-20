@extends('layouts.main')
@section('main')
    {{-- New Style --}}
    <title>Classes | Quiz Catch</title>
    @if(session('error'))
        <div class="alert alert-danger">{{session('error')}}</div>
    @endif
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    @foreach ($classes as $class)
    <div class="panel" style="margin:15px;border-radius:20px">
        <div class="panel panel-default">
            <a href="{{route('class.show',$class)}}">
                @if ($class->image != null)
                    <img src="{{URL::asset($class->image)}}" style="height: 130px; width:150px; margin:10px;" class="pull-left">
                @else
                    <img src="{{URL::asset('media/class.png')}}" style="height: 150px; width:180px; margin:10px;" class="pull-left">
                @endif
            <div class="panel-body">
                <div class="g-mb-15" style="margin: 15px">
                    <h3>{{$class->name}}</h3>
                </div>
                <div class="g-mb-15" style="margin: 15px">
                    <h5>{{$class->description}}</h5>
                </div>
                <div class="g-mb-15" style="margin: 15px">
                    @if ($class->private)
							<i class="fa fa-lock"></i>
                    @else
                    <i class="fa fa-globe" aria-hidden="true"></i>
                    @endif
                </div>
            </div>
        {{-- <div class="panel-footer">
                <div class="row">
                ...
                </div>
            </div> --}}
            </a>
        </div>
        @if ($class->private)
        <form action="{{route('private.class.join',[ 'class' => $class ])}}" method="POST">
            @csrf
            @if ($class->users->find($user)) 
            {{-- {{dd($user->classes->id)}} --}}
            <button class="btn btn-danger" type="submit"> 
                <svg width="18"  fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
            </button>
            @else
            <input type="password"  class="form-control" name="password" id="" placeholder="Password" required>
            <button class="btn btn-warning" type="submit">join</button>
             @endif
        </form>
        @else
             @if ($class->users->find($user)) 
            <button class="btn btn-danger" type="submit"> 
                <svg width="18"  fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                  </svg>
            </button>
            @else
            <a href="{{route('class.join',['class' => $class ])}}" class="btn btn-warning" >Join</a>
            @endif 
            <a href="#" class="btn btn-info"><i class="fa fa-users"></i></a>
        @endif
    </div>
    @endforeach
@endsection