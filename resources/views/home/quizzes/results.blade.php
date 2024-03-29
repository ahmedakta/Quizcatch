@extends('layouts.main')
@section('main')
                @if(session()->has('message'))
                    <p class="alert alert-success"> {{ session()->get('message') }}</p>
                @endif
                @php
                    $counter = 1;
                @endphp
<div class="panel" style="margin:15px;border-radius:20px">
    <div style="margin: 20px">
    @if ($results != null)     
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Result</th>
          </tr>
        </thead>
        @foreach ($results as $result)
            <tbody>
              <tr>
                <th scope="row">{{$counter++}}</th>
                <td><a href="{{route('user.profile',$result->user->user_name)}}">{{$result->user->name}}</a></td>
                <td>{{$result->result}}/{{$quiz->questions()->count()}}</td>
              </tr>
            </tbody>
            {{-- Name : <h4>{{$result->user->name}}</h4>
            Result : {{$result->result}}/{{$quiz->questions()->count()}}
            <br> --}}
            @endforeach
        </table>
    @else
      <div class="alert alert-danger" role="alert">
       No body catched the your quiz yet 😟. <br>
       invite <input value="{{url($quiz->id.'/'.$quiz->slug.'/catch')}}" id="{{'copy_$quiz->id'}}" style="width: 300px">
       <button class="btn btn-info" value="copy" onclick="copyToClipboard('copy_$quiz->id')"><span><i class="fa fa-copy"></i></span></button>
      </div>
    @endif
        <a href="{{route('quiz.my-quizzes')}}" class="btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
    </div>
</div>
<script>
  function copyToClipboard(id) {
        document.getElementById(id).select();
        document.execCommand('copy');
    }
</script>
@endsection