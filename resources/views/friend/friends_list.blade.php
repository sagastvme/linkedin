@extends('navbar')
@section('title')
    Friends
@endsection

@section('content')
    <div class="flex items-center flex-col gap-8 justify-center mt-5 select-none">

        @foreach($friends as $friend)

            <a href="{{ route('account', ['user' => $friend->username]) }}" class="flex w-10/12 flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <img class="object-contain w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="{{asset('profile_pictures').'/'. $friend->profile_picture}}" alt="">
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$friend->username}}</h5>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Studies</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Job</p>
                </div>
            </a>
        @endforeach
{{--        <div class="mb-10">--}}
{{--            {{$posts->links('pagination::test')}}--}}
{{--        </div>--}}
    </div>
@endsection
