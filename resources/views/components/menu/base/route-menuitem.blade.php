@props(['routes','label'])

<li class="bg-gray-100 ">
    <a {{$attributes}}
       class="relative flex flex-row items-center h-12 focus:outline-none hover:bg-violet-500
                                   text-gray-500 hover:text-gray-200  hover:border-white pr-6 pl-6 group">
        <x-icons.icon-fill iconfill="list-menu" class="w-4 h-auto block fill-gray-400 group-hover:fill-white"/>
        <span
            class="ml-2 font-semibold text-sm tracking-wide truncate font-sans">
            {{\Livewire\str($label)->ucfirst()}}
        </span>
    </a>
</li>
