
@php

    $dashboard = false;
    $surveys = false;
    $profile = false;

    if(request()->is('dashboard')){
        $dashboard = true;
    }

    elseif(request()->is('surveys')){
        $surveys = true;

    }

    elseif(request()->is('profile')){
        $profile = true;
    }

 @endphp

<div class="hidden fixed left-0 top-0 bg-white h-screen px-5 md:flex flex-col items-start gap-40 max-w-fit shadow-md">
    <div>
        <a href="/"  class="relative top-10">
            <img src="{{ asset('images/logo.png') }}" class="h-[75px]" alt="my logo">
        </a>
    </div>

    <div class="flex flex-col items-start">

        <x-left-nav-component href="/dashboard" :active="$dashboard">
            <x-slot:icon>

                    <x-akar-dashboard @class(['w-[20px]', 'h-[20px]', 'text-[#7D7D7D]', 'text-black' => $dashboard, 'font-bold' => $dashboard])/>
            </x-slot:icon>

            <x-slot:linkName>Dashboard</x-slot:linkName>
        </x-left-nav-component>

        <x-left-nav-component href="/surveys" :active="$surveys">

            <x-slot:icon>
                    <x-ri-survey-line @class(['w-[20px]', 'h-[20px]', 'fill-[#7D7D7D]', 'fill-black' => $surveys, 'font-bold' => $surveys])/>
            </x-slot:icon>

            <x-slot:linkName>Surveys</x-slot:linkName>
        </x-left-nav-component>


        <x-left-nav-component href="/profile"  :active="$profile">

            <x-slot:icon>
                    <x-iconsax-lin-profile @class(['w-[20px]', 'h-[20px]', 'text-[#7D7D7D]', 'group-hover:text-black', 'text-black' => $profile, 'font-bold' => $profile])/>

            </x-slot:icon>

            <x-slot:linkName>Profile</x-slot:linkName>
        </x-left-nav-component>

        <div class="flex items-center justify-start cursor-pointer hover:text-[#EA0000]">
            <x-solar-logout-2-outline class="w-[20px] h-[20px] text-[#FF7B7B]" />
            <a href="#" class="p-2 text-[1.5rem] w-full align-middle  text-[#FF7B7B] ">Logout</a>
        </div>


    </div>
</div>


