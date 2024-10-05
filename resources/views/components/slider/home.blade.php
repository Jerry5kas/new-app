@props([
    "list" =>null
])
<div class="relative">

    <div x-data="{
        currentSlide: 0,
        skip: 1,
        autoSlideInterval: null,

        startAutoSlide() {
            this.autoSlideInterval = setInterval(() => {
                this.next();
            }, 4500);
        },

        stopAutoSlide() {
            clearInterval(this.autoSlideInterval);
        },
        goToSlide(index) {
            let slider = this.$refs.slider;
            let offset = slider.firstElementChild.getBoundingClientRect().width;
            slider.scrollTo({ left: offset * index, behavior: 'smooth' });
        },
        next() {
            let slider = this.$refs.slider;
            let current = slider.scrollLeft;
            let offset = slider.firstElementChild.getBoundingClientRect().width;
            let maxScroll = offset * (slider.children.length );

            current + offset >= maxScroll ? slider.scrollTo({ left: 0, behavior: 'smooth' }) : slider.scrollBy({ left: offset * this.skip, behavior: 'smooth' });
        },
        prev() {
            let slider = this.$refs.slider;
            let current = slider.scrollLeft;
            let offset = slider.firstElementChild.getBoundingClientRect().width;
            let maxScroll = offset * (slider.children.length - 1);

            current <= 0 ? slider.scrollTo({ left: maxScroll, behavior: 'smooth' }) : slider.scrollBy({ left: -offset * this.skip, behavior: 'smooth' });
        },
        updateCurrentSlide() {
            let slider = this.$refs.slider;
            let offset = slider.firstElementChild.getBoundingClientRect().width;
            this.currentSlide = Math.round(slider.scrollLeft / offset);
        },
    }"

         x-init="startAutoSlide()"
         {{-- @mouseover="stopAutoSlide()" @mouseout="startAutoSlide()"--}}
         class="flex flex-col w-full">

        <!--image animation ----------------------------------------------------------------------------------->

        <div class="flex space-x-6">


            <ul x-ref="slider" @scroll="updateCurrentSlide"
                class="flex w-full md:h-screen h-52 overflow-x-hidden snap-x snap-mandatory">

                {{--                @if($list)--}}
                {{--                    @forelse($list as $row)--}}
                {{--                        <li class="flex flex-col items-center justify-center w-full md:h-screen h-80 shrink-0 snap-start relative">--}}

                {{--                            <div style="background-image: url('/../../../storage/images/{{$row->bg_image}}');"--}}
                {{--                                 class=" w-full md:h-screen h-80 bg-cover bg-no-repeat mx-auto flex-col brightness-75 flex justify-center relative">--}}
                {{--                            </div>--}}
                {{--                            <div--}}
                {{--                                class="absolute bottom-1 left-10 w-auto h-10/12 flex-col text-white font-roboto p-5 my-5  px-10">--}}

                {{--                                <div--}}
                {{--                                    class=" sm:text-6xl text-xs capitalize drop-shadow-lg">{{$row->vname}}</div>--}}
                {{--                                <div--}}
                {{--                                    class="sm:text-2xl text-xs mt-3 text-white">{{$row->description}}</div>--}}
                {{--                                <div--}}
                {{--                                    class="text-md mt-3 text-white">{{$row->created_at}}</div>--}}
                {{--                            </div>--}}
                {{--                        </li>--}}
                {{--                    @empty--}}
                <li class="flex flex-col items-center justify-center w-full sm:h-screen h-full shrink-0 snap-start relative">
                    <div style="background-image: url('/../../../images/w3.webp');"
                         class=" w-full md:h-screen h-full sm:bg-cover bg-contain bg-no-repeat mx-auto flex-col brightness-75 flex justify-center relative">
                    </div>
                    <div
                        class="absolute bottom-1 left-10 w-auto h-10/12 flex-col text-white font-roboto p-5 my-5  px-10">
                        <div
                            class="sm:text-6xl sm:capitalize sm:drop-shadow-lg">GST Billing Software Online
                            in India
                        </div>
                        <div
                            class="sm:text-2xl text-xs mt-3 text-white">
                            {{\Illuminate\Support\Str::words('Create, manage & track invoices, e-invoices, and
                            eWay bills.
                            Seamlessly generate GSTR reports and file GST instantly.
                            100% safe, reliable, and secure GST-compliant billing software.
                            Aaran for invoicing, quotations, inventory, eWay bills & more!',15)}}
                        </div>

                    </div>
                </li>
                <li class="flex flex-col items-center justify-center w-full sm:h-screen h-full shrink-0 snap-start relative">
                    <div style="background-image: url('/../../../images/wp2.webp');"
                         class=" w-full md:h-screen h-full sm:bg-cover bg-contain bg-no-repeat mx-auto flex-col brightness-75 flex justify-center relative">
                    </div>
                    <div
                        class="absolute bottom-1 left-10 w-auto h-10/12 flex-col text-white font-roboto p-5 my-5  px-10">
                        <div
                            class="sm:text-6xl sm:capitalize sm:drop-shadow-lg">Only GST Billing Software You Need For
                            Your Business
                        </div>
                        <div
                            class="sm:text-2xl text-xs mt-3 text-white">
                            {{\Illuminate\Support\Str::words('Streamline your invoicing with Refrens GST billing software:
                            effortlessly create GST-compliant invoices in minutes. Seamlessly share invoices via WhatsApp,
                            Email, PDF, and shareable links.',15)}}
                        </div>

                    </div>
                </li>
                <li class="flex flex-col items-center justify-center w-full sm:h-screen h-full shrink-0 snap-start relative">
                    <div style="background-image: url('/../../../images/wp1.webp');"
                         class=" w-full md:h-screen h-full sm:bg-cover bg-contain bg-no-repeat mx-auto flex-col brightness-75 flex justify-center relative">
                    </div>
                    <div
                        class="absolute bottom-1 left-10 w-auto h-10/12 flex-col text-white font-roboto p-5 my-5  px-10">
                        <div
                            class="sm:text-6xl sm:capitalize sm:drop-shadow-lg">Empower your business with our streamlined GST billing software
                        </div>
                        <div
                            class="sm:text-2xl text-xs mt-3 text-white">
                            {{\Illuminate\Support\Str::words('Automate payment reminders for quicker settlements. Enjoy
                            one-click IRN & QR Code generation for enhanced compliance.
                            Experience the simplicity, reliability, and security of our user-friendly platform.',15)}}
                        </div>
                    </div>
                </li>
            </ul>
        </div>

        <!-- Prev / Next Buttons ---------------------------------------------------------------------------------->

        <div class="absolute z-10 flex justify-between w-full h-full px-4">

            <!-- Prev Button -------------------------------------------------------------------------------------->
            <button x-on:click="prev" @mouseover="stopAutoSlide()" @mouseout="startAutoSlide()">
                <x-icons.icon icon="chevrons-left"
                              class="w-auto sm:h-12 h-7 block text-gray-300 hover:text-orange-500 rounded-xl hover:bg-orange-200 opacity-50 hover:opacity-100"/>
            </button>


            <!-- Next Button -------------------------------------------------------------------------------------->

            <button x-on:click="next" @mouseover="stopAutoSlide()" @mouseout="startAutoSlide()">
                <x-icons.icon icon="chevrons-right"
                              class="w-auto sm:h-12 h-7 block text-gray-300 hover:text-orange-500 rounded-xl hover:bg-orange-200 opacity-50 hover:opacity-100"/>
            </button>
        </div>

        <!-- Indicators ------------------------------------------------------------------------------------------->

        <div class="absolute z-10 w-full bottom-10 lg:bottom-12">
            <div class="flex justify-center space-x-2">
                <template x-for="(slide, index) in Array.from($refs.slider.children)" :key="index">
                    <button @click="goToSlide(index)"
                            :class="{'bg-gray-500': currentSlide === index, 'bg-bubble': currentSlide !== index}"
                            class="w-3 h-1 rounded-full lg:w-3 lg:h-3 hover:bg-orange-400 bg-gray-400 focus:outline-none"></button>
                </template>
            </div>
        </div>
    </div>


</div>



