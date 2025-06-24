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
    <x-survey.layout>
        <x-survey.name>{{ $survey->name }}</x-survey.name>

        @if($survey['description'])
            <x-survey.description>
                {{$survey['description']}}
            </x-survey.description>
        @endif

{{--        <p class="text-red-500 text-[0.75rem] mt-4">* You must answer boolean and ranking questions.</p>--}}

        @if ($errors->has('session_id'))
            <div class="text-red-600 bg-red-100 p-2 rounded mt-4">
                {{ $errors->first('session_id') }}
            </div>
        @endif


        <!-- Your form or content here -->
        <form action="/survey/published/{{ $survey->_id }}-{{ Str::slug($survey->name) }}" method="POST"
              class="py-5 grid grid-cols-1 gap-5">
            @csrf

            <input type="hidden" name="session_id" value="{{$sessionId}}">
            <input type="hidden" name="survey_id" value="{{$survey->_id}}">
            {{--             Survey Questions--}}
            <div class="grid grid-cols-1 gap-6 w-full my-2 scroll-smooth">

                @foreach($survey->questions()->get() as $qKey => $question)
                    <div class="grid grid-col-1 gap-4 p-5 rounded-lg border border-[#0092c2] shadow-md bg-white">
                        {{--                         Survey Question--}}
                        <div class="grid grid-cols-1 gap-1 ">
                            <h2 class="text-[1.25rem]">{{$qKey + 1}}. {{$question->question}}</h2>
                            <input type="hidden" name="responses[{{$qKey}}][question_id]" value="{{$question->id}}">
                        </div>

                        {{--                     Short Question--}}
                        @if($question->type === 'short')
                            <input type="text"
                                   name="responses[{{$qKey}}][response]" class="w-full border border-[#0092c2]/35 p-2 rounded-lg bg-gray-100 outline-[#0092c2] focus:outline-[2px] focus:border-transparent"
                                   placeholder="Enter your answer" required>


                        @elseif($question->type === 'long')
                            <textarea name="responses[{{$qKey}}][response]" rows="3"
                                      class="w-full border border-[#0092c2]/35 p-2 rounded-lg bg-gray-100 outline-[#0092c2] focus:outline-[2px] focus:border-transparent"
                                      oninput="autoResize(this)" placeholder="Enter your answer" required></textarea>

                        @elseif($question->type === 'boolean')

                            <label class="bg-[#0092c2]/10 border border-[#0092c2]/50 p-2 rounded-lg">
                                <input type="radio" name="responses[{{$qKey}}][response]"  value="true" class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2 mr-1" required> Yes
                            </label>
                            <label class="bg-[#0092c2]/10 border border-[#0092c2]/50 p-2 rounded-lg">
                                <input type="radio" name="responses[{{$qKey}}][response]"  value="false" class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2 mr-1" required> No
                            </label>


                        @elseif($question->type === 'mcq')
                            @foreach($question->options()->get() ?? [] as $key => $option)
                                <label class="bg-[#0092c2]/10 border border-[#0092c2]/50 p-2 rounded-lg">
                                    <input type="checkbox" name="responses[{{$qKey}}][response][]" value="{{$option->option}}" class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 focus:ring-2 mr-1">
                                    <span>{{$option->option}}</span>
                                </label>
                            @endforeach


                        @elseif ($question->type === 'ranking')
                            <div class="star-rating flex flex-row-reverse mr-auto">
                                @for ($i = 5; $i >= 1; $i--)
                                    <input
                                        type="radio"
                                        id="star-{{ $qKey }}-{{ $i }}"
                                        name="responses[{{$qKey}}][response]"
                                        value="{{ $i }}"
                                        required
                                    >
                                    <label for="star-{{ $qKey }}-{{ $i }}" class="mx-1">★</label>
                                @endfor
                            </div>

                        @endif

                    </div>
                @endforeach

            </div>


            {{--        Submit--}}
            <div class="flex items-center justify-between mt-5">
                <x-form-button type="submit" class="max-w-fit ml-auto px-2 rounded-lg py-1 cursor-pointer">Complete
                    Survey
                </x-form-button>
            </div>

        </form>
    </x-survey.layout>

</x-head>

