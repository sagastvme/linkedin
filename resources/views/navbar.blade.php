<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Linkedin - @yield('title')</title>
    @vite('resources/css/app.css')
    <script>

        // Burger menus
        document.addEventListener('DOMContentLoaded', function () {
            // open
            const burger = document.querySelectorAll('.navbar-burger');
            const menu = document.querySelectorAll('.navbar-menu');

            if (burger.length && menu.length) {
                for (var i = 0; i < burger.length; i++) {
                    burger[i].addEventListener('click', function () {
                        for (var j = 0; j < menu.length; j++) {
                            menu[j].classList.toggle('hidden');
                        }
                    });
                }
            }

            // close
            const close = document.querySelectorAll('.navbar-close');
            const backdrop = document.querySelectorAll('.navbar-backdrop');

            if (close.length) {
                for (var i = 0; i < close.length; i++) {
                    close[i].addEventListener('click', function () {
                        for (var j = 0; j < menu.length; j++) {
                            menu[j].classList.toggle('hidden');
                        }
                    });
                }
            }

            if (backdrop.length) {
                for (var i = 0; i < backdrop.length; i++) {
                    backdrop[i].addEventListener('click', function () {
                        for (var j = 0; j < menu.length; j++) {
                            menu[j].classList.toggle('hidden');
                        }
                    });
                }
            }
        });

    </script>
</head>
<!-- component -->
<body>
{{--desktop menu--}}
<nav class="relative px-4 py-4 flex justify-between items-center bg-white border border-gray-400 ">
    <a class="text-3xl font-bold leading-none flex " ` href="#">
        <img src="/linkedin.svg" alt="Linkedin logo">
        <span class="items-center justify-center my-auto ml-2 text-2xl">Linkedin</span>
    </a>
    <div class="lg:hidden">
        <button class="navbar-burger flex items-center text-blue-600 p-3">
            <svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <title>Mobile menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg>
        </button>
    </div>
    <ul class="hidden absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2  lg:mx-auto lg:flex lg:items-center lg:w-auto lg:space-x-6">
        <li><a class="text-sm text-gray-400 hover:text-gray-500" href="{{route('feed.index')}}">Home</a></li>


        <li class="text-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
            </svg>
        </li>
        <li><a class="text-sm text-gray-400 hover:text-gray-500" href="#">Services</a></li>
        <li class="text-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
            </svg>
        </li>
        <li><a class="text-sm text-gray-400 hover:text-gray-500" href="#">Pricing</a></li>

        @auth

            <li class="text-gray-300">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                </svg>
            </li>
            <li class="flex items-center gap-2">
                <a class="text-sm text-gray-400" href="{{ route('show_friend_requests') }}">Friend Requests</a>
                @if( auth()->user() && auth()->user()->friend_requests_received->count()>0)

                    <span
                        class=" h-4 w-4 text-xs font-bold flex items-center justify-center text-white bg-red-500 rounded-full"> {{auth()->user()->friend_requests_received->count()}}</span>

                @endif
            </li>
            <li class="text-gray-300">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                </svg>
            </li>

            <li><a class="text-sm text-gray-400 hover:text-gray-500"
                   href="{{route('account', [auth()->user()->username])}}">My account</a></li>
        @endauth
    </ul>
    @guest
        <a class="hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-gray-50 hover:bg-gray-100 text-sm text-gray-900 font-bold  rounded-xl transition duration-200"
           href="{{route('login')}}">Sign In</a>
        <a class=" hidden lg:inline-block text-sm text-white font-bold rounded-xl py-2 px-6 gap-2 rounded border-2 border-[#0077b5] bg-[#0077b5]

                                                                 transition-colors hover:bg-transparent hover:text-[#0077b5] focus:outline-none focus:ring active:opacity-75"
           href="{{route('register')}}">Sign up</a>

    @endguest
    @auth
        <form class="hidden lg:inline-block" action="{{route('logout')}}" method="POST">
            @csrf
            <button
                class=" text-sm text-white font-bold font-bold rounded-xl py-1.5 px-5 gap-2 rounded border-2
                 border-[#b50033] bg-[#b50033] transition-colors hover:bg-transparent hover:text-[#b50033] focus:outline-none focus:ring active:opacity-75"
                type="submit">Logout
            </button>


        </form>
    @endauth
</nav>


{{--    mobile menu--}}
<div class="navbar-menu relative z-50 hidden">
    <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>


    <nav class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
        <div class="flex items-center mb-8">
            <a class="mr-auto text-3xl font-bold leading-none" href="#">
                <img src="/linkedin.svg" alt="Linkedin logo">
            </a>
            <button class="navbar-close">
                <svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500" xmlns="http://www.w3.org/2000/svg"
                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <div>
            <ul>
                <li class="mb-1">
                    <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded"
                       href="{{route('feed.index')}}">Home</a>
                </li>
                <li class="mb-1">
                    <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded"
                       href="#">About Us</a>
                </li>
                <li class="mb-1">
                    <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded"
                       href="#">Services</a>
                </li>
                <li class="mb-1">
                    <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded"
                       href="#">Pricing</a>
                </li>
                @auth
                    <li class="mb-1">
                        <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded"
                           href="{{route('account', [auth()->user()->username])}}">My account</a>
                    </li>
                @endauth
            </ul>
        </div>
        <div class="mt-auto">
            <div class="pt-6">
                @guest
                    <a class="block px-4 py-3 mb-3  text-xs text-center font-semibold leading-none bg-gray-50 hover:bg-gray-100 rounded-xl"
                       href="{{route('login')}}">Sign in</a>
                    <a class="block px-4 py-3 mb-2 leading-loose text-xs text-center text-white font-semibold bg-blue-600 hover:bg-blue-700  rounded-xl"
                       href="{{route('register')}}">Sign Up</a>
                @endguest
                @auth

                    <form class="" action="{{route('logout')}}" method="POST">
                        @csrf
                        <button
                            class="block lg:ml-auto lg:mr-3 py-2 px-6   bg-[#b50033] hover:bg-red-600  text-sm text-white font-bold  rounded-xl transition duration-200"
                            type="submit">Logout
                        </button>
                    </form>
                @endauth
            </div>
            <p class="my-4 text-xs  text-gray-400">
                <span>Copyright © {{now()->year}}</span>
            </p>
        </div>
    </nav>
</div>
@yield('content')


</body>

</html>
