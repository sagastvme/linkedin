@extends('navbar')
@section('title')
    Conversation with $user
@endsection

@section('content')
    <div class="flex items-center flex-col gap-8 justify-center mt-5 select-none">
        @if(auth()->user()->conversations->count()> 0)
            @foreach(auth()->user()->conversations as $c)
                @foreach($c->members as $member)
                    @if($member->user_id != auth()->user()->id)
                        <a href="{{route('conversation.index', ['user'=>$member->user])}}" class="flex w-10/12 flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                            <img class="object-contain w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="{{asset('profile_pictures').'/'. $member->user->profile_picture}}" alt="">
                            <div class="flex flex-col justify-between p-4 leading-normal">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$member->user->username}}</h5>
                                @if($c->messages->count() > 0)
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ Str::limit($c->messages->last()->content,15,'...')}}</p>

                                @endif


                            </div>
                        </a>



                    @endif
                @endforeach
            @endforeach
        @else
            <div
                class="relative mt-5 flex flex-col items-center max-w-lg gap-4 p-6 rounded-md shadow-md sm:py-8 sm:px-12 dark:bg-gray-900 dark:text-gray-100">




                <svg  class="w-40 h-40 fill-current shrink-0 dark:text-violet-400" fill="#000000" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M1920 428.266v1189.54l-464.16-580.146-88.203 70.585 468.679 585.904H83.684l468.679-585.904-88.202-70.585L0 1617.805V428.265l959.944 832.441L1920 428.266ZM1919.932 226v52.627l-959.943 832.44L.045 278.628V226h1919.887Z" fill-rule="evenodd"></path> </g></svg>




                <h2 class="text-2xl font-semibold leading-tight tracking-wide">Nothing to see here.</h2>
                <p class="flex-1 text-center dark:text-gray-400">Sorry, but you don't have any messages. But don't worry, they'll come. It's just a matter of time.</p>
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


{{--        <p>{{auth()->user()->conversations[0]->members}}</p>--}}

    </div>
@endsection
