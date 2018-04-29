<?php

namespace App\Http\Controllers;

use App\Message;
use App\Events\NewMessage;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::with('user')->latest()->get();

        return $messages;
    }

    public function store(Request $request)
    {
        $message = Message::create([
            'body'    => $request->message,
            'user_id' => auth()->id(),
        ]);

        $message = $message->load('user');

        NewMessage::dispatch($message)->dontBroadcastToCurrentUser();

        return $message;
    }
}
