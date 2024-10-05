<div x-show="sidebarOpen" x-transition.opacity.duration.600ms @click="sidebarOpen = false"
     class="fixed inset-0 bg-black bg-opacity-30 z-20 "></div>
<nav x-cloak
     class="fixed inset-0 transform duration-500 z-30 w-80 bg-violet-200 text-white h-screen print:hidden"
     :class="{'translate-x-0 ease-in opacity-100':open === true, '-translate-x-full ease-out opacity-0': sidebarOpen === false}">
    <div class="flex justify-between px-5 py-3.5">
        <a href="{{route('dashboard')}}" class="flex gap-3">
            <x-assets.logo.cxlogo :icon="'dark'" class="h-10 w-auto block"/>
            <span class="font-bold text-2xl sm:text-3xl text-violet-800 tracking-widest">{{config('app.name')}}</span>
        </a>

        <button
                class="focus:outline-none focus:bg-gray-700 hover:bg-gray-200   rounded-md group"
                @click="sidebarOpen = false"
        >
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="h-7 w-7 text-gray-500 group-hover:text-violet-600"
                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </button>
    </div>

    <div class=" bg-white text-white h-full overflow-y-scroll">
        <ul class="flex flex-col "
            x-data="{selected:null}">

            <x-menu.sub.team/>

            <x-menu.sub.logout class="hover:bg-violet-600"/>

        </ul>
    </div>
</nav>
