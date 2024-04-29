<?php

namespace App\Http\Controllers;

use App\Events\MessageDelivered;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


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
        $maxMessagesToShow = env('NEW_MESSAGES_LIMIT');
        $messages = Message::with('user')->latest()->take($maxMessagesToShow)->get();
        $ascendingMessages = $messages->sortBy('created_at')->values();
        return $ascendingMessages;
    }

    /**
     * Persist message to database
     *
     * @param  Request $request
     * @return Response
     */
    public function sendMessage(Request $request)
    {
        $user = Auth::user();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            if ($file !== null) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads'), $filename);
                $manager = new ImageManager(new Driver());
                $image = $manager->read(public_path('uploads/'). $filename);
                $image->scale(height: 400);
                $image->save(public_path('uploads/thumbnail/'). $filename);
                $imagePath = 'uploads/thumbnail/' . $filename; // Construct the image path
            }
        }
        $message = $user->messages()->create([
            'message' => $request->input('message'),
            'image' => $imagePath ?? null,
        ]);

        broadcast(new MessageDelivered($user, $message))->toOthers();

        return response()->json([
            'message' => $message->message,
            'user' => $user,
            'image' => $message->image, // Include image path in the response
        ]);
    }
}
