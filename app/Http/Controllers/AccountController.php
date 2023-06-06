<?php

namespace App\Http\Controllers;

use App\Models\Friend_request;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index(User $user)
    {


        $friend_requests_sent = auth()->user()->friend_requests_sent;

        $is_request_sent = $this->is_request_sent($friend_requests_sent, $user);

        return view('feed.account', [
            'user' => $user, 'posts' => $user->posts,
            'is_request_sent' => $is_request_sent
        ]);
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
}
