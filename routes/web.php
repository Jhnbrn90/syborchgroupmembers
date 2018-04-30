<?php

use App\Message;

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

Auth::routes();

Route::post('/newregister', 'StudentController@store')->name('register-student');

Route::get('/', function () {
    $messages = Message::with('user')->latest()->get();

    $messageCount = $messages->count();

    $messages = $messages->toJson();

    return view('welcome', compact('messages', 'messageCount'));
});

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});

Route::get('/messages', 'MessageController@index');
Route::post('/messages', 'MessageController@store');
