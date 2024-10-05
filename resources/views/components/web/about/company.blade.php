<div
    class=" grid sm:grid-cols-2 grid-cols-1 sm:gap-16 sm:h-[48rem] h-auto sm:py-28 py-12 font-roboto tracking-wider sm:px-16 px-2">
    <div class="flex justify-center">
        <div class="relative sm:w-[40rem] sm:h-[33rem] w-auto flex sm:justify-center justify-start group">
            <div class="sm:w-72 sm:h-72 w-36 h-36 rounded-full border-2 border-dashed border-blue-600 absolute z-0 top-7 sm:left-10 -right-8
                sm:group-hover:translate-x-28 group-hover:-translate-x-8 sm:group-hover:translate-y-10 group-hover:translate-y-2
                transition-all duration-300 ease-linear"></div>
            <img src="../../../../images/about-img-2.jpg" alt=""
                 class="w-auto z-10 sm:h-[400px]  h-52 animate__animated wow animate__backInLeft"
                 data-wow-duration="3s">
            <img src="../../../../images/about-img-3.jpg" alt=""
                 class="absolute z-20 sm:bottom-0 -bottom-6 sm:right-0 -right-6 w-auto  sm:h-80 h-32 sm:border-t-8 border-t-2 sm:border-l-8 border-l-2 border-black animate__animated wow animate__backInLeft"
                 data-wow-duration="3s">
        </div>
    </div>
    <div class=" flex-col flex sm:gap-y-8 gap-y-6 sm:py-8 pt-12">
        {{--        <div class="flex items-center gap-x-3">--}}
        {{--            <span class="h-2 px-4 bg-gradient-to-r from-white to-[#ff7233] ">&nbsp;</span>--}}
        {{--            <span class="text-[#ff7233] text-sm font-semibold animate__animated wow bounceInDown"--}}
        {{--                  data-wow-duration="3s">ABOUT OUR COMPANY</span>--}}
        {{--            <span class="sm:h-2 sm:px-4 sm:bg-gradient-to-r sm:from-[#ff7233] sm:to-white">&nbsp;</span>--}}
        {{--        </div>--}}
        <x-web.Home.items.heading label="ABOUT OUR COMPANY"/>
        <div class="sm:text-5xl text-xl font-semibold animate__animated wow animate__backInRight"
             data-wow-duration="3s">We
            Design and develop Outstanding Digital products and digital - first
            Brands
        </div>
        <div class="text-sm text-gray-600 animate__animated wow animate__backInRight" data-wow-duration="3s">
            Lorem
            ipsum dolor sit amet, consectetur adipisicing elit. Animi earum
            eius, est eveniet maiores minima
            molestiae neque nostrum nulla obcaecati quidem recusandae reprehenderit tempore temporibus voluptate.
            Asperiores magni minima nihil!
        </div>
        <div class="grid sm:grid-cols-2 grid-cols-1 sm:gap-1 gap-y-3">
            <div class="inline-flex items-center gap-x-2 animate__animated wow bounceInDown" data-wow-duration="3s">
                <x-web.about.icons.icon1/>
                <span class="sm:text-lg text-xs">Professional Creative Team Members</span>
            </div>
            <div class="inline-flex items-center gap-x-2 animate__animated wow bounceInDown" data-wow-duration="3s">
                <x-web.about.icons.icon2/>
                <span class="sm:text-lg text-xs">Provide Market Standard Service for Client's</span>
            </div>
        </div>
        <x-button.animate1>Get Started</x-button.animate1>
    </div>
</div>
