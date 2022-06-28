<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Mail\WelcomeMail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// language example

// Route::group(['prefix'=>'{locale}'],function(){
//     Route::get('/', function () {
//         return view('welcome');
//     })->middleware('setLocale');
//     Auth::routes();

// });
Route::permanentRedirect('/here', '/');
Route::get('/', function () {
    return redirect()->route('home');
});
Route::get('/home', function () {
    return redirect()->route('home');
});
Route::get('/email', function () {
    return new WelcomeMail();
});
Route::get('about', [App\Http\Controllers\MessageController::class, 'about'])->name('about');
Route::post('sendMail', [App\Http\Controllers\MessageController::class, 'sendMail'])->name('sendMail');
Auth::routes();
// home
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// POSTS
Route::get('posts', [App\Http\Controllers\PostController::class, 'index'])->name('home.posts');
Route::get('{user}/private-posts', [App\Http\Controllers\PostController::class, 'private_posts'])->name('private.posts');
Route::get('{post}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
Route::post('save', [App\Http\Controllers\PostController::class, 'postSave'])->name('post.save');
Route::get('{user}/saved-posts', [App\Http\Controllers\PostController::class, 'saved_posts'])->name('saved.posts');
Route::delete('post/{post:id}/delete', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.delete');
Route::post('store', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
Route::post('store/comment', [App\Http\Controllers\CommentController::class, 'store'])->name('post.comment');
// POSTS LIKE
Route::post('like', [App\Http\Controllers\PostController::class, 'postLikePost'])->name('post.like');
// Tournmanent
Route::get('tournaments', [App\Http\Controllers\TournamentController::class, 'index'])->name('home.tournaments');
// Quiz
Route::get('quiz/create', [App\Http\Controllers\QuizController::class, 'create'])->name('quiz.create');
Route::post('quiz/submit', [App\Http\Controllers\QuizController::class, 'submitQuiz'])->name('quiz.submit');
Route::get('quiz/my-quizzes', [App\Http\Controllers\QuizController::class, 'my_quizzes'])->name('quiz.my-quizzes');
Route::post('quiz/store', [App\Http\Controllers\QuizController::class, 'store'])->name('quiz.store');
Route::get('quizzes/{quiz:slug}', [App\Http\Controllers\QuizController::class, 'show'])->name('quiz.show');
Route::delete('quiz/{quiz:id}/delete', [App\Http\Controllers\QuizController::class, 'destroy'])->name('quiz.delete');
Route::get('{quiz_id}/{quiz}/catch', [App\Http\Controllers\QuizController::class, 'quiz_catch'])->name('quiz.catch');
Route::get('{result:slug}/results', [App\Http\Controllers\QuizController::class, 'quiz_result'])->name('quiz.result');
Route::get('results', [App\Http\Controllers\QuizController::class, 'my_results'])->name('quiz.my-results');
//questions
Route::get('quizzes/{id}/{slug}/create-questions', [App\Http\Controllers\QuestionController::class, 'create'])->name('questions.form');
Route::post('question/store', [App\Http\Controllers\QuestionController::class, 'store'])->name('question.store');
Route::get('MyQuizzes', [App\Http\Controllers\QuestionController::class, 'MyQuizzes'])->name('quizzes');
Route::post('quiz/questions/store', [App\Http\Controllers\QuestionController::class, 'store'])->name('questions.store');
//Messages
Route::resource('photos', PhotoController::class);

Route::resource('messages', App\Http\Controllers\MessageController::class);
//user
Route::get('{user}', [App\Http\Controllers\ProfileController::class, 'index'])->name('user.profile');
Route::post('{user}/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
//contact


// user following system
Route::get('{user}/followings', [App\Http\Controllers\UserFollowingsController::class,'index'])->name('user.followings');


