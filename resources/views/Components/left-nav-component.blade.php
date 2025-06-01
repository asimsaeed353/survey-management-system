@props(['active' => 'false'])

<div {{$attributes->merge(['class' => "flex items-center justify-start group cursor-pointer"])}}>

    {{ $icon }}

<a {{$attributes}}  class=" {{ $active ? "p-2 text-[1.5rem] w-full align-middle font-bold text-white" :  "p-2 text-[1.5rem] w-full align-middle text-gray-300 hover:text-white group-hover:text-white"}} " >{{$linkName}}</a>

</div>



