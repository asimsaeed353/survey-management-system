@php use Illuminate\Support\Str; @endphp
<x-head>
    <style>
        /* Hide radio buttons and style stars */
        .star-rating input[type="radio"] {
            display: none;
        }
        .star-rating label {
            font-size: 1.5rem;
            color: #d1d5db; /* gray-300 */
            cursor: pointer;
        }
        .star-rating input[type="radio"]:checked ~ label,
        .star-rating label:hover,
        .star-rating label:hover ~ label {
            color: #0092c2; /* yellow-500 for selected/hovered stars */
        }
        .star-rating input[type="radio"]:checked + label {
            color: #0092c2;
        }
    </style>
    <x-survey.layout>
        <x-survey.name>{{ $survey->name }}</x-survey.name>

        @if($survey['description'])
            <x-survey.description>
                {{$survey['description']}}
            </x-survey.description>
        @endif


        <!-- Your form or content here -->
        <form action="/survey/published/{{ $survey->_id }}-{{ Str::slug($survey->name) }}" method="POST"
              class="py-5 grid grid-cols-1 gap-5">
            @csrf

            <input type="hidden" name="session_id" value="{{$sessionId}}">
            <input type="hidden" name="survey_id" id="survey_id" value="{{ (string) $survey->_id}}">
            {{--             Survey Questions--}}
            <div class="grid grid-cols-1 gap-6 w-full my-2 scroll-smooth">

                {{-- Participant's email--}}
                <div class="p-5 rounded-lg border border-[#0092c2] shadow-md bg-white mb-3">
                    <label class="font-bold text-[1rem]">Email</label>
                    <input id="email" type="email"
                           name="email" class="mt-2 mb-1 w-full border border-[#0092c2]/35 p-2 rounded-lg bg-gray-100 outline-[#0092c2] focus:outline-[2px] focus:border-transparent" value="{{ old('email') }}" required pattern="^[^@\s]+@[^@\s]+\.[^@\s]+$"
                           title="Please enter a valid email address (must include @ and a dot domain)"
                           placeholder="example@domain.com" oninput="debouncedCheckEmail(this)">
{{--                    <label for="email" class="font-bold text-lg">Email</label>--}}
{{--                    <input id="email" type="email" class="w-full border p-2 rounded-lg mt-2"--}}
{{--                           placeholder="Enter email" oninput="debouncedCheckEmail(this)">--}}
                    <p id="email-feedback" class="text-sm mt-2"></p>

                    @error('email')
                        <p class="text-sm text-red-500 mt-[1px] mt-1">{{ $message }}</p>
                    @enderror
                </div>


                @foreach($survey->questions()->get() as $qKey => $question)
                    <div class="grid grid-col-1 gap-4 p-5 rounded-lg border border-[#0092c2] shadow-md bg-white">
                        {{--                         Survey Question--}}
                        <div class="grid grid-cols-1 gap-1 ">
                            <h2 class="text-[1.25rem]">
                                {{$qKey + 1}}.
                                <pre class="whitespace-pre-wrap font-sans text-[1.25rem] inline">{{ $question->question }}</pre>
                            </h2>
                            <input type="hidden" name="responses[{{$qKey}}][question_id]" value="{{$question->id}}" >
                        </div>

                        {{--                     Short Question--}}
                        @if($question->type === 'short')
                            <input type="text"
                                   name="responses[{{$qKey}}][response]" class="w-full border border-[#0092c2]/35 p-2 rounded-lg bg-gray-100 outline-[#0092c2] focus:outline-[2px] focus:border-transparent"
                                   placeholder="Enter your answer" required value="{{ old('responses.' . $qKey . '.response') }}">


                        @elseif($question->type === 'long')
                            <textarea name="responses[{{$qKey}}][response]" rows="3"
                                      class="w-full border border-[#0092c2]/35 p-2 rounded-lg bg-gray-100 outline-[#0092c2] focus:outline-[2px] focus:border-transparent"
                                      oninput="autoResize(this)" placeholder="Enter your answer" required></textarea>

                        @elseif($question->type === 'boolean')

                            <label class="bg-[#0092c2]/10 border border-[#0092c2]/50 p-2 rounded-lg">
                                <input type="radio" name="responses[{{$qKey}}][response]"  value="true" class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2 mr-1" required> Yes
                            </label>
                            <label class="bg-[#0092c2]/10 border border-[#0092c2]/50 p-2 rounded-lg">
                                <input type="radio" name="responses[{{$qKey}}][response]"  value="false" class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2 mr-1" required> No
                            </label>


                        @elseif($question->type === 'mcq')
                            @foreach($question->options()->get() ?? [] as $key => $option)
                                <label class="bg-[#0092c2]/10 border border-[#0092c2]/50 p-2 rounded-lg">
                                    <input type="checkbox" name="responses[{{$qKey}}][response][]" value="{{$option->option}}" class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 focus:ring-2 mr-1">
                                    <span>{{$option->option}}</span>
                                </label>
                            @endforeach


                        @elseif ($question->type === 'ranking')
                            <div class="star-rating flex flex-row-reverse mr-auto">
                                @for ($i = 5; $i >= 1; $i--)
                                    <input
                                        type="radio"
                                        id="star-{{ $qKey }}-{{ $i }}"
                                        name="responses[{{$qKey}}][response]"
                                        value="{{ $i }}"
                                        required
                                    >
                                    <label for="star-{{ $qKey }}-{{ $i }}" class="mx-1">★</label>
                                @endfor
                            </div>

                        @endif

                    </div>
                @endforeach

            </div>


            {{--        Submit--}}
            <div class="flex items-center justify-between mt-5">
                <p class="text-red-500 text-[0.875rem]">* You need to answer all the questions to submit your response.</p>
                <x-form-button type="submit" id="submit-button" class="max-w-fit ml-auto px-2 rounded-lg py-1 cursor-pointer" disabled>Complete
                    Survey
                </x-form-button>
{{--                <button id="submit-button" type="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded opacity-50" disabled>Submit</button>--}}
            </div>

        </form>
    </x-survey.layout>

    <script>
        // Debounce function to limit AJAX calls
        function debounce(func, wait) {
            let timeout;
            return function (...args) {
                clearTimeout(timeout);
                timeout = setTimeout(() => func.apply(this, args), wait);
            };
        }

        // Check email existence for specific survey
        function checkEmailExists(input) {
            const email = input.value;
            const surveyId = document.getElementById('survey_id').value;
            const feedbackDiv = document.getElementById('email-feedback');
            const submitButton = document.getElementById('submit-button');

            // Clear previous feedback and disable button
            feedbackDiv.textContent = '';
            if (submitButton) {
                submitButton.disabled = true;
                submitButton.classList.add('opacity-50');
            }

            // Validate email format
            if (!email || !/^[^\s@]+@[^\s@]+\.[^@\s]+$/.test(email)) {
                feedbackDiv.textContent = 'Valid email type: \'test@example.com\'.';
                feedbackDiv.className = 'text-sm mt-2 text-gray-500';
                return;
            }

            // Send AJAX request
            fetch('/check-email', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ email, survey_id: surveyId })
            })
                .then(response => {
                    if (!response.ok) throw new Error('Network error');
                    return response.json();
                })
                .then(data => {
                    feedbackDiv.textContent = data.message || 'No response from server.';
                    feedbackDiv.className = 'text-sm mt-2 ' + (data.exists ? 'text-red-500' : 'text-green-500');
                    if (submitButton) {
                        submitButton.disabled = data.exists;
                        submitButton.classList.toggle('opacity-50', data.exists);
                    }
                })
                .catch(error => {
                    feedbackDiv.textContent = 'Error checking email.';
                    feedbackDiv.className = 'text-sm mt-2 text-red-500';
                    if (submitButton) {
                        submitButton.disabled = true;
                        submitButton.classList.add('opacity-50');
                    }
                });
        }

        // Debounce the email check (300ms delay)
        const debouncedCheckEmail = debounce(checkEmailExists, 300);
    </script>

</x-head>

