<html lang="en">
<head>
    <title>Invoice</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white-100 p-10">
<!------Top Company Area------------------------------------------------------------------------------------------>
<div class="flex flex-row  justify-evenly p-2">
    <div class="flex justify-center items-center">
        <img src="{{ public_path('/storage/images/'.$cmp->get('logo'))}}" alt="company logo" class="w-[120px]"/>
    </div>
    <div class="w-full flex flex-col items-center justify-center">
        <h1 class="text-2xl font-bold tracking-wider  uppercase">{{$cmp->get('company_name')}}</h1>
        <p class="text-xs">{{$cmp->get('address_1')}},{{$cmp->get('address_2')}}, {{$cmp->get('city')}}</p>
        <p class="text-xs">{{$cmp->get('contact')}} - {{$cmp->get('email')}}</p>
        <p class="text-xs">{{$cmp->get('gstin')}}</p>
    </div>
    <div>
    </div>
</div>

<div class="w-full border-b border-gray-300 my-2">&nbsp;</div>

<div class="flex p-2">
    <div>
        <span class="text-xl">M/s.{{$contact->vname}}</span>
        <p class="text-xs">{{$billing_address->get('address_1')}}</p>
        <p class="text-xs">{{$billing_address->get('address_2')}}</p>
        <p class="text-xs">{{$billing_address->get('address_3')}}</p>
        <p class="text-xs">GST IN : {{$contact->gstin}}</p>
    </div>
</div>
<x-table.form>
    <x-slot:table_header name="table_header">
        <x-table.header-serial width="20%"/>
        <x-table.header-text center :sort-icon="'none'">Type</x-table.header-text>
        <x-table.header-text left :sort-icon="'none'">Particulars</x-table.header-text>
        <x-table.header-text :sort-icon="'none'">Invoice Amount</x-table.header-text>
        <x-table.header-text :sort-icon="'none'">Payment Amount</x-table.header-text>
        <x-table.header-text :sort-icon="'none'">Balance</x-table.header-text>
    </x-slot:table_header>


    <x-slot:table_body name="table_body">

        @php
            $totalPurchase = 0+$opening_balance;
            $totalPayment = 0;
        @endphp
        <x-table.row>
            @if($party !=null)

                <x-table.cell-text colspan="3">
                    <div class="text-right font-bold">
                        Opening Balance
                    </div>
                </x-table.cell-text>

                <x-table.cell-text colspan="1">
                    <div class="text-right font-bold">
                        {{ $opening_balance}}
                    </div>
                </x-table.cell-text>
                <x-table.cell-text colspan="1">
                </x-table.cell-text>
                <x-table.cell-text colspan="1">
                    {{$opening_balance}}
                </x-table.cell-text>
            @endif
        </x-table.row>

        @forelse ($list as $index =>  $row)

            @php
                $totalPurchase += floatval($row->grand_total);
                $totalPayment += floatval($row->transaction_amount);
            @endphp

            <x-table.row>
                <x-table.cell-text center>
                    {{ $index + 1 }}
                </x-table.cell-text>

                <x-table.cell-text center>
                    {{ $row->mode }}
                </x-table.cell-text>

                <x-table.cell-text left>
                    {{$row->mode=='invoice' ?$row->vno.' / ':''}}{{date('d-m-Y', strtotime($row->vdate))}}
                </x-table.cell-text>

                <x-table.cell-text right>
                    {{ $row->grand_total }}
                </x-table.cell-text>

                <x-table.cell-text right>
                    {{ $row->transaction_amount }}
                </x-table.cell-text>

                <x-table.cell-text>
                    {{  $balance  = $totalPurchase-$totalPayment}}
                </x-table.cell-text>

            </x-table.row>



        @empty
        @endforelse


        <x-table.row>
            <x-table.cell-text colspan="3" class=" text-md text-right text-gray-400">&nbsp;TOTALS&nbsp;&nbsp;&nbsp;
            </x-table.cell-text>
            <x-table.cell-text class=" text-right  text-md  text-zinc-500 ">{{$totalPurchase+$opening_balance}}</x-table.cell-text>
            <x-table.cell-text class=" text-right  text-md  text-zinc-500 ">{{ $totalPayment}}</x-table.cell-text>
            <x-table.cell-text></x-table.cell-text>
        </x-table.row>

        <x-table.row>
            <x-table.cell-text colspan="3" class=" text-md text-right text-gray-400 ">&nbsp;Balance&nbsp;&nbsp;&nbsp;
            </x-table.cell-text>
            <x-table.cell-text class=" text-right  text-md  text-blue-500 ">{{ $totalPurchase-$totalPayment}}</x-table.cell-text>
            <x-table.cell-text class=" text-right  text-md  text-blue-500 "></x-table.cell-text>
            <x-table.cell-text></x-table.cell-text>
        </x-table.row>
    </x-slot:table_body>
</x-table.form>
</body>
</html>
