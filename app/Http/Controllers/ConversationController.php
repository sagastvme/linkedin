<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\User;
use http\Message;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        if ($user->is(auth()->user())) {
         abort(404);
        }

        $commonConversations = $user->members->pluck('conversation_id')
            ->intersect(auth()->user()->members->pluck('conversation_id'));

        if ($commonConversations->isEmpty()) {
           abort(404);
        }

        $conversation = Conversation::find($commonConversations->first());
        return view('messages.conversation', ['conversation' => $conversation, 'user' => $user]);


    }

    public function store(Request $request, User $user, Conversation $conversation)
    {
        $this->validate($request, [
            'content' => 'required'
        ]);
        if (!$user->is(auth()->user())) {
            $commonConversations = $user->members->pluck('conversation_id')
                ->intersect(auth()->user()->members->pluck('conversation_id'));

            if ($commonConversations->isNotEmpty()) {
                $conversation_found = Conversation::find($commonConversations->first());

                if ($conversation->id === $conversation_found->id) {
                    $message = new \App\Models\Message();
                    $message->conversation_id = $conversation_found->id;
                    $message->user_id = auth()->user()->id; // Set the user ID for the message
                    $message->content = $request->get('content');
                    $message->save();


                }


            }
            return back();


        }
    }
}
