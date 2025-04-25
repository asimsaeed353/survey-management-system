@props(["active" => false])

<div class="pt-2 bg-[#FFFFFF] h-full w-full rounded-xl flex flex-col items-center gap-4 ">

    <a href="/dashboard" class="p-2 text-[1.5rem] w-full text-center align-middle {{ request()->is('dashboard') ? "bg-[#B0DDEC] text-black rounded" : "text-[#7D7D7D] hover:text-black" }} ">Dashboard</a>


    <a href="/surveys" class="p-2 text-[1.5rem] w-full text-center align-middle {{ request()->is('surveys') ? "bg-[#B0DDEC] text-black rounded" : "text-[#7D7D7D] hover:text-black" }}">Surveys</a>


    </div>
