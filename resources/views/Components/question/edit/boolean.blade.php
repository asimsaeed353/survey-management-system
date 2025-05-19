@props(['question' => 'Question'])

<div class="grid grid-cols-1 gap-5 bg-[#E7F9FF] rounded-lg p-5 question">
    <div >
        <input type="hidden" name="questions[${questionIndex}][type]" value="boolean">
        <textarea name="questions[${questionIndex}][question]"  rows="1"
                  class="w-full border-b-2 border-b-[#0092c2] focus:outline-none p-1 text-gray-600 resize-none scrollbar-hide px-2"
                  oninput="autoResize(this)" placeholder="Question">{{$question}}</textarea>
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
</div>
