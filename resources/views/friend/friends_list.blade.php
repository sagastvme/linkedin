@extends('navbar')
@section('title')
    Friends
@endsection

@section('content')
    <div class="flex items-center flex-col gap-8 justify-center mt-5 select-none">
        @if($friends->count()> 0)
        @foreach($friends as $friend)

            <a href="{{ route('account', ['user' => $friend->username]) }}" class="flex w-10/12 flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <img class="object-contain w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="{{asset('profile_pictures').'/'. $friend->profile_picture}}" alt="">
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$friend->username}}</h5>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$friend->education}}</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$friend->job}}</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$friend->country}}</p>
                </div>
            </a>
        @endforeach
            @else

                <div
                    class="relative flex flex-col items-center max-w-lg gap-4 p-6 rounded-md shadow-md sm:py-8 sm:px-12 dark:bg-gray-900 dark:text-gray-100">


                    <svg  class="w-40 h-40 fill-current shrink-0 dark:text-violet-400" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .st0{fill:#000000;} </style> <g> <path class="st0" d="M256.004,116.85c32.26,0,58.425-26.156,58.425-58.417C314.43,26.173,288.265,0,256.004,0 c-32.269,0-58.425,26.173-58.425,58.433C197.58,90.694,223.735,116.85,256.004,116.85z"></path> <path class="st0" d="M305.478,125.809c-1.271-1.264-7.031-1.591-8.59-0.623c-11.913,7.335-25.894,11.626-40.884,11.626 c-14.99,0-28.971-4.291-40.884-11.626c-1.559-0.968-7.318-0.64-8.59,0.623c-9.805,9.805-22.736,31.703-25.344,47.332 c-6.416,38.472,34.689,52.37,74.818,52.37c40.128,0,81.225-13.898,74.817-52.37C328.213,157.512,315.282,135.614,305.478,125.809z"></path> <path class="st0" d="M77.004,403.338c32.268,0,58.425-26.156,58.425-58.425c0-32.268-26.156-58.425-58.425-58.425 c-32.261,0-58.416,26.156-58.416,58.425C18.588,377.182,44.744,403.338,77.004,403.338z"></path> <path class="st0" d="M126.478,412.298c-1.272-1.271-7.031-1.6-8.59-0.632c-11.914,7.344-25.894,11.626-40.884,11.626 s-28.97-4.282-40.875-11.626c-1.568-0.968-7.327-0.639-8.599,0.632c-9.804,9.797-22.734,31.703-25.344,47.325 C-4.221,498.101,36.876,512,77.004,512c40.136,0,81.234-13.899,74.818-52.378C149.213,444.001,136.29,422.094,126.478,412.298z"></path> <path class="st0" d="M376.57,344.913c0,32.269,26.156,58.425,58.425,58.425c32.261,0,58.417-26.156,58.417-58.425 c0-32.268-26.156-58.425-58.417-58.425C402.727,286.488,376.57,312.645,376.57,344.913z"></path> <path class="st0" d="M509.814,459.622c-2.609-15.622-15.54-37.528-25.352-47.325c-1.264-1.271-7.023-1.6-8.59-0.632 c-11.905,7.344-25.886,11.626-40.876,11.626c-14.998,0-28.97-4.282-40.884-11.626c-1.567-0.968-7.326-0.639-8.59,0.632 c-9.813,9.797-22.736,31.703-25.344,47.325C353.762,498.101,394.859,512,434.996,512C475.124,512,516.221,498.101,509.814,459.622z "></path> <path class="st0" d="M112.981,229.688L94.8,225.594c3.905-12.635,10.272-24.491,18.837-34.796 c4.447-5.358,9.493-10.297,15.114-14.711c5.464-4.299,11.412-8.106,17.869-11.273l-7.417-15.08 c-7.556,3.717-14.505,8.164-20.84,13.143c-6.555,5.153-12.455,10.929-17.656,17.181c-10.281,12.372-17.796,26.648-22.308,41.843 l-20.807-4.676l20.774,45.699L112.981,229.688z"></path> <path class="st0" d="M280.199,471.937c-7.458,1.715-15.113,2.6-22.792,2.6c-5.685,0-11.388-0.484-17.057-1.443 c-6.859-1.182-13.661-3.077-20.29-5.736c-6.448-2.567-12.717-5.833-18.706-9.836l-9.338,13.98c6.991,4.669,14.31,8.467,21.8,11.454 c7.737,3.101,15.687,5.325,23.703,6.695c6.604,1.132,13.258,1.69,19.887,1.69c9.386,0,18.707-1.173,27.79-3.363l6.038,19.362 l29.192-40.834l-46.085-13.365L280.199,471.937z"></path> <path class="st0" d="M396.172,188.214c9.426,9.911,16.876,21.676,21.676,34.672c2.42,6.523,4.176,13.374,5.185,20.437 c0.689,4.767,1.042,9.608,1.042,14.531c0,2.174-0.066,4.373-0.214,6.597l16.77,1.083c0.165-2.577,0.246-5.136,0.246-7.68 c0-5.744-0.418-11.388-1.205-16.918c-1.19-8.254-3.242-16.262-6.064-23.875c-5.726-15.524-14.694-29.488-26.041-41.204 l14.292-15.491l-49.958-4.857l11.462,46.594L396.172,188.214z"></path> </g> </g></svg>


                    <h2 class="text-2xl font-semibold leading-tight tracking-wide">Nothing to see here.</h2>
                    <p class="flex-1 text-center dark:text-gray-400">Sorry, but you currently don't have any friends. However, please don't worry as it's just a matter of time. Keep sending friend requests, and you'll soon have new connections.</p>
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
{{--        <div class="mb-10">--}}
{{--            {{$posts->links('pagination::test')}}--}}
{{--        </div>--}}
    </div>
@endsection
