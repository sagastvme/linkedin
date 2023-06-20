@extends('navbar')
@section('title')
    Conversation with $user
@endsection

@section('content')
    <div class="h-screen  flex flex-col">


        <a href="{{route('account', ['user'=>$user])}}" class="h-14 py-1 hover:underline flex flex-row mt-auto text-center">
            <img  class="object-contain rounded-full pl-1 " src="{{asset('profile_pictures') . '/' . $user->profile_picture}}" alt="">

            <span class="pl-1 my-auto text-center">{{$user->username}}</span>
        </a>

        <div class="bg-red-300 flex-grow overflow-y-scroll">




            <div class="text-black dark:text-gray-200 p-4 antialiased flex">
                <img class="rounded-full h-8 w-8 mr-2 mt-1"
                     src="{{asset('profile_pictures') . '/' . $user->profile_picture}}"/>
                <div>
                    <div class="bg-gray-100 dark:bg-gray-700 rounded-3xl px-4 pt-2 pb-2.5">
                        <div class="font-semibold text-sm leading-relaxed">username</div>
                        <div
                            class="text-normal break-all leading-snug md:leading-normal overflow-x-auto max-w-full"
                        >
                            Hello mate how are you my name is patrick bateman and i am the main character of a movie called american psycho
                        </div>
                        <div
                            class="text-sm mt-0.5 text-gray-500 dark:text-gray-400">{{$user->username}}</div>
                    </div>

                </div>
            </div>
        </div>

        <div class="h-20 ">
            <form action="" class="flex flex-row my-auto h-full p-2">
                <input type="text" placeholder=" Send your message" class="w-full border rounded-lg border-black">
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
