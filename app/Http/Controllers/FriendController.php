<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {



        $friends=  auth()->user()->friends;
        $friendsId = $friends->pluck('friend_id');
        $friends = User::whereIn('id', $friendsId)->get();


        return view('friend.friends_list', [
            'friends'=> $friends
        ]);





   }
}
