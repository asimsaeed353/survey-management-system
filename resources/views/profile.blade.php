<x-layout>

    {{-- Bredcrumbs and Title of page --}}
    <div>
        <h1 class="text-[2.25rem] font-bold">Profile</h1>
        <hr class="text-gray-300">
    </div>

        {{-- User Profile --}}
    <div class="grid grid-cols-1 gap-15 my-3 items-center text-center">

        <div class="grid grid-cols-1 gap-5 items-center">
            <div class="mx-auto">
                <!-- avatar  -->
{{--                <svg xmlns="http://www.w3.org/2000/svg" height="152"  viewBox="0 0 448 512"><path fill="#0092c2" d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464l349.5 0c-8.9-63.3-63.3-112-129-112l-91.4 0c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3z"/></svg>--}}

                <img src="{{ asset('images/avatar.png') }}" class="h-[255px]" alt="my logo">
            </div>

            <!-- user details -->
            <div>
                <h2 class="text-[2rem] font-bold">John Doe</h2>
                <p class="text-[1.25rem] text-[#7D7D7D]">john.doe@example.com</p>
            </div>

            <x-button href="#" class="mx-auto self-center w-fit px-3 py-1">Update Profile</x-button>
        </div>

        <!-- Stats Card -->

        <div class="grid grid-cols-2 md:grid-cols-4 w-fit mx-auto bg-white p-3 md:px-5 gap-10 rounded-lg shadow-md">
            <div class="p-2">
                <p class="text-[1.5rem] text-[#0D2535] italic font-bold">55</p>
                <p class="text-[#7D7D7D]">Total Surveys</p>
            </div>

            <div class="p-2">
                <p class="text-[1.5rem] text-[#0D2535] italic font-bold">55</p>
                <p class="text-[#7D7D7D]">Total Surveys</p>
            </div>

            <div class="p-2">
                <p class="text-[1.5rem] text-[#0D2535] italic font-bold">55</p>
                <p class="text-[#7D7D7D]">Total Surveys</p>
            </div>

            <div class="p-2">
                <p class="text-[1.5rem] text-[#0D2535] italic font-bold">55</p>
                <p class="text-[#7D7D7D]">Total Surveys</p>
            </div>
        </div>
    </div>

</x-layout>
