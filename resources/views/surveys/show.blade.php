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

        @foreach($survey->questions()->get() as $key => $question)
            {{-- Short Question --}}
            <div class="grid grid-col-1 p-5 gap-4 rounded-lg border border-gray-200 shadow-md bg-white">
                {{-- Survey Question--}}
                <div class="grid grid-cols-1 gap-1">
                    <h2 class="text-[1.25rem]">{{$key + 1}}. {{$question->question}}</h2>
                    <p class="text-[0.75rem] text-[#0092c2] font-bold"> Responses</p>
                </div>

                @if($question->type === 'mcq')
                    @foreach($question->options()->get() as $key => $option)
                        {{-- Answers Container --}}
                        <div class="grid grid-cols-1 gap-3 h-fit max-h-[50vh] overflow-y-auto">
                            <p class="bg-[#DAF4FD]/50 p-2 pl-5 rounded-lg">{{$key+1}}. {{$option->option}}</p>
                        </div>
                    @endforeach

                @endif
            </div>
        @endforeach

        @if(!$survey['published'])
            <x-button href="/survey/published/{{ $survey->_id }}-{{ Str::slug($survey->name) }}"
                      class="max-w-fit px-2 rounded-lg py-1 cursor-pointer">Publish
            </x-button>
        @endif
    </div>

</x-layout>
