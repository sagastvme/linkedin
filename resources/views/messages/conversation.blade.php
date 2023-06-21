@extends('navbar')
@section('title')
    Conversation with $user
@endsection

@section('content')
    <div class="h-screen  flex flex-col">


        <a href="{{route('account', ['user'=>$user])}}" class="h-14 py-1 hover:underline flex flex-row mt-auto text-center">
            <img  class="object-contain rounded-full pl-1 " src="{{asset('profile_pictures') . '/' . $user->profile_picture}}" alt="user profile picture">
            <span class="pl-1 my-auto text-center">{{$user->username}}</span>
        </a>


        {{--chat component--}}
        <div class="bg-gray-300 flex-grow overflow-y-scroll">


            @foreach($conversation->messages as $m)
                @if($m->user->is(auth()->user()))
                    {{--right side--}}
                    <div class="text-black dark:text-gray-200 p-4 antialiased flex justify-end">
                        <div>
                            <div class="bg-gray-100 dark:bg-gray-700 rounded-3xl px-4 pt-2 pb-2.5">
                                <div class="font-semibold text-sm leading-relaxed">
                                    {{$m->user->username}}
                                </div>
                                <div class="text-normal break-all leading-snug md:leading-normal overflow-x-auto max-w-full">
                                    {{$m->content}}
                                </div>
                                <div class="text-sm mt-0.5 text-gray-500 dark:text-gray-400">{{$m->created_at->format('H:i, M d')}}</div>
                            </div>
                        </div>
                        <img class="rounded-full h-8 w-8 ml-2 mt-1"
                             src="{{asset('profile_pictures') . '/' . $m->user->profile_picture}}"/>
                    </div>

                @else
                    {{--left side--}}
                    <div class="text-black dark:text-gray-200 p-4 antialiased flex">
                        <img class="rounded-full h-8 w-8 mr-2 mt-1"
                             src="{{asset('profile_pictures') . '/' . $m->user->profile_picture}}"/>
                        <div>
                            <div class="bg-gray-100 dark:bg-gray-700 rounded-3xl px-4 pt-2 pb-2.5">
                                <div class="font-semibold text-sm leading-relaxed">
                                    {{$m->user->username}}
                                </div>
                                <div
                                    class="text-normal break-all leading-snug md:leading-normal overflow-x-auto max-w-full"
                                >
                                    {{$m->content}}
                                </div>
                                <div
                                    class="text-sm mt-0.5 text-gray-500 dark:text-gray-400">{{$m->created_at->format('H:i, M d')}}</div>
                            </div>

                        </div>
                    </div>
                @endif




            @endforeach


{{--message--}}


        </div>

        <div class="h-20 ">
            @error('content')
            <p class="mt-1 text-xs uppercase  border border-red-500 p-2 font-bold text-red-500">{{$message}}</p>
            @enderror

            <form action="{{route('conversation.store', ['user'=>$user, 'conversation'=>$conversation])}}" method="post" class="flex flex-row my-auto h-full p-2">
                @csrf
                <input type="text" name="content" placeholder=" Send your message" class="w-full border rounded-lg border-black">
                <button type="submit"
                        class="mx-auto inline-flex items-center gap-2 rounded border-2 border-[#0077b5] bg-[#0077b5]

                                 text-white py-2 px-4 uppercase font-medium

                                  transition-colors hover:bg-transparent hover:text-[#0077b5] focus:outline-none focus:ring active:opacity-75"
                >Send message
                </button>
            </form>

        </div>

    </div>

@endsection
