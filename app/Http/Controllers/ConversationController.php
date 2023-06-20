<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    public function index(User $user)
    {

        return view('messages.conversation', ['user'=>$user]);
    }
}
