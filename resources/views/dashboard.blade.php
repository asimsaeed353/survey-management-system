<x-head>
    <body class=" h-full bg-[#E9E9E9] p-4 lg:p-8 min-h-screen flex flex-col gap-3">

{{--    nav--}}
    <x-nav>
{{--        user profile drop down --}}
            <x-healthicons-f-ui-user-profile class="cursor-pointer " id="drop-menu"/>
            <div id="drop-down" class="hidden">I'm testing this javascript feature to hide and show the drop-down.</div>
    </x-nav>



{{-- Main Content --}}

<main class="flex flex-col gap-[1rem] w-full mt-[2rem]">


    <div class="bg-red-00 flex w-full min-h-[70vh] max-h-max">

{{--        left nav--}}
        <div class="w-[20%] h-[80vh] flex flex-col justify-between">
            <x-left-nav></x-left-nav>

            <div>

            </div>
        </div>

{{--        survey analytics--}}
        <div class="w-[80%] ml-5 overflow-hidden">

            {{--    main heading --}}
            <div class="bg-white p-2 shadow-lg rounded-lg">
                <x-header>Dashboard</x-header>
            </div>

{{--            survey cards --}}

            <div class="bg-green-00 flex flex-wrap md:gap-6 lg:gap-3 w-full justify-between mt-5 items-stretch">

                <x-dashboard-card>
                    <x-slot:slot>Active Survey</x-slot:slot>
                    <x-slot:number>4</x-slot:number>
                </x-dashboard-card>

                <x-dashboard-card>
                    <x-slot:slot>Completed Survey</x-slot:slot>
                    <x-slot:number>7</x-slot:number>
                </x-dashboard-card>

                <x-dashboard-card>
                    <x-slot:slot>Number of Participants</x-slot:slot>
                    <x-slot:number>57</x-slot:number>
                </x-dashboard-card>

                <x-dashboard-card>
                    <x-slot:slot>Dummy Record</x-slot:slot>
                    <x-slot:number>7</x-slot:number>
                </x-dashboard-card>

            </div>

{{--            graphs and charts --}}

            <div class=" mt-8">

            </div>

        </div>

    </div>

</main>

    </body>
</x-head>
