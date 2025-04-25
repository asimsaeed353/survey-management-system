<x-head>
    <body class="bg-[#E7F9FF] p-4 lg:p-8 min-h-screen flex flex-col gap-3">

    {{--    nav--}}
    <x-nav>
        <div class=" flex gap-2">
        <x-button href="/signup">Sign Up</x-button>
        </div>
    </x-nav>

    {{--    form --}}

    <div class="flex mt-[50px] gap-15 items-center justify-center">
        <div class="w-[60%]">
            <img class="rounded-md shadow-lg" src="{{ asset('images/login-img.png') }}" alt="">
        </div>
        <div class="w-[40%]">
        <div class="flex flex-col items-center rounded-md">
            <form action="/login" method="POST" class=" rounded-lg bg-white p-5">
                @csrf
                <div class="md:text-[0.875rem] lg:text-[1.25rem]">
                    <x-form-label>Email</x-form-label>
                    <x-form-input name="email" type="email" placeholder="example@test.com" />

                    <x-form-error name="email" />
                </div>
                <div class="md:text-[0.875rem] lg:text-[1.25rem] my-5">
                    <x-form-label for="password">Password</x-form-label>
                    <x-form-input name="password" type="password" />

                    <x-form-error name="password" />
                </div>

                <div class="mt-5">
                    <x-form-button>Sign in</x-form-button>
                </div>
                <p class="text-slate-800 mt-5 text-center">Don't have an account? <a href="/signup" class="text-[#0092C2] hover:underline ml-1 whitespace-nowrap font-semibold">Register here</a></p>
            </form>
        </div>
        </div>
    </div>


    </body>
</x-head>




