@php use Illuminate\Support\Facades\Auth;use Illuminate\Support\Facades\DB; @endphp
<x-layout>

    {{-- Bredcrumbs and Title of page --}}
    <div class="bg-linear-to-r from-[#4B3F72]  to-[#0092c2] p-5 rounded-lg text-white flex items-center justify-between">
        <h1 class="text-[2.25rem] font-bold">Profile</h1>
    </div>

    {{-- Display a success message if the user record is updated --}}
    @if(session('success'))
        <div class="bg-green-200 text-green-900 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- User Profile --}}
    <div class="grid grid-cols-1 gap-10 my-3 items-center text-center">

        <div class="grid grid-cols-1 gap-5 items-center bg-white w-fit mx-auto py-3 px-10 rounded-lg shadow-md">
            <div class="mx-auto">
                <!-- avatar  -->
                <img src="{{ asset('images/avatar.png') }}" class="h-[255px]" alt="my logo">
            </div>

            <!-- user details -->
            <div>
                <h2 class="text-[2rem] font-bold">

                    {{ $user->name }}

                </h2>
                <p class="text-[1.25rem] text-[#7D7D7D]">
                    {{ $user->email }}
                </p>
            </div>

            <x-button href="/edit-profile" class="mx-auto self-center w-fit px-3 py-1">Update Profile</x-button>
        </div>

        <!-- Stats Card -->

        <div class="grid grid-cols-2 md:grid-cols-4 w-fit mx-auto bg-white p-3 md:px-5 gap-10 rounded-lg shadow-md">
            <x-profile-info-card>
                <x-slot:stat>{{$user->surveys->count()}}</x-slot:stat>
                <x-slot:name>Total Surveys</x-slot:name>
            </x-profile-info-card>

            <x-profile-info-card>
                <x-slot:stat>{{$user->surveys->where('published', true)->count()}}</x-slot:stat>
                <x-slot:name>Active Surveys</x-slot:name>
            </x-profile-info-card>

            <x-profile-info-card>
                <x-slot:stat>{{($user->surveys->count()) - ($user->surveys->where('published', true)->count())}}</x-slot:stat>
                <x-slot:name>Completed Surveys</x-slot:name>
            </x-profile-info-card>

            <x-profile-info-card>
                <x-slot:stat>1122</x-slot:stat>
                <x-slot:name>Number of Participants</x-slot:name>
            </x-profile-info-card>
        </div>
    </div>

</x-layout>
