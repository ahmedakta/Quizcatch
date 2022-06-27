@component('mail::message')
# Welcome To QuizCatch

Welcome <b>{{$user->name}}</b> to Quizcatch! Catch quizzes or create and invite your friends now !.
Don't forget to tell us about the website from the about page.
Good luck!

Thanks,<br>
{{ config('app.name') }}
@endcomponent
