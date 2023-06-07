<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\Friend_request;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index(User $user)
    {

if(auth()->user()){
    $friend_requests_sent = auth()->user()->friend_requests_sent;
    $is_request_sent = $this->is_request_sent($friend_requests_sent, $user);
    $they_are_friends = $this->check_if_friends($user);
    return view('feed.account', [
        'user' => $user, 'posts' => $user->posts,
        'is_request_sent' => $is_request_sent,
        'they_are_friends'=>$they_are_friends
    ]);
}else{
    return view('feed.account', [
        'user' => $user, 'posts' => $user->posts,
        'is_request_sent' => null,
        'they_are_friends'=>null
    ]);
}


    }

    private function is_request_sent(Collection $friend_requests_sent, User $user): int
    {
        return $friend_requests_sent->filter(function ($element) use ($user) {
            return $element['receiver_id'] == $user->id;
        })->count();
    }

    public function create(Request $request)
    {

    }

    private function check_if_friends(User $user)
    {
        $first_check = Friend::where('user_id', $user->id)
            ->where('friend_id', auth()->user()->id)
            ->first();

        $second_check = Friend::where('friend_id', $user->id)
            ->where('user_id', auth()->user()->id)
            ->first();

        if (!$first_check && !$second_check) {
            return false;

        } else {
            return true;
        }
    }
}
