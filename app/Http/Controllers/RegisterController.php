<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index()
    {

        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->request->add(['username' => Str::slug($request->username)]);
        $this->validate($request, [
            'username' => ['required', 'max:30', 'unique:users'],
            'email' => ['required', 'max:60', 'unique:users'],
            'password' => ['required', 'confirmed'],
            'picture' => ['required', 'image', 'mimes:jpeg,png,jpg,gif'],
        ]);

        $image = $request->file('picture');
        $extension = $image->getClientOriginalExtension();
        $filename = \Illuminate\Support\Str::uuid() . '.' . $extension;
        $croppedImage = \Intervention\Image\Facades\Image::make($image);
        $croppedImage->fit(1000, 1000, null);
        $path = public_path('profile_pictures') . '/' . $filename;
        $croppedImage->save($path, 80);

        User::create([
            'username' => Str::slug($request->username),
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profile_picture' => $filename
        ]);

        auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);
        return redirect()->route('feed.index');
    }
}
