@extends('navbar')
@section('title')
    New Profile Picture
@endsection

@section('content')
    <div class="flex flex-col  md:flex-row">

{{--LEFT SIDE--}}
        <div class=" w-full md:w-1/2">
            <div class=" rounded overflow-hidden border-r">
                <div class="w-full flex justify-between  p-3">
                    <a href="{{route('account', ['user'=>$user])}}" class="hover:underline flex items-center ">
                        <div class="rounded-full h-8 w-8  flex items-center justify-center overflow-hidden">
                            <img class="rounded-full" src="{{asset('profile_pictures'.'/'.$user->profile_picture)}}"
                                 alt="profilepic">
                        </div>
                        <span class="pt-1 ml-2 font-bold text-sm  ">{{$user->username}}</span>

                    </a>
                    <p class="text-center  w-full mt-auto font-bold">{{$post->title}}</p>
                    <span class="px-2 hover:bg-gray-300 cursor-pointer rounded"><i
                            class="fas fa-ellipsis-h pt-2 text-lg"></i></span>
                </div>
                <img class="mx-auto w-full md:w-3/4 h-full  bg-cover"
                     src="{{asset('post_pictures') . '/' . $post->cover}}">

                <div class="w-full flex justify-center ">
                    <button class="w-1/2 md:w-1/4 text-sm flex items-center justify-center text-white font-bold rounded-xl rounded border-2 border-[#0077b5] bg-[#0077b5]

                                                                 transition-colors hover:bg-transparent hover:text-[#0077b5] focus:outline-none focus:ring active:opacity-75"
                    >
                        <svg viewBox="0 0 24 24" width="32" height="32" fill="currentColor" xmlns="http://www.w3.org/2000/svg" transform="rotate(180)">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path opacity="0.4"
                                      d="M16.5197 5.6499L13.4197 3.2499C13.0197 2.8499 12.1197 2.6499 11.5197 2.6499H7.71973C6.51973 2.6499 5.21973 3.5499 4.91973 4.7499L2.51973 12.0499C2.01973 13.4499 2.91973 14.6499 4.41973 14.6499H8.41973C9.01973 14.6499 9.51973 15.1499 9.41973 15.8499L8.91973 19.0499C8.71973 19.9499 9.31973 20.9499 10.2197 21.2499C11.0197 21.5499 12.0197 21.1499 12.4197 20.5499L16.5197 14.4499"
                                      stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"></path>
                                <path
                                    d="M21.6191 5.65V15.45C21.6191 16.85 21.0191 17.35 19.6191 17.35H18.6191C17.2191 17.35 16.6191 16.85 16.6191 15.45V5.65C16.6191 4.25 17.2191 3.75 18.6191 3.75H19.6191C21.0191 3.75 21.6191 4.25 21.6191 5.65Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </g>
                        </svg>
                    </button>
                    <button
                        class="w-1/2 md:w-1/4 flex items-center justify-center text-sm text-white font-bold font-bold rounded-xl py-1.5 px-5 gap-2 rounded border-2
                 border-[#b50033] bg-[#b50033] transition-colors hover:bg-transparent hover:text-[#b50033] focus:outline-none focus:ring active:opacity-75"
                        type="submit">
                        <svg viewBox="0 0 24 24" width="32" height="32" fill="currentColor" xmlns="http://www.w3.org/2000/svg" >
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path opacity="0.4"
                                      d="M16.5197 5.6499L13.4197 3.2499C13.0197 2.8499 12.1197 2.6499 11.5197 2.6499H7.71973C6.51973 2.6499 5.21973 3.5499 4.91973 4.7499L2.51973 12.0499C2.01973 13.4499 2.91973 14.6499 4.41973 14.6499H8.41973C9.01973 14.6499 9.51973 15.1499 9.41973 15.8499L8.91973 19.0499C8.71973 19.9499 9.31973 20.9499 10.2197 21.2499C11.0197 21.5499 12.0197 21.1499 12.4197 20.5499L16.5197 14.4499"
                                      stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"></path>
                                <path
                                    d="M21.6191 5.65V15.45C21.6191 16.85 21.0191 17.35 19.6191 17.35H18.6191C17.2191 17.35 16.6191 16.85 16.6191 15.45V5.65C16.6191 4.25 17.2191 3.75 18.6191 3.75H19.6191C21.0191 3.75 21.6191 4.25 21.6191 5.65Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </g>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        {{--RIGHT SIDE--}}
        <div class="  w-full md:w-1/2 bg-red-500 overflow-y-scroll ">
            <div class="bg-white dark:bg-gray-800 text-black dark:text-gray-200 p-4 antialiased flex flex-col ">
                <img class="rounded-full h-8 w-8 mr-2 mt-1 " src="{{asset('profile_pictures'). '/' . $user->profile_picture}}"/>
                <div>
                    <div class="border-[#0077b5] bg-blue-100 border-2 dark:bg-gray-700 rounded-3xl px-4 pt-2 pb-2.5">
                        <div class="font-semibold text-sm leading-relaxed">{{ $user->username }}</div>
                        <div class="text-normal leading-snug md:leading-normal"
                        >Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque ipsa iste nobis non numquam pariatur quidem vero! Animi aperiam, expedita impedit laudantium molestias nobis nostrum optio reprehenderit tenetur voluptatum.</div>
                    </div>
                    <div class="text-sm ml-4 mt-0.5 text-gray-500 dark:text-gray-400">14 w</div>

                </div>
                <div class="bg-white dark:bg-gray-800 text-black dark:text-gray-200 p-4 antialiased  ">
                    <img class="rounded-full h-8 w-8 mr-2 mt-1 " src="{{asset('profile_pictures'). '/' . $user->profile_picture}}"/>
                    <div>
                        <div class="border-[#0077b5] bg-blue-100 border-2 dark:bg-gray-700 rounded-3xl px-4 pt-2 pb-2.5">
                            <div class="font-semibold text-sm leading-relaxed">{{ $user->username }}</div>
                            <div class="text-normal leading-snug md:leading-normal"
                            >Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque ipsa iste nobis non numquam pariatur quidem vero! Animi aperiam, expedita impedit laudantium molestias nobis nostrum optio reprehenderit tenetur voluptatum.</div>
                        </div>
                        <div class="text-sm ml-4 mt-0.5 text-gray-500 dark:text-gray-400">14 w</div>

                    </div>
        </div>
@endsection
