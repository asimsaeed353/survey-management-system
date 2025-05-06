{{--                    wrapper --}}
<div class="bg-white w-full flex flex-col items-center justify-around rounded-xl gap-5 shadow-lg px-3 py-2">
    {{--                        survey status --}}
    <p class="text-[0.75rem] text-white px-[8px] py-[1px] rounded-xl bg-green-500 text-center items-center self-start">Published</p>


    {{--                        survey name and responses --}}

    <div class=" bg-yellow-00 p-1 flex flex-col items-center justify-between">
        <h3 class=" text-center text-[1.65rem]">This is the title of the survey.</h3>
        <p class="text-[0.75rem] font-bold text-[#0092C2]">54 Responses</p>
    </div>

    {{--                        more actions --}}
    <div class="flex self-end items-end text-[0.65rem] border border-[#D2D2D2] rounded-xl">
        <button class="hover:bg-[#0092C2] hover:text-white px-2 py-1 rounded-s-xl">View</button>
        <button class="hover:bg-[#0092C2] hover:text-white border-l-1 border-[#D2D2D2] px-2 py-1">Edit</button>
        <button class="text-[#EA0000] hover:bg-[#EA0000] hover:text-white border-l-1 border-[#D2D2D2] px-2 py-1 rounded-r-xl">Delete</button>
    </div>
</div>
