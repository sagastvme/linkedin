<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Member;
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

    public function show()
    {
        return view('messages.general');
    }


    public function create(User $user)
    {
        $friends=  auth()->user()->friends;
        $friends_two=  auth()->user()->friend_two;


        $friendsId = $friends->pluck('friend_id');
        $friendsIdTwo=$friends_two->pluck('user_id');

        $friends = $friendsIdTwo->concat($friendsId);

        $friends = User::whereIn('id', $friends)->get();



        if ($friends->contains($user)) {

            $commonConversations = $user->members->pluck('conversation_id')
                ->intersect(auth()->user()->members->pluck('conversation_id'));

            if ($commonConversations->isEmpty()) {
                $new_conversation = new Conversation();
                $new_conversation->save();

                $new_member_one = new Member();
                $new_member_two = new Member();


                $new_member_one->conversation_id = $new_conversation->id;
                $new_member_one->user_id=auth()->user()->id;
                $new_member_one->save();


                $new_member_two->conversation_id = $new_conversation->id;
                $new_member_two->user_id=$user->id;
                $new_member_two->save();

                return redirect()->route('conversation.index', ['conversation' => $new_conversation, 'user' => $user]);


            } else {
                $conversation = Conversation::find($commonConversations->first());
                return redirect()->route('conversation.index', ['conversation' => $conversation, 'user' => $user]);


            }


        } else {
            return back();
        }


    }

}
