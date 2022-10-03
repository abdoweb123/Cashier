<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>print invoice</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
{{--    @include('layouts.head')--}}


    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('assets_2/images/favicon.ico') }}" type="image/x-icon" />

    <!-- Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link href="{{ URL::asset('css_2/wizard.css') }}" rel="stylesheet" id="bootstrap-css">


<!--- Style css -->
    <link href="{{ URL::asset('assets_2/css/style.css') }}" rel="stylesheet">

    <!--- Style css -->
    @if (App::getLocale() == 'en')
        <link rel="stylesheet" href="{{ URL::asset('assets_2/css/ltr.css') }}">
    @else
        <link rel="stylesheet" href="{{ URL::asset('assets_2/css/rtl.css') }}">
    @endif


    <style>

        *{box-shadow: none !important;}
        body{background-color: #f0f0f036}

        input[type='number']{
            -moz-appearance: textfield;
        }
        input::-webkit-inner-spin-button,
        input::-webkit-outer-spin-button
        {
            -webkit-appearance: none;
        }
        .form-control:read-only:focus{
            background: #e9ecef;
            -webkit-box-shadow: none;
            border: 0;
        }


    </style>
</head>

<body>

<div class="wrapper" style="font-family: 'Cairo', sans-serif">

    <!-- main-content -->
    <div class="d-block" style="display: block !important;">

        <div class="page-title" style="display: block !important;">

            <div class="container w-75" style="display: block !important;">
                <div class="row mt-2" style="display: block !important;">
                    <div class="col-md-12 mb-30" style="display: block !important;">
                        <div class="card card-statistics h-100" style="border: solid #ddd 1px; display: block !important;">
                            <div class="card-header d-flex" style="display: block !important;">
                                <h5>Invoice  #{{ $test->invoice_number }}</h5>
                            </div>
                            <div class="card-body" style="display: block !important;">
                                <div class="table-responsive" style="display: block !important;">
                                    <table class="table">
                                        <tr>
                                            <th scope="col">customer name</th>
                                            <td>{{$test->customer_name}}</td>
                                            <th scope="col">customer email</th>
                                            <td>{{$test->customer_email}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">customer phone</th>
                                            <td>{{$test->customer_phone}}</td>
                                            <th scope="col">company name</th>
                                            <td>{{$test->company_name}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">invoice number</th>
                                            <td>{{$test->invoice_number}}</td>
                                            <th scope="col">invoice date</th>
                                            <td>{{$test->invoice_date}}</td>
                                        </tr>
                                    </table>

                                    <h5>Invoice details</h5>

                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th>product name</th>
                                            <th>unit</th>
                                            <th>quantity</th>
                                            <th>unit price</th>
                                            <th>product sub total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($test->details as $item)
                                            <tr>
                                                <td width="5%">{{$loop->iteration}}</td>
                                                <td width="35%">{{$item->product_name}}</td>
                                                <td width="10%">{{$item->unitText()}}</td>
                                                <td width="10%">{{$item->quantity}}</td>
                                                <td width="10%">{{$item->unit_price}}</td>
                                                <td>{{$item->row_sub_total}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td colspan="3"></td>
                                            <th colspan="2">sub total</th>
                                            <td>{{$test->sub_total}}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"></td>
                                            <th colspan="2">discount</th>
                                            <td>{{$test->discountResult()}}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"></td>
                                            <th colspan="2">vat value</th>
                                            <td>{{$test->vat_value}}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"></td>
                                            <th colspan="2">shipping</th>
                                            <td>{{$test->shipping}}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"></td>
                                            <th colspan="2">total due</th>
                                            <td>{{$test->total_due}}</td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

   window.print();
</script>



</body>

</html>
