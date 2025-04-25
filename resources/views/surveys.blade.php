<x-head>
    <body class="h-full bg-[#E9E9E9] p-4 lg:p-8 min-h-screen flex flex-col gap-3">

    {{--    nav--}}
        <x-nav></x-nav>


    {{-- Main Content --}}

    <main class="flex flex-col gap-[1rem] w-full mt-[2rem]">


        <div class="bg-red-00 flex w-full min-h-[70vh] max-h-max">

            {{--        left nav--}}
            <div class="w-[20%] h-[80vh]">
                <x-left-nav></x-left-nav>
            </div>

{{--            right section --}}

            <div class="w-[80%] ml-5 overflow-hidden bg-red-00">

                {{--    page heading heading --}}
                <div class="bg-white p-2 shadow-lg rounded-lg">
                    <x-header>Surveys</x-header>
                </div>

                {{--            survey cards container  --}}
                <div class="bg-yellow-00 mt-5 flex flex-wrap w-full gap-5 items-stretch justify-between flex-wrap ">

{{--                    add a survey card --}}
                    <div class="bg-white w-[300px] h-[300px] flex flex-col items-center justify-center rounded-xl gap-5 shadow-lg">
{{--                        welcome user --}}
                        <h1 class="text-[1.5rem]">Hello <span class="font-bold">
                            Usr123</span></h1>
{{--                        add survey button--}}
                        <x-button href="/"><p>Add New Survey</p><x-vaadin-plus class="w-[15px] h-[15px]  ml-2" /></x-button>
                    </div>

{{--                    other survey cards --}}

                    <x-survey-card ></x-survey-card>
                    <x-survey-card ></x-survey-card>
                    <x-survey-card ></x-survey-card>
                    <x-survey-card ></x-survey-card>
                    <x-survey-card ></x-survey-card>
                    <x-survey-card ></x-survey-card>
                    <x-survey-card ></x-survey-card>
                    <x-survey-card ></x-survey-card>
                </div>



            </div>


        </div>

    </main>

    </body>
</x-head>
