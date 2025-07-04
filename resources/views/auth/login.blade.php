@php use Illuminate\Http\Request; @endphp
{{--<x-head>--}}
{{--    <body class="bg-[#E7F9FF] p-4 lg:p-8 min-h-screen flex flex-col gap-3">--}}

{{--    --}}{{--    nav--}}
{{--    <x-nav>--}}
{{--        <div class=" flex gap-2">--}}
{{--        <x-button href="/signup">Sign Up</x-button>--}}
{{--        </div>--}}
{{--    </x-nav>--}}

{{--    --}}{{--    form --}}

{{--    <div class="flex mt-[50px] gap-15 items-center justify-center">--}}
{{--        <div class="w-[60%]">--}}
{{--            <img class="rounded-md shadow-lg" src="{{ asset('images/login-img.png') }}" alt="">--}}
{{--        </div>--}}
{{--        <div class="w-[40%]">--}}
{{--        <div class="flex flex-col items-center rounded-md">--}}
{{--            <form action="/login" method="POST" class=" rounded-lg bg-white p-5">--}}
{{--                @csrf--}}
{{--                <div class="md:text-[0.875rem] lg:text-[1.25rem]">--}}
{{--                    <x-form-label>Email</x-form-label>--}}
{{--                    <x-form-input name="email" type="email" placeholder="example@test.com" />--}}

{{--                    <x-form-error name="email" />--}}
{{--                </div>--}}
{{--                <div class="md:text-[0.875rem] lg:text-[1.25rem] my-5">--}}
{{--                    <x-form-label for="password">Password</x-form-label>--}}
{{--                    <x-form-input name="password" type="password" />--}}

{{--                    <x-form-error name="password" />--}}
{{--                </div>--}}

{{--                <div class="mt-5">--}}
{{--                    <x-form-button>Sign in</x-form-button>--}}
{{--                </div>--}}
{{--                <p class="text-slate-800 mt-5 text-center">Don't have an account? <a href="/signup" class="text-[#0092C2] hover:underline ml-1 whitespace-nowrap font-semibold">Register here</a></p>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--        </div>--}}
{{--    </div>--}}


{{--    </body>--}}
{{--</x-head>--}}

<x-head>
    <body class="relative bg-neutral-100 max-h-screen max-w-screen overflow-y-hidden px-5 gap-3 mx-auto">

    <nav class="fixed z-10 top-3 stretch flex justify-between rounded-lg w-full">
        <a href="/">
            <img src="{{ asset('images/logo.png') }}" class="h-[75px]" alt="my logo">
        </a>

    </nav>

    <div class="mt-30 md:mt-30 xl:mt-40 h-fit w-fit mx-auto">

        <div class=" md:rounded-lg md:flex md:items-center md:justify-center md:shadow-lg">
            <div class="hidden md:block">
                <img class="max-h-[375px] min-h-[375px] rounded-l-lg
            " src="{{ asset('images/survey-login.png') }}" alt="header-image">
            </div>

            <div
                class="rounded-lg md:rounded-l-none flex flex-col justify-center md:max-h-[375px] md:min-h-[375px] shadow-lg md:shadow-none md:rounded-r-lg bg-white ">

                <form action="/login" method="POST" class="rounded-lg md:rounded-r-lg px-10 py-5 ">
                    @csrf
                    <div class="text-[1.25rem]">
                        <x-form-label>Email</x-form-label>
                        <x-form-input name="email" type="email" placeholder="example@test.com" value="{{ old('email') }}"/>

                        <x-form-error name="email"/>
                    </div>
                    <div class="text-[1.25rem] my-8">
                        <x-form-label for="password">Password</x-form-label>
                        <x-form-input name="password" type="password"/>

                        <x-form-error name="password"/>
                    </div>

                    <div class="mt-8">
                        <x-form-button type="submit">Sign in</x-form-button>
                    </div>
                    <p class="text-slate-800 mt-5">Don't have an account? <a href="/signup"
                                                                             class="text-[#0092C2] hover:underline ml-1 whitespace-nowrap font-semibold">Register
                            here</a></p>
                </form>
            </div>
        </div>
    </div>


    </body>
</x-head>


