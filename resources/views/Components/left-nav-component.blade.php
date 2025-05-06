@props(['active' => 'false'])

<div {{$attributes->merge(['class' => "flex items-center justify-start group cursor-pointer"])}}>

    {{ $icon }}

<a {{$attributes}}  class=" {{ $active ? "p-2 text-[1.5rem] w-full align-middle font-bold text-black" :  "p-2 text-[1.5rem] w-full align-middle text-[#7D7D7D] hover:text-black group-hover:text-black"}} " >{{$linkName}}</a>

</div>



