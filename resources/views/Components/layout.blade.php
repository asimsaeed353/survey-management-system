<x-head>
    <body class=" h-full bg-[#E9E9E9] min-h-screen">

    <main class=" relative w-full h-full bg-[#E7F9FF]">

        {{--        Left Fixed nav--}}
        {{--        mobile nav --}}
        <nav class="fixed top-0  w-full px-3 md:hidden">

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
            <div id="mobile-nav" class="absolute top-11 right-5 hidden flex-col bg-white items-center justify-between py-5 px-8 gap-3 rounded-lg shadow-lg">
                <a href="/dashboard" class="{{ request()->is('dashboard') ?  "text-black"  : "text-[#7D7D7D]"}}">Dashboard</a>
                <a href="/surveys" class="{{ request()->is('surveys') ? "text-black"  : "text-[#7D7D7D]" }}">Surveys</a>
                <a href="/profile" class="{{ request()->is('profile') ? "text-black"  : "text-[#7D7D7D]" }}">Profile</a>
                <a href="#" class="text-[#EA0000]">Logout</a>
            </div>
        </nav>

        @vite('resources/js/dropdown.js')
        <x-left-nav />

{{--        dynamic content section --}}
        {{$slot}}

    </main>

    </body>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('hamburger').addEventListener('click', function (){
                let mobileNav = document.getElementById('mobile-nav');

                if(mobileNav.style.display === 'flex'){
                    mobileNav.style.display = 'none';
                }else{
                    mobileNav.style.display = 'flex';
                }
            })
        });
    </script>

</x-head>
