<x-head>
    <body class="min-h-screen relative">
    <!-- Background image layer -->
    <div class="fixed inset-0 z-[-2] bg-cover bg-no-repeat bg-center"
         style="background-image: url('{{ asset('images/survey-bg.png') }}')">
    </div>

    <!-- Blur + white overlay layer -->
    <div class="fixed inset-0 z-[-1] backdrop-blur-sm bg-white/30"></div>

    <div class="relative z-10 p-8 top-10 bg-white max-w-[80vw] mx-auto rounded-lg shadow-lg">
        <div class="text-red-600 bg-red-100 p-2 rounded mt-4">
            Invalid session. Please try again!
        </div>
    </div>
    </body>
</x-head>
