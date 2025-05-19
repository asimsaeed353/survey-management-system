<x-head>
    <body class="min-h-screen relative">

    <!-- Background image layer -->
    <div class="fixed inset-0 z-[-2] bg-cover bg-no-repeat bg-center"
         style="background-image: url('{{ asset('images/survey-bg.png') }}')">
    </div>

    <!-- Blur + white overlay layer -->
    <div class="fixed inset-0 z-[-1] backdrop-blur-sm bg-white/30"></div>


    <div class="relative z-10 p-8 top-10 bg-white max-w-[80vw] mx-auto rounded-lg shadow-lg">
        <h1 class="text-4xl font-bold text-gray-800">Create a New Survey</h1>
        <!-- Your form or content here -->


        {{-- Survey Heading and Description--}}
        {{--     Survey Name and heading       --}}
        <form action="/survey/create" method="POST" class="py-5 grid grid-cols-1 gap-5">
            @csrf

            <!-- Survey Name -->
            <div>
                <label for="name" class="block text-gray-700 font-semibold mb-1">Survey Name</label>
                <input type="text" name="name" id="name" required
                       class="w-full border-b-2 border-b-[#0092c2] focus:outline-none p-1 text-gray-600">
            </div>

            <!-- Survey Description -->
            <div>
                <label for="description" class="block text-gray-700 font-semibold mb-1">Description</label>
                <textarea name="description" id="description" rows="1"
                          class="w-full border-b-2 border-b-[#0092c2] focus:outline-none p-1 text-gray-600 resize-none scrollbar-hide"
                          oninput="autoResize(this)"></textarea>
            </div>

            {{--             questions will be added dynamically --}}
            <div class="mt-5 grid grid-cols-1 gap-5" id="question-wrapper">

                <x-question.edit.short question="Hello " />
                <x-question.edit.long question="Hello " />
                <x-question.edit.ranking question="Hello " />
                <x-question.edit.boolean question="Hello " />
                <x-question.edit.choice question="Hello " />

            </div>


            {{-- Navigate or submit --}}
            <div class="flex items-center justify-between mt-5">
                <a href="/surveys" class="text-gray-600"><< Back</a>
                <button type="submit">
                    <x-button class="max-w-fit px-2 rounded-lg py-1 cursor-pointer">Update</x-button>
                </button>
            </div>

        </form>


    </div>

    </body>

</x-head>
