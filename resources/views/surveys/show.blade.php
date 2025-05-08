@php use Illuminate\Support\Facades\Auth;use Illuminate\Support\Facades\DB; @endphp
<x-layout>

    {{-- Bredcrumbs and Title of page --}}
    <div>
        <a href="/surveys" class="inline hover:underline hover:underline-offset-4"><h1 class="text-[2.25rem] font-bold inline">Surveys</h1></a>
        <span class="text-[1.5rem] text-gray-600">  /  Survey Name</span>
        <hr class="text-gray-300">
    </div>

{{--    Wrapper to wrap all the questions and their options--}}
    <div class="grid grid-cols-1 gap-5 w-full my-2">

        {{-- Question card --}}
            {{-- wrapper--}}

    {{-- Short Question --}}
            <div class="grid grid-col-1 p-5 gap-4 rounded-lg border border-gray-200 shadow-md bg-white">
                {{-- Survey Question--}}
                <div class="grid grid-cols-1 gap-1">
                    <h2 class="text-[1.25rem]">This is some sort of Short Question.</h2>
                    <p class="text-[0.75rem]">14 Responses</p>
                </div>

                {{-- Answers Container --}}
                <div class="grid grid-cols-1 gap-3 h-fit max-h-[50vh] overflow-y-auto">
                    <p class="bg-[#DAF4FD]/50 p-2 rounded-lg">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid consequatur excepturi neque pariatur repellat reprehenderit.</p>
                    <p class="bg-[#DAF4FD]/50 p-2 rounded-lg">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, laboriosam!</p>
                    <p class="bg-[#DAF4FD]/50 p-2 rounded-lg">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto cupiditate illo maxime.</p>
                    <p class="bg-[#DAF4FD]/50 p-2 rounded-lg">Lorem ipsum dolor sit amet.</p>
                    <p class="bg-[#DAF4FD]/50 p-2 rounded-lg">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus consequatur dolor harum hic laboriosam, odio qui quod repudiandae soluta tempore voluptatibus.</p>
                    <p class="bg-[#DAF4FD]/50 p-2 rounded-lg">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci deserunt dolore excepturi ipsum magni minima nostrum, optio qui quisquam repudiandae tenetur vel, veniam veritatis voluptas!</p>
                    <p class="bg-[#DAF4FD]/50 p-2 rounded-lg">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam.</p>
                </div>
            </div>

    {{-- Long Question --}}
        <div class="grid grid-col-1 p-5 gap-4 rounded-lg border border-gray-200 shadow-md bg-white h-fit">
            {{-- Survey Question--}}
            <div class="grid grid-cols-1 gap-1">
                <h2 class="text-[1.25rem]">This is some sort of Long Question .</h2>
                <p class="text-[0.75rem]">4 Responses</p>
            </div>

            {{-- Answers Container --}}
            <div class="grid grid-cols-1 gap-3 h-fit max-h-[50vh] overflow-y-auto">
                <p class="bg-[#DAF4FD]/50 p-2 rounded-lg">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium architecto, consectetur ea fuga id itaque laborum, magnam magni maiores maxime molestiae odit quo vel vero.</p>
                <p class="bg-[#DAF4FD]/50 p-2 rounded-lg">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium architecto, consectetur ea fuga id itaque laborum, magnam magni maiores maxime molestiae odit quo vel vero. Lorem ipsum dolor sit amet, consectetur adipisicing elit. A alias assumenda consequuntur doloremque et expedita facilis, optio placeat quaerat quod.</p>
                <p class="bg-[#DAF4FD]/50 p-2 rounded-lg">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium architecto, consectetur ea fuga id itaque laborum, magnam magni maiores maxime molestiae odit quo vel vero.</p>
                <p class="bg-[#DAF4FD]/50 p-2 rounded-lg">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium architecto, consectetur ea fuga id itaque laborum, magnam magni maiores maxime molestiae odit quo vel Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet, beatae consequatur delectus dolores ducimus eligendi enim, est eveniet, expedita natus neque optio perspiciatis quibusdam repellat soluta ullam voluptatum. Animi commodi delectus esse fuga, fugiat harum impedit modi natus necessitatibus nemo nostrum omnis perspiciatis quas quibusdam rem reprehenderit suscipit temporibus, veniam?</p>
                <p class="bg-[#DAF4FD]/50 p-2 rounded-lg">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium architecto, consectetur ea fuga id itaque laborum, magnam magni maiores maxime molestiae odit quo vel vero.</p>
                <p class="bg-[#DAF4FD]/50 p-2 rounded-lg">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium architecto, consectetur ea fuga id itaque laborum, magnam magni maiores maxime molestiae odit quo vel vero.</p>
            </div>
        </div>

    {{-- Boolean Question --}}
        <div class="grid grid-col-1 p-5 gap-4 rounded-lg border border-gray-200 shadow-md bg-white">
            {{-- Survey Question--}}
            <div class="grid grid-cols-1 gap-1">
                <h2 class="text-[1.25rem]">This is some sort of boolean question.</h2>
                <p class="text-[0.75rem]">53 Responses</p>
            </div>

            {{-- Answers Container --}}
            <div class="grid grid-cols-1 gap-3 h-fit">
                <p class="bg-[#DAF4FD]/50 p-2 rounded-lg">option 1 - 50 responses  (60%)</p>
                <p class="bg-[#DAF4FD]/50 p-2 rounded-lg">option 2 - 34 responses  (28%)</p>
            </div>
        </div>

    {{-- Multiple Choice Question --}}
        <div class="grid grid-col-1 p-5 gap-4 rounded-lg border border-gray-200 shadow-md bg-white">
            {{-- Survey Question--}}
            <div class="grid grid-cols-1 gap-1">
                <h2 class="text-[1.25rem]">This is some sort of multiple choice question.</h2>
                <p class="text-[0.75rem]">53 Responses</p>
            </div>

            {{-- Answers Container --}}
            <div class="grid grid-cols-1 gap-3 h-fit">
                <p class="bg-[#DAF4FD]/50 p-2 rounded-lg">option 1 - 50 responses  (30%)</p>
                <p class="bg-[#DAF4FD]/50 p-2 rounded-lg">option 2 - 34 responses  (28%)</p>
                <p class="bg-[#DAF4FD]/50 p-2 rounded-lg">option 3 - 20 responses  (17%)</p>
                <p class="bg-[#DAF4FD]/50 p-2 rounded-lg">option 4 - 11 responses  (08%)</p>
            </div>
        </div>

    {{-- Rating Question --}}
        <div class="grid grid-col-1 p-5 gap-4 rounded-lg border border-gray-200 shadow-md bg-white">
            {{-- Survey Question--}}
            <div class="grid grid-cols-1 gap-1">
                <h2 class="text-[1.25rem]">This is some sort of rating question.</h2>
                <p class="text-[0.75rem]">53 Responses</p>
            </div>

            {{-- Answers Container --}}
            <div class="grid grid-cols-1 gap-3 h-fit">
                <div class="bg-[#DAF4FD]/50 p-2 rounded-lg flex items-center gap-5">

                    <div class="flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" height="14" width="15.75" viewBox="0 0 576 512"><path fill="#ffd129" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                    </div>


                    <p>5 responses  (2%)</p>
                </div>
                <div class="bg-[#DAF4FD]/50 p-2 rounded-lg flex items-center gap-5">

                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" height="14" width="15.75" viewBox="0 0 576 512"><path fill="#ffd129" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" height="14" width="15.75" viewBox="0 0 576 512"><path fill="#ffd129" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                    </div>


                    <p>25 responses  (10%)</p>
                </div>
                <div class="bg-[#DAF4FD]/50 p-2 rounded-lg flex items-center gap-5">

                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" height="14" width="15.75" viewBox="0 0 576 512"><path fill="#ffd129" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" height="14" width="15.75" viewBox="0 0 576 512"><path fill="#ffd129" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" height="14" width="15.75" viewBox="0 0 576 512"><path fill="#ffd129" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                    </div>


                    <p>50 responses  (20%)</p>
                </div>
                <div class="bg-[#DAF4FD]/50 p-2 rounded-lg flex items-center gap-5">

                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" height="14" width="15.75" viewBox="0 0 576 512"><path fill="#ffd129" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" height="14" width="15.75" viewBox="0 0 576 512"><path fill="#ffd129" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" height="14" width="15.75" viewBox="0 0 576 512"><path fill="#ffd129" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" height="14" width="15.75" viewBox="0 0 576 512"><path fill="#ffd129" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                    </div>


                    <p>60 responses  (24%)</p>
                </div>
                <div class="bg-[#DAF4FD]/50 p-2 rounded-lg flex items-center gap-5">

                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" height="14" width="15.75" viewBox="0 0 576 512"><path fill="#ffd129" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" height="14" width="15.75" viewBox="0 0 576 512"><path fill="#ffd129" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" height="14" width="15.75" viewBox="0 0 576 512"><path fill="#ffd129" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" height="14" width="15.75" viewBox="0 0 576 512"><path fill="#ffd129" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" height="14" width="15.75" viewBox="0 0 576 512"><path fill="#ffd129" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                    </div>


                    <p>100 responses  (40%)</p>
                </div>
            </div>
        </div>
    </div>

</x-layout>
