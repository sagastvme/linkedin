<?php

namespace App\Http\Controllers;

use App\Models\Friend_request;
use Illuminate\Http\Request;

class FriendRequestController extends Controller
{
    //
    public function create(Request $request){
        $this->validate($request, [
            'friend_id' => ['required', 'numeric']
        ]);

      Friend_request::create([
          'sender_id'=> auth()->user()->id,
        'receiver_id'=>$request->friend_id
          ]
      );
      return back()->with('success', 'Your friend request has been sent');

    }

    public function show(){
      return view( 'friend_requests.requests');
    }

}
