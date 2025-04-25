<x-head>
    <body class=" h-full bg-[#E9E9E9] p-4 lg:p-8 min-h-screen flex flex-col gap-3">

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
                <div class="bg-white p-2 shadow-lg rounded-lg flex items-baseline gap-2">
                    <a href="/surveys"><x-header>Surveys</x-header></a>
                    <a href="#" class="text-xl text-gray-500">/ This is the name of the survey.</a>
                </div>

                {{--            question cards container  --}}
                <div class="bg-yellow-00 mt-5 flex flex-wrap w-full gap-5 items-stretch justify-between flex-wrap ">

                    {{--                    wrapper --}}
                    <div class="bg-white w-[300px] h-[300px] flex flex-col items-center justify-around rounded-xl gap-5 shadow-lg px-3">

{{--                        Question section --}}
                            <h2>This will be some sort of question</h2>


{{--                        Answer Section --}}

                    </div>


                </div>



            </div>


        </div>

    </main>

    </body>
</x-head>
