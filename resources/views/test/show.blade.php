@extends('layouts.master')
@section('css')
@section('title')
    {{trans('show test')}}
@stop
@endsection

@section('PageText')

    test
@stop
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    test
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->


    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-header d-flex">
                    <h4 class="m-3">invoice #{{ $test->invoice_number }}</h4>
                    <a href="{{route('invoice.index')}}" class="btn btn-success ml-auto" style="height:30px; margin-left:auto;"><i class="fa fa-home"></i>Back to invoices</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
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

                        <h4>Invoice details</h4>

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
                                   <td>{{$loop->iteration}}</td>
                                   <td>{{$item->product_name}}</td>
                                   <td>{{$item->unitText()}}</td>
                                   <td>{{$item->quantity}}</td>
                                   <td>{{$item->unit_price}}</td>
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
                   <div class="row">
                       <div class="col-12 text-center">
                            <a href="{{route('invoice.print', $test->id)}}" class="btn btn-primary ml-auto"><i class="fa fa-print"></i>&nbsp;print</a>
                            <a href="{{route('invoice.pdf', $test->id)}}" class="btn btn-secondary ml-auto"><i class="fa fa-file-pdf"></i>&nbsp;export pdf</a>
                            <a href="{{route('invoice.send_to_email', $test->id)}}" class="btn btn-success ml-auto"><i class="fa fa-envelope"></i>&nbsp;send to email</a>
                       </div>
                   </div>


                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- row closed -->

@endsection

@section('script')

    <script>


        $(document).ready(function (){

            $('#invoice_details').on('keyup blur', '.quantity', function (){

                let $row = $(this).closest('tr');
                let $quantity = $row.find('.quantity').val() || 0;
                let $unit_price = $row.find('.unit_price').val() || 0;

                $row.find('.row_sub_total').val(($quantity * $unit_price).toFixed(2));

                $('.sub_total').val(sum_total('.row_sub_total'));
                $('.vat_value').val(calculate_vat());
                $('.total_due').val(sum_due_total());
            });

            $('#invoice_details').on('keyup blur', '.unit_price', function (){

                let $row = $(this).closest('tr');
                let quantity = $row.find('.quantity').val() || 0;
                let unit_price = $row.find('.unit_price').val() || 0;

                $row.find('.row_sub_total').val((quantity * unit_price).toFixed(2));

                $('.sub_total').val(sum_total('.row_sub_total'));
                $('.vat_value').val(calculate_vat());
                $('.total_due').val(sum_due_total());
            });

            $('#invoice_details').on('keyup blur', '.discount_type', function (){

                $('.vat_value').val(calculate_vat());
                $('.total_due').val(sum_due_total());
            });

            $('#invoice_details').on('keyup blur', '.discount_value', function (){

                $('.vat_value').val(calculate_vat());
                $('.total_due').val(sum_due_total());
            });

            $('#invoice_details').on('keyup blur', '.shipping', function (){

                $('.vat_value').val(calculate_vat());
                $('.total_due').val(sum_due_total());
            });

            $('#invoice_details').on('change', '.discount_type', function (){

                $('.vat_value').val(calculate_vat());
                $('.total_due').val(sum_due_total());
            });


            // this function is used for quantity && unit_price
            let sum_total = function($selector){
                let sum = 0;
                $($selector).each(function (){
                    let selectorVal = $(this).val() != '' ? $(this).val() : 0;
                    sum += parseFloat(selectorVal);
                });
                return sum.toFixed(2);
            }


            // To calculate vat_value
            let calculate_vat = function (){

                let sub_totalVal = $('.sub_total').val() || 0;
                let discount_type = $('.discount_type').val() || 0;
                let discount_value = parseFloat($('.discount_value').val()) || 0;
                let discountVal = discount_value != 0 ? discount_type == 'percentage' ? sub_totalVal * (discount_value / 100) : discount_value : 0;

                let vatVal = (sub_totalVal - discountVal) * 0.05;
                return vatVal.toFixed(2);
            }


            // To calculate sum_due_total
            let sum_due_total = function (){

                let sum = 0;
                let sub_totalVal = $('.sub_total').val() || 0;
                let discount_type = $('.discount_type').val() || 0;
                let discount_value = parseFloat($('.discount_value').val()) || 0;
                let discountVal = discount_value != 0 ? discount_type == 'percentage' ? sub_totalVal * (discount_value / 100) : discount_value : 0;

                let vatVal = parseFloat($('.vat_value').val()) || 0;
                let shippingVal = parseFloat($('.shipping').val()) || 0;

                sum += sub_totalVal;
                sum -= discountVal;
                sum += vatVal;
                sum += shippingVal;

                return sum.toFixed(2);
            }


            $(document).on('click', '.btn_add', function (){

                let trCount = $('#invoice_details').find('tr.cloning_row:last').length;
                let numberIncrement = trCount > 0 ? parseInt($('#invoice_details').find('tr.cloning_row:last').attr('id')) + 1 : 0;

                $('#invoice_details').find('tbody').append($('' +


                    '<tr class="cloning_row" id=" ' + numberIncrement + ' ">'+
                    '<td><button class="btn btn-danger btn-sm delegated-btn"><i class="fa fa-minus"></i></button></td>' +
                    '<td>' + '<input type="text" name="product_name[]" id="product_name" class="product_name form-control">' + '</td>' +
                    '<td>' + '<select name="unit[]" id="unit" class="unit form-control">' + '<option></option>' + '<option value="piece">piece</option>' + '<option value="g">Gram</option>' + '<option value="kg">Kilo gram</option>' + '</select>' + '</td>' +
                    '<td>' + '<input type="number" name="quantity[]" id="quantity" step="0.01" class="quantity form-control">' + '</td>' +
                    '<td>' + '<input type="number" name="unit_price[]" id="unit_price" step="0.01" class="unit_price form-control">' + '</td>' +
                    '<td>' + '<input type="number" name="row_sub_total[]" id="row_sub_total" step="0.01" class="row_sub_total form-control" readonly>' + '</td>' +
                    '</tr>'));

            });


            $(document).on('click', '.delegated-btn', function (e){
                e.preventDefault();
                $(this).parent().parent().remove();

                $('.sub_total').val(sum_total('.row_sub_total'));
                $('.vat_value').val(calculate_vat());
                $('.total_due').val(sum_due_total());
            });

        }); //end of javascript
    </script>

@endsection
