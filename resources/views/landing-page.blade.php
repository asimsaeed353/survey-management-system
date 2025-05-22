<x-head>
    <body class="relative bg-[#E7F9FF] max-h-screen max-w-screen md:overflow-y-hidden px-5 gap-3 mx-auto">

    <nav class="fixed z-10 top-3 stretch flex justify-between rounded-lg ">
        <a href="/" >
            <img src="{{ asset('images/logo.png') }}" class="h-[75px]" alt="my logo">
        </a>

    </nav>


{{--             content card div --}}
    <div class="mt-30 h-screen sm:mx-auto md:flex md:gap-5 md:items-center md:mt-10 md:justify-center lg:justify-between ">
        <div class="">
            <img class="rounded-md shadow-lg sm:max-w-[90vw] sm:mx-auto md:max-w-[500px] xl:max-w-[60*0px]
            " src="{{ asset('images/header-img.png') }}" alt="header-image">
        </div>

        <div class="flex flex-col items-center gap-[10px] lg:gap-[20px]  mt-8 text-center lg:self-center ">
            <h1 class="font-bold text-2xl md:text-[2rem] xl:text-[3rem]">Create. Share. Analyze.</h1>
            <p class="font-bold md:text-[1.25rem]  xl:text-[1.875rem] italic">Smarter Surveys Start Here.</p>
            <p class="text-[#04B6F2] xl:text-[1rem] md:px-5 xl:px-25">Effortlessly build engaging surveys, share them in seconds, and get insights that matter—all in one place.</p>
            @auth
                <x-button href="/dashboard" class="px-5 py-0.5">Get Started</x-button>
            @endauth

            @guest
                <x-button href="/signup" class="px-5 py-0.5">Get Started</x-button>
            @endguest
        </div>
    </div>

    </body>
</x-head>
