{{--<div class="flex flex-col gap-2 p-5 rounded-lg border border-gray-300 shadow-md bg-[#0092c2] mt-5">--}}
{{--    <h2 class="font-bold text-[1rem] text-white">Description</h2>--}}
{{--    <p class="bg-white p-2 rounded-lg overflow-y-auto max-h-[30vh]">--}}
{{--        <pre class=" bg-white p-2 rounded-lg overflow-y-auto max-h-[30vh] whitespace-pre-wrap font-sans inline">{{$slot}}</pre>--}}
{{--    </p>--}}
{{--</div>--}}

<div class="flex flex-col gap-2 p-5 rounded-lg border border-gray-300 shadow-md bg-[#0092c2] mt-5">
    <h2 class="font-bold text-[1rem] text-white">Description</h2>
    <pre class="bg-white p-3 rounded-lg overflow-y-auto max-h-[30vh] whitespace-pre-wrap font-sans leading-relaxed m-0">{{ $slot }}</pre>
</div>
