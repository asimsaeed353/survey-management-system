<x-head>
    <body class="relative bg-neutral-100 max-h-screen max-w-screen md:overflow-y-hidden px-5 gap-3 mx-auto">

    <nav class="fixed z-10 top-3 stretch flex justify-between rounded-lg ">
        <a href="/" >
            <img src="{{ asset('images/logo.png') }}" class="h-[75px]" alt="my logo">
        </a>

    </nav>


{{--             content card div --}}
    <div class="mt-30 h-screen sm:mx-auto md:flex md:gap-5 md:items-center md:mt-10 md:justify-center lg:justify-between ">
        <div class="">
            <img class="rounded-md shadow-lg sm:max-w-[90vw] sm:mx-auto md:max-w-[500px] xl:max-w-[700px]
            " src="{{ asset('images/header-img.png') }}" alt="header-image">
        </div>

        <div class="flex flex-col items-center gap-[10px] lg:gap-[20px]  mt-8 text-center lg:self-center ">
            <h1 class="font-bold text-2xl md:text-[2rem] xl:text-[3rem]">Create. Share. Analyze.</h1>
            <p class="font-bold md:text-[1.25rem]  xl:text-[1.875rem] italic">Smarter Surveys Start Here.</p>
            <p class="text-[#04B6F2] xl:text-[1rem] md:px-5 xl:px-25">Effortlessly build engaging surveys, share them in seconds, and get insights that matter—all in one place.</p>

            @auth
                <div>
                    <x-button href="/dashboard"  class="group px-3 py-1 gap-3 w-fit">Get Started
                        <svg xmlns="http://www.w3.org/2000/svg" height="14" width="12.25" viewBox="0 0 448 512">
                            <path fill="#ffffff"
                                  d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"
                                  class="group-hover:fill-[#0092c2]"/>
                        </svg>
                    </x-button>

                </div>
{{--                <x-button href="/dashboard" class="px-5 py-0.5">Get Started</x-button>--}}
            @endauth

            @guest
                <div>
                    <x-button href="/signup" class="group px-3 py-1 gap-3 w-fit">Get Started
                        <svg xmlns="http://www.w3.org/2000/svg" height="14" width="12.25" viewBox="0 0 448 512">
                            <path fill="#ffffff"
                                  d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"
                                  class="group-hover:fill-[#0092c2]"/>
                        </svg>
                    </x-button>

                </div>
{{--                <x-button href="/signup" class="px-5 py-0.5">Get Started</x-button>--}}
            @endguest
        </div>
    </div>

    </body>
</x-head>
