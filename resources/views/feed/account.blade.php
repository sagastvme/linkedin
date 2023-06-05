@extends('navbar')
@section('title')
    Profile: {{$user->username}}
@endsection

@section('content')
    <div class="p-12">
        <div class="p-8 bg-white shadow mt-24">
            <div class="grid grid-cols-1 md:grid-cols-3">
                <div class="grid grid-cols-3 text-center order-last md:order-first mt-20 md:mt-0">
                    <div><p class="font-bold text-gray-700 text-xl">22</p>
                        <p class="text-gray-400">Friends</p></div>
                    <div><p class="font-bold text-gray-700 text-xl">{{count($posts)}}</p>
                        <p class="text-gray-400">Posts</p></div>
                    <div><p class="font-bold text-gray-700 text-xl">89</p>
                        <p class="text-gray-400">Comments</p></div>
                </div>
                <div class="relative">
                    <div
                        class="w-48 h-48 bg-indigo-100 mx-auto rounded-full shadow-2xl absolute inset-x-0 top-0 -mt-24 flex items-center justify-center text-indigo-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24" viewBox="0 0 20 20"
                             fill="currentColor">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </div>
                </div>
                <div class="space-x-8 flex justify-between mt-32 md:mt-0 md:justify-center">


                    @if(auth()->check() && auth()->user()->id == $user->id)
                        <a href="{{ route('feed.create') }}" class="flex-row justify-center mx-auto flex items-center text-white py-2 px-4 uppercase rounded bg-[#0077b5] hover:bg-blue-600 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            New Post
                        </a>
                    @else
                        @auth
                            <button class="text-white py-2 px-4 uppercase rounded bg-gray-700 hover:bg-gray-800 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5">
                                Message
                            </button>
                            <button class="text-white py-2 px-4 uppercase rounded bg-[#0077b5] hover:bg-blue-600 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5">
                                Connect
                            </button>
                        @endauth
                    @endif



                </div>
            </div>
            <div class="mt-20 text-center border-b pb-12"><h1 class="text-4xl font-medium text-gray-700">{{$user->username}}
                   </h1>
                <p class="font-light text-gray-600 mt-3">Bucharest, Romania</p>
                <p class="mt-8 text-gray-500">Solution Manager - Creative Tim Officer</p>
                <p class="mt-2 text-gray-500">University of Computer Science</p></div>
            <div class="flex items-center flex-col gap-8 justify-center mt-5 select-none">
                @foreach($posts as $post)
                    <a href="#" class="flex w-10/12 flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <img class="object-contain w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="{{asset('pictures').'/'. $post->cover}}" alt="">
                        <div class="flex flex-col justify-between p-4 leading-normal">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$post->title}}</h5>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$post->user->username}}</p>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$post->description}}</p>
                        </div>
                    </a>
                @endforeach
            </div>


        </div>
    </div>
@endsection
