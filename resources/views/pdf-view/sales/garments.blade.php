<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Garment Invoice</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white">
<div class="p-5">
    <div class="text-end text-xs text-gray-500 p-0.5">Original Copy</div>
    <div class="border border-gray-300">
        <div class="flex justify-center p-2 gap-x-6">
            <img src="{{ public_path('/storage/images/'.$cmp->get('logo'))}}" alt="company logo" class="w-24 h-auto"/>
            <div class="flex-col flex gap-1 ">
                <div class="text-3xl uppercase font-bold">{{$cmp->get('company_name')}}</div>
                <div class="flex-col flex text-xs space-y-0.5 text-gray-600 justify-center items-center">
                    <div class="text-xs inline-flex items-center space-x-2">
                        <x-icons.icon-fill iconfill="location" class="w-4 h-3 fill-gray-600"/>
                        <span>{{$cmp->get('address_1')}},{{$cmp->get('address_2')}},</span></div>
                    <div class="text-xs pl-6">{{$cmp->get('city')}}</div>
                    <div class="text-xs inline-flex items-center space-x-2">
                        <x-icons.icon-fill iconfill="phone1" class="w-3 h-3 fill-gray-600"/>
                        <span>{{$cmp->get('contact')}}</span> -
                        <x-icons.icon-fill iconfill="envelope" class="w-3 h-3 fill-gray-600"/>
                        <span>{{$cmp->get('email')}}</span></div>
                    <div class="text-xs inline-flex items-center space-x-2">
                        <x-icons.icon-fill iconfill="e-inv" class="w-3 h-3 fill-gray-600"/>
                        <span>{{$cmp->get('gstin')}}</span></div>
                </div>
            </div>
        </div>
        <!-- Invoice Details , IRN and QR Code -->
        <div class="w-full flex">
            <div class="w-[80%] flex-col flex">
                <div class="inline-flex items-center justify-center bg-gray-100 text-black text-sm font-bold p-1">
                    <span class="">TAX INVOICE</span>
                    {{--                <span class="">Original Copy</span>--}}
                </div>
                <div class=" flex justify-between h-[130px]">
                    <div
                        class="w-1/2 text-xs text-gray-600 space-y-1 flex-col justify-evenly px-2 border-r border-gray-300">
                        <div class="font-bold text-black">TO:</div>
                        <div class="font-bold inline-flex items-end space-x-2 text-black text-sm">
                            <span>M/S</span><span>{{$obj->contact_name}}</span></div>
                        <div class="">{{$billing_address->get('address_1')}}
                            , {{$billing_address->get('address_2')}}</div>
                        <div class="">{{$billing_address->get('address_3')}}</div>
                        <div class="">{{$billing_address->get('gstcell')}}</div>
                    </div>
                    <div class="w-1/2 text-xs flex-col flex space-y-1 text-gray-600 justify-evenly px-2">
                        <div class="inline-flex justify-between"><span
                                class="font-bold text-black">Invoice No:</span><span>{{$obj->invoice_no}}</span></div>
                        <div class="inline-flex justify-between"><span
                                class="font-bold text-black">Date:</span><span>{{$obj->invoice_date ?date('d-m-Y', strtotime($obj->invoice_date)):''}}</span>
                        </div>
                        <div class="inline-flex justify-between"><span
                                class="w-1/2 font-bold text-black">IRN No:</span><span
                                class="1/2 break-all text-end">12345678901234567980012345678901234567890</span>
                        </div>
                        {{--                    <div class="inline-flex justify-between">--}}
                        {{--                        <span class="font-bold text-black">PO No:</span><span--}}
                        {{--                            class="">{{ $obj->despatch_name }}</span>--}}
                        {{--                    </div>--}}
                        {{--                    <div class="inline-flex justify-between">--}}
                        {{--                        <span class="font-bold text-black">PO Date:</span>--}}
                        {{--                        <span class="">--}}
                        {{--                            {{ $obj->despatch_date }}</span>--}}

                        {{--                    </div>--}}
                    </div>
                </div>
            </div>
            <div class="w-[20%] h-[160px] border border-gray-300 flex items-center justify-center">
                @if($irn)
                    <img class="w-[145px] h-auto rounded-sm"
                         src="{{\App\Helper\qrcoder::generate($irn->signed_qrcode,22)}}"
                         alt="{{$irn->signed_qrcode}}">
                @endif
            </div>
        </div>
    </div>
    <!-- Item Table -->
    <div>
        <table class="w-full border-b border-gray-300">
            <thead class="font-semibold text-[10px] bg-gray-50">
            <tr class="py-2 border-b border-r border-gray-300 tracking-wider">
                <th class="py-2 w-[3%] px-1 border-r border-l border-gray-300">S.No</th>
                <th class="py-2 w-[8%] border-r border-gray-300">HSN Code</th>
                <th class="py-2 border-r border-gray-300">Particulars</th>
                <th class="py-2 w-[4%] border-r border-gray-300">Size</th>
                <th class="py-2 w-[6%] border-r px-1 border-gray-300">colours</th>
                <th class="py-2 w-[6%] border-r border-gray-300">Qty</th>
                <th class="py-2 w-[6%] border-r border-gray-300">Price</th>
                <th class="py-2 w-[8%] border-r border-gray-300">Taxable Amount</th>
                <th class="py-2 w-[3%] border-r border-gray-300">%</th>
                <th class="py-2 w-[8%] border-r border-gray-300">GST</th>
                <th class="py-2 w-[10%] border-r border-gray-300">Sub Total</th>
            </tr>
            </thead>
            <tbody>
            @php
                $gstPercent = 0;
            @endphp
            @foreach($list as $index => $row)
                <tr class="text-xs border-r border-gray-300">
                    <td class="py-2 text-center border-l border-r border-gray-300">{{$index+1}}</td>
                    <td class="py-2 text-center border-r border-gray-300">{{$row['hsncode']}}</td>
                    <td class="py-2 text-start px-0.5 border-r border-gray-300">
                        @if($row['description'])
                            {{$row['product_name'].' - '.$row['description']}}
                        @else
                            {{$row['product_name']}}
                        @endif
                    </td>
                    <td class="py-2 text-center border-r border-gray-300">{{$row['size_name']}}</td>
                    <td class="py-2 text-center border-r border-gray-300">{{$row['colour_name']}}</td>
                    <td class="py-2 text-end px-0.5 border-r border-gray-300">{{$row['qty']+0}}</td>
                    <td class="py-2 text-end px-0.5 border-r border-gray-300">{{number_format($row['price'],2,'.','')}}</td>
                    <td class="py-2 text-end px-0.5 border-r border-gray-300">{{number_format($row['qty']*$row['price'],2,'.','')}}</td>
                    <td class="py-2 text-center border-r border-gray-300">{{$row['gst_percent']*2}}</td>
                    <td class="py-2 text-end px-0.5 border-r border-gray-300">{{number_format($row['gst_amount'],2,'.','')}}</td>
                    <td class="py-2 text-end px-0.5 border-r border-gray-300 ">{{number_format($row['sub_total'],2,'.','')}}</td>
                </tr>
            @endforeach
            @for($i = 0; $i < 9 - $list->count(); $i++)
                <tr class="text-xs border-r border-gray-300">
                    <td class="py-2 text-center border-l border-r border-gray-300">&nbsp;</td>
                    <td class="py-2 text-center border-r border-gray-300">&nbsp;</td>
                    <td class="py-2 text-center border-r border-gray-300">&nbsp;</td>
                    <td class="py-2 text-center border-r border-gray-300">&nbsp;</td>
                    <td class="py-2 text-center border-r border-gray-300">&nbsp;</td>
                    <td class="py-2 text-center border-r border-gray-300">&nbsp;</td>
                    <td class="py-2 text-center border-r border-gray-300">&nbsp;</td>
                    <td class="py-2 text-center border-r border-gray-300">&nbsp;</td>
                    <td class="py-2 text-center border-r border-gray-300">&nbsp;</td>
                    <td class="py-2 text-center border-r border-gray-300">&nbsp;</td>
                    <td class="py-2 text-center border-r border-gray-300">&nbsp;</td>
                </tr>
            @endfor

            <tr class="text-xs py-2 font-semibold border-t border-r border-l border-gray-300">
                <td colspan="3" class="py-2 px-4">E&OE</td>
                <td colspan="2" class="py-2 border-r border-gray-300 text-end px-4">Total</td>
                <td class="text-end px-0.5 py-2 border-r border-l border-gray-300">{{$obj->total_qty+0}}</td>
                <td class="py-2"></td>
                <td class="text-end px-0.5 py-2 border-r border-l border-gray-300">{{number_format($obj->total_taxable,2,'.','')}}</td>
                <td class="py-2"></td>
                <td class="text-end px-0.5 py-2 border-r border-l border-gray-300">{{number_format($obj->total_gst,2,'.','')}}</td>
                <td class="text-end px-0.5 py-2 border-r border-l border-gray-300">{{number_format($obj->grand_total-$obj->additional,2,'.','')}}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="border-r border-l border-gray-300 flex items-center">
        <div class="w-2/3 border-r border-b border-gray-300 h-[195px]">
            <div class="text-[10px] text-gray-600 px-1">
                We hereby certify that our registration under the GST Act 2017 is in force on
                the date on which sale of the goods specified in this invoice is made by us
                and the transaction of sale is covered by this invoice has been effected by
                us in the regular course of our business. All the Disputes are subject to
                Tirupur Jurisdiction Only.
            </div>
            <div class="font-semibold text-[10px] text-gray-600 px-1">* Goods once sold cannot be return back or
                exchanged
            </div>
            <div class="font-semibold text-[10px] text-gray-600 px-1">* Seller cannot be responsible for any
                damage/mistakes.
            </div>
            <div class="text-[10px] inline-flex items-center font-semibold gap-x-2 p-1">
                <div class="space-y-1">
                    <div>ACCOUNT NO</div>
                    <div>IFSC CODE</div>
                    <div>BANK NAME</div>
                    <div>BRANCH</div>
                </div>
                <div class="space-y-1">
                    <div>:</div>
                    <div>:</div>
                    <div>:</div>
                    <div>:</div>
                </div>
                <div class="space-y-1">
                    <div>{{$cmp->get('acc_no')}}</div>
                    <div>{{$cmp->get('ifsc_code')}}</div>
                    <div>{{$cmp->get('bank')}}</div>
                    <div>{{$cmp->get('branch')}}</div>
                </div>
            </div>
            <div class="text-[10px] border-t border-gray-300 p-1 flex-col flex justify-end">
                <div class="">Amount (in words)</div>
                <div class="font-bold">{{$rupees}}Only</div>
            </div>
        </div>
        <div class="w-1/3 flex-col flex justify-between  text-xs h-[195px]">
            <div class="flex items-center justify-between border-b border-gray-300 py-1 px-0.5">
                <span class="w-1/3">Taxable Value</span><span class="w-1/3 text-center">:</span><span
                    class="w-1/3 text-end ">{{number_format($obj->total_taxable,2,'.','')}}</span>
            </div>
            <div class="flex items-center justify-between border-b border-gray-300 py-1 px-0.5">
                @if($obj->sales_type=='CGST-SGST')
                    <span class="w-1/3">CGST&nbsp;@&nbsp;{{$gstPercent}}%</span><span class="w-1/3 text-center">:</span>
                    <span class="w-1/3 text-end
            ">{{number_format($obj->total_gst/2,2,'.','')}}</span>
                @else
                    <span>&nbsp;</span>
                @endif
            </div>
            <div class="flex items-center justify-between border-b border-gray-300 py-1 px-0.5">
                @if($obj->sales_type=='CGST-SGST')
                    <span class="w-1/3">SGST&nbsp;@&nbsp;{{$gstPercent}}%</span><span class="w-1/3 text-center">:</span>
                    <span class="w-1/3 text-end
            ">{{number_format($obj->total_gst/2,2,'.','')}}</span>
                @else
                    <span class="w-1/3">IGST&nbsp;@&nbsp;{{$gstPercent*2}}%</span><span
                        class="w-1/3 text-center">:</span>
                    <span class="w-1/3 text-end
            ">{{number_format($obj->total_gst,2,'.','')}}</span>
                @endif
            </div>
            <div class="flex items-center justify-between border-b border-gray-300 py-1 px-0.5">
                <span class="w-1/3">Total GST</span><span class="w-1/3 text-center">:</span><span class="w-1/3 text-end
            ">{{number_format($obj->total_gst,2,'.','')}}</span>
            </div>
            <div class="flex items-center justify-between border-b border-gray-300 py-1 px-0.5">
                @if($obj->additional!=0)
                    <span class="w-1/3 inline-flex items-center space-x-1"><span>Add</span><span
                            class="text-[8px] text-gray-600">({{ $obj->ledger_name }})</span></span>
                @else
                    <span class="w-1/3">Add</span>
                @endif
                <span class="w-1/3 text-start pl-4">:</span>
                <span>@if($obj->additional!=0)
                        <span class=" w-1/3 text-end">{{ number_format($obj->additional,2,'.','') }}</span>
                    @else
                        <span class=" w-1/3 text-end"> - </span>
                    @endif
            </span>
            </div>
            <div class="flex items-center justify-between border-b border-gray-300 py-1 px-0.5">
                <span class="w-1/3">Round Off</span><span class="w-1/3 text-center">:</span><span class="w-1/3 text-end
            ">{{number_format($obj->round_off,2,'.','')}}</span>
            </div>
            <div class="flex items-center justify-between border-b border-gray-300 py-1 px-0.5 font-bold">
                <span class="w-1/3">GRAND TOTAL</span><span class="w-1/3 text-center">:</span><span class="w-1/3 text-end
            ">{{number_format($obj->grand_total,2,'.','')}}</span>
            </div>
        </div>
    </div>
    <div class="h-24 flex justify-between text-xs p-1 border-gray-300 border">
        <div class="inline-flex items-start">
            Receiver Sign
        </div>
        <div class="flex-col flex h-full items-center justify-between">
            <div class="inline-flex items-center">
                <span>For&nbsp;</span><b>{{$cmp->get('company_name')}}</b>
            </div>
            <div>
                Authorised Signatory
            </div>
        </div>
    </div>
    <div class="text-center text-[10px] text-gray-600">This is a Computer generated Invoice</div>
</div>

<div class="p-5">
    <div class="text-end text-xs text-gray-500 p-0.5">Duplicate Copy</div>
    <div class="border border-gray-300">
        <div class="flex justify-center p-2 gap-x-6">
            <img src="{{ public_path('/storage/images/'.$cmp->get('logo'))}}" alt="company logo" class="w-24 h-auto"/>
            <div class="flex-col flex gap-1 ">
                <div class="text-3xl uppercase font-bold">{{$cmp->get('company_name')}}</div>
                <div class="flex-col flex text-xs space-y-0.5 text-gray-600 justify-center items-center">
                    <div class="text-xs inline-flex items-center space-x-2">
                        <x-icons.icon-fill iconfill="location" class="w-4 h-3 fill-gray-600"/>
                        <span>{{$cmp->get('address_1')}},{{$cmp->get('address_2')}},</span></div>
                    <div class="text-xs pl-6">{{$cmp->get('city')}}</div>
                    <div class="text-xs inline-flex items-center space-x-2">
                        <x-icons.icon-fill iconfill="phone1" class="w-3 h-3 fill-gray-600"/>
                        <span>{{$cmp->get('contact')}}</span> -
                        <x-icons.icon-fill iconfill="envelope" class="w-3 h-3 fill-gray-600"/>
                        <span>{{$cmp->get('email')}}</span></div>
                    <div class="text-xs inline-flex items-center space-x-2">
                        <x-icons.icon-fill iconfill="e-inv" class="w-3 h-3 fill-gray-600"/>
                        <span>{{$cmp->get('gstin')}}</span></div>
                </div>
            </div>
        </div>
        <!-- Invoice Details , IRN and QR Code -->
        <div class="w-full flex">
            <div class="w-[80%] flex-col flex">
                <div class="inline-flex items-center justify-center bg-gray-100 text-black text-sm font-bold p-1">
                    <span class="">TAX INVOICE</span>
                    {{--                <span class="">Original Copy</span>--}}
                </div>
                <div class=" flex justify-between h-[130px]">
                    <div
                        class="w-1/2 text-xs text-gray-600 space-y-1 flex-col justify-evenly px-2 border-r border-gray-300">
                        <div class="font-bold text-black">TO:</div>
                        <div class="font-bold inline-flex items-end space-x-2 text-black text-sm">
                            <span>M/S</span><span>{{$obj->contact_name}}</span></div>
                        <div class="">{{$billing_address->get('address_1')}}
                            , {{$billing_address->get('address_2')}}</div>
                        <div class="">{{$billing_address->get('address_3')}}</div>
                        <div class="">{{$billing_address->get('gstcell')}}</div>
                    </div>
                    <div class="w-1/2 text-xs flex-col flex space-y-1 text-gray-600 justify-evenly px-2">
                        <div class="inline-flex justify-between"><span
                                class="font-bold text-black">Invoice No:</span><span>{{$obj->invoice_no}}</span></div>
                        <div class="inline-flex justify-between"><span
                                class="font-bold text-black">Date:</span><span>{{$obj->invoice_date ?date('d-m-Y', strtotime($obj->invoice_date)):''}}</span>
                        </div>
                        <div class="inline-flex justify-between"><span
                                class="w-1/2 font-bold text-black">IRN No:</span><span
                                class="1/2 break-all text-end">12345678901234567980012345678901234567890</span>
                        </div>
                        {{--                    <div class="inline-flex justify-between">--}}
                        {{--                        <span class="font-bold text-black">PO No:</span><span--}}
                        {{--                            class="">{{ $obj->despatch_name }}</span>--}}
                        {{--                    </div>--}}
                        {{--                    <div class="inline-flex justify-between">--}}
                        {{--                        <span class="font-bold text-black">PO Date:</span>--}}
                        {{--                        <span class="">--}}
                        {{--                            {{ $obj->despatch_date }}</span>--}}

                        {{--                    </div>--}}
                    </div>
                </div>
            </div>
            <div class="w-[20%] h-[160px] border border-gray-300 flex items-center justify-center">
                @if($irn)
                    <img class="w-[145px] h-auto rounded-sm"
                         src="{{\App\Helper\qrcoder::generate($irn->signed_qrcode,22)}}"
                         alt="{{$irn->signed_qrcode}}">
                @endif
            </div>
        </div>
    </div>
    <!-- Item Table -->
    <div>
        <table class="w-full border-b border-gray-300">
            <thead class="font-semibold text-[10px] bg-gray-50">
            <tr class="py-2 border-b border-r border-gray-300 tracking-wider">
                <th class="py-2 w-[3%] px-1 border-r border-l border-gray-300">S.No</th>
                <th class="py-2 w-[8%] border-r border-gray-300">HSN Code</th>
                <th class="py-2 border-r border-gray-300">Particulars</th>
                <th class="py-2 w-[4%] border-r border-gray-300">Size</th>
                <th class="py-2 w-[6%] border-r px-1 border-gray-300">colours</th>
                <th class="py-2 w-[6%] border-r border-gray-300">Qty</th>
                <th class="py-2 w-[6%] border-r border-gray-300">Price</th>
                <th class="py-2 w-[8%] border-r border-gray-300">Taxable Amount</th>
                <th class="py-2 w-[3%] border-r border-gray-300">%</th>
                <th class="py-2 w-[8%] border-r border-gray-300">GST</th>
                <th class="py-2 w-[10%] border-r border-gray-300">Sub Total</th>
            </tr>
            </thead>
            <tbody>
            @php
                $gstPercent = 0;
            @endphp
            @foreach($list as $index => $row)
                <tr class="text-xs border-r border-gray-300">
                    <td class="py-2 text-center border-l border-r border-gray-300">{{$index+1}}</td>
                    <td class="py-2 text-center border-r border-gray-300">{{$row['hsncode']}}</td>
                    <td class="py-2 text-start px-0.5 border-r border-gray-300">
                        @if($row['description'])
                            {{$row['product_name'].' - '.$row['description']}}
                        @else
                            {{$row['product_name']}}
                        @endif
                    </td>
                    <td class="py-2 text-center border-r border-gray-300">{{$row['size_name']}}</td>
                    <td class="py-2 text-center border-r border-gray-300">{{$row['colour_name']}}</td>
                    <td class="py-2 text-end px-0.5 border-r border-gray-300">{{$row['qty']+0}}</td>
                    <td class="py-2 text-end px-0.5 border-r border-gray-300">{{number_format($row['price'],2,'.','')}}</td>
                    <td class="py-2 text-end px-0.5 border-r border-gray-300">{{number_format($row['qty']*$row['price'],2,'.','')}}</td>
                    <td class="py-2 text-center border-r border-gray-300">{{$row['gst_percent']*2}}</td>
                    <td class="py-2 text-end px-0.5 border-r border-gray-300">{{number_format($row['gst_amount'],2,'.','')}}</td>
                    <td class="py-2 text-end px-0.5 border-r border-gray-300 ">{{number_format($row['sub_total'],2,'.','')}}</td>
                </tr>
            @endforeach
            @for($i = 0; $i < 9 - $list->count(); $i++)
                <tr class="text-xs border-r border-gray-300">
                    <td class="py-2 text-center border-l border-r border-gray-300">&nbsp;</td>
                    <td class="py-2 text-center border-r border-gray-300">&nbsp;</td>
                    <td class="py-2 text-center border-r border-gray-300">&nbsp;</td>
                    <td class="py-2 text-center border-r border-gray-300">&nbsp;</td>
                    <td class="py-2 text-center border-r border-gray-300">&nbsp;</td>
                    <td class="py-2 text-center border-r border-gray-300">&nbsp;</td>
                    <td class="py-2 text-center border-r border-gray-300">&nbsp;</td>
                    <td class="py-2 text-center border-r border-gray-300">&nbsp;</td>
                    <td class="py-2 text-center border-r border-gray-300">&nbsp;</td>
                    <td class="py-2 text-center border-r border-gray-300">&nbsp;</td>
                    <td class="py-2 text-center border-r border-gray-300">&nbsp;</td>
                </tr>
            @endfor

            <tr class="text-xs py-2 font-semibold border-t border-r border-l border-gray-300">
                <td colspan="3" class="py-2 px-4">E&OE</td>
                <td colspan="2" class="py-2 border-r border-gray-300 text-end px-4">Total</td>
                <td class="text-end px-0.5 py-2 border-r border-l border-gray-300">{{$obj->total_qty+0}}</td>
                <td class="py-2"></td>
                <td class="text-end px-0.5 py-2 border-r border-l border-gray-300">{{number_format($obj->total_taxable,2,'.','')}}</td>
                <td class="py-2"></td>
                <td class="text-end px-0.5 py-2 border-r border-l border-gray-300">{{number_format($obj->total_gst,2,'.','')}}</td>
                <td class="text-end px-0.5 py-2 border-r border-l border-gray-300">{{number_format($obj->grand_total-$obj->additional,2,'.','')}}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="border-r border-l border-gray-300 flex items-center">
        <div class="w-2/3 border-r border-b border-gray-300 h-[195px]">
            <div class="text-[10px] text-gray-600 px-1">
                We hereby certify that our registration under the GST Act 2017 is in force on
                the date on which sale of the goods specified in this invoice is made by us
                and the transaction of sale is covered by this invoice has been effected by
                us in the regular course of our business. All the Disputes are subject to
                Tirupur Jurisdiction Only.
            </div>
            <div class="font-semibold text-[10px] text-gray-600 px-1">* Goods once sold cannot be return back or
                exchanged
            </div>
            <div class="font-semibold text-[10px] text-gray-600 px-1">* Seller cannot be responsible for any
                damage/mistakes.
            </div>
            <div class="text-[10px] inline-flex items-center font-semibold gap-x-2 p-1">
                <div class="space-y-1">
                    <div>ACCOUNT NO</div>
                    <div>IFSC CODE</div>
                    <div>BANK NAME</div>
                    <div>BRANCH</div>
                </div>
                <div class="space-y-1">
                    <div>:</div>
                    <div>:</div>
                    <div>:</div>
                    <div>:</div>
                </div>
                <div class="space-y-1">
                    <div>{{$cmp->get('acc_no')}}</div>
                    <div>{{$cmp->get('ifsc_code')}}</div>
                    <div>{{$cmp->get('bank')}}</div>
                    <div>{{$cmp->get('branch')}}</div>
                </div>
            </div>
            <div class="text-[10px] border-t border-gray-300 p-1 flex-col flex justify-end">
                <div class="">Amount (in words)</div>
                <div class="font-bold">{{$rupees}}Only</div>
            </div>
        </div>
        <div class="w-1/3 flex-col flex justify-between  text-xs h-[195px]">
            <div class="flex items-center justify-between border-b border-gray-300 py-1 px-0.5">
                <span class="w-1/3">Taxable Value</span><span class="w-1/3 text-center">:</span><span
                    class="w-1/3 text-end ">{{number_format($obj->total_taxable,2,'.','')}}</span>
            </div>
            <div class="flex items-center justify-between border-b border-gray-300 py-1 px-0.5">
                @if($obj->sales_type=='CGST-SGST')
                    <span class="w-1/3">CGST&nbsp;@&nbsp;{{$gstPercent}}%</span><span class="w-1/3 text-center">:</span>
                    <span class="w-1/3 text-end
            ">{{number_format($obj->total_gst/2,2,'.','')}}</span>
                @else
                    <span>&nbsp;</span>
                @endif
            </div>
            <div class="flex items-center justify-between border-b border-gray-300 py-1 px-0.5">
                @if($obj->sales_type=='CGST-SGST')
                    <span class="w-1/3">SGST&nbsp;@&nbsp;{{$gstPercent}}%</span><span class="w-1/3 text-center">:</span>
                    <span class="w-1/3 text-end
            ">{{number_format($obj->total_gst/2,2,'.','')}}</span>
                @else
                    <span class="w-1/3">IGST&nbsp;@&nbsp;{{$gstPercent*2}}%</span><span
                        class="w-1/3 text-center">:</span>
                    <span class="w-1/3 text-end
            ">{{number_format($obj->total_gst,2,'.','')}}</span>
                @endif
            </div>
            <div class="flex items-center justify-between border-b border-gray-300 py-1 px-0.5">
                <span class="w-1/3">Total GST</span><span class="w-1/3 text-center">:</span><span class="w-1/3 text-end
            ">{{number_format($obj->total_gst,2,'.','')}}</span>
            </div>
            <div class="flex items-center justify-between border-b border-gray-300 py-1 px-0.5">
                @if($obj->additional!=0)
                    <span class="w-1/3 inline-flex items-center space-x-1"><span>Add</span><span
                            class="text-[8px] text-gray-600">({{ $obj->ledger_name }})</span></span>
                @else
                    <span class="w-1/3">Add</span>
                @endif
                <span class="w-1/3 text-start pl-4">:</span>
                <span>@if($obj->additional!=0)
                        <span class=" w-1/3 text-end">{{ number_format($obj->additional,2,'.','') }}</span>
                    @else
                        <span class=" w-1/3 text-end"> - </span>
                    @endif
            </span>
            </div>
            <div class="flex items-center justify-between border-b border-gray-300 py-1 px-0.5">
                <span class="w-1/3">Round Off</span><span class="w-1/3 text-center">:</span><span class="w-1/3 text-end
            ">{{number_format($obj->round_off,2,'.','')}}</span>
            </div>
            <div class="flex items-center justify-between border-b border-gray-300 py-1 px-0.5 font-bold">
                <span class="w-1/3">GRAND TOTAL</span><span class="w-1/3 text-center">:</span><span class="w-1/3 text-end
            ">{{number_format($obj->grand_total,2,'.','')}}</span>
            </div>
        </div>
    </div>
    <div class="h-24 flex justify-between text-xs p-1 border-gray-300 border">
        <div class="inline-flex items-start">
            Receiver Sign
        </div>
        <div class="flex-col flex h-full items-center justify-between">
            <div class="inline-flex items-center">
                <span>For&nbsp;</span><b>{{$cmp->get('company_name')}}</b>
            </div>
            <div>
                Authorised Signatory
            </div>
        </div>
    </div>
    <div class="text-center text-[10px] text-gray-600">This is a Computer generated Invoice</div>
</div>

<div class="p-5">
    <div class="text-end text-xs text-gray-500 p-0.5">Triplicate Copy</div>
    <div class="border border-gray-300">
        <div class="flex justify-center p-2 gap-x-6">
            <img src="{{ public_path('/storage/images/'.$cmp->get('logo'))}}" alt="company logo" class="w-24 h-auto"/>
            <div class="flex-col flex gap-1 ">
                <div class="text-3xl uppercase font-bold">{{$cmp->get('company_name')}}</div>
                <div class="flex-col flex text-xs space-y-0.5 text-gray-600 justify-center items-center">
                    <div class="text-xs inline-flex items-center space-x-2">
                        <x-icons.icon-fill iconfill="location" class="w-4 h-3 fill-gray-600"/>
                        <span>{{$cmp->get('address_1')}},{{$cmp->get('address_2')}},</span></div>
                    <div class="text-xs pl-6">{{$cmp->get('city')}}</div>
                    <div class="text-xs inline-flex items-center space-x-2">
                        <x-icons.icon-fill iconfill="phone1" class="w-3 h-3 fill-gray-600"/>
                        <span>{{$cmp->get('contact')}}</span> -
                        <x-icons.icon-fill iconfill="envelope" class="w-3 h-3 fill-gray-600"/>
                        <span>{{$cmp->get('email')}}</span></div>
                    <div class="text-xs inline-flex items-center space-x-2">
                        <x-icons.icon-fill iconfill="e-inv" class="w-3 h-3 fill-gray-600"/>
                        <span>{{$cmp->get('gstin')}}</span></div>
                </div>
            </div>
        </div>
        <!-- Invoice Details , IRN and QR Code -->
        <div class="w-full flex">
            <div class="w-[80%] flex-col flex">
                <div class="inline-flex items-center justify-center bg-gray-100 text-black text-sm font-bold p-1">
                    <span class="">TAX INVOICE</span>
                    {{--                <span class="">Original Copy</span>--}}
                </div>
                <div class=" flex justify-between h-[130px]">
                    <div
                        class="w-1/2 text-xs text-gray-600 space-y-1 flex-col justify-evenly px-2 border-r border-gray-300">
                        <div class="font-bold text-black">TO:</div>
                        <div class="font-bold inline-flex items-end space-x-2 text-black text-sm">
                            <span>M/S</span><span>{{$obj->contact_name}}</span></div>
                        <div class="">{{$billing_address->get('address_1')}}
                            , {{$billing_address->get('address_2')}}</div>
                        <div class="">{{$billing_address->get('address_3')}}</div>
                        <div class="">{{$billing_address->get('gstcell')}}</div>
                    </div>
                    <div class="w-1/2 text-xs flex-col flex space-y-1 text-gray-600 justify-evenly px-2">
                        <div class="inline-flex justify-between"><span
                                class="font-bold text-black">Invoice No:</span><span>{{$obj->invoice_no}}</span></div>
                        <div class="inline-flex justify-between"><span
                                class="font-bold text-black">Date:</span><span>{{$obj->invoice_date ?date('d-m-Y', strtotime($obj->invoice_date)):''}}</span>
                        </div>
                        <div class="inline-flex justify-between"><span
                                class="w-1/2 font-bold text-black">IRN No:</span><span
                                class="1/2 break-all text-end">12345678901234567980012345678901234567890</span>
                        </div>
                        {{--                    <div class="inline-flex justify-between">--}}
                        {{--                        <span class="font-bold text-black">PO No:</span><span--}}
                        {{--                            class="">{{ $obj->despatch_name }}</span>--}}
                        {{--                    </div>--}}
                        {{--                    <div class="inline-flex justify-between">--}}
                        {{--                        <span class="font-bold text-black">PO Date:</span>--}}
                        {{--                        <span class="">--}}
                        {{--                            {{ $obj->despatch_date }}</span>--}}

                        {{--                    </div>--}}
                    </div>
                </div>
            </div>
            <div class="w-[20%] h-[160px] border border-gray-300 flex items-center justify-center">
                @if($irn)
                    <img class="w-[145px] h-auto rounded-sm"
                         src="{{\App\Helper\qrcoder::generate($irn->signed_qrcode,22)}}"
                         alt="{{$irn->signed_qrcode}}">
                @endif
            </div>
        </div>
    </div>
    <!-- Item Table -->
    <div>
        <table class="w-full border-b border-gray-300">
            <thead class="font-semibold text-[10px] bg-gray-50">
            <tr class="py-2 border-b border-r border-gray-300 tracking-wider">
                <th class="py-2 w-[3%] px-1 border-r border-l border-gray-300">S.No</th>
                <th class="py-2 w-[8%] border-r border-gray-300">HSN Code</th>
                <th class="py-2 border-r border-gray-300">Particulars</th>
                <th class="py-2 w-[4%] border-r border-gray-300">Size</th>
                <th class="py-2 w-[6%] border-r px-1 border-gray-300">colours</th>
                <th class="py-2 w-[6%] border-r border-gray-300">Qty</th>
                <th class="py-2 w-[6%] border-r border-gray-300">Price</th>
                <th class="py-2 w-[8%] border-r border-gray-300">Taxable Amount</th>
                <th class="py-2 w-[3%] border-r border-gray-300">%</th>
                <th class="py-2 w-[8%] border-r border-gray-300">GST</th>
                <th class="py-2 w-[10%] border-r border-gray-300">Sub Total</th>
            </tr>
            </thead>
            <tbody>
            @php
                $gstPercent = 0;
            @endphp
            @foreach($list as $index => $row)
                <tr class="text-xs border-r border-gray-300">
                    <td class="py-2 text-center border-l border-r border-gray-300">{{$index+1}}</td>
                    <td class="py-2 text-center border-r border-gray-300">{{$row['hsncode']}}</td>
                    <td class="py-2 text-start px-0.5 border-r border-gray-300">
                        @if($row['description'])
                            {{$row['product_name'].' - '.$row['description']}}
                        @else
                            {{$row['product_name']}}
                        @endif
                    </td>
                    <td class="py-2 text-center border-r border-gray-300">{{$row['size_name']}}</td>
                    <td class="py-2 text-center border-r border-gray-300">{{$row['colour_name']}}</td>
                    <td class="py-2 text-end px-0.5 border-r border-gray-300">{{$row['qty']+0}}</td>
                    <td class="py-2 text-end px-0.5 border-r border-gray-300">{{number_format($row['price'],2,'.','')}}</td>
                    <td class="py-2 text-end px-0.5 border-r border-gray-300">{{number_format($row['qty']*$row['price'],2,'.','')}}</td>
                    <td class="py-2 text-center border-r border-gray-300">{{$row['gst_percent']*2}}</td>
                    <td class="py-2 text-end px-0.5 border-r border-gray-300">{{number_format($row['gst_amount'],2,'.','')}}</td>
                    <td class="py-2 text-end px-0.5 border-r border-gray-300 ">{{number_format($row['sub_total'],2,'.','')}}</td>
                </tr>
            @endforeach
            @for($i = 0; $i < 9 - $list->count(); $i++)
                <tr class="text-xs border-r border-gray-300">
                    <td class="py-2 text-center border-l border-r border-gray-300">&nbsp;</td>
                    <td class="py-2 text-center border-r border-gray-300">&nbsp;</td>
                    <td class="py-2 text-center border-r border-gray-300">&nbsp;</td>
                    <td class="py-2 text-center border-r border-gray-300">&nbsp;</td>
                    <td class="py-2 text-center border-r border-gray-300">&nbsp;</td>
                    <td class="py-2 text-center border-r border-gray-300">&nbsp;</td>
                    <td class="py-2 text-center border-r border-gray-300">&nbsp;</td>
                    <td class="py-2 text-center border-r border-gray-300">&nbsp;</td>
                    <td class="py-2 text-center border-r border-gray-300">&nbsp;</td>
                    <td class="py-2 text-center border-r border-gray-300">&nbsp;</td>
                    <td class="py-2 text-center border-r border-gray-300">&nbsp;</td>
                </tr>
            @endfor

            <tr class="text-xs py-2 font-semibold border-t border-r border-l border-gray-300">
                <td colspan="3" class="py-2 px-4">E&OE</td>
                <td colspan="2" class="py-2 border-r border-gray-300 text-end px-4">Total</td>
                <td class="text-end px-0.5 py-2 border-r border-l border-gray-300">{{$obj->total_qty+0}}</td>
                <td class="py-2"></td>
                <td class="text-end px-0.5 py-2 border-r border-l border-gray-300">{{number_format($obj->total_taxable,2,'.','')}}</td>
                <td class="py-2"></td>
                <td class="text-end px-0.5 py-2 border-r border-l border-gray-300">{{number_format($obj->total_gst,2,'.','')}}</td>
                <td class="text-end px-0.5 py-2 border-r border-l border-gray-300">{{number_format($obj->grand_total-$obj->additional,2,'.','')}}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="border-r border-l border-gray-300 flex items-center">
        <div class="w-2/3 border-r border-b border-gray-300 h-[195px]">
            <div class="text-[10px] text-gray-600 px-1">
                We hereby certify that our registration under the GST Act 2017 is in force on
                the date on which sale of the goods specified in this invoice is made by us
                and the transaction of sale is covered by this invoice has been effected by
                us in the regular course of our business. All the Disputes are subject to
                Tirupur Jurisdiction Only.
            </div>
            <div class="font-semibold text-[10px] text-gray-600 px-1">* Goods once sold cannot be return back or
                exchanged
            </div>
            <div class="font-semibold text-[10px] text-gray-600 px-1">* Seller cannot be responsible for any
                damage/mistakes.
            </div>
            <div class="text-[10px] inline-flex items-center font-semibold gap-x-2 p-1">
                <div class="space-y-1">
                    <div>ACCOUNT NO</div>
                    <div>IFSC CODE</div>
                    <div>BANK NAME</div>
                    <div>BRANCH</div>
                </div>
                <div class="space-y-1">
                    <div>:</div>
                    <div>:</div>
                    <div>:</div>
                    <div>:</div>
                </div>
                <div class="space-y-1">
                    <div>{{$cmp->get('acc_no')}}</div>
                    <div>{{$cmp->get('ifsc_code')}}</div>
                    <div>{{$cmp->get('bank')}}</div>
                    <div>{{$cmp->get('branch')}}</div>
                </div>
            </div>
            <div class="text-[10px] border-t border-gray-300 p-1 flex-col flex justify-end">
                <div class="">Amount (in words)</div>
                <div class="font-bold">{{$rupees}}Only</div>
            </div>
        </div>
        <div class="w-1/3 flex-col flex justify-between  text-xs h-[195px]">
            <div class="flex items-center justify-between border-b border-gray-300 py-1 px-0.5">
                <span class="w-1/3">Taxable Value</span><span class="w-1/3 text-center">:</span><span
                    class="w-1/3 text-end ">{{number_format($obj->total_taxable,2,'.','')}}</span>
            </div>
            <div class="flex items-center justify-between border-b border-gray-300 py-1 px-0.5">
                @if($obj->sales_type=='CGST-SGST')
                    <span class="w-1/3">CGST&nbsp;@&nbsp;{{$gstPercent}}%</span><span class="w-1/3 text-center">:</span>
                    <span class="w-1/3 text-end
            ">{{number_format($obj->total_gst/2,2,'.','')}}</span>
                @else
                    <span>&nbsp;</span>
                @endif
            </div>
            <div class="flex items-center justify-between border-b border-gray-300 py-1 px-0.5">
                @if($obj->sales_type=='CGST-SGST')
                    <span class="w-1/3">SGST&nbsp;@&nbsp;{{$gstPercent}}%</span><span class="w-1/3 text-center">:</span>
                    <span class="w-1/3 text-end
            ">{{number_format($obj->total_gst/2,2,'.','')}}</span>
                @else
                    <span class="w-1/3">IGST&nbsp;@&nbsp;{{$gstPercent*2}}%</span><span
                        class="w-1/3 text-center">:</span>
                    <span class="w-1/3 text-end
            ">{{number_format($obj->total_gst,2,'.','')}}</span>
                @endif
            </div>
            <div class="flex items-center justify-between border-b border-gray-300 py-1 px-0.5">
                <span class="w-1/3">Total GST</span><span class="w-1/3 text-center">:</span><span class="w-1/3 text-end
            ">{{number_format($obj->total_gst,2,'.','')}}</span>
            </div>
            <div class="flex items-center justify-between border-b border-gray-300 py-1 px-0.5">
                @if($obj->additional!=0)
                    <span class="w-1/3 inline-flex items-center space-x-1"><span>Add</span><span
                            class="text-[8px] text-gray-600">({{ $obj->ledger_name }})</span></span>
                @else
                    <span class="w-1/3">Add</span>
                @endif
                <span class="w-1/3 text-start pl-4">:</span>
                <span>@if($obj->additional!=0)
                        <span class=" w-1/3 text-end">{{ number_format($obj->additional,2,'.','') }}</span>
                    @else
                        <span class=" w-1/3 text-end"> - </span>
                    @endif
            </span>
            </div>
            <div class="flex items-center justify-between border-b border-gray-300 py-1 px-0.5">
                <span class="w-1/3">Round Off</span><span class="w-1/3 text-center">:</span><span class="w-1/3 text-end
            ">{{number_format($obj->round_off,2,'.','')}}</span>
            </div>
            <div class="flex items-center justify-between border-b border-gray-300 py-1 px-0.5 font-bold">
                <span class="w-1/3">GRAND TOTAL</span><span class="w-1/3 text-center">:</span><span class="w-1/3 text-end
            ">{{number_format($obj->grand_total,2,'.','')}}</span>
            </div>
        </div>
    </div>
    <div class="h-24 flex justify-between text-xs p-1 border-gray-300 border">
        <div class="inline-flex items-start">
            Receiver Sign
        </div>
        <div class="flex-col flex h-full items-center justify-between">
            <div class="inline-flex items-center">
                <span>For&nbsp;</span><b>{{$cmp->get('company_name')}}</b>
            </div>
            <div>
                Authorised Signatory
            </div>
        </div>
    </div>
    <div class="text-center text-[10px] text-gray-600">This is a Computer generated Invoice</div>
</div>
</body>
</html>
