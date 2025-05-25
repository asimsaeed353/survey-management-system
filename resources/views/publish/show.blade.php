@php use Illuminate\Support\Str; @endphp
<x-head>
    <style>
        /* Hide radio buttons and style stars */
        .star-rating input[type="radio"] {
            display: none;
        }
        .star-rating label {
            font-size: 1.5rem;
            color: #d1d5db; /* gray-300 */
            cursor: pointer;
        }
        .star-rating input[type="radio"]:checked ~ label,
        .star-rating label:hover,
        .star-rating label:hover ~ label {
            color: #0092c2; /* yellow-500 for selected/hovered stars */
        }
        .star-rating input[type="radio"]:checked + label {
            color: #0092c2;
        }
    </style>
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

            <input type="hidden" name="session_id" value="{{$sessionId}}">
            {{-- Survey Questions --}}
            <div class="grid grid-cols-1 gap-5 w-full my-2 scroll-smooth">

                @foreach($survey->questions()->get() as $key => $question)
                    {{-- Short Question --}}
                    <div class="grid grid-col-1 gap-4 p-5 rounded-lg border border-gray-200 shadow-md bg-white">
                        {{-- Survey Question--}}
                        <div class="grid grid-cols-1 gap-1 ">
                            <h2 class="text-[1.25rem]">{{$key + 1}}. {{$question->question}}</h2>
                        </div>

                        @if($question->type === 'short')
                            <input type="text"
                                   name="responses[{{$question->id}}][]" class="w-full border border-gray-300 p-2 rounded-lg bg-[#DAF4FD]"
                                   placeholder="Enter your answer">

                        @elseif($question->type === 'long')
                            <textarea name="responses[{{$question->id}}][]" rows="3"
                                      class="w-full border border-gray-300 p-2 rounded-lg bg-[#DAF4FD]"
                                      oninput="autoResize(this)" placeholder="Enter your answer"></textarea>

                        @elseif($question->type === 'boolean')

                            <label class="bg-[#DAF4FD] p-2 rounded-lg">
                                <input type="radio" name="responses[{{$question->id}}][]" required value="true" class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2 mr-1"> Yes
                            </label>
                            <label class="bg-[#DAF4FD] p-2 rounded-lg">
                            <input type="radio" name="responses[{{$question->id}}][]" required value="false" class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2 mr-1"> No
                            </label>


                        @elseif($question->type === 'mcq')
                            @foreach($question->options()->get() ?? [] as $key => $option)
                                <label class="bg-[#DAF4FD] p-2 rounded-lg">
                                    <input type="checkbox" name="responses[{{$question->id}}][response][]" value="{{$option->option}}" class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 focus:ring-2 mr-1">
                                    <span>{{$option->option}}</span>
                                </label>
                            @endforeach


                        @elseif ($question->type === 'ranking')
                            <div class="star-rating flex flex-row-reverse mr-auto">
                                @for ($i = 5; $i >= 1; $i--)
                                    <input
                                        type="radio"
                                        id="star-{{ $question->_id }}-{{ $i }}"
                                        name="responses[{{$question->_id}}][response]"
                                        value="{{ $i }}"
                                        required
                                    >
                                    <label for="star-{{ $question->_id }}-{{ $i }}" class="mx-1">★</label>
                                @endfor
                            </div>

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
