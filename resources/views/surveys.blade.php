<x-layout>

    {{-- Bredcrumbs and Title of page --}}
    <div>
        <h1 class="text-[2.25rem] font-bold">Surveys</h1>
        <hr class="text-gray-300">
    </div>

        {{-- Survey Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5 lg:gap-7 mb-3">
        {{--                    wrapper --}}
        <div class="bg-white w-full flex flex-col items-center justify-around rounded-xl gap-5 shadow-lg px-3 py-2">


            {{--                        survey name and responses --}}

            <div class=" bg-yellow-00 p-1 py-5 flex flex-col items-center justify-center">
                <h3 class=" text-center text-[1.65rem]">Hello <span class="text-[1.65rem] font-bold">John Doe!</span></h3>
                <p class="text-center text-[#7D7D7D] text-[0.875rem] px-5">Collect better data and make better decisions.</p>
            </div>

            <div>
                    <x-button href="#" class="group px-3 py-1 gap-3 w-fit ">Create Survey
                                <svg xmlns="http://www.w3.org/2000/svg" height="14" width="12.25" viewBox="0 0 448 512"><path fill="#ffffff" d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z" class="group-hover:fill-[#0092c2]" /></svg>

                    </x-button>

                </div>
        </div>
        <x-survey-card />
        <x-survey-card />
        <x-survey-card />
        <x-survey-card />
        <x-survey-card />
        <x-survey-card />
        <x-survey-card />
        <x-survey-card />
        <x-survey-card />
        <x-survey-card />
        <x-survey-card />
        <x-survey-card />
        <x-survey-card />
        <x-survey-card />
        <x-survey-card />

    </div>

</x-layout>
