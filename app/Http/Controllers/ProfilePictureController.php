<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilePictureController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        return view('profile_picture.new_picture');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
      'picture' => ['required', 'image', 'mimes:jpeg,png,jpg,gif'],
        ]);
        unlink(public_path('profile_pictures').'/'.auth()->user()->profile_picture);
        $image = $request->file('picture');
        $extension = $image->getClientOriginalExtension();
        $filename = \Illuminate\Support\Str::uuid() . '.' . $extension;
        $croppedImage = \Intervention\Image\Facades\Image::make($image);
        $croppedImage->fit(1000, 1000, null);
        $path = public_path('profile_pictures') . '/' . $filename;
        $croppedImage->save($path, 80);
        auth()->user()->profile_picture=$filename;
        auth()->user()->save();
return         redirect()->route('account',['user'=>auth()->user()]);

//        Route::get('/{user:username}', [\App\Http\Controllers\AccountController::class, 'index'])->name('account');


    }
}
