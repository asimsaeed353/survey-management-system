<x-head>
    <body class="bg-[#E7F9FF] p-4 lg:p-8 min-h-screen flex flex-col gap-3">

{{--    nav--}}
    <x-nav>
        <div class=" flex gap-2">
            <x-button href="/login">Log In</x-button>
            <x-button href="/signup">Sign Up</x-button>
        </div>
    </x-nav>

{{--    some visual content --}}

<div class="flex mt-[50px] gap-15 items-center justify-center">
    <div class="w-[60%]">
        <img class="rounded-md shadow-lg " src="{{ asset('images/header-img.png') }}" alt="">
    </div>
    <div class="flex flex-col items-start gap-[10px] w-[40%]">
              <p class="font-bold md:text-[2rem]/[2.5rem] lg:text-[3rem]/[4rem] ">Create. Share. Analyze.</p>
           <p class="font-bold md:text-[1.25rem] lg:text-[1.875rem] italic">Smarter Surveys Start Here.</p>
           <p class="text-[#04B6F2] md:text-[0.75rem] lg:text-[1.15rem] pr-[30px]">Effortlessly build engaging surveys, share them in seconds, and get insights that matter—all in one place.</p>
            <x-button href="/signup">Get Started</x-button>
          </div>
</div>

    </body>
</x-head>
