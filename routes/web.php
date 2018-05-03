<?php

use App\Status;
use App\Message;
use Carbon\Carbon;

Auth::routes();

Route::post('/newregister', 'StudentController@store')->name('register-student');

Route::get('/', function () {
    $messages = Message::whereDate('created_at', '=', Carbon::today()->toDateString())->with('user')->latest()->get();
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

    $date = Carbon::now()->format('Y-m-d');

    return view('welcome', compact('date', 'messages', 'messageCount', 'machines'));
});

Route::get('/machines/status', function() {
    $machines = Status::with('user')
        ->get()
        ->flatmap(function ($status) {
            return [
                $status['machine'] => [
                    'status' => $status['status'],
                    'user' => $status['user']['firstname'],
                    'time' => Carbon::parse($status['updated_at'])->diffForHumans()
                ]
            ];
        });

        return $machines;
});

Route::get('api/messages', function() {
    $messages = Message::whereDate('created_at', '=', Carbon::today()->toDateString())->with('user')->latest()->get();
    $messageCount = $messages->count();
    return $messages;
});

Route::get('/messages', 'MessageController@index');
Route::post('/messages', 'MessageController@store');

Route::post('/status', 'StatusController@update');
Route::get('/equipment', 'EquipmentController@index');
Route::post('/equipment/update', 'EquipmentController@update');
Route::get('/equipment/{equipment}', 'EquipmentController@show');

Route::get('/members', 'StudentController@index');

Route::post('/students/get', 'StudentController@getApi');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});
