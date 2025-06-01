@php

    use Illuminate\Support\Facades\Auth;$dashboard = false;
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

<div class="hidden fixed left-0 top-0 bg-[#1F2041] h-screen px-5 md:flex flex-col items-start gap-40 max-w-fit shadow-md">
    <div>
        <a href="/" class="relative top-10">
            <img src="{{ asset('images/logo.png') }}" class="h-[75px]" alt="my logo">
        </a>
    </div>

    <div class="flex flex-col items-start">

        <x-left-nav-component href="/dashboard" :active="$dashboard">
            <x-slot:icon>

                <x-akar-dashboard @class(['w-[20px]', 'h-[20px]', 'text-gray-300', 'group-hover:text-white', 'text-white' => $dashboard, 'font-bold' => $dashboard])/>
            </x-slot:icon>

            <x-slot:linkName>Dashboard</x-slot:linkName>
        </x-left-nav-component>

        <x-left-nav-component href="/surveys" :active="$surveys">

            <x-slot:icon>
                <x-ri-survey-line @class(['w-[20px]', 'h-[20px]', 'fill-gray-300', 'group-hover:fill-white', 'fill-white' => $surveys, 'font-bold' => $surveys])/>
            </x-slot:icon>

            <x-slot:linkName>Surveys</x-slot:linkName>
        </x-left-nav-component>


        <x-left-nav-component href="/profile" :active="$profile">

            <x-slot:icon>
                <x-iconsax-lin-profile @class(['w-[20px]', 'h-[20px]', 'text-gray-300', 'group-hover:text-white', 'text-white' => $profile, 'font-bold' => $profile])/>

            </x-slot:icon>

            <x-slot:linkName>Profile</x-slot:linkName>
        </x-left-nav-component>

        <div class="group flex items-center justify-start cursor-pointer hover:text-red-400">
            <x-solar-logout-2-outline class="w-[20px] h-[20px] text-[#FF7B7B] group-hover:text-red-400"/>
            <form method="POST" action="/logout">
                @csrf
                <button type="submit"
                        class="cursor-pointer p-2 text-[1.5rem] w-full align-middle  text-[#FF7B7B] hover:text-red-400 group-hover:text-red-400">
                    Logout
                </button>
            </form>
        </div>


    </div>
</div>


