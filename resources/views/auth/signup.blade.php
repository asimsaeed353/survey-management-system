{{--<x-head>--}}
{{--    <body class="bg-[#E7F9FF] p-4 lg:p-8 min-h-screen flex flex-col gap-3">--}}

{{--    --}}{{--    nav--}}
{{--    <x-nav>--}}
{{--        <div class=" flex gap-2">--}}
{{--        <x-button href="/login">Log In</x-button>--}}
{{--        </div>--}}
{{--    </x-nav>--}}

{{--    --}}{{--    form + image --}}

{{--    <div class="flex flex-col md:flex-row mt-[50px] gap-15 items-center justify-between">--}}
{{--        <div class="hidden md:block max-w-[50%]">--}}
{{--            <img class="rounded-md shadow-lg" src="{{ asset('images/signup-img.png') }}" alt="">--}}
{{--        </div>--}}
{{--        <div class="max-w-[50%]">--}}
{{--            <div class="flex flex-col items-center rounded-md">--}}
{{--                <form method="POST" action="/signup" class=" rounded-lg bg-white p-5">--}}
{{--                    @csrf--}}
{{--                    <div class="md:text-[0.875rem] lg:text-[1.25rem]">--}}
{{--                        <x-form-label for="name">Username</x-form-label>--}}
{{--                        <x-form-input name="name" type="text"  placeholder="Enter your name" />--}}

{{--                        <x-form-error name="name" />--}}
{{--                    </div>--}}
{{--                    <div class="md:text-[0.875rem] lg:text-[1.25rem] mt-5">--}}
{{--                        <x-form-label for="email">Email</x-form-label>--}}
{{--                        <x-form-input name="email" type="email"  placeholder="example@test.com" />--}}

{{--                        <x-form-error name="email" />--}}
{{--                    </div>--}}

{{--                    <div class="md:text-[0.875rem] lg:text-[1.25rem] mt-5">--}}
{{--                        <x-form-label for="password">Password</x-form-label>--}}
{{--                        <x-form-input name="password" type="password" />--}}

{{--                        <x-form-error name="password" />--}}
{{--                    </div>--}}

{{--                    <div class="md:text-[0.875rem] lg:text-[1.25rem] mt-5">--}}
{{--                        <x-form-label for="Confirm Password">Confirm Password</x-form-label>--}}
{{--                        <x-form-input name="password_confirmation" type="password" />--}}

{{--                        <x-form-error name="password_confirmation" />--}}
{{--                    </div>--}}

{{--                    <div class="mt-5">--}}
{{--                        <x-form-button>Sign Up</x-form-button>--}}
{{--                    </div>--}}
{{--                    <p class="text-slate-800 mt-5 text-center">Already have an account? <a href="/login" class="text-[#0092C2] hover:underline ml-1 whitespace-nowrap font-semibold">Log In</a></p>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    </body>--}}
{{--</x-head>--}}


<x-head>
    <body class="relative bg-neutral-100 max-h-screen max-w-screen md:overflow-y-hidden px-5 gap-3 mx-auto">

    <nav class="fixed z-10 top-3 stretch flex justify-between rounded-lg w-full">
        <a href="/" >
            <img src="{{ asset('images/logo.png') }}" class="h-[75px]" alt="my logo">
        </a>

    </nav>

    <div class="mt-30 md:mt-20 h-fit w-fit mx-auto">

        <div class=" md:rounded-lg md:flex md:items-center md:justify-center md:shadow-lg">
            <div class="hidden md:block">
                <img class="max-h-[450px] min-h-[450px] rounded-l-lg
            " src="{{ asset('images/survey-signup.png') }}" alt="header-image">
            </div>

            <div class="flex items-center justify-center max-h-[450px] md:min-h-[450px] rounded-lg shadow-lg md:shadow-none md:rounded-r-lg bg-white">
                <form method="POST" action="/signup" class=" md:rounded-r-lg px-10 py-5 md:py-0 max-h-[450px] self-center">
                    @csrf
                    <div class="md:text-[1.25rem]">
                        <x-form-label for="name">Name</x-form-label>
                        <x-form-input name="name" type="text"  placeholder="Enter your name" value="{{ old('name') }}"/>

                        <x-form-error name="name" />
                    </div>
                    <div class="md:text-[1.25rem] mt-4">
                        <x-form-label for="email">Email</x-form-label>
                        <x-form-input name="email" type="email"  placeholder="example@test.com" value="{{ old('email') }}"/>

                        <x-form-error name="email" />
                    </div>

                    <div class="md:text-[1.25rem] mt-4">
                        <x-form-label for="password">Password</x-form-label>
                        <x-form-input name="password" type="password" />

                        <x-form-error name="password" />
                    </div>

                    <div class="md:text-[1.25rem] mt-4">
                        <x-form-label for="Confirm Password">Confirm Password</x-form-label>
                        <x-form-input name="password_confirmation" type="password" />

                        <x-form-error name="password_confirmation" />
                    </div>

                    <div class="mt-6">
                        <x-form-button type="submit">Sign Up</x-form-button>
                    </div>
                    <p class="text-slate-800 mt-3 text-center">Already have an account? <a href="/login" class="text-[#0092C2] hover:underline ml-1 whitespace-nowrap font-semibold">Log In</a></p>
                </form>
            </div>
        </div>
    </div>


    </body>
</x-head>
