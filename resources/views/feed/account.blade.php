@extends('navbar')
@section('title')
    Profile: {{$user->username}}
@endsection

@section('content')
    <div class="p-12">
        <div class="p-8 bg-white shadow mt-24">
            <div class="grid grid-cols-1 md:grid-cols-3">
                <div class="grid grid-cols-3 text-center order-last md:order-first mt-20 md:mt-0">
                    <div><p class="font-bold text-gray-700 text-xl">{{$user->friends->count()}}</p>
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
                        {{--User is the logged user --}}
                        <a href="{{ route('feed.create') }}"
                           class="mx-auto inline-flex items-center gap-2 rounded border-2 border-[#0077b5] bg-[#0077b5]

                                 text-white py-2 px-4 uppercase font-medium

                                  transition-colors hover:bg-transparent hover:text-[#0077b5] focus:outline-none focus:ring active:opacity-75"


                        >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-4 h-4 mr-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                            </svg>
                            New post

                        </a>
                    @else
                        {{--User is not the one logged in --}}
                        @auth

                            @if(session('success') ||    $is_request_sent==1 )
                                <button type="submit" class="mx-auto inline-flex items-center gap-2 rounded border-2 border-[#0077b5] bg-[#0077b5]

                                 text-white py-2 px-4 uppercase font-medium

                                  transition-colors hover:bg-transparent hover:text-[#0077b5] focus:outline-none focus:ring active:opacity-75"
                                >
                                    <svg class="w-6 h-6 mr-1" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                           stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <defs>
                                                <style>.cls-1 {
                                                        fill: none;
                                                        stroke: currentColor;
                                                        stroke-linecap: round;
                                                        stroke-linejoin: round;
                                                        stroke-width: 2px;
                                                    }</style>
                                            </defs>
                                            <title></title>
                                            <g data-name="12-sent" id="_12-sent">
                                                <polygon class="cls-1" points="19 31 13 19 1 13 31 1 19 31"></polygon>
                                                <line class="cls-1" x1="13" x2="25" y1="19" y2="7"></line>
                                            </g>
                                        </g>
                                    </svg>
                                    Friend request sent
                                </button>
                            @else
                                @if(!$they_are_friends)

                                    <form method="post" class="mx-auto" action="">
                                        @csrf

                                        <input type="hidden" name="friend_id" value="{{$user->id}}">
                                        <button type="submit"
                                                class="mx-auto inline-flex items-center gap-2 rounded border-2 border-[#0077b5] bg-[#0077b5]

                                 text-white py-2 px-4 uppercase font-medium

                                  transition-colors hover:bg-transparent hover:text-[#0077b5] focus:outline-none focus:ring active:opacity-75"
                                        >

                                            <svg class="w-6 h-6 mr-1" version="1.1" id="_x32_"
                                                 xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512"
                                                 xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier"
                                                                                        stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                   stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <style type="text/css"> .st0 {
                                                            fill: currentColor;
                                                        } </style>
                                                    <g>
                                                        <path class="st0"
                                                              d="M406.591,354.932c-16.943-6.336-36.233-16.2-36.233-28.963c0-8.45,0-19.007,0-33.489 c6.194-17.19,15.514-18.42,20.181-44.803c10.861-3.882,17.07-10.09,24.819-37.251c5.827-20.443-2.757-25.93-8.315-27.394 c0.113-1.089,0.226-2.185,0.325-3.472c2.093-30.618,19.87-121.503-41.678-132.365c-16.292-12.671-26.63-18.413-61.547-16.292 c-22.104-0.008-38.905,4.872-62.31-1.818C227.578,41.045,221.653,65.503,219.8,92.48c-4.101-2.871-8.414-5.459-13.492-7.425 c-7.707-2.984-16.504-4.32-27.761-4.306c-3.507,0-7.297,0.128-11.398,0.375c-11.766,0.07-21.186,1.463-29.939,1.428 c-6.138-0.006-12.036-0.58-18.965-2.552l-5.544-1.584l-4.426,3.706c-5.176,4.356-9.079,9.836-12.092,15.818 c-4.497,9.002-7.099,19.248-8.725,30.102c-1.612,10.847-2.192,22.316-2.192,33.666c0,18.936,1.612,37.548,3.069,51.874 c-0.778,0.616-1.556,1.231-2.292,2.016c-1.895,2.022-3.535,4.617-4.582,7.552c-1.061,2.935-1.57,6.166-1.57,9.588 c0,4.038,0.679,8.358,2.05,13.174c3.436,11.922,6.548,19.933,11.06,26.333c2.248,3.168,4.95,5.848,7.863,7.863 c1.004,0.708,2.037,1.238,3.055,1.789c2.503,9.708,6.364,17.062,9.687,22.224c1.966,3.069,3.662,5.459,4.597,7.05 c0.466,0.792,0.749,1.372,0.876,1.683l0.029,0.078c0,11.576,0,20.167,0,27.047l-0.198,0.438c-0.325,0.601-1.216,1.747-2.659,3.012 c-4.313,3.939-13.237,8.316-20.365,10.763c-12.204,4.334-35.568,12.805-56.456,29.514c-10.437,8.365-20.308,18.894-27.591,32.11 C4.554,429.003-0.014,444.885,0,463.192c0,3.182,0.142,6.435,0.411,9.765l0.834,9.956h116.886h1.768h391.657 C518.781,396.291,436.021,365.942,406.591,354.932z M259.328,325.969c0,12.763-20.832,23.533-36.233,28.963 c-27.012,9.518-97.964,36.063-104.851,106.258H21.85c0.325-13.802,3.692-25.173,9.023-34.896 c8.373-15.267,21.85-26.701,35.695-35.045c13.845-8.351,27.775-13.484,36.544-16.567c7.155-2.546,15.429-6.174,22.684-11.201 c3.62-2.539,7.042-5.424,9.885-9.143c2.8-3.663,5.134-8.528,5.148-14.256c0-7.106,0-15.981,0-28.157v-0.559l-0.057-0.558 c-0.495-4.54-2.277-7.962-3.889-10.72c-2.503-4.158-5.048-7.438-7.326-11.603c-2.263-4.144-4.342-9.051-5.6-16.123l-1.104-6.215 l-5.94-2.122c-1.739-0.629-2.814-1.167-3.649-1.754c-1.202-0.877-2.39-1.972-4.228-5.352c-1.782-3.338-3.875-8.803-6.208-16.978 c-0.948-3.302-1.23-5.693-1.216-7.206c0-1.294,0.184-1.944,0.268-2.199l0.029-0.07l0.353-0.106l9.433-2.122l-1.004-9.617 c-1.57-14.771-3.719-36.006-3.705-56.915c-0.014-14.128,1.004-28.094,3.62-39.415c1.301-5.664,2.998-10.634,4.993-14.616 c1.004-1.994,2.064-3.72,3.182-5.198c6.576,1.343,12.714,1.803,18.428,1.796c11.059-0.036,20.407-1.471,30.462-1.442h0.325 l0.325-0.021c3.819-0.233,7.199-0.34,10.225-0.34c9.674,0.007,15.387,1.103,19.927,2.85c4.539,1.747,8.528,4.448,14.27,8.931 l1.697,1.315l4.695,2.093c0.227,24.416,2.644,48.452,4.413,65.217c-5.502,1.23-14.977,6.336-8.91,27.549 c7.75,27.16,13.958,33.369,24.82,37.251c4.653,26.383,18.838,34.854,19.87,44.803C259.328,306.962,259.328,317.519,259.328,325.969 z"></path>
                                                    </g>
                                                </g></svg>
                                            Connect
                                        </button>

                                    </form>
                                @else
                                    <button class="  mx-auto
 text-white py-2 px-4 uppercase rounded  bg-gray-700 hover:bg-gray-800 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5">
                                        Message
                                    </button>
                                @endif
                            @endif

                        @endauth
                    @endif


                </div>
            </div>
            <div class="mt-20 text-center border-b pb-12"><h1
                    class="text-4xl font-medium text-gray-700">{{$user->username}}
                </h1>
                <p class="font-light text-gray-600 mt-3">Bucharest, Romania</p>
                <p class="mt-8 text-gray-500">Solution Manager - Creative Tim Officer</p>
                <p class="mt-2 text-gray-500">University of Computer Science</p></div>
            <div class="flex items-center flex-col gap-8 justify-center mt-5 select-none">
                @foreach($posts as $post)
                    <a href="#"
                       class="flex w-10/12 flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <img
                            class="object-contain w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
                            src="{{asset('pictures').'/'. $post->cover}}" alt="">
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
