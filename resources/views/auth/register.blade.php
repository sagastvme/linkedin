@extends('navbar')
@section('title')
    Welcome
@endsection

@section('content')
    <section class="grid grid-cols-1 lg:grid-cols-2">
        <div class="w-full px-4 py-20 mx-auto bg-white xl:py-32 md:w-3/5 lg:w-4/5 xl:w-3/5">
            <h1 class="mb-4 -mt-3 text-2xl font-extrabold leading-snug tracking-tight text-left text-gray-900 md:text-4xl">
                Sign up to Linkedin</h1>

            <form class="mt-8 space-y-4" enctype="multipart/form-data" action="{{route('register')}}" method="POST" novalidate>
                @csrf
                <label class="block">
                    <span class="block mb-1 text-xs font-medium text-gray-700">Your Email</span>
                    @error('email')
                    <p class="  form-inputblock mb-1 text-xs uppercase  border border-red-500 p-2 font-bold text-red-500">{{$message}}</p>
                    @enderror
                    <input class="form-input  " value="{{old('email')}}" name="email" type="email" placeholder="Ex. james@bond.com" inputmode="email" required/>
                </label>


                <label class="block">
                    <span class="block mb-1 text-xs font-medium text-gray-700">Your Username</span>
                    @error('username')
                    <p class="block mb-1 text-xs uppercase  border border-red-500 p-2 font-bold text-red-500">{{$message}}</p>
                    @enderror
                    <input class="form-input" name="username" value="{{old('username')}}" type="username" placeholder="james_bond_123" inputmode="text" required/>
                </label>

                <label class="block">
                    <span class="block mb-1 text-xs font-medium text-gray-700">Your Password</span>
                    @error('password')
                    <p class="block mb-1 text-xs uppercase  border border-red-500 p-2 font-bold text-red-500">{{$message}}</p>
                    @enderror
                    <input class="form-input" name="password"  type="password" placeholder="••••••••" required/>
                </label>
                <label class="block">
                    <span class="block mb-1 text-xs font-medium text-gray-700">Repeat your Password</span>
                    <input class="form-input" name="password_confirmation" type="password" placeholder="••••••••" required/>
                </label>
                <div >
                    @error('picture')
                    <p class="block mb-1 text-xs uppercase  border border-red-500 p-2 font-bold text-red-500">{{$message}}</p>
                    @enderror
                    <label for="picture" class="px-4 py-2 flex flex-row w-fit gap-2 border rounded-md border-gray-900 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                        </svg>

                        Profile picture</label>
                    <div class="flex items-center space-x-2">
                        <input type="file" name="picture" id="picture" accept="image/*" class="hidden">




                    </div>
                </div>
                <!-- LinkedIn -->

                <button type="submit"
                    class=" inline-flex items-center gap-2 rounded border-2 border-[#0077b5] bg-[#0077b5] px-5 py-3 text-sm font-medium text-white transition-colors hover:bg-transparent hover:text-[#0077b5] focus:outline-none focus:ring active:opacity-75"

                    target="_blank"
                    rel="noreferrer"
                >
                    Link in
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
                Already have an account?
                <a href="{{route('login')}}" class="text-[#0077b5] hover:text-blue-900">Sign In</a>
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
