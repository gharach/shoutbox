<?php

namespace App\Http\Controllers;

use App\Events\MessageDelivered;
use App\Models\Message;
use Illuminate\Http\Request;

class ChatroomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show chats
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('chat');
    }

    /**
     * get all messages
     *
     * @return Message
     */
    public function getMessages()
    {
        return Message::with('user')->latest()->take(2)->get();
    }
}