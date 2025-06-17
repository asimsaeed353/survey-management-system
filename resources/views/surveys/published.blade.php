<x-head>
    <body class="min-h-screen relative">

        <!-- Background image layer -->
        <div class="fixed inset-0 z-[-2] bg-cover bg-no-repeat bg-center"
             style="background-image: url('{{ asset('images/survey-bg.png') }}')">
        </div>

        <!-- Blur + white overlay layer -->
        <div class="fixed inset-0 z-[-1] backdrop-blur-sm bg-white/30"></div>


        <div class="relative z-10 p-8 top-10 bg-white max-w-[80vw] mx-auto rounded-lg shadow-lg">
            <h1 class="text-4xl font-bold text-gray-800 text-center">Your Survey is published!!</h1>
            <div class="mt-5 ">
                <span class="">Survey URL:</span>
                <a href="{{$survey->publicPath()}}" class="text-[0.65rem] lg:text-[1rem] text-[#0092c2] mx-auto">
                    {{$survey->publicPath()}}
                </a>
            </div>
{{--            <x-button href="/surveys" class="mt-3 max-w-fit px-2 py-1 cursor-pointer">--}}
{{--                All Surveys--}}
{{--            </x-button>--}}
            <a href="/surveys" class="text-gray-600"><< Go to survey page</a>
        </div>


    </body>

</x-head>

