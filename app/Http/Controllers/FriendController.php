<?php

namespace App\Http\Controllers;

use App\Models\Friend;
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
        $friends_two=  auth()->user()->friend_two;


        $friendsId = $friends->pluck('friend_id');
        $friendsIdTwo=$friends_two->pluck('user_id');

        $friends = $friendsIdTwo->concat($friendsId);

        $friends = User::whereIn('id', $friends)->get();


        return view('friend.friends_list', [
            'friends'=> $friends
        ]);





   }
   public function delete(Request  $request){
        $this->validate($request,[
            'friend_id'=>'required|numeric'
        ]);
       $id_for_deletion=$request->friend_id;

        $first_check=Friend::where('friend_id', auth()->user()->id)->where('user_id', $id_for_deletion)->first();
        $second_check=Friend::where('user_id', auth()->user()->id)->where('friend_id', $id_for_deletion)->first();

        if($first_check ){
          $first_check->delete();

        }elseif ($second_check){
            $second_check->delete();
        }
        return back();



   }
}
