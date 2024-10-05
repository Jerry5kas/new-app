<html lang="en">
<head>
    <title>Invoice</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white-100 p-5">
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
<?php
$totalSales = 0;
?>
<x-table.form>
    <x-slot:table_header name="table_header" class="bg-green-600">
        <x-table.header-text sortIcon="none">Month</x-table.header-text>
        <x-table.header-text sortIcon="none">Total Sales</x-table.header-text>
    </x-slot:table_header>

    <!-- Table Body ------------------------------------------------------------------------------------------->

    <x-slot:table_body name="table_body">
        @foreach(\App\Helper\Months::months() as $index=>$row)
            <x-table.row>
                <x-table.cell-text>{{$row}}</x-table.cell-text>
                <x-table.cell-text>{{\App\Http\Controllers\Report\Sales\SummaryController::monthlySales($index+1,$year)}}</x-table.cell-text>
            </x-table.row>
                <?php
                $totalSales += \App\Http\Controllers\Report\Sales\SummaryController::monthlySales($index+1,$year)
                ?>
        @endforeach
        <x-table.row>
            <x-table.cell-text right>Total</x-table.cell-text>
            <x-table.cell-text>{{$totalSales}}</x-table.cell-text>
        </x-table.row>
    </x-slot:table_body>

</x-table.form>
</body>
</html>

