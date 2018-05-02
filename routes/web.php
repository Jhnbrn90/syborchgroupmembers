<?php

use App\Status;
use App\Message;
use Carbon\Carbon;

Auth::routes();

Route::post('/newregister', 'StudentController@store')->name('register-student');

Route::get('/', function () {
    $messages = Message::with('user')->latest()->get();
    $messageCount = $messages->count();
    $messages = $messages->toJson();

    $machines = Status::with('user')
                ->get()
                ->flatmap(function ($status) {
                    return [
                        $status['machine'] => [
                          'status' => $status['status'],
                          'user'   => $status['user']['firstname'],
                          'time'   => Carbon::parse($status['updated_at'])->diffForHumans()
                        ]
                    ];
                });

    return view('welcome', compact('messages', 'messageCount', 'machines'));
});

Route::get('/messages', 'MessageController@index');
Route::post('/messages', 'MessageController@store');

Route::post('/status', 'StatusController@update');

Route::get('/students', 'StudentController@index');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});
