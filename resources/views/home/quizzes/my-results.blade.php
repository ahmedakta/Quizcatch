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
                  @if (sizeof($results))    
                  <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Quiz</th>
                          <th scope="col">Result</th>
                          <th scope="col">Catched At</th>
                        </tr>
                      </thead>
                      @foreach ($results as $result)
                          <tbody>
                            <tr>
                              <th scope="row">{{$counter++}}</th>
                              <td><a href="{{route('quiz.show',$result->quiz)}}">{{$result->quiz->title}}</a></td>
                              <td>{{$result->result}}/{{$result->quiz->questions()->count()}}</td>
                              <td>{{$result->created_at->toDateString()}}</td>
                            </tr>
                          </tbody>
                          {{-- Name : <h4>{{$result->user->name}}</h4>
                          Result : {{$result->result}}/{{$quiz->questions()->count()}}
                          <br> --}}
                          @endforeach
                      </table>
                  @else
                    <div class="alert alert-danger" role="alert">
                      Catch some quizzes to see your result!
                    </div>
                  @endif
                      <a href="{{route('quiz.my-quizzes')}}" class="btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                  </div>
              </div>
@endsection