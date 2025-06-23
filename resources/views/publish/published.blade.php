<x-head>
    <body class="min-h-screen relative">

        <!-- Background image layer -->
        <div class="fixed inset-0 z-[-2] bg-cover bg-no-repeat bg-center"
             style="background-image: url('{{ asset('images/survey-bg.png') }}')">
        </div>

        <!-- Blur + white overlay layer -->
        <div class="fixed inset-0 z-[-1] backdrop-blur-sm bg-white/30"></div>


        <div class="relative z-10 p-8 top-10 bg-white max-w-[80vw] mx-auto rounded-lg shadow-lg">
            <h1 class="text-4xl font-bold text-gray-800 text-center">Thank You!!</h1>
        </div>
    </body>
</x-head>

