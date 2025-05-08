@php use Illuminate\Support\Facades\Auth;use Illuminate\Support\Facades\DB; @endphp
<x-layout>

    {{-- Bredcrumbs and Title of page --}}
    <div>
        <h1 class="text-[2.25rem] font-bold">Update Profile</h1>
        <hr class="text-gray-300">
    </div>

    {{-- Update user Profile --}}

    {{-- Display an error message if there is no user record --}}
    @if(session('error'))
        <div class="bg-red-100 text-red-800 px-4 py-2 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <div class="grid grid-cols-1 gap-5 mx-auto py-10 items-center justify-center ">
        <form method="POST" action="/update-profile/{{$user->_id}}" class="mx-auto px-10 py-5 md:py-0 max-h-[500px] self-center">
            @csrf
            @method('PATCH')
            <div class="md:text-[1.25rem]">
                <x-form-label for="name">Name</x-form-label>
                <x-form-input class="bg-white/60" name="name" type="text"  placeholder="Enter your name" value="{{ $user->name}}"/>

                <x-form-error name="name" />
            </div>
            <div class="md:text-[1.25rem] mt-4">
                <x-form-label for="email">Email</x-form-label>
                <x-form-input class="bg-white/60" name="email" type="email"  placeholder="example@test.com" value="{{ $user->email  }}"/>

                <x-form-error name="email" />
            </div>

            <div class="md:text-[1.25rem] mt-4">
                <x-form-label for="password">Password</x-form-label>
                <x-form-input class="bg-white/60" name="password" type="password" />

                <x-form-error name="password" />
            </div>

            <div class="md:text-[1.25rem] mt-4">
                <x-form-label for="Confirm Password">Confirm Password</x-form-label>
                <x-form-input class="bg-white/60" name="password_confirmation" type="password" />

                <x-form-error name="password_confirmation" />
            </div>

            <div class="mt-6">
                <x-form-button type="submit">Update User</x-form-button>
            </div>
        </form>
    </div>

</x-layout>
