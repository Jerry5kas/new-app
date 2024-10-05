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
$invoiceTotal = 0;
$taxableValueTotal = 0;
$gstTotal = 0;
$CGSTTotal = 0;
?>

<x-table.form>
    <x-slot:table_header name="table_header" class="bg-green-600">
        <x-table.header-serial width="20%"/>
        <x-table.header-text sortIcon="none">GSTIN NO</x-table.header-text>
        <x-table.header-text sortIcon="none">Party Name</x-table.header-text>
        <x-table.header-text sortIcon="none">Bill No</x-table.header-text>
        <x-table.header-text sortIcon="none">Date</x-table.header-text>
        <x-table.header-text sortIcon="none">Invoice Amount</x-table.header-text>
        <x-table.header-text sortIcon="none">Taxable Value</x-table.header-text>
        <x-table.header-text sortIcon="none">CGST %</x-table.header-text>
        <x-table.header-text sortIcon="none">CGST TAX</x-table.header-text>
        <x-table.header-text sortIcon="none">SGST %</x-table.header-text>
        <x-table.header-text sortIcon="none">SGST TAX</x-table.header-text>
        <x-table.header-text sortIcon="none">IGST %</x-table.header-text>
        <x-table.header-text sortIcon="none">IGST TAX</x-table.header-text>
    </x-slot:table_header>

    <!-- Table Body ------------------------------------------------------------------------------------------->

    <x-slot:table_body name="table_body">
        @foreach($list as $index=>$row)
                <?php
                $invoiceTotal += $row->grand_total;
                $taxableValueTotal += $row->total_taxable;
                $gstTotal += $row->sales_type == 'CGST-SGST' ? $row->total_gst : 0;
                $CGSTTotal += $row->sales_type != 'CGST-SGST' ? $row->total_gst : 0;
                ?>

            <x-table.row>
                <x-table.cell-text>{{$index+1}}</x-table.cell-text>
                <x-table.cell-text>{{$row->contact->gstin}}</x-table.cell-text>
                <x-table.cell-text>{{$row->contact->vname}}</x-table.cell-text>
                <x-table.cell-text>{{$row->Entry_no}}</x-table.cell-text>
                <x-table.cell-text> {{ date('d-m-Y', strtotime( $row->purchase_date))}}</x-table.cell-text>
                <x-table.cell-text>{{$row->grand_total}}</x-table.cell-text>
                <x-table.cell-text>{{$row->total_taxable}}</x-table.cell-text>
                <x-table.cell-text>
                    {{$row->sales_type=='CGST-SGST'?\App\Http\Controllers\Report\Purchase\MonthlyReportController::getPercent($row->id,$row->sales_type):0}}
                </x-table.cell-text>
                <x-table.cell-text>{{$row->sales_type=='CGST-SGST'?$row->total_gst/2:0}}</x-table.cell-text>
                <x-table.cell-text>
                    {{$row->sales_type=='CGST-SGST'?\App\Http\Controllers\Report\Purchase\MonthlyReportController::getPercent($row->id,$row->sales_type):0}}
                </x-table.cell-text>
                <x-table.cell-text>{{$row->sales_type=='CGST-SGST'?$row->total_gst/2:0}}</x-table.cell-text>
                <x-table.cell-text>
                    {{$row->sales_type!='CGST-SGST'?\App\Http\Controllers\Report\Purchase\MonthlyReportController::getPercent($row->id,$row->sales_type):0}}
                </x-table.cell-text>
                <x-table.cell-text>
                    {{$row->sales_type!='CGST-SGST'?$row->total_gst:0}}
                </x-table.cell-text>
            </x-table.row>

        @endforeach
        <x-table.row>
            <x-table.cell-text colspan="3">Total</x-table.cell-text>
            <x-table.cell-text></x-table.cell-text>
            <x-table.cell-text></x-table.cell-text>
            <x-table.cell-text>{{\App\Helper\ConvertTo::rupeesFormat($invoiceTotal)}}</x-table.cell-text>
            <x-table.cell-text>{{\App\Helper\ConvertTo::rupeesFormat($taxableValueTotal)}}</x-table.cell-text>
            <x-table.cell-text></x-table.cell-text>
            <x-table.cell-text>{{\App\Helper\ConvertTo::rupeesFormat($gstTotal/2)}}</x-table.cell-text>
            <x-table.cell-text></x-table.cell-text>
            <x-table.cell-text>{{\App\Helper\ConvertTo::rupeesFormat($gstTotal/2)}}</x-table.cell-text>
            <x-table.cell-text></x-table.cell-text>
            <x-table.cell-text>{{\App\Helper\ConvertTo::rupeesFormat($CGSTTotal)}}</x-table.cell-text>
        </x-table.row>
    </x-slot:table_body>
</x-table.form>
</body>
</html>
