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
        /*.star-rating input[type="radio"]:checked ~ label,*/
        /*.star-rating label:hover,*/
        /*.star-rating label:hover ~ label {*/
        /*    color: #0092c2; !* yellow-500 for selected/hovered stars *!*/
        /*}*/
        /*.star-rating input[type="radio"]:checked + label {*/
        /*    color: #0092c2;*/
        /*}*/
    </style>
    <x-survey.layout>
        <x-survey.name>{{ $survey->name }}</x-survey.name>

        @if($survey['description'])
            <x-survey.description>
                {{$survey['description']}}
            </x-survey.description>
        @endif

        <!-- Your form or content here -->
        <form class="py-5 grid grid-cols-1 gap-5">

            <fieldset disabled>

                @csrf
                {{--             Survey Questions--}}
                <div class="grid grid-cols-1 gap-6 w-full my-2 scroll-smooth">

                    <div class="text-red-600 bg-red-100 p-2 rounded mt-4">
                        You have already submitted a response for this survey.
                    </div>

                    {{--                <div class="flex flex-col gap-2 p-5 rounded-lg border border-gray-300 shadow-md bg-[#0092c2]">--}}
                    {{--                    <label class="font-bold text-[1rem] text-white">Email</label>--}}
                    {{--                    <p class="bg-white p-2 rounded-lg overflow-y-auto max-h-[30vh]">--}}
                    {{--                        {{$slot}}--}}
                    {{--                    </p>--}}
                    {{--                    <input type="email"--}}
                    {{--                           name="email" class="w-full border border-[#0092c2]/35 p-2 rounded-lg bg-gray-100 outline-[#0092c2] focus:outline-[2px] focus:border-transparent"--}}
                    {{--                           placeholder="Enter your email" required>--}}
                    {{--                </div>--}}

                    @foreach($survey->questions()->get() as $qKey => $question)
                        <div class="grid grid-col-1 gap-4 p-5 rounded-lg border border-[#0092c2] shadow-md bg-white">
                            {{--                         Survey Question--}}
                            <div class="grid grid-cols-1 gap-1 ">
                                <h2 class="text-[1.25rem]">
                                    {{$qKey + 1}}.
                                    <pre class="whitespace-pre-wrap font-sans text-[1.25rem] inline">{{ $question->question }}</pre>
                                </h2>
                                <input type="hidden" name="responses[{{$qKey}}][question_id]" value="{{$question->id}}" >
                            </div>

                            {{--                     Short Question--}}
                            @if($question->type === 'short')
                                <input type="text"
                                       name="responses[{{$qKey}}][response]" class="w-full border border-[#0092c2]/35 p-2 rounded-lg bg-gray-100 outline-[#0092c2] focus:outline-[2px] focus:border-transparent"
                                       placeholder="Enter your answer" required value="{{ old('responses.' . $qKey . '.response') }}">


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

                            @elseif($question->type === 'scq')
                                @foreach($question->options()->get() ?? [] as $key => $option)
                                    <label class="bg-[#0092c2]/10 border border-[#0092c2]/50 p-2 rounded-lg">
                                        <input type="radio" name="responses[{{$qKey}}][response]" value="{{$option->option}}" class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 focus:ring-2 mr-1" required>
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
                                            disabled
                                        >
                                        <label for="star-{{ $qKey }}-{{ $i }}" class="mx-1">★</label>
                                    @endfor
                                </div>

                            @endif

                        </div>
                    @endforeach

                </div>

            </fieldset>

        </form>
    </x-survey.layout>


</x-head>

