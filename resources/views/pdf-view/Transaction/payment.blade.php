<html lang="en">

<head>
    <title>Transaction</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white-100 p-10">

<div class="flex flex-row  justify-evenly p-2">
    <div class="flex justify-center items-center">
        <img src="{{ public_path('/storage/images/'.$cmp->get('logo'))}}" alt="company logo" class="w-[180px]"/>
    </div>

    <div class="w-full flex flex-col items-center justify-center">
        <h1 class="text-2xl font-bold tracking-wider  uppercase">{{$cmp->get('company_name')}}</h1>
        <p class="text-xs">{{$cmp->get('address_1')}},{{$cmp->get('address_2')}}, {{$cmp->get('city')}}</p>
        <p class="text-xs">{{$cmp->get('contact')}} - {{$cmp->get('email')}}</p>
        <p class="text-xs">{{$cmp->get('gstin')}}</p>
    </div>

</div>

<div class="border-b border-gray-200 my-2 w-full">&nbsp;</div>

<div class="my-3">
    {{$mode_name}}
</div>

<x-table.form>

    <!-- Table Header  ------------------------------------------------------------------------------------------------>

    <x-slot:table_header name="table_header" class="bg-green-100">

        <x-table.header-serial></x-table.header-serial>

        <x-table.header-text sort-icon="none">Contact</x-table.header-text>

        <x-table.header-text sort-icon="none">Type</x-table.header-text>

        <x-table.header-text sort-icon="none">Mode of Payments</x-table.header-text>

        <x-table.header-text sort-icon="none">Amount</x-table.header-text>

    </x-slot:table_header>

    <!-- Table Body  ------------------------------------------------------------------------------------------>

    <x-slot:table_body name="table_body">

        @foreach($list as $index=>$row)

            <x-table.row>

                <x-table.cell-text>{{$index+1}}</x-table.cell-text>

                <x-table.cell-text>{{$row->contact->vname}}</x-table.cell-text>

                <x-table.cell-text>{{\Aaran\Transaction\Models\Transaction::common($row->receipttype_id)}}</x-table.cell-text>

                <x-table.cell-text>{{Aaran\Common\Models\Common::find($row->trans_type_id)->vname}}</x-table.cell-text>

                <x-table.cell-text>{{$row->vname+0}}</x-table.cell-text>

            </x-table.row>
        @endforeach

    </x-slot:table_body>

</x-table.form>

</body>
</html>

