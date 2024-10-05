<div class="">
    <x-slot name="header">Tree View</x-slot>

    <div
        class="h-[45rem] flex w-full justify-center  rounded-md shadow-md shadow-gray-300 border-t-2 border-blue-600">
        <div class="w-4/12 flex-col flex justify-start px-5">

            <div class="w-full my-12 flex ">
                <x-input.search-bar label="Search here...."/>
            </div>

            <div class="w-full h-8 bg-green-600 flex text-white text-sm justify-evenly items-center font-semibold">
                <div>ID : USER001</div>
                <div>NAME : USERName1</div>
            </div>
            <div class="h-[25rem]  overflow-y-auto">
                <x-table.form>
                    <x-slot:table_header name="table_header" class="bg-green-100">

                        <x-table.header-serial width="20%"/>

                        <x-table.header-text sortIcon="none">
                            Members
                        </x-table.header-text>

                        <x-table.header-text sortIcon="none">
                            Member ID
                        </x-table.header-text>

                        <x-table.header-text sortIcon="none">
                            Node
                        </x-table.header-text>


                        <x-table.header-text width="20%" sortIcon="none">
                            Amount
                        </x-table.header-text>


                    </x-slot:table_header>

                    <!-- Table Body ------------------------------------------------------------------------------------------->

                    <x-slot:table_body name="table_body">
                        @for($i=0; $i<=15; $i++)
                            <x-table.row>
                                <x-table.cell-text>1</x-table.cell-text>
                                <x-table.cell-text>USER0002</x-table.cell-text>
                                <x-table.cell-text>USERName2</x-table.cell-text>
                                <x-table.cell-text>L</x-table.cell-text>
                                <x-table.cell-text>1500</x-table.cell-text>
                            </x-table.row>
                        @endfor

                    </x-slot:table_body>
                </x-table.form>

            </div>
            <div class="w-full h-8 bg-blue-600 flex text-white text-sm justify-evenly items-center font-semibold">
                <div class="w-[80%] text-center">Total</div>
                <div class="w-[20%] text-center">50000</div>
            </div>
        </div>
        <div class="w-8/12 flex-col flex justify-center items-center bg-slate-50 rounded-md">
            <div class="flex-col flex justify-center items-center">
                <x-livewire.network.items.user-card/>
                <x-livewire.network.items.leaf-1/>
            </div>
            <div class="flex">
                <div class="w-72 flex justify-center items-center">
                    <x-livewire.network.items.user-card/>
                </div>
                <div class="w-72 flex justify-center items-center">
                    <x-livewire.network.items.new-user-card/>
                </div>
            </div>
            <div class="w-[864px] flex justify-between">
                <div class=" flex-col flex justify-center items-end">
                    <x-livewire.network.items.leaf-left/>
                </div>
                <div class="flex-col flex justify-center items-start">
                    <x-livewire.network.items.leaf-right/>
                </div>
            </div>
            <div class="flex">
                <div class="w-72 flex justify-center items-center">
                    <x-livewire.network.items.new-user-card/>
                </div>
                <div class="w-72 flex justify-center items-center">
                    <x-livewire.network.items.user-card/>
                </div>
                <div class="w-72 flex justify-center items-center">
                    <x-livewire.network.items.new-user-card/>
                </div>
                <div class="w-72 flex justify-center items-center">
                    <x-livewire.network.items.new-user-card/>
                </div>
            </div>
        </div>
    </div>
</div>
