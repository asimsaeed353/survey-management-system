<x-head>
    <x-survey.layout>
        <img src="{{ asset('images/published.png') }}" class="max-h-[400px] mx-auto mb-10 rounded-lg" alt="survey published image">
        <h1 class="text-4xl font-bold text-gray-800 text-center">Your Survey is published!!</h1>
        <div class="mt-5 mb-10 text-center text-wrap break-words">
            <span class="">Survey URL:</span>
            {{--                <p class="text-[0.65rem] lg:text-[1rem] text-[#0092c2] mx-auto ">--}}
            {{--                    {{$survey->publicPath()}}--}}
            {{--                </p>--}}
            <span class="text-[0.875rem] text-[#0092c2] mr-2" id="link">{{$survey->publicPath()}}</span>
            <div class="inline copy-element">
                <button class="cursor-pointer" id="btn">

                    <svg class="inline" id="default-message" xmlns="http://www.w3.org/2000/svg" height="14" width="12.25" viewBox="0 0 448 512"><path fill="#0092c2" d="M384 336l-192 0c-8.8 0-16-7.2-16-16l0-256c0-8.8 7.2-16 16-16l140.1 0L400 115.9 400 320c0 8.8-7.2 16-16 16zM192 384l192 0c35.3 0 64-28.7 64-64l0-204.1c0-12.7-5.1-24.9-14.1-33.9L366.1 14.1c-9-9-21.2-14.1-33.9-14.1L192 0c-35.3 0-64 28.7-64 64l0 256c0 35.3 28.7 64 64 64zM64 128c-35.3 0-64 28.7-64 64L0 448c0 35.3 28.7 64 64 64l192 0c35.3 0 64-28.7 64-64l0-32-48 0 0 32c0 8.8-7.2 16-16 16L64 464c-8.8 0-16-7.2-16-16l0-256c0-8.8 7.2-16 16-16l32 0 0-48-32 0z"/></svg>

                    <span class="hidden" id="success-message">
                        <svg class="inline" xmlns="http://www.w3.org/2000/svg" height="14" width="12.25" viewBox="0 0 448 512"><path fill="#0092c2" d="M208 0L332.1 0c12.7 0 24.9 5.1 33.9 14.1l67.9 67.9c9 9 14.1 21.2 14.1 33.9L448 336c0 26.5-21.5 48-48 48l-192 0c-26.5 0-48-21.5-48-48l0-288c0-26.5 21.5-48 48-48zM48 128l80 0 0 64-64 0 0 256 192 0 0-32 64 0 0 48c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 176c0-26.5 21.5-48 48-48z"/></svg>
                            <span class="text-[0.65rem] text-[#0092c2] font-bold ml-0.5">Copied!!</span>
                    </span>
                </button>
            </div>

            <script type="text/javascript">
                var copyButton = document.getElementById('btn');
                copyButton.addEventListener('click', function (){
                    var copyLink = document.getElementById('link');
                    navigator.clipboard.writeText(copyLink.textContent).then(() => {
                        var successSvg = document.getElementById('success-message');
                        var defaultSvg = document.getElementById('default-message');
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
        {{--            <x-button href="/surveys" class="mt-3 max-w-fit px-2 py-1 cursor-pointer">--}}
        {{--                All Surveys--}}
        {{--            </x-button>--}}
        <a href="/surveys" class="text-gray-600"><< Go to survey page</a>
    </x-survey.layout>
</x-head>

