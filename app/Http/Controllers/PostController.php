<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Nette\Utils\Image;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $posts = Post::paginate(4);
        return view('feed.feed', ['posts' => $posts]);
    }

    public function create()
    {
        return view('feed.newpost');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'picture' => 'image',
        ]);
        if ($request->hasFile('picture')) {
            $image = $request->file('picture');
            $extension = $image->getClientOriginalExtension();
            $filename = \Illuminate\Support\Str::uuid() . '.' . $extension;

            $croppedImage = \Intervention\Image\Facades\Image::make($image);
            $croppedImage->fit(1000, 1000, null);
            $path = public_path('post_pictures') . '/' . $filename;
            $croppedImage->save($path, 80);
        }


        Post::create([
            'title' => ucfirst($request->title),
            'description' => ucfirst($request->description),
            'cover' => $filename,
            'likes' => 0,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('feed.index');
        // Handle the case where no image was uploaded

    }

}
