<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;

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

Route::get('/', function () {
    return view('layouts.index');
});
Route::get('/index', function () {
    return view('index');
});
// Route::get('/index', function () {
//     return view('index');
// });


route::resource('answer', AnswerController::class);
route::resource('profile', ProfileController::class)->only(['index', 'update']);

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// route::resource('peran', PeranController::class);
Route::resource('/category', KategoriController::class);

// crud questions
Route::resource('question', QuestionController::class)->middleware('isLogin');

//crud answer
Route::post('/question/{question_id}/answer', [AnswerController::class, 'store'])->name('answer.store');

//show jawaban dari pertanyaan tertentu
Route::get('/question/{id}', 'QuestionController@index')->name('question.view');

//answer
Route::post('/answer/{question_id}', [AnswerController::class, 'create']);