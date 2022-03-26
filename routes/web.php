<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
// home 
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('home.posts');
Route::get('/tournaments', [App\Http\Controllers\TournamentController::class, 'index'])->name('home.tournaments');
Route::get('/try', [App\Http\Controllers\HomeController::class, 'try'])->name('try');
//user
Route::get('/{user}', [App\Http\Controllers\ProfileController::class, 'index'])->name('user.profile');
