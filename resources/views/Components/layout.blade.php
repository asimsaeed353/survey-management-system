<x-head>
    <body class="h-full bg-[#E7F9FF] w-full">

    <main class="relative w-full h-full">

        {{--        mobile nav --}}
        <nav class="fixed top-0 z-100 w-full px-3 md:hidden bg-white shadow-md">

            <div class="flex justify-between items-center">
                {{--            logo --}}
                <a href="/">
                    <img src="{{ asset('images/logo.png') }}" class="h-[45px]" alt="my logo">
                </a>
                <div id="mobile-nav-toggle">
                    <x-solar-hamburger-menu-linear id="hamburger" class="w-5 h-5 text-[#0092C2] cursor-pointer" />
                </div>
            </div>

            {{--            nav items--}}
            <div id="mobile-nav" class="absolute top-11.5 right-5 border-gray-900 hidden flex-col bg-white items-center justify-between py-5 px-8 gap-3 rounded-lg shadow-2xl">
                <a href="/dashboard" class="{{ request()->is('dashboard') ?  "text-black"  : "text-[#7D7D7D]"}}">Dashboard</a>
                <a href="/surveys" class="{{ request()->is('surveys') ? "text-black"  : "text-[#7D7D7D]" }}">Surveys</a>
                <a href="/profile" class="{{ request()->is('profile') ? "text-black"  : "text-[#7D7D7D]" }}">Profile</a>
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="cursor-pointer text-[#FF7B7B] hover:text-[#EA0000]">
                        Logout
                    </button>
                </form>
            </div>
        </nav>

        @vite('resources/js/dropdown.js')

        {{--        Left Fixed nav--}}

        <x-left-nav />

        {{-- Right content box --}}
        <div class="absolute z-10 top-12 md:left-[200px] flex flex-col gap-10 max-md:w-full md:right-0 px-5">
            {{--        dynamic content section --}}
            {{$slot}}

        </div>
    </main>

    </body>

</x-head>
