@props(['published' => false,
    'name',
    'id',
    'responses',
    'publicPath',
])

{{--                  wrapper --}}
<div class="bg-white w-full rounded-xl shadow-lg flex flex-col items-center justify-around gap-2 px-3 py-2">

    {{--                        survey status --}}
{{--    <p class="text-[0.65rem] text-white px-[8px] py-[1px] rounded-xl bg-green-500 text-center items-center self-start">Published</p>--}}

    @if($published)
        <p class="text-[0.65rem] text-white px-[8px] py-[1px] rounded-xl bg-green-500 text-center items-center self-start">Published</p>
    @else
        <p class="text-[0.65rem] text-white px-[8px] py-[1px] rounded-xl bg-orange-500 text-center items-center self-start">Not Published</p>
    @endif


    {{--                        survey name and responses --}}

    <div class="p-1 flex flex-col gap-1 items-center justify-between overflow-clip">
        <h3 class="text-center text-[1.35rem] font-bold">{!! $name !!}</h3>
        <p class="text-[0.75rem] font-bold text-[#0092C2]">{{$responses}} Responses</p>

    </div>

{{--    <div class="mx-auto bg-red-500 w-[70%] h-fit">--}}
{{--        <a href="{{$publicPath}}">--}}
{{--            <button class="text-[0.5rem] text-[#0092C2]">--}}
{{--                {{$slot}}--}}
{{--            </button>--}}
{{--        </a>--}}
{{--    </div>--}}

    @if($published)
{{--        <div class="w-[80%] text-center text-wrap break-words mx-auto" id="input-{{$id}}">--}}
{{--            <p class="font-bold">Share URL:</p>--}}
{{--            <a href="{{$publicPath}}" class="text-[0.65rem] text-[#0092c2]">--}}
{{--                {{$publicPath}}--}}
{{--            </a>--}}
{{--        </div>--}}
        <div class="w-[80%] text-center text-wrap break-words mx-auto">
            <p class="font-bold">URL:</p>
            <span class="text-[0.65rem] text-[#0092c2] mr-2" id="link-{{$id}}">{{$publicPath}}</span>
            <div class="inline copy-element">
                <button class="cursor-pointer" id="btn-{{$id}}">

                    <svg class="inline" id="default-message-{{$id}}" xmlns="http://www.w3.org/2000/svg" height="14" width="12.25" viewBox="0 0 448 512"><path fill="#0092c2" d="M384 336l-192 0c-8.8 0-16-7.2-16-16l0-256c0-8.8 7.2-16 16-16l140.1 0L400 115.9 400 320c0 8.8-7.2 16-16 16zM192 384l192 0c35.3 0 64-28.7 64-64l0-204.1c0-12.7-5.1-24.9-14.1-33.9L366.1 14.1c-9-9-21.2-14.1-33.9-14.1L192 0c-35.3 0-64 28.7-64 64l0 256c0 35.3 28.7 64 64 64zM64 128c-35.3 0-64 28.7-64 64L0 448c0 35.3 28.7 64 64 64l192 0c35.3 0 64-28.7 64-64l0-32-48 0 0 32c0 8.8-7.2 16-16 16L64 464c-8.8 0-16-7.2-16-16l0-256c0-8.8 7.2-16 16-16l32 0 0-48-32 0z"/></svg>

                    <span class="hidden" id="success-message-{{$id}}">
                        <svg class="inline" xmlns="http://www.w3.org/2000/svg" height="14" width="12.25" viewBox="0 0 448 512"><path fill="#0092c2" d="M208 0L332.1 0c12.7 0 24.9 5.1 33.9 14.1l67.9 67.9c9 9 14.1 21.2 14.1 33.9L448 336c0 26.5-21.5 48-48 48l-192 0c-26.5 0-48-21.5-48-48l0-288c0-26.5 21.5-48 48-48zM48 128l80 0 0 64-64 0 0 256 192 0 0-32 64 0 0 48c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 176c0-26.5 21.5-48 48-48z"/></svg>
                            <span class="text-[0.65rem] text-[#0092c2] font-bold ml-0.5">Copied!!</span>
                    </span>
                </button>
            </div>

            <script type="text/javascript">
                var copyButton = document.getElementById('btn-{{$id}}');
                copyButton.addEventListener('click', function (){
                    var copyLink = document.getElementById('link-{{$id}}');
                   navigator.clipboard.writeText(copyLink.textContent).then(() => {
                       var successSvg = document.getElementById('success-message-{{$id}}');
                       var defaultSvg = document.getElementById('default-message-{{$id}}');
                       successSvg.classList.add('inline');
                       defaultSvg.classList.remove('inline');
                       defaultSvg.classList.add('hidden');

                       setTimeout(()=> {
                           successSvg.classList.remove('inline');
                           successSvg.classList.add('hidden');
                           defaultSvg.classList.remove('hidden');
                           defaultSvg.classList.add('inline');
                       }, 2000);
                    });

                });
            </script>
        </div>
    @else
{{--        <a href="/published/{{ $id }}" class="text-[0.65rem] px-[10px] py-[2px] rounded-xl text-center bg-[#0092C2] text-white rounded-lg hover:text-[#0092C2] hover:outline-[0.25px] hover:bg-transparent flex transform hover:scale-110 transition duration-300 items-center justify-between ">Publish Now</a>--}}
        <x-button href="/published/{{ $id }}" class="text-[0.65rem] px-[10px] py-[2px] rounded-xl">
            Publish Now
        </x-button>
    @endif

    {{--                        more actions --}}
    <div class="flex self-end items-end text-[0.65rem] border border-[#D2D2D2] rounded-xl">
        <a href="{{$path}}" class="hover:bg-[#0092C2] hover:text-white px-2 py-1 rounded-s-xl">View</a>
{{--        <button class="hover:bg-[#0092C2] hover:text-white border-l-1 border-[#D2D2D2] px-2 py-1">Edit</button>--}}
        <form method="POST" action="/survey/{{$id}}">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-[#EA0000] hover:bg-[#EA0000] hover:text-white border-l-1 border-[#D2D2D2] px-2 py-1 rounded-r-xl cursor-pointer">Delete</button>
        </form>
    </div>
</div>
