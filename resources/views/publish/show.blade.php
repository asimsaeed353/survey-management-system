@php use Illuminate\Support\Str; @endphp
<x-head>
    <body class="min-h-screen relative">

    <!-- Background image layer -->
    <div class="fixed inset-0 z-[-2] bg-cover bg-no-repeat bg-center"
         style="background-image: url('{{ asset('images/survey-bg.png') }}')">
    </div>

    <!-- Blur + white overlay layer -->
    <div class="fixed inset-0 z-[-1] backdrop-blur-sm bg-white/30"></div>


    <div class="relative z-10 p-8 top-10 bg-white max-w-[80vw] mx-auto rounded-lg shadow-lg">
        <h1 class="text-4xl font-bold text-gray-800">{{ $survey->name }}</h1>

        @if($survey['description'])
            <div class="flex flex-col gap-2 p-5 rounded-lg border border-gray-200 shadow-md bg-white mt-5">
                <h2 class="font-bold text-[1rem]">Description</h2>
                <p class="bg-[#DAF4FD]/50 p-2 rounded-lg overflow-y-auto max-h-[30vh]">
                    {{$survey['description']}}
                </p>
            </div>
        @endif
        <!-- Your form or content here -->
        <form action="/survey/published/{{ $survey->id }}-{{ Str::slug($survey->name) }}" method="POST"
              class="py-5 grid grid-cols-1 gap-5">
            @csrf

            {{-- Survey Questions --}}
            <div class="grid grid-cols-1 gap-5 w-full my-2 scroll-smooth">

                @foreach($survey->questions()->get() as $key => $question)
                    {{-- Short Question --}}
                    <div class="grid grid-col-1 p-5 gap-4 rounded-lg border border-gray-200 shadow-md bg-white">
                        {{-- Survey Question--}}
                        <div class="grid grid-cols-1 gap-1">
                            <h2 class="text-[1.25rem]">{{$key + 1}}. {{$question->question}}</h2>
                        </div>

                        @if($question->type === 'short')
                            <input type="text"
                                   name="response[{{$key}}][]" class="w-full border border-gray-300 p-2 rounded-lg"
                                   placeholder="Enter your answer">
                        @endif

                        @if($question->type === 'long')
                            <textarea name="response[{{$key}}][]" rows="2"
                                      class="w-full border border-gray-300 p-2 rounded-lg"
                                      oninput="autoResize(this)" placeholder="Enter your answer"></textarea>
                        @endif
                        
                    </div>
                @endforeach

            </div>


            {{-- Navigate or submit --}}
            <div class="flex items-center justify-between mt-5">
                <x-form-button type="submit" class="max-w-fit ml-auto px-2 rounded-lg py-1 cursor-pointer">Complete
                    Survey
                </x-form-button>
            </div>

        </form>


    </div>


    </body>

</x-head>
