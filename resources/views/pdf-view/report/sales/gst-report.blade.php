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
$sales_gstTotal = 0;
$purchase_gstTotal = 0;
$purchaseTotal = 0
?>

<div class="flex flex-row gap-3">
    <div class="w-full">
        <div class="text-xl text-center py-2 font-bold tracking-wider">Sales Report</div>
        <x-table.form>
            <x-slot:table_header name="table_header" class="bg-green-600">
                <x-table.header-serial width="20%"/>
                <x-table.header-text sortIcon="none">Party Name</x-table.header-text>
                <x-table.header-text sortIcon="none">Bill No</x-table.header-text>
                <x-table.header-text sortIcon="none">Date</x-table.header-text>
                <x-table.header-text sortIcon="none">Invoice Amount</x-table.header-text>
                <x-table.header-text sortIcon="none">GST Amount</x-table.header-text>
            </x-slot:table_header>

            <!-- Table Body ------------------------------------------------------------------------------------------->

            <x-slot:table_body name="table_body">
                @foreach($sales as $index=>$row)
                        <?php
                        $invoiceTotal += $row->grand_total;
                        $sales_gstTotal += $row->total_gst;
                        ?>

                    <x-table.row>
                        <x-table.cell-text>{{$index+1}}</x-table.cell-text>
                        <x-table.cell-text>{{$row->contact->vname}}</x-table.cell-text>
                        <x-table.cell-text>{{$row->invoice_no}}</x-table.cell-text>
                        <x-table.cell-text> {{ date('d-m-Y', strtotime( $row->invoice_date))}}</x-table.cell-text>
                        <x-table.cell-text>{{$row->grand_total}}</x-table.cell-text>
                        <x-table.cell-text>
                            {{$row->total_gst}}
                        </x-table.cell-text>
                    </x-table.row>

                @endforeach

            </x-slot:table_body>
        </x-table.form>
    </div>

    <div class="w-full">
        <div class="text-xl text-center py-2 font-bold tracking-wider">Purchase Report</div>
        <x-table.form>
            <x-slot:table_header name="table_header" class="bg-green-600">
                <x-table.header-serial width="20%"/>
                <x-table.header-text sortIcon="none">Party Name</x-table.header-text>
                <x-table.header-text sortIcon="none">Bill No</x-table.header-text>
                <x-table.header-text sortIcon="none">Date</x-table.header-text>
                <x-table.header-text sortIcon="none">Invoice Amount</x-table.header-text>
                <x-table.header-text sortIcon="none">GST Amount</x-table.header-text>
            </x-slot:table_header>

            <!-- Table Body ------------------------------------------------------------------------------------------->

            <x-slot:table_body name="table_body">
                @foreach($purchase as $index=>$row)
                        <?php
                        $purchaseTotal += $row->grand_total;
                        $purchase_gstTotal += $row->total_gst;
                        ?>

                    <x-table.row>
                        <x-table.cell-text>{{$index+1}}</x-table.cell-text>
                        <x-table.cell-text>{{$row->contact->vname}}</x-table.cell-text>
                        <x-table.cell-text>{{$row->purchase_no}}</x-table.cell-text>
                        <x-table.cell-text> {{ date('d-m-Y', strtotime( $row->invoice_date))}}</x-table.cell-text>
                        <x-table.cell-text>{{$row->grand_total}}</x-table.cell-text>
                        <x-table.cell-text>
                            {{$row->total_gst}}
                        </x-table.cell-text>
                    </x-table.row>

                @endforeach

            </x-slot:table_body>
        </x-table.form>
    </div>
</div>

<div class="mt-3">
    <x-table.form>
        <x-slot:table_body name="table_body">
            <x-table.row>
                <x-table.cell-text right>Total Sales</x-table.cell-text>
                <x-table.cell-text>{{\App\Helper\ConvertTo::rupeesFormat($invoiceTotal)}}</x-table.cell-text>
                <x-table.cell-text>{{\App\Helper\ConvertTo::rupeesFormat($sales_gstTotal)}}</x-table.cell-text>
                <x-table.cell-text right>Total Purchase</x-table.cell-text>
                <x-table.cell-text>{{\App\Helper\ConvertTo::rupeesFormat($purchaseTotal)}}</x-table.cell-text>
                <x-table.cell-text>{{\App\Helper\ConvertTo::rupeesFormat($purchase_gstTotal)}}</x-table.cell-text>
            </x-table.row>
            <x-table.row>
                <x-table.cell-text colspan="2" right>
                    <div class="font-bold">Difference (Sales-Purchase)</div>
                </x-table.cell-text>
                <x-table.cell-text>
                    <div
                        class="font-bold">{{\App\Helper\ConvertTo::rupeesFormat($invoiceTotal-$purchaseTotal)}}</div>
                </x-table.cell-text>
                <x-table.cell-text colspan="2" right>
                    <div class="font-bold">GST (Sales-Purchase)</div>
                </x-table.cell-text>
                <x-table.cell-text>
                    <div
                        class="font-bold">{{\App\Helper\ConvertTo::rupeesFormat($sales_gstTotal-$purchase_gstTotal)}}</div>
                </x-table.cell-text>
            </x-table.row>
        </x-slot:table_body>
    </x-table.form>
</div>

</body>
</html>
