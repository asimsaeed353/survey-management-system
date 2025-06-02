<div {{ $attributes->merge(['class' => "bg-white border border-gray-300 rounded-lg flex gap-5 items-center px-5 py-3 w-full"]) }}>

    {{$slot}}

    <div class="flex flex-col gap-1 items-start">
        <h4 class="text-[#7D7D7D]">{{$name}}</h4>
        <p class="text-[1.25rem] font-bold italic">{{$number}}</p>
    </div>
</div>
