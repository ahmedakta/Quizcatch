
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
Route::group(['prefix'=>'admin','middleware'=>['isAdmin','auth','PreventBackHistory']],function(){
    Route::get('dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
    // delete routes
    Route::delete('user/{user:id}/delete', [App\Http\Controllers\AdminController::class, 'deleteUser'])->name('admin.delete.user');
    Route::delete('quiz/{quiz:id}/delete', [App\Http\Controllers\AdminController::class, 'deleteQuiz'])->name('admin.delete.quiz');
    Route::delete('post/{post:id}/delete', [App\Http\Controllers\AdminController::class, 'deletePost'])->name('admin.delete.post');
    // Quizzes And Posts
    Route::get('posts', [App\Http\Controllers\AdminController::class, 'posts'])->name('admin.posts');
    Route::get('quizzes', [App\Http\Controllers\AdminController::class, 'quizzes'])->name('admin.quizzes');

});
Route::permanentRedirect('/here', '/');

Route::middleware(['middleware' => 'PreventBackHistory'])->group(function(){
    Auth::routes();
});

//classes
Route::get('class/create', [App\Http\Controllers\UsersClassController::class, 'create'])->name('class.create');
Route::get('classes', [App\Http\Controllers\UsersClassController::class, 'index'])->name('class.index');
Route::get('/join/{class:slug}', [App\Http\Controllers\UsersClassController::class, 'join'])->name('class.join');
Route::get('/class/{class:slug}', [App\Http\Controllers\UsersClassController::class, 'show'])->name('class.show');
Route::post('/join/private/{class:slug}', [App\Http\Controllers\UsersClassController::class, 'join'])->name('private.class.join');
Route::post('class/store', [App\Http\Controllers\UsersClassController::class, 'store'])->name('class.store');

Route::group(['middleware' => 'PreventBackHistory'],function(){
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
        // home
        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        // POSTS
        Route::get('posts', [App\Http\Controllers\PostController::class, 'index'])->name('home.posts');
        Route::get('{user}/private-posts', [App\Http\Controllers\PostController::class, 'private_posts'])->name('private.posts');
        Route::get('post/{post:id}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
        Route::post('post/{post:id}/update', [App\Http\Controllers\PostController::class, 'update'])->name('post.update');
        Route::post('save', [App\Http\Controllers\PostController::class, 'postSave'])->name('post.save');
        Route::get('{user}/saved-posts', [App\Http\Controllers\PostController::class, 'saved_posts'])->name('saved.posts');
        Route::delete('post/{post:id}/delete', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.delete');
        Route::post('store', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
        Route::post('store/comment', [App\Http\Controllers\CommentController::class, 'store'])->name('post.comment');
        Route::get('post/{post:id}/comments', [App\Http\Controllers\PostController::class, 'postComments'])->name('post.comments');
        Route::delete('comment/{comment:id}/delete', [App\Http\Controllers\CommentController::class, 'destroy'])->name('comment.delete');
        Route::delete('saved-post/{id}/delete', [App\Http\Controllers\PostController::class, 'destroy_savedPost'])->name('saved.delete');
        // POSTS LIKE
        Route::post('like', [App\Http\Controllers\PostController::class, 'postLikePost'])->name('post.like');
        // Tournmanent
        Route::get('tournaments', [App\Http\Controllers\TournamentController::class, 'index'])->name('tournaments.index');
        Route::get('make/tournament', [App\Http\Controllers\TournamentController::class, 'create'])->name('tournament.create');
        // Quiz
        Route::get('quiz/create', [App\Http\Controllers\QuizController::class, 'create'])->name('quiz.create');
        Route::post('quiz/submit', [App\Http\Controllers\QuizController::class, 'submitQuiz'])->name('quiz.submit');
        Route::get('quiz/my-quizzes', [App\Http\Controllers\QuizController::class, 'my_quizzes'])->name('quiz.my-quizzes');
        Route::post('quiz/store', [App\Http\Controllers\QuizController::class, 'store'])->name('quiz.store');
        Route::get('quiz/{quiz:slug}/edit', [App\Http\Controllers\QuizController::class, 'edit'])->name('quiz.edit');
        Route::post('quiz/{quiz:id}/update', [App\Http\Controllers\QuizController::class, 'update'])->name('quiz.update');
        Route::get('quizzes/{quiz:slug}', [App\Http\Controllers\QuizController::class, 'show'])->name('quiz.show');
        Route::delete('quiz/{quiz:id}/delete', [App\Http\Controllers\QuizController::class, 'destroy'])->name('quiz.delete');
        Route::get('{quiz_id}/{quiz}/catch', [App\Http\Controllers\QuizController::class, 'quiz_catch'])->name('quiz.catch');
        Route::get('{result:slug}/results', [App\Http\Controllers\QuizController::class, 'quiz_result'])->name('quiz.result');
        Route::get('results', [App\Http\Controllers\QuizController::class, 'my_results'])->name('quiz.my-results');
        //questions
        Route::get('quizzes/{id}/{slug}/create-questions', [App\Http\Controllers\QuestionController::class, 'create'])->name('questions.form');
        Route::post('question/store', [App\Http\Controllers\QuestionController::class, 'store'])->name('question.store');
        Route::delete('question/{question:id}/delete', [App\Http\Controllers\QuestionController::class, 'destroy'])->name('question.delete');
        Route::get('MyQuizzes', [App\Http\Controllers\QuestionController::class, 'MyQuizzes'])->name('quizzes');
        Route::post('quiz/questions/store', [App\Http\Controllers\QuestionController::class, 'store'])->name('questions.store');
        //Messages
        Route::resource('photos', PhotoController::class);

        Route::resource('messages', App\Http\Controllers\MessageController::class);
        //user
        Route::get('{user:user_name}', [App\Http\Controllers\ProfileController::class, 'index'])->name('user.profile');
        Route::post('{user}/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
        //contact

        //class 
        // user following system
        Route::get('{user}/followings', [App\Http\Controllers\UserFollowingsController::class,'index'])->name('user.followings');
});