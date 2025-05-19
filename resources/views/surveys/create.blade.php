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

{{--             questions will be added dynamically --}}
            <div class="mt-5 grid grid-cols-1 gap-5" id="question-wrapper">


            </div>


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

                    {{-- Drop Down containing all question types to be added on form --}}
                    <x-question.add-questions />
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

{{--    <template id="short-question-template">--}}
{{--        <x-question.short />--}}
{{--    </template>--}}

    {{-- JavaScript to edit question types box--}}

    <script type="text/javascript">

        let questionIndex = 0;

        function autoResize(textarea) {
            textarea.style.height = 'auto';
            textarea.style.height = textarea.scrollHeight + 'px';
        }

        // add-questions dropdown
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


        // add long question to the form
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


        // add a boolean question to the form
        document.getElementById('add-boolean-question').addEventListener('click', function (){
            const clone = document.createElement('div');
            clone.innerHTML =
                `<div class="grid grid-cols-1 gap-5 bg-[#E7F9FF] rounded-lg p-5 question">
                    <div >
                        <input type="hidden" name="questions[${questionIndex}][type]" value="boolean">
                        <textarea name="questions[${questionIndex}][question]"  rows="1"
                                  class="w-full border-b-2 border-b-[#0092c2] focus:outline-none p-1 text-gray-600 resize-none scrollbar-hide px-2"
                                  oninput="autoResize(this)" placeholder="Question"></textarea>
                    </div>
                    <div class="mt-2 flex w-fit bg-white rounded-lg border border-[#0092c2]">
                        <p class="cursor-pointer hover:bg-[#0092c2] hover:text-white px-7 py-1 rounded-l-lg">Yes</p>
                        <p class="cursor-pointer hover:bg-[#0092c2] hover:text-white px-7 py-1 rounded-r-lg border-[#0092c2] border-l">No</p>
                    </div>
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

        // add a ranking question to the form
        document.getElementById('add-ranking-question').addEventListener('click', function (){
            const clone = document.createElement('div');
            clone.innerHTML =
                `<div class="grid grid-cols-1 gap-5 bg-[#E7F9FF] rounded-lg p-5 question">
                    <div >
                        <input type="hidden" name="questions[${questionIndex}][type]" value="ranking">
                        <textarea name="questions[${questionIndex}][question]"  rows="1"
                                  class="w-full border-b-2 border-b-[#0092c2] focus:outline-none p-1 text-gray-600 resize-none scrollbar-hide px-2"
                                  oninput="autoResize(this)" placeholder="Question"></textarea>
                    </div>

                    <!--  Star SVGs  -->
                    <div class="mt-2 flex items-center">

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor"
                              class="w-6 h-6 ms-3 cursor-pointer text-[#0092c2]">
                              <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z">
                              </path>
                            </svg>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor"
                              class="w-6 h-6 ms-3 cursor-pointer text-[#0092c2]">
                              <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z">
                              </path>
                            </svg>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor"
                              class="w-6 h-6 ms-3 cursor-pointer text-[#0092c2]">
                              <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z">
                              </path>
                            </svg>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor"
                              class="w-6 h-6 ms-3 cursor-pointer text-[#0092c2]">
                              <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z">
                              </path>
                            </svg>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor"
                              class="w-6 h-6 ms-3 cursor-pointer text-[#0092c2]">
                              <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z">
                              </path>
                            </svg>


                        </div>
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

        // add a mcq question to the form
        document.getElementById('add-mcq-question').addEventListener('click', function (){
            const clone = document.createElement('div');
            clone.innerHTML = `<div class="grid grid-cols-1 gap-5 bg-[#E7F9FF] rounded-lg p-5 question">
                    <div>
                        <input type="hidden" name="questions[${questionIndex}][type]" value="mcq">
                        <textarea name="questions[${questionIndex}][question]"  rows="1"
                                  class="w-full border-b-2 border-b-[#0092c2] focus:outline-none p-1 text-gray-600 resize-none scrollbar-hide px-2"
                                  oninput="autoResize(this)" placeholder="Question"></textarea>
                    </div>

                    <div class="grid gap-5 ">
                        <div id="options-box" class="flex flex-col gap-3 max-w-full">
                            <div class="w-full flex">
                                <input class="border-b border-gray-500 bg-white focus:border-b-2 focus:border-[#0092c2] focus:outline-hidden p-0.5 w-full" type="text" name="questions[${questionIndex}][options][]" placeholder="Option">

                                <button type="button" onclick="removeOption(this)" class="text-red-500 ml-2 text-[0.75rem] cursor-pointer">Delete</button>
                            </div>

                        </div>
                        <p onclick="addOption(${questionIndex})" id="add-option" class=" cursor-pointer text-white text-[0.75rem] w-fit self-baseline bg-[#0092c2] px-2 py-1 rounded-lg">Add option</p>
                    </div>

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

    //     delete a question
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

        // Add new option to the options-box
        function addOption(qNumber) {
            const option = document.createElement('div');
            option.className = 'w-full flex';
            option.innerHTML = `<div class="w-full flex">
                                    <input class="border-b border-gray-500 bg-white focus:border-b-2 focus:border-[#0092c2] focus:outline-hidden p-0.5 w-full" type="text" name="questions[${qNumber}][options][]" placeholder="Option">

                                    <button type="button" onclick="removeOption(this)" class="text-red-500 ml-2 text-[0.75rem] cursor-pointer">Delete</button>
                            </div>`;

            document.getElementById('options-box').appendChild(option);
        }

        // Delete an option
        function removeOption(button){
            button.parentElement.remove();
        }

    </script>
    </body>

</x-head>
