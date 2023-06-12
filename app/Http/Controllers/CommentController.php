<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function store(Request $request)
    {
        $this->validate($request,[
           'body'=>['required'],
           'post'=>['numeric']
        ]);
        dd($request->body, $request->post);
    }
}
