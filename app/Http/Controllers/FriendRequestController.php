<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\Friend_request;
use App\Models\User;
use Illuminate\Http\Request;

class FriendRequestController extends Controller
{
    //
    public function create(Request $request)
    {
        $this->validate($request, [
            'friend_id' => ['required', 'numeric']
        ]);

        Friend_request::create([
                'sender_id' => auth()->user()->id,
                'receiver_id' => $request->friend_id
            ]
        );
        return back()->with('success', 'Your friend request has been sent');

    }

    public function show()
    {

        $requests_received = auth()->user()->friend_requests_received;

// Extract the sender IDs from the friend requests
        $senderIds = $requests_received->pluck('sender_id');

// Retrieve the users based on the sender IDs
        $senders = User::whereIn('id', $senderIds)->get('username');


        return view('friend_requests.requests', ['requests_received' => $senders]);
    }

    public function store(Request $request)
    {
        $sender = User::where('username', $request->username)->first();

        if($request->mode=='decline'){
            $friend_request = Friend_request::where('sender_id', $sender->id)
                ->where('receiver_id', auth()->user()->id)
                ->delete();

            return back()->with(['notification' => 'You have declined '. $sender->username . ' friend request']);

        }else {


            $friend_request = Friend_request::where('sender_id', $sender->id)
                ->where('receiver_id', auth()->user()->id)
                ->first();


            $they_arent_friends = $this->they_arent_friends($sender);


            if ($friend_request && $they_arent_friends) {
                $friend_request->delete();
                Friend::create(
                    [
                        'user_id' => auth()->user()->id,
                        'friend_id' => $sender->id
                    ]
                );
                return back()->with(['notification' => 'You are now friends with '. $sender->username]);

            }
        }


    }

    private function they_arent_friends(User $sender)
    {
        $first_check = Friend::where('user_id', $sender->id)
            ->where('friend_id', auth()->user()->id)
            ->first();

        $second_check = Friend::where('friend_id', $sender->id)
            ->where('user_id', auth()->user()->id)
            ->first();

        if (!$first_check && !$second_check) {
            return true;
        } else {
            return false;
        }
    }

}
