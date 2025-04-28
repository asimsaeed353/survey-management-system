
@props(['name'])

@error($name)
    <p class="text-sm text-red-500 mt-[1px]">{{ $message }}</p>
@enderror
