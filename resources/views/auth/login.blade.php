@extends('navbar')
@section('title')
    Login
@endsection

@section('content')
    <section class="grid grid-cols-1 lg:grid-cols-2">
        <div class="w-full px-4 py-20 mx-auto bg-white xl:py-32 md:w-3/5 lg:w-4/5 xl:w-3/5">
            <h1 class="mb-4 -mt-3 text-2xl font-extrabold leading-snug tracking-tight text-left text-gray-900 md:text-4xl">
                Sign in to Linkedin</h1>

            <form class="mt-8 space-y-4" action="{{route('login')}}" method="POST" novalidate>
                @csrf
                @if(session('errorMessage'))

                    <p class="  form-inputblock mb-1 text-xs uppercase  border border-red-500 p-2 font-bold text-red-500">{{session('errorMessage')}}</p>

                @endif
                <label class="block">
                    <span class="block mb-1 text-xs font-medium text-gray-700">Your Email</span>
                    @error('email')
                    <p class="  form-inputblock mb-1 text-xs uppercase  border border-red-500 p-2 font-bold text-red-500">{{$message}}</p>
                    @enderror
                    <input class="form-input  " value="{{old('email')}}" name="email" type="email" placeholder="james@bond.com" inputmode="email" required/>
                </label>
                <label class="block">
                    <span class="block mb-1 text-xs font-medium text-gray-700">Your Password</span>
                    @error('password')
                    <p class="block mb-1 text-xs uppercase  border border-red-500 p-2 font-bold text-red-500">{{$message}}</p>
                    @enderror
                    <input class="form-input" name="password"  type="password" placeholder="••••••••" required/>
                </label>

                <div class="flex flex-row gap-1">
                    <input id="remember" class="form-input" name="remember"  type="checkbox"/>
                    <label class="block  text-xs font-medium text-gray-700" for="remember">Remember me</label>
                </div>



                <!-- LinkedIn -->

                <button type="submit"
                        class=" inline-flex items-center gap-2 rounded border-2 border-[#0077b5] bg-[#0077b5] px-5 py-3 text-sm font-medium text-white transition-colors hover:bg-transparent hover:text-[#0077b5] focus:outline-none focus:ring active:opacity-75"

                        target="_blank"
                        rel="noreferrer"
                >
                    Sign in
                    <svg
                        class="h-5 w-5"
                        fill="currentColor"
                        viewBox="0 0 24 24"
                        aria-hidden="true"
                    >
                        <path fill="none" d="M0 0h24v24H0z" />
                        <path
                            d="M6.94 5a2 2 0 1 1-4-.002 2 2 0 0 1 4 .002zM7 8.48H3V21h4V8.48zm6.32 0H9.34V21h3.94v-6.57c0-3.66 4.77-4 4.77 0V21H22v-7.93c0-6.17-7.06-5.94-8.72-2.91l.04-1.68z"
                        />
                    </svg>
                </button>

            </form>
            <div class="pt-6 mt-6 text-sm font-medium text-gray-700 border-t border-gray-200">
                Dont have an account?
                <a href="{{route('register')}}" class="text-[#0077b5] hover:text-blue-900">Sign Up</a>
            </div>
        </div>
        <div class="px-4 py-20 space-y-10 bg-gray-100 xl:py-32 md:px-40 lg:px-20 xl:px-40">
            <div class="flex flex-row">


                <img src="/linkedin.svg" alt="linkedin logo">
                <span class="items-center justify-center font-extrabold my-auto ml-2 text-2xl">Linkedin</span>
            </div>
            <div class="flex space-x-3">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                     class="flex-none w-6 h-6 mt-1 text-[#0077b5]">
                    <path fill-rule="evenodd"
                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                          clip-rule="evenodd"/>
                </svg>
                <div>
                    <h2 class="text-xl font-medium text-[#0077b5]">Unlock the Power of Your Skills</h2>
                    <p class="mt-1 text-gray-700">Leverage our free account to unleash your network-building
                        potential.</p>
                </div>
            </div>
            <div class="flex space-x-3">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                     class="flex-none w-6 h-6 mt-1 text-[#0077b5]">
                    <path fill-rule="evenodd"
                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                          clip-rule="evenodd"/>
                </svg>
                <div>
                    <h2 class="text-xl font-medium text-[#0077b5]">Your own network</h2>
                    <p class="mt-1 text-gray-700">Join the millions of users who are currently using LinkedIn.</p>
                </div>
            </div>
            <div class="flex space-x-3">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                     class="flex-none w-6 h-6 mt-1 text-[#0077b5]">
                    <path fill-rule="evenodd"
                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                          clip-rule="evenodd"/>
                </svg>
                <div>
                    <h2 class="text-xl font-medium text-[#0077b5]">Find job opportunities</h2>
                    <p class="mt-1 text-gray-700">There are many companies looking for new employees just like you.</p>
                </div>
            </div>
            <div class="flex space-x-3">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                     class="flex-none w-6 h-6 mt-1 text-[#0077b5]">
                    <path fill-rule="evenodd"
                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                          clip-rule="evenodd"/>
                </svg>
                <div>
                    <h2 class="text-xl font-medium text-[#0077b5]">Free account</h2>
                    <p class="mt-1 text-gray-700">LinkedIn is free and always will be, providing you with the best user
                        experience forever.</p>
                </div>
            </div>
        </div>
    </section>

@endsection
