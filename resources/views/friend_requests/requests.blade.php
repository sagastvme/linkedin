@extends('navbar')
@section('title')
    Friend requests
@endsection

@section('content')
    <!-- component -->
    @if(session('notification'))
        <div id="toast-bottom-right"
             class="fixed flex items-center w-full max-w-xs p-4 space-x-4 text-green-500 bg-green-100 divide-x divide-green-200 rounded-lg shadow right-5 bottom-5 dark:text-green-400 dark:divide-green-700 space-x dark:bg-green-900"
             role="alert">
            <div class="text-sm font-normal"> {{session('notification')}}</div>
        </div>
    @endif


    <div class="flex  items-center justify-center pt-10">


        @if($requests_received->count()> 0)
            <div class="bg-gray-100 rounded-lg shadow-xl border border-black p-8 w-3xl">

                <div class="mb-4">
                    <h1 class="font-semibold text-gray-800">Friend Requests</h1>
                </div>

                @foreach($requests_received as $friend_request)

                    <div class="flex justify-center items-center mb-8">
                        <div class="w-1/5">
                            <img class="w-12 h-12 rounded-full border border-gray-100 shadow-sm"
                                 src="https://randomuser.me/api/portraits/men/20.jpg" alt="user image"/>
                        </div>
                        <div class="w-4/5">
                            <div>
                                <span class="font-semibold text-gray-800">{{$friend_request->username}}</span>
                                <span class="text-gray-400">wants to be your friend</span>
                            </div>
                            <div class="font-semibold flex">
                                <form action="{{route('show_friend_requests')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="username" value="{{$friend_request->username}}">
                                    <input type="hidden" name="mode" value="accept">
                                    <button type="submit" class="text-blue-600 mr-2">Accept</button>
                                </form>
                                <form action="{{route('show_friend_requests')}}" method="POST">
                                    @csrf

                                    <input type="hidden" name="username" value="{{$friend_request->username}}">
                                    <input type="hidden" name="mode" value="decline">

                                    <button type="submit" class="text-gray-400 mr-2">Decline</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
                @else
                    <div
                        class="relative flex flex-col items-center max-w-lg gap-4 p-6 rounded-md shadow-md sm:py-8 sm:px-12 dark:bg-gray-900 dark:text-gray-100">


                        <svg class="w-40 h-40 fill-current shrink-0 dark:text-violet-400" id="Layer_1"
                             data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 122.88 106.65">
                            <defs>
                                <style>.cls-1 {
                                        fill-rule: evenodd;
                                    }</style>
                            </defs>
                            <title>confused-confusion</title>
                            <path class="cls-1"
                                  d="M40.53,53.26a92.87,92.87,0,0,1,43.37,0,5.46,5.46,0,0,1,3.33,2,5.16,5.16,0,0,1,.75,1L97.82,70l6-16.5a5.21,5.21,0,0,1,2.35-3.22v0l6.72-5a1.63,1.63,0,0,1,2.28.33h0a1.62,1.62,0,0,1-.33,2.27l-3.92,2.94c.35.14.71.29,1.06.46l4.3-2.81a1.25,1.25,0,0,1,1.73.36h0a1.26,1.26,0,0,1-.36,1.74L115.47,52h5.61a1.81,1.81,0,0,1,1.8,1.8h0a1.8,1.8,0,0,1-1.8,1.79h-4.86a13.36,13.36,0,0,1-.79,2L105,87.72h0a6.13,6.13,0,0,1-11.07,1.06L84.52,74.33c-1.44,9.08-2.71,23.89-5,32.32H44.9c-2.38-8.78-3.72-24.11-5.22-33.57l-10.2,15.7a6.13,6.13,0,0,1-11.07-1.06h0L8,57.62a14.53,14.53,0,0,1-.8-2H2.3A1.8,1.8,0,0,1,.51,53.8h0A1.8,1.8,0,0,1,2.3,52H7.91L5.72,50.56a1.26,1.26,0,0,1-.37-1.74h0a1.27,1.27,0,0,1,1.74-.36l4.3,2.81c.35-.17.71-.32,1.06-.46L8.52,47.87A1.62,1.62,0,0,1,8.2,45.6h0a1.62,1.62,0,0,1,2.27-.33l6.73,5v0a5.24,5.24,0,0,1,2.35,3.22l6,16.5,9.85-13.76a6.49,6.49,0,0,1,5-3l.1,0Zm-27-34.06v-.39a9.08,9.08,0,0,1,.21-2.19,3.29,3.29,0,0,1,.65-1.31,4.85,4.85,0,0,1,1-.9c.35-.23.67-.45,1-.67a3,3,0,0,0,.66-.69,1.4,1.4,0,0,0,.25-.83,1.35,1.35,0,0,0-.2-.73,1.37,1.37,0,0,0-.54-.5,1.73,1.73,0,0,0-.76-.17A1.64,1.64,0,0,0,15,11a1.6,1.6,0,0,0-.61.57,1.53,1.53,0,0,0-.23.85H9.88a5.09,5.09,0,0,1,.83-3A4.76,4.76,0,0,1,12.88,7.8a7.82,7.82,0,0,1,2.95-.54A9,9,0,0,1,19,7.78a4.94,4.94,0,0,1,2.21,1.56A4.2,4.2,0,0,1,22,12a4,4,0,0,1-1.3,3.11,7.47,7.47,0,0,1-1.42,1,5.26,5.26,0,0,0-1,.72,2.62,2.62,0,0,0-.62.84,3,3,0,0,0-.2,1.14v.39Zm2,5.59a2.24,2.24,0,0,1-1.65-.67,2.17,2.17,0,0,1-.68-1.65,2.15,2.15,0,0,1,.68-1.63,2.24,2.24,0,0,1,1.65-.67,2.27,2.27,0,0,1,2,3.47,2.53,2.53,0,0,1-.85.84,2.17,2.17,0,0,1-1.14.31ZM5.9,0H26.79A5.12,5.12,0,0,1,30.4,1.5l.1.1a5.36,5.36,0,0,1,1,1.56,5.14,5.14,0,0,1,.39,2V29.43a5.14,5.14,0,0,1-.39,1.95A5.31,5.31,0,0,1,30.4,33h0a5.12,5.12,0,0,1-3.61,1.5H25.55l-.41,4.62a1.55,1.55,0,0,1-2.61,1L15.6,34.54H5.11A5.12,5.12,0,0,1,1.5,33l-.09-.1a5.07,5.07,0,0,1-1-1.56A5.14,5.14,0,0,1,0,29.43V5.11A5.14,5.14,0,0,1,.39,3.16,5.31,5.31,0,0,1,1.5,1.5h0A5.12,5.12,0,0,1,5.11,0ZM26.79,3.11H5.11a1.91,1.91,0,0,0-.76.15,2,2,0,0,0-.65.44h0a1.94,1.94,0,0,0-.43.65,1.91,1.91,0,0,0-.15.76V29.43a1.91,1.91,0,0,0,.15.76,2.1,2.1,0,0,0,.37.59l.07.06a2.05,2.05,0,0,0,.65.45,2.1,2.1,0,0,0,.76.14H15.83a2.5,2.5,0,0,1,.94.19,2.58,2.58,0,0,1,.77.51L22.31,36l.18-2.1a2.46,2.46,0,0,1,.61-1.61,2.5,2.5,0,0,1,1.6-.83l.24,0h1.85a2.1,2.1,0,0,0,.76-.14,2.05,2.05,0,0,0,.65-.45h0a2.13,2.13,0,0,0,.44-.65,2.1,2.1,0,0,0,.14-.76V5.11a2.1,2.1,0,0,0-.14-.76,2.13,2.13,0,0,0-.38-.59L28.2,3.7a2,2,0,0,0-.65-.44,1.91,1.91,0,0,0-.76-.15Zm75.86,23.37v-.4a9,9,0,0,1,.21-2.18,3.33,3.33,0,0,1,.65-1.32,5.11,5.11,0,0,1,1-.89c.35-.23.67-.46,1-.68a2.81,2.81,0,0,0,.66-.68,1.45,1.45,0,0,0,.25-.83,1.39,1.39,0,0,0-.2-.74,1.35,1.35,0,0,0-.54-.49,1.73,1.73,0,0,0-.76-.17,1.61,1.61,0,0,0-.82.21,1.46,1.46,0,0,0-.61.57,1.51,1.51,0,0,0-.23.85H99a5.09,5.09,0,0,1,.83-3A4.76,4.76,0,0,1,102,15.07a7.91,7.91,0,0,1,3-.53,9,9,0,0,1,3.18.52,4.87,4.87,0,0,1,2.21,1.56,4.18,4.18,0,0,1,.8,2.61,4.27,4.27,0,0,1-.34,1.77,4.19,4.19,0,0,1-1,1.33,7.5,7.5,0,0,1-1.42,1.06,5.26,5.26,0,0,0-1,.72,2.42,2.42,0,0,0-.62.84,2.93,2.93,0,0,0-.2,1.13v.4Zm2,5.59a2.25,2.25,0,0,1-1.65-.68,2.17,2.17,0,0,1-.68-1.65,2.14,2.14,0,0,1,.68-1.62,2.32,2.32,0,0,1,3.26,0,2.22,2.22,0,0,1,.72,1.62,2.29,2.29,0,0,1-.34,1.18,2.53,2.53,0,0,1-.85.84,2.17,2.17,0,0,1-1.14.31Zm10.43-21.31H94.22a1.91,1.91,0,0,0-.76.15,2,2,0,0,0-.65.44l-.07.06a2.13,2.13,0,0,0-.38.59,2.11,2.11,0,0,0-.14.77V33.25a2.11,2.11,0,0,0,.14.77,2.26,2.26,0,0,0,.44.65h0a2,2,0,0,0,.65.44,1.91,1.91,0,0,0,.76.15h1.85l.24,0a2.46,2.46,0,0,1,1.6.83,2.41,2.41,0,0,1,.61,1.6l.18,2.11L103.47,36a2.38,2.38,0,0,1,.77-.5,2.54,2.54,0,0,1,.94-.19H115.9a1.91,1.91,0,0,0,.76-.15,2,2,0,0,0,.65-.44l.07-.06a2,2,0,0,0,.53-1.36V12.77a2.11,2.11,0,0,0-.15-.77,2.4,2.4,0,0,0-.44-.65h0a2,2,0,0,0-.65-.44,1.91,1.91,0,0,0-.76-.15ZM94.22,7.65H115.9a5,5,0,0,1,1.95.4,5.09,5.09,0,0,1,1.66,1.11h0a5.07,5.07,0,0,1,1.5,3.61V33.25a5.15,5.15,0,0,1-.39,2,5.31,5.31,0,0,1-1,1.55l-.1.11A5.43,5.43,0,0,1,117.85,38a5.14,5.14,0,0,1-1.95.39H105.41L98.48,44a1.49,1.49,0,0,1-.93.42A1.54,1.54,0,0,1,95.87,43l-.41-4.62H94.22a5.14,5.14,0,0,1-2-.39,5.43,5.43,0,0,1-1.66-1.11h0a5.07,5.07,0,0,1-1.5-3.61V12.77a5.15,5.15,0,0,1,.39-2,5.31,5.31,0,0,1,1-1.55l.1-.1a5.09,5.09,0,0,1,1.66-1.11,5,5,0,0,1,2-.4ZM61.34,6.59A20.14,20.14,0,1,1,41.21,26.72,20.14,20.14,0,0,1,61.34,6.59Z"/>
                        </svg>


                        <h2 class="text-2xl font-semibold leading-tight tracking-wide">Nothing to see here.</h2>
                        <p class="flex-1 text-center dark:text-gray-400">Sorry, but you don't have any friend requests. But don't worry, they'll come. It's just a matter of time.</p>
{{--                        <button type="button"--}}
{{--                                class="px-8 py-3 border border-black font-semibold rounded-full dark:bg-violet-400 dark:text-gray-900">--}}
{{--                        </button>--}}
                        <a href="{{route('feed.index')}}"
                                class=" inline-flex items-center gap-2 rounded border-2 border-[#0077b5] bg-[#0077b5] px-5 py-3 text-sm font-medium text-white transition-colors hover:bg-transparent hover:text-[#0077b5] focus:outline-none focus:ring active:opacity-75"


                        >
                            Go back to read some posts

                        </a>
                    </div>
                @endif


            </div>
    </div>
@endsection
