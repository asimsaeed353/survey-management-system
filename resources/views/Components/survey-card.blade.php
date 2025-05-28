@props(['published' => false,
    'name',
    'responses',
])

{{--                    wrapper --}}
<div class="bg-white w-full flex flex-col items-center justify-around rounded-xl gap-5 shadow-lg px-3 py-2">

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

    <a href="{{$publicPath}}">
        <button class="text-[0.5rem] text-[#0092C2]">
            {{$slot}}
        </button>
    </a>

    {{--                        more actions --}}
    <div class="flex self-end items-end text-[0.65rem] border border-[#D2D2D2] rounded-xl">
        <a href="{{$path}}" class="hover:bg-[#0092C2] hover:text-white px-2 py-1 rounded-s-xl">View</a>
        <button class="hover:bg-[#0092C2] hover:text-white border-l-1 border-[#D2D2D2] px-2 py-1">Edit</button>
        <form method="POST" action="{{$path}}">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-[#EA0000] hover:bg-[#EA0000] hover:text-white border-l-1 border-[#D2D2D2] px-2 py-1 rounded-r-xl cursor-pointer">Delete</button>
        </form>
    </div>
</div>
