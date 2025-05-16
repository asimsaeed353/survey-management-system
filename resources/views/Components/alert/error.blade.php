<div id="error-message" class="message flex items-center p-2 text-sm text-red-900 rounded-lg bg-red-200 border border-red-300" role="alert">
    <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
    </svg>
    <span class="sr-only">Info</span>
    <div>
        <span class="font-medium">{{ $message }}</span>
    </div>
</div>

{{--<script>--}}
{{--    setTimeout(function () {--}}
{{--        const message = document.getElementById('error-message');--}}
{{--        if (message) {--}}
{{--            // Fade out for smoother effect--}}
{{--            message.style.transition = 'opacity 0.5s';--}}
{{--            message.style.opacity = '0';--}}
{{--            setTimeout(() => {--}}
{{--                message.remove(); // Remove from DOM after fading--}}
{{--            }, 500); // Match transition duration--}}
{{--        }--}}
{{--    }, 5000); // 5000ms = 5 seconds (adjust to 10000 for 10 seconds)--}}
{{--</script>--}}
