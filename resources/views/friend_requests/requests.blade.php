@extends('navbar')
@section('title')
    Friend requests
@endsection

@section('content')
    <!-- component -->
    <div class="flex items-center justify-center pt-10">
        <div class="bg-gray-100 rounded-lg shadow-xl border border-black p-8 w-3xl">
            <div class="mb-4">
                <h1 class="font-semibold text-gray-800">Friend Requests</h1>
            </div>
       @foreach($requests_received as $friend_request)

                <div class="flex justify-center items-center mb-8">
                    <div class="w-1/5">
                        <img class="w-12 h-12 rounded-full border border-gray-100 shadow-sm" src="https://randomuser.me/api/portraits/men/20.jpg" alt="user image" />
                    </div>
                    <div class="w-4/5">
                        <div>
                            <span class="font-semibold text-gray-800">{{$friend_request->username}}</span>
                            <span class="text-gray-400">wants to be your friend</span>
                        </div>
                        <div class="font-semibold">
                            <form action="{{route('show_friend_requests')}}" method="POST">
                            @csrf
                                <input type="hidden" name="username" value="{{$friend_request->username}}">
                                <button type="submit" class="text-blue-600 mr-2">Accept</button>
{{--                                <a href="" class="text-gray-400">Decline</a>--}}
                            </form>

                        </div>
                    </div>
                </div>
       @endforeach
        </div>
    </div>
@endsection
