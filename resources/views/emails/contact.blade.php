@component('mail::message')
{{-- Title With Name--}}
Message from {{$message['fname']}} {{$message['lname']}} <br>
Email : {{$message['email']}}

Subject:
{{-- Description --}}
<h3>{{$message['subject']}}</h3>

Message:
<p>{{$message['message']}}</p>

{{ config('app.name') }}
@endcomponent
