<div>
    <x-slot name="header">Elements</x-slot>

    <x-corousels.carousel-auto class="sm:min-h-[80svh] h-72"/>
    <x-web.uielements.color-palette/>
    <x-web.uielements.buttons/>
    <x-web.uielements.cards/>
    <x-web.uielements.extra/>
    <x-web.uielements.form/>
    {{--    <x-accordion-single.accordion/>--}}

    {{--    <div class="w-full h-96  px-16">--}}
    {{--        <div>--}}
    {{--            <label for="">Elements</label>--}}
    {{--            <x-combobox.search/>--}}
    {{--        </div>--}}
    {{--        <div class="w-1/3 mx-auto space-y-4">--}}

    {{--            <x-input.floating label="Name"/>--}}

    {{--        </div>--}}
    {{--        <x-radio.btn label="Receipt"/>--}}
    {{--        <x-radio.btn label="Payment"/>--}}

    {{--        <x-dropdown.click/>--}}
    {{--    </div>--}}


    {{--    <form class="max-w-sm mx-auto">--}}
    {{--        <label for="countries_multiple" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an--}}
    {{--            option</label>--}}
    {{--        <select multiple id="countries_multiple"--}}
    {{--                class="max-h-44 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500--}}
    {{--                 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600--}}
    {{--                 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">--}}
    {{--            <option selected>Choose countries</option>--}}
    {{--            <option value="US">United States</option>--}}
    {{--            <option value="CA">Canada</option>--}}
    {{--            <option value="FR">France</option>--}}
    {{--            <option value="DE">Germany</option>--}}
    {{--            <option value="CA">Canada</option>--}}
    {{--            <option value="FR">France</option>--}}
    {{--            <option value="DE">Germany</option>--}}
    {{--            <option value="CA">Canada</option>--}}
    {{--            <option value="FR">France</option>--}}
    {{--            <option value="DE">Germany</option>--}}
    {{--            <option value="CA">Canada</option>--}}
    {{--            <option value="FR">France</option>--}}
    {{--            <option value="DE">Germany</option>--}}
    {{--            <option value="CA">Canada</option>--}}
    {{--            <option value="FR">France</option>--}}
    {{--            <option value="DE">Germany</option>--}}
    {{--        </select>--}}
    {{--    </form>--}}

    <x-forms.m-panel>
        <div class="w-full h-96 flex flex-wrap items-center justify-evenly gap-6">
            <button
                class="tab-button sm:px-6 px-4 sm:py-[10px] py-[6px] relative rounded group overflow-hidden font-medium bg-gradient-to-r from-red-600 to-red-400 inline-block text-center">
                <span
                    class="absolute top-0 left-0 flex h-full w-0 mr-0 transition-all
                    duration-500 ease-out transform translate-x-0 group-hover:w-full opacity-90 bg-gradient-to-r from-red-400 to-red-600"></span>
                <span class="relative group-hover:hidden text-white sm:text-lg text-sm">
               Delete
            </span>
                <span
                    class="relative hidden group-hover:block group-hover:text-white sm:px-[14.5px] px-[8.5px] sm:py-[2px] py-[0]">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                  <path fill-rule="evenodd"
                        d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z"
                        clip-rule="evenodd"/>
                </svg>
            </span>
            </button>

            <button
                class="tab-button sm:px-6 px-4 sm:py-[10px] py-[6px] relative rounded group overflow-hidden font-medium bg-gradient-to-r from-green-600 to-green-400 inline-block text-center">
                <span
                    class="absolute top-0 left-0 flex h-full w-0 mr-0 transition-all
                    duration-500 ease-out transform translate-x-0 group-hover:w-full opacity-90 bg-gradient-to-r from-green-400 to-green-600"></span>
                <span class="relative group-hover:hidden text-white sm:text-lg text-sm">
               New
            </span>
                <span
                    class="relative hidden group-hover:block group-hover:text-white sm:px-[7px] px-[3px] sm:py-[2px] py-[0]">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                     class="size-6">
                    <path fill-rule="evenodd"
                          d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z"
                          clip-rule="evenodd"/>
                    </svg>
            </span>
            </button>

            <button
                class="tab-button sm:px-6 px-4 sm:py-[10px] py-[6px] relative rounded group overflow-hidden font-medium bg-gradient-to-r from-emerald-600 to-emerald-400 inline-block text-center">
                <span
                    class="absolute top-0 left-0 flex h-full w-0 mr-0 transition-all
                    duration-500 ease-out transform translate-x-0 group-hover:w-full opacity-90 bg-gradient-to-r from-emerald-400 to-emerald-600"></span>
                <span class="relative group-hover:hidden text-white sm:text-lg text-sm">
               Save
            </span>
                <span
                    class="relative hidden group-hover:block group-hover:text-white sm:px-[7.5px] px-[3.5px] sm:py-[2px] py-[0]">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                  <path fill-rule="evenodd"
                        d="M9 1.5H5.625c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0 0 16.5 9h-1.875a1.875 1.875 0 0 1-1.875-1.875V5.25A3.75 3.75 0 0 0 9 1.5Zm6.61 10.936a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 14.47a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                        clip-rule="evenodd"/>
                  <path
                      d="M12.971 1.816A5.23 5.23 0 0 1 14.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 0 1 3.434 1.279 9.768 9.768 0 0 0-6.963-6.963Z"/>
                </svg>
            </span>

            </button>

            <button
                class="tab-button sm:px-6 px-4 sm:py-[10px] py-[6px] relative rounded group overflow-hidden font-medium bg-gradient-to-r from-blue-600 to-blue-400 inline-block text-center">
                <span
                    class="absolute top-0 left-0 flex h-full w-0 mr-0 transition-all
                    duration-500 ease-out transform translate-x-0 group-hover:w-full opacity-90 bg-gradient-to-r from-blue-400 to-blue-600"></span>
                <span class="relative group-hover:hidden text-white sm:text-lg text-sm">
               Back
            </span>
                <span
                    class="relative hidden group-hover:block group-hover:text-white sm:px-[7.5px] px-[3px] sm:py-[2px] py-[0]">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                  <path
                      d="M9.195 18.44c1.25.714 2.805-.189 2.805-1.629v-2.34l6.945 3.968c1.25.715 2.805-.188 2.805-1.628V8.69c0-1.44-1.555-2.343-2.805-1.628L12 11.029v-2.34c0-1.44-1.555-2.343-2.805-1.628l-7.108 4.061c-1.26.72-1.26 2.536 0 3.256l7.108 4.061Z"/>
                </svg>
            </span>

            </button>

            <button
                class="tab-button sm:px-6 px-4 sm:py-[10px] py-[6px] relative rounded group overflow-hidden font-medium bg-gradient-to-r from-gray-600 to-gray-400 inline-block text-center">
                <span
                    class="absolute top-0 left-0 flex h-full w-0 mr-0 transition-all
                    duration-500 ease-out transform translate-x-0 group-hover:w-full opacity-90 bg-gradient-to-r from-gray-400 to-gray-600"></span>
                <span class="relative group-hover:hidden text-white sm:text-lg text-sm">
               Cancel
            </span>
                <span
                    class="relative hidden group-hover:block group-hover:text-white sm:px-[16px] px-[10px] sm:py-[2px] py-[0]">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                  <path fill-rule="evenodd"
                        d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z"
                        clip-rule="evenodd"/>
                </svg>
            </span>

            </button>

            <button
                class="tab-button sm:px-6 px-4 sm:py-[10px] py-[6px] relative rounded group overflow-hidden font-medium bg-gradient-to-r from-purple-600 to-purple-400 inline-block text-center">
                <span
                    class="absolute top-0 left-0 flex h-full w-0 mr-0 transition-all
                    duration-500 ease-out transform translate-x-0 group-hover:w-full opacity-90 bg-gradient-to-r from-purple-400 to-purple-600"></span>
                <span class="relative group-hover:hidden text-white sm:text-lg text-sm">
               Print
            </span>
                <span
                    class="relative hidden group-hover:block group-hover:text-white sm:px-[7px] px-[3px] sm:py-[2px] py-[0]">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                  <path fill-rule="evenodd"
                        d="M7.875 1.5C6.839 1.5 6 2.34 6 3.375v2.99c-.426.053-.851.11-1.274.174-1.454.218-2.476 1.483-2.476 2.917v6.294a3 3 0 0 0 3 3h.27l-.155 1.705A1.875 1.875 0 0 0 7.232 22.5h9.536a1.875 1.875 0 0 0 1.867-2.045l-.155-1.705h.27a3 3 0 0 0 3-3V9.456c0-1.434-1.022-2.7-2.476-2.917A48.716 48.716 0 0 0 18 6.366V3.375c0-1.036-.84-1.875-1.875-1.875h-8.25ZM16.5 6.205v-2.83A.375.375 0 0 0 16.125 3h-8.25a.375.375 0 0 0-.375.375v2.83a49.353 49.353 0 0 1 9 0Zm-.217 8.265c.178.018.317.16.333.337l.526 5.784a.375.375 0 0 1-.374.409H7.232a.375.375 0 0 1-.374-.409l.526-5.784a.373.373 0 0 1 .333-.337 41.741 41.741 0 0 1 8.566 0Zm.967-3.97a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H18a.75.75 0 0 1-.75-.75V10.5ZM15 9.75a.75.75 0 0 0-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 0 0 .75-.75V10.5a.75.75 0 0 0-.75-.75H15Z"
                        clip-rule="evenodd"/>
                </svg>
            </span>
            </button>

            <button
                class="tab-button sm:px-6 px-4 sm:py-[10px] py-[6px] relative rounded group overflow-hidden font-medium bg-gradient-to-r from-teal-600 to-teal-400 inline-block text-center">
                <span
                    class="absolute top-0 left-0 flex h-full w-0 mr-0 transition-all
                    duration-500 ease-out transform translate-x-0 group-hover:w-full opacity-90 bg-gradient-to-r from-teal-400 to-teal-600"></span>
                <span class="relative group-hover:hidden text-white sm:text-lg text-sm">
               Generate-E-Way
            </span>
                <span
                    class="relative hidden group-hover:block group-hover:text-white sm:px-[56.5px] px-[41px] sm:py-[2px] py-[0]">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                  <path
                      d="M3.375 4.5C2.339 4.5 1.5 5.34 1.5 6.375V13.5h12V6.375c0-1.036-.84-1.875-1.875-1.875h-8.25ZM13.5 15h-12v2.625c0 1.035.84 1.875 1.875 1.875h.375a3 3 0 1 1 6 0h3a.75.75 0 0 0 .75-.75V15Z"/>
                  <path
                      d="M8.25 19.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0ZM15.75 6.75a.75.75 0 0 0-.75.75v11.25c0 .087.015.17.042.248a3 3 0 0 1 5.958.464c.853-.175 1.522-.935 1.464-1.883a18.659 18.659 0 0 0-3.732-10.104 1.837 1.837 0 0 0-1.47-.725H15.75Z"/>
                  <path d="M19.5 19.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z"/>
                </svg>
            </span>
            </button>

            <button
                class="tab-button sm:px-6 px-4 sm:py-[10px] py-[6px] relative rounded group overflow-hidden font-medium bg-gradient-to-r from-teal-600 to-teal-400 inline-block text-center">
                <span
                    class="absolute top-0 left-0 flex h-full w-0 mr-0 transition-all
                    duration-500 ease-out transform translate-x-0 group-hover:w-full opacity-90 bg-gradient-to-r from-teal-400 to-teal-600"></span>
                <span class="relative group-hover:hidden text-white sm:text-lg text-sm">
               Generate-E-Invoice
            </span>
                <span
                    class="relative hidden group-hover:block group-hover:text-white sm:px-[68px] px-[49px] sm:py-[2px] py-[0]">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                  <path fill-rule="evenodd"
                        d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0 0 16.5 9h-1.875a1.875 1.875 0 0 1-1.875-1.875V5.25A3.75 3.75 0 0 0 9 1.5H5.625ZM7.5 15a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5h-7.5A.75.75 0 0 1 7.5 15Zm.75 2.25a.75.75 0 0 0 0 1.5H12a.75.75 0 0 0 0-1.5H8.25Z"
                        clip-rule="evenodd"/>
                  <path
                      d="M12.971 1.816A5.23 5.23 0 0 1 14.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 0 1 3.434 1.279 9.768 9.768 0 0 0-6.963-6.963Z"/>
                </svg>
            </span>
            </button>

            <button
                class="tab-button sm:px-6 px-4 sm:py-[10px] py-[6px] relative rounded group overflow-hidden font-medium bg-gradient-to-r from-red-600 to-red-400 inline-block text-center">
                <span
                    class="absolute top-0 left-0 flex h-full w-0 mr-0 transition-all
                    duration-500 ease-out transform translate-x-0 group-hover:w-full opacity-90 bg-gradient-to-r from-red-400 to-red-600"></span>
                <span class="relative group-hover:hidden text-white sm:text-lg text-sm">
               Cancel-Generate
            </span>
                <span
                    class="relative hidden group-hover:block group-hover:text-white sm:px-[57.5px] px-[42px] sm:py-[2px] py-[0]">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                  <path
                      d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375Z"/>
                  <path fill-rule="evenodd"
                        d="m3.087 9 .54 9.176A3 3 0 0 0 6.62 21h10.757a3 3 0 0 0 2.995-2.824L20.913 9H3.087Zm6.133 2.845a.75.75 0 0 1 1.06 0l1.72 1.72 1.72-1.72a.75.75 0 1 1 1.06 1.06l-1.72 1.72 1.72 1.72a.75.75 0 1 1-1.06 1.06L12 15.685l-1.72 1.72a.75.75 0 1 1-1.06-1.06l1.72-1.72-1.72-1.72a.75.75 0 0 1 0-1.06Z"
                        clip-rule="evenodd"/>
                </svg>
            </span>
            </button>

            <x-button.new-x/>
            <x-button.danger-x/>
            <x-button.save-x/>
            <x-button.back-x/>
            <x-button.cancel-x/>
            <x-button.print-x/>
            <x-button.e-invoice-x/>
            <x-button.e-way-x/>
            <x-button.e-cancel-x/>
        </div>
    </x-forms.m-panel>
</div>
