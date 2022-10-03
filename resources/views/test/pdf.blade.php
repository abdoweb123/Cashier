<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>{{$test->invoice_number}}</title>
    <link rel="shortcut icon" href="{{ URL::asset('assets_2/images/favicon.ico') }}" type="image/x-icon" />
    <!-- Favicon -->
    <!-- Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link href="{{ URL::asset('css_2/wizard.css') }}" rel="stylesheet" id="bootstrap-css">


    <!--- Style css -->
    <link href="{{ URL::asset('assets_2/css/style.css') }}" rel="stylesheet">

    <!--- Style css -->

    <!-- Invoice styling -->
    <style>

        body {
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            text-align: center;
            color: #777;
            background-color: #f0f0f036;
        }

        body h1 {
            font-weight: 300;
            margin-bottom: 0px;
            padding-bottom: 0px;
            color: #000;
        }

        body h3 {
            margin: 10px 0;
        }

        body a {
            color: #06f;
        }

        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
            background-color: white;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
            border-collapse: collapse;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .heading td , .item td  {
            text-align: left !important;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .total_last td{
            font-weight: bold;
        }


        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }


        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        p{
            display: inline-block;
            margin: 0;
        }

        @if (App::getLocale() == 'ar')
        html{
            direction: rtl;
        }


        .invoice-box table {
            text-align: right;
        }


        .invoice-box table tr td:nth-child(2) {
            text-align: left;
        }

        .heading td , .item td , .total_last td {
            text-align: right !important;
        }

        .head td , .invoice_ends td{
            text-align: right !important;
        }


        @else
        html{
            direction: ltr;
        }

        .invoice-box table {
            text-align: left;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .heading td , .item td , .total_last td{
            text-align: left !important;
        }

        .head td , .invoice_ends td{
            text-align: left !important;
        }



        @endif
    </style>
</head>

<body>

<div class="invoice-box">
    <table>
        <tr class="top">
            <td colspan="6">
                <table>
                    <tr class="head">
                        <td class="title" style="width:70%">
                            <img src="{{ asset('assets_2/images/logo_2.png') }}" alt="Company logo" style="width: 100px; max-width: 100px" />
                        </td>

                        <td style="width:30%">
                            <p>Invoice Number</p> : <p>{{ $test->invoice_number }}</p><br/>
                            <p>Invoice Date</p> : <p>{{ $test->invoice_date }}</p><br/>
                            <p>Print Date</p> : <p>{{ \Carbon\Carbon::now()->format('Y-m-d') }}</p><br/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <h3 style="margin:auto; text-align:center;">Invoice Details</h3>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="information">
            <td colspan="6">
                <table>
                    <tr class="invoice_ends">
                        <td style="width:50%">
                           <h3>Seller</h3>
                            <p>Abdelrahman Sallam</p><br/>
                            <span dir="ltr"><p>01293774833</p></span><br/>
                            <p>123456789</p> <br/>
                            <p>Menouf , Egypt</p>

                        </td>

                        <td style="width:50%">
                            <h3>Buyer</h3>
                            <p>customer name :</p> <p>{{$test->customer_name}}</p><br/>
                            <p>customer email :</p> <p>{{$test->customer_email}}</p><br/>
                            <p>customer phone :</p> <p>{{$test->customer_phone}}</p><br/>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="heading">
            <td></td>
            <td>product name</td>
            <td>unit</td>
            <td>quantity</td>
            <td>unit price</td>
            <td>sub total</td>
        </tr>

        @foreach($test->details as $item)
        <tr class="item">
            <td>{{$loop->iteration}}</td>
            <td>{{$item->product_name}}</td>
            <td>{{$item->unitText()}}</td>
            <td>{{$item->quantity}}</td>
            <td>{{$item->unit_price}}</td>
            <td>{{$item->row_sub_total}}</td>
        </tr>
        @endforeach


        <tr class="total_last">
            <td colspan="4"></td>
            <td colspan="1">sub total</td>
            <td colspan="1">{{$test->sub_total}}</td>
        </tr>
        <tr class="total_last">
            <td colspan="4"></td>
            <td colspan="1">discount</td>
            <td colspan="1">{{$test->discountResult()}}</td>
        </tr>
        <tr class="total_last">
            <td colspan="4"></td>
            <td colspan="1">vat (5%)</td>
            <td colspan="1">{{$test->vat_value}}</td>
        </tr>
        <tr class="total_last">
            <td colspan="4"></td>
            <td colspan="1">shipping</td>
            <td colspan="1">{{$test->shipping}}</td>
        </tr>
        <tr class="total_last">
            <td colspan="4"></td>
            <td colspan="1">total due</td>
            <td colspan="1">{{$test->total_due}}</td>
        </tr>
    </table>
</div>


{{--<script>--}}

{{--    window.print();--}}
{{--</script>--}}



</body>
</html>

