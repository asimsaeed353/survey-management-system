<x-head>
    <body class="min-h-screen relative">

    <!-- Background image layer -->
    <div class="fixed inset-0 z-[-2] bg-cover bg-no-repeat bg-center"
         style="background-image: url('{{ asset('images/survey-bg.png') }}')">
    </div>

    <!-- Blur + white overlay layer -->
    <div class="fixed inset-0 z-[-1] backdrop-blur-sm bg-white/30"></div>


    <div class="relative z-10 p-8 top-10 bg-white max-w-[80vw] mx-auto rounded-lg shadow-lg">
        <h1 class="text-4xl font-bold text-gray-800">Create a New Survey</h1>
        <!-- Your form or content here -->


        {{-- Survey Heading and Description--}}
        {{--     Survey Name and heading       --}}
        <form action="/survey/create" method="POST" class="py-5 grid grid-cols-1 gap-5">
            @csrf

            <!-- Survey Name -->
            <div>
                <label for="name" class="block text-gray-700 font-semibold mb-1">Survey Name</label>
                <input type="text" name="name" id="name" required
                       class="w-full border-b-2 border-b-[#0092c2] focus:outline-none p-1 text-gray-600">
            </div>

            <!-- Survey Description -->
            <div>
                <label for="description" class="block text-gray-700 font-semibold mb-1">Description</label>
                <textarea name="description" id="description" rows="1"
                          class="w-full border-b-2 border-b-[#0092c2] focus:outline-none p-1 text-gray-600 resize-none scrollbar-hide"
                          oninput="autoResize(this)"></textarea>
            </div>

            {{-- questions will be added dynamically --}}
            <div class="mt-5 grid grid-cols-1 gap-5" id="question-wrapper">

            </div>

{{--                            Short Questions div--}}
{{--            <div class="grid grid-cols-1 gap-5 bg-[#E7F9FF] rounded-lg p-5">--}}
{{--                <div >--}}
{{--                    <input type="hidden" name="questions[][type]" value="short">--}}
{{--                    <textarea name="questions[][question]"  rows="1"--}}
{{--                              class="w-full border-b-2 border-b-[#0092c2] focus:outline-none p-1 text-gray-600 resize-none scrollbar-hide px-2"--}}
{{--                              oninput="autoResize(this)" placeholder="Question"></textarea>--}}
{{--                </div>--}}
{{--                <input type="text"--}}
{{--                       class="w-full border border-gray-300 text-gray-400 p-2 rounded-lg" value="Enter your answer" disabled>--}}
{{--            </div>--}}



            {{--                            Short Questions div--}}
{{--            <div class="grid grid-cols-1 gap-5 bg-[#E7F9FF] rounded-lg p-5">--}}
{{--                <div >--}}
{{--                    <input type="hidden" name="questions[][type]" value="short">--}}
{{--                    <textarea name="questions[][question]"  rows="1"--}}
{{--                              class="w-full border-b-2 border-b-[#0092c2] focus:outline-none p-1 text-gray-600 resize-none scrollbar-hide px-2"--}}
{{--                              oninput="autoResize(this)" placeholder="Question"></textarea>--}}
{{--                </div>--}}
{{--                <input type="text"--}}
{{--                       class="w-full border border-gray-300 text-gray-400 p-2 rounded-lg" value="Enter your answer" disabled>--}}
{{--            </div>--}}


            {{--                Long Questions div --}}
{{--            <div class="grid grid-cols-1 gap-5 bg-[#E7F9FF] rounded-lg p-5">--}}
{{--                <div >--}}
{{--                    <textarea name="lQuestion" id="lQuestion" rows="1"--}}
{{--                              class="w-full border-b-2 border-b-[#0092c2] focus:outline-none p-1 text-gray-600 resize-none scrollbar-hide px-2"--}}
{{--                              oninput="autoResize(this)" placeholder="Question"></textarea>--}}
{{--                </div>--}}
{{--                <input type="text"--}}
{{--                       class="w-full border border-gray-300 text-gray-400 p-5 rounded-lg" value="Enter your answer" disabled>--}}
{{--            </div>--}}


            {{-- Survey Questions --}}
            <div class="grid grid-cols-1 gap-5">

                {{--Add question drop down--}}

                <div class="grid grid-cols-1 gap-2  cursor-pointer text-[#0092c2]">
                    <div class="flex items-center gap-2" id="add-question">
                        <svg id="plus" xmlns="http://www.w3.org/2000/svg" height="18" width="18" viewBox="0 0 512 512">
                            <path fill="#0092c2"
                                  d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344l0-64-64 0c-13.3 0-24-10.7-24-24s10.7-24 24-24l64 0 0-64c0-13.3 10.7-24 24-24s24 10.7 24 24l0 64 64 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-64 0 0 64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/>
                        </svg>

                        <svg id="cross" class="hidden" xmlns="http://www.w3.org/2000/svg" height="18" width="18"
                             viewBox="0 0 512 512">
                            <path fill="#0092c2"
                                  d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z"/>
                        </svg>
                        <p class="font-bold">Add new question</p>
                    </div>

                    {{-- Drop Down contain question types --}}
                    <div id="questions-box"
                         class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5 bg-[#E7F9FF] rounded-lg p-5 hidden">

                        <div
                            class="flex gap-2 items-center justify-start bg-white rounded-lg border border-[#0092c2]/25 py-2 px-4"  id="add-short-question">

                            <svg xmlns="http://www.w3.org/2000/svg" height="14" width="8.75" viewBox="0 0 320 512">
                                <path fill="#0092c2"
                                      d="M80 160c0-35.3 28.7-64 64-64l32 0c35.3 0 64 28.7 64 64l0 3.6c0 21.8-11.1 42.1-29.4 53.8l-42.2 27.1c-25.2 16.2-40.4 44.1-40.4 74l0 1.4c0 17.7 14.3 32 32 32s32-14.3 32-32l0-1.4c0-8.2 4.2-15.8 11-20.2l42.2-27.1c36.6-23.6 58.8-64.1 58.8-107.7l0-3.6c0-70.7-57.3-128-128-128l-32 0C73.3 32 16 89.3 16 160c0 17.7 14.3 32 32 32s32-14.3 32-32zm80 320a40 40 0 1 0 0-80 40 40 0 1 0 0 80z"/>
                            </svg>

                            <p>Short Question</p>

                        </div>

                        <div
                            class="flex gap-2 items-center justify-start bg-white rounded-lg border border-gray-200 py-2 px-4" id="add-long-question">

                            <svg xmlns="http://www.w3.org/2000/svg" height="14" width="15.75" viewBox="0 0 576 512">
                                <path fill="#0092c2"
                                      d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 38.6C310.1 219.5 256 287.4 256 368c0 59.1 29.1 111.3 73.7 143.3c-3.2 .5-6.4 .7-9.7 .7L64 512c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128zm48 96a144 144 0 1 1 0 288 144 144 0 1 1 0-288zm0 240a24 24 0 1 0 0-48 24 24 0 1 0 0 48zM368 321.6l0 6.4c0 8.8 7.2 16 16 16s16-7.2 16-16l0-6.4c0-5.3 4.3-9.6 9.6-9.6l40.5 0c7.7 0 13.9 6.2 13.9 13.9c0 5.2-2.9 9.9-7.4 12.3l-32 16.8c-5.3 2.8-8.6 8.2-8.6 14.2l0 14.8c0 8.8 7.2 16 16 16s16-7.2 16-16l0-5.1 23.5-12.3c15.1-7.9 24.5-23.6 24.5-40.6c0-25.4-20.6-45.9-45.9-45.9l-40.5 0c-23 0-41.6 18.6-41.6 41.6z"/>
                            </svg>

                            <p>Long Question</p>

                        </div>

                        <div
                            class="flex gap-2 items-center justify-start bg-white rounded-lg border border-gray-200 py-2 px-4">

                            <svg xmlns="http://www.w3.org/2000/svg" height="14" width="15.75" viewBox="0 0 576 512">
                                <path fill="#0092c2"
                                      d="M309.5 13.5C305.5 5.2 297.1 0 287.9 0s-17.6 5.2-21.6 13.5L197.7 154.8 44.5 177.5c-9 1.3-16.5 7.6-19.3 16.3s-.5 18.1 5.9 24.5L142.2 328.4 116 483.9c-1.5 9 2.2 18.1 9.7 23.5s17.3 6 25.3 1.7l137-73.2 137 73.2c8.1 4.3 17.9 3.7 25.3-1.7s11.2-14.5 9.7-23.5L433.6 328.4 544.8 218.2c6.5-6.4 8.7-15.9 5.9-24.5s-10.3-14.9-19.3-16.3L378.1 154.8 309.5 13.5zM288 384.7l0-305.6 52.5 108.1c3.5 7.1 10.2 12.1 18.1 13.3l118.3 17.5L391 303c-5.5 5.5-8.1 13.3-6.8 21l20.2 119.6L299.2 387.5c-3.5-1.9-7.4-2.8-11.2-2.8z"/>
                            </svg>

                            <p>Ranking</p>

                        </div>


                        <div
                            class="flex gap-2 items-center justify-start bg-white rounded-lg border border-gray-200 py-2 px-4">

                            <svg xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 512 512">
                                <path fill="#0092c2"
                                      d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-352a96 96 0 1 1 0 192 96 96 0 1 1 0-192z"/>
                            </svg>

                            <p>Boolean</p>

                        </div>

                        <div
                            class="flex gap-2 items-center justify-start bg-white rounded-lg border border-gray-200 py-2 px-4">

                            <svg xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 512 512">
                                <path fill="#0092c2"
                                      d="M464 256A208 208 0 1 0 48 256a208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256-96a96 96 0 1 1 0 192 96 96 0 1 1 0-192z"/>
                            </svg>

                            <p>Choice</p>

                        </div>

                        <div
                            class="flex gap-2 items-center justify-start bg-white rounded-lg border border-gray-200 py-2 px-4">

                            <svg xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 512 512">
                                <path fill="#0092c2"
                                      d="M288 109.3L288 352c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-242.7-73.4 73.4c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l128-128c12.5-12.5 32.8-12.5 45.3 0l128 128c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L288 109.3zM64 352l128 0c0 35.3 28.7 64 64 64s64-28.7 64-64l128 0c35.3 0 64 28.7 64 64l0 32c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64l0-32c0-35.3 28.7-64 64-64zM432 456a24 24 0 1 0 0-48 24 24 0 1 0 0 48z"/>
                            </svg>

                            <p>Upload</p>

                        </div>
                    </div>
                </div>

            </div>


            {{-- Navigate or submit --}}
            <div class="flex items-center justify-between mt-5">
                <a href="/surveys" class="text-gray-600"><< Back</a>
                <button type="submit">
                    <x-button class="max-w-fit px-2 rounded-lg py-1 cursor-pointer">Save</x-button>
                </button>
            </div>

        </form>


    </div>

    <template id="short-question-template">
        <x-question.short />
    </template>

    {{-- JavaScript to show question types box--}}

    <script type="text/javascript">

        let questionIndex = 0;

        function autoResize(textarea) {
            textarea.style.height = 'auto';
            textarea.style.height = textarea.scrollHeight + 'px';
        }

        document.addEventListener('DOMContentLoaded', function () {

            const addBtn = document.getElementById('add-question');
            const addQuestions = document.getElementById('questions-box');

            const crossIcon = document.getElementById('cross');
            const plusIcon = document.getElementById('plus');

            let dropDownOpened = false;
            addBtn.addEventListener('click', function () {
                if (!dropDownOpened) {
                    addQuestions.classList.remove('hidden');
                    crossIcon.classList.remove('hidden');
                    plusIcon.classList.add('hidden');
                    dropDownOpened = true;
                } else {
                    addQuestions.classList.add('hidden');
                    crossIcon.classList.add('hidden');
                    plusIcon.classList.remove('hidden');
                    dropDownOpened = false;
                }
            });
        });

        // Adding a short question
        document.getElementById('add-short-question').addEventListener('click', function (){
           const clone = document.createElement('div');
           clone.innerHTML =
               `<div class="grid grid-cols-1 gap-5 bg-[#E7F9FF] rounded-lg p-5 question">
                    <div >
                        <input type="hidden" name="questions[${questionIndex}][type]" value="short">
                        <textarea name="questions[${questionIndex}][question]"  rows="1"
                                  class="w-full border-b-2 border-b-[#0092c2] focus:outline-none p-1 text-gray-600 resize-none scrollbar-hide px-2"
                                  oninput="autoResize(this)" placeholder="Question"></textarea>
                    </div>
                    <input type="text"
                           class="w-full border border-gray-300 text-gray-400 p-2 rounded-lg" value="Enter your answer" disabled>
                    <div class="ml-auto cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" height="14" width="12.25" viewBox="0 0 448 512">
                            <path fill="#ff5252"
                              d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0L284.2 0c12.1 0 23.2 6.8 28.6 17.7L320 32l96 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 96C14.3 96 0 81.7 0 64S14.3 32 32 32l96 0 7.2-14.3zM32 128l384 0 0 320c0 35.3-28.7 64-64 64L96 512c-35.3 0-64-28.7-64-64l0-320zm96 64c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16z"
                              class="delete-question-button"/>
                        </svg>
                    </div>
            </div>`;

           document.getElementById('question-wrapper').appendChild(clone);
            questionIndex++;
        });


        document.getElementById('add-long-question').addEventListener('click', function (){
            const clone = document.createElement('div');
            clone.innerHTML =
                `<div class="grid grid-cols-1 gap-5 bg-[#E7F9FF] rounded-lg p-5 question">
                    <div >
                        <input type="hidden" name="questions[${questionIndex}][type]" value="long">
                        <textarea name="questions[${questionIndex}][question]"  rows="1"
                                  class="w-full border-b-2 border-b-[#0092c2] focus:outline-none p-1 text-gray-600 resize-none scrollbar-hide px-2"
                                  oninput="autoResize(this)" placeholder="Question"></textarea>
                    </div>
                    <input type="text"
                           class="w-full border border-gray-300 text-gray-400 p-5 rounded-lg" value="Enter your answer" disabled>
                    <div class="ml-auto cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" height="14" width="12.25" viewBox="0 0 448 512">
                            <path fill="#ff5252"
                              d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0L284.2 0c12.1 0 23.2 6.8 28.6 17.7L320 32l96 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 96C14.3 96 0 81.7 0 64S14.3 32 32 32l96 0 7.2-14.3zM32 128l384 0 0 320c0 35.3-28.7 64-64 64L96 512c-35.3 0-64-28.7-64-64l0-320zm96 64c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16z"
                              class="delete-question-button"/>
                        </svg>
                    </div>
            </div>`;

            document.getElementById('question-wrapper').appendChild(clone);
            questionIndex++;
        });

    //     delete a short question
        document.addEventListener('DOMContentLoaded', function (){
            document.addEventListener('click', function (e){

                if(e.target.classList.contains('delete-question-button')) {
                    // alert('hello');
                    const question = e.target.closest('.question');
                    if(question) {
                        question.remove();

                        questionIndex--;
                    }
                }
            });
        });

    </script>
    </body>

</x-head>
