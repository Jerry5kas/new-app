@props([
    'border' => null,
    'bg_color' => null,
    'title' => null,
    'desc' => null,
])

{{--
    border-[#66C25F]
    bg-[#66C25F]
--}}

<div class="sm:h-96 flex-col">
    <div class="relative inline-flex items-center justify-center group">
        <span
            class="z-10 absolute bottom-6 right-12 group-hover:translate-x-11 group-hover:translate-y-3 duration-700 transition-all ease-in-out">
               <div class="w-[135px] h-[135px] rounded-full border-2 {{$border}}"></div>
        </span>
        <span
            class="z-20 {{$bg_color}} w-40 h-40 rounded-full flex justify-center items-center cursor-pointer">
                      {{$slot}}
       </span>
    </div>
    <div class="text-2xl font-semibold py-4">{{$title}}</div>
    <div class="text-gray-600 text-sm">{{$desc}}
    </div>
</div>
