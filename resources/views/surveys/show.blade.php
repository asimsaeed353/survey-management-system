
@php use Illuminate\Support\Str; @endphp
<x-layout>

    {{-- Bredcrumbs and Title of page --}}
    <div>
        <a href="/surveys" class="inline hover:underline hover:underline-offset-4"><h1
                class="text-[2.25rem] font-bold inline">Surveys</h1></a>
        <span class="text-[1.5rem] text-gray-600">  /  {{ $survey['name']  }}</span>
        <hr class="text-gray-300">
    </div>

    {{--    Wrapper to wrap all the questions and their options--}}
    <div class="grid grid-cols-1 gap-5 w-full my-2 scroll-smooth">

        @if($survey['description'])
            <div class="flex flex-col gap-2 p-5 rounded-lg border border-gray-200 shadow-md bg-white">
                <h2 class="font-bold text-[1rem]">Description</h2>
                <p class="bg-[#DAF4FD]/50 p-2 rounded-lg overflow-y-auto max-h-[30vh]">
                    {{$survey['description']}}
                </p>
            </div>
        @endif

{{--        <p class="bg-white p-2 rounded-lg font-bold">--}}
{{--            Total Responses:  <strong class="text-[#0092c2] font-bold">{{ $totalResponses }}</strong>--}}
{{--        </p>--}}

        @foreach($survey->questions()->get() as $key => $question)

            @php
                $questionId = (string)$question->_id;
                $stats = $responseStats[$questionId] ?? ['responses' => [], 'counts' => [], 'percentages' => []];
            @endphp
            <div class="grid grid-col-1 p-5 gap-4 rounded-lg border border-gray-200 shadow-md bg-white">
{{--                 Survey Question--}}
                <div class="grid grid-cols-1 gap-1">
                    <h2 class="text-[1.25rem]">{{$key + 1}}. {{$question->question}}</h2>
                </div>

            {{-- Responses --}}
                <div class="grid grid-cols-1 gap-3 h-fit max-h-[50vh] overflow-y-auto">

                    @if($totalResponses == 0)
                        <p class="text-[0.75rem] text-[#0092c2] font-bold">
                            No responses yet
                        </p>

                    @else
                        @if(in_array($question->type, ['short', 'long']))
                            <p class="text-[#0092c2] font-bold text-[0.75rem]">
                                {{count($stats['responses'])}} {{  count($stats['responses']) == 1 ? 'Response' : 'Responses'}}
                            </p>
                            <ul class="list-none flex flex-col gap-3">
                                @foreach($stats['responses'] as $response)
                                    <li class="bg-[#DAF4FD]/50 p-2 rounded-lg">{{ $response }}</li>
                                @endforeach
                            </ul>
                        @elseif($question->type == 'mcq')

                            <p class="text-[#0092c2] font-bold text-[0.75rem]">{{ array_sum($stats['counts']) }} Responses</p>

                            @foreach($question->options()->get() as $optKey => $option)

                                <div class="flex items-center justify-between bg-[#DAF4FD]/50 p-2 rounded-lg">
                                    <p>{{ $option->option }}</p>
                                    <p class="text-[#0092c2]">
                                        {{ $stats['counts'][$option->option] ?? 0 }} responses
                                    </p>
                                </div>
                            @endforeach

                        @elseif($question->type == 'boolean')

                            <p class="text-[#0092c2] font-bold text-[0.75rem]">{{ array_sum($stats['counts']) }} Responses</p>
                            @foreach(['Yes', 'No'] as $option)

                                <div class="flex items-center justify-between bg-[#DAF4FD]/50 p-2 rounded-lg">
                                    <p>{{ $option }}</p>
                                    <p class="text-[#0092c2]">
                                        {{ $stats['counts'][$option] ?? 0 }} Responses ({{ $stats['percentages'][$option] ?? 0 }} %)
                                    </p>
                                </div>

                            @endforeach


                        @elseif($question->type === 'ranking')
                            <p class="text-[#0092c2] font-bold text-[0.75rem]">{{ array_sum($stats['counts']) }} Responses</p>

                            @for($i = 5; $i >= 1; $i--)
                                <div class="flex items-center justify-between bg-[#DAF4FD]/50 p-2 rounded-lg">
                                    <p>{{ $i }} Star{{ $i > 1 ? 's' : '' }}</p>
                                    <p class="text-[#0092c2]">
                                        {{ $stats['counts'][$i] ?? 0 }} responses ({{ $stats['percentages'][$i] ?? 0 }}%)
                                    </p>
                                </div>
                            @endfor

                        @endif

                    @endif
                </div>

            </div>
        @endforeach


        @if(!$survey['published'])
            <x-button href="/survey/published/{{ $survey->_id }}-{{ Str::slug($survey->name) }}"
                      class="max-w-fit px-2 rounded-lg py-1 cursor-pointer">Publish
            </x-button>
        @endif
    </div>

</x-layout>

