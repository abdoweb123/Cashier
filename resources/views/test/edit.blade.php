@extends('layouts.master')
@section('css')
@section('title')
    {{trans('edit test')}}
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
                <h4 class="m-3">invoice ==>{{ $test->invoice_number }}</h4>
                <a href="{{route('invoice.index')}}" class="btn btn-success ml-auto" style="height:30px; margin-left:auto;"><i class="fa fa-home"></i>Home</a>
                <div class="card-body">
                    <form action="{{route('invoice.update', $test->id)}}" method="POST" class="form">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-4">
                                <label>customer name</label>
                                <input name="customer_name" value="{{old('customer_name', $test->customer_name)}}" class="form-control">
                                @error('customer_name') <span class="help-block text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="col-4">
                                <label>customer email</label>
                                <input name="customer_email" value="{{old('customer_email', $test->customer_email)}}" class="form-control">
                                @error('customer_email') <span class="help-block text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="col-4">
                                <label>customer phone</label>
                                <input name="customer_phone" value="{{old('customer_phone', $test->customer_phone)}}" class="form-control">
                                @error('customer_phone') <span class="help-block text-danger">{{$message}}</span> @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-4">
                                <label>company name</label>
                                <input type="text" name="company_name" value="{{old('company_name', $test->company_name)}}" class="form-control">
                                @error('company_name') <span class="help-block text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="col-4">
                                <label>Invoice number</label>
                                <input type="text" name="invoice_number" value="{{old('invoice_number', $test->invoice_number)}}" class="form-control">
                                @error('invoice_number') <span class="help-block text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="col-4">
                                <label>Invoice date</label>
                                <input type="text" name="invoice_date" value="{{old('invoice_date', $test->invoice_date)}}" class="form-control" id="datepicker-action" data-date-format="yyyy-mm-dd">
                                @error('invoice_date') <span class="help-block text-danger">{{$message}}</span> @enderror
                            </div>
                        </div>


                    <div class="table-responsive">
                        <table class="table" id="invoice_details">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>product name</th>
                                    <th>unit</th>
                                    <th>quantity</th>
                                    <th>unit price</th>
                                    <th>subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($test->details as $item)
                                <tr class="cloning_row" id="{{$loop->index}}">
                                    <td>
                                        @if($loop->index == 0)
                                            {{'#'}}
                                        @else
                                            <button class="btn btn-danger btn-sm delegated-btn"><i class="fa fa-minus"></i></button>
                                        @endif
                                    </td>
                                    <td>
                                        <input type="text" name="product_name[]" id="product_name" value="{{old('product_name', $item->product_name)}}" class="product_name form-control">
                                        @error('product_name') <span class="help-block text-danger">{{$message}}</span> @enderror
                                    </td>
                                    <td>
                                        <select name="unit[]" id="unit" class="unit form-control">
                                            <option></option>
                                            <option value="piece" {{$item->unit == 'piece' ? 'selected' : ''}}>piece</option>
                                            <option value="g" {{$item->unit == 'g' ? 'selected' : ''}}>Gram</option>
                                            <option value="kg" {{$item->unit == 'kg' ? 'selected' : ''}}>Kilo gram</option>
                                        </select>
                                        @error('unit') <span class="help-block text-danger">{{$message}}</span> @enderror
                                    </td>
                                    <td>
                                        <input type="number" name="quantity[]" id="quantity" value="{{old('quantity', $item->quantity)}}" step="0.01" class="quantity form-control">
                                        @error('quantity') <span class="help-block text-danger">{{$message}}</span> @enderror
                                    </td>
                                    <td>
                                        <input type="number" name="unit_price[]" id="unit_price" value="{{old('unit_price', $item->unit_price)}}" step="0.01" class="unit_price form-control">
                                        @error('unit_price') <span class="help-block text-danger">{{$message}}</span> @enderror
                                    </td>
                                    <td>
                                        <input type="number" name="row_sub_total[]" id="row_sub_total" value="{{old('row_sub_total', $item->row_sub_total)}}" step="0.01" class="row_sub_total form-control" readonly>
                                        @error('row_sub_total') <span class="help-block text-danger">{{$message}}</span> @enderror
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6">
                                        <button type="button" class="btn_add btn btn-success">Add another product</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4"></td>
                                    <td colspan="1">Sub Total</td>
                                    <td><input type="number" name="sub_total" value="{{old('sub_total', $test->sub_total)}}" id="sub_total" class="sub_total form-control" readonly="readonly"></td>
                                </tr>
                                <tr>
                                    <td colspan="4"></td>
                                    <td colspan="1">Discount</td>
                                    <td>
                                        <div class="input-group mb-3">
                                            <select name="discount_type" id="discount_type" class="discount_type custom-select">
                                                <option value="fixed" {{$test->discount_type == 'fixed' ? 'selected' : ''}}>SR</option>
                                                <option value="percentage" {{$test->discount_type == 'percentage' ? 'selected' : ''}}>Percentage</option>
                                            </select>
                                            <div class="input-group-append">
                                                <input type="number" step="0.01" name="discount_value" value="{{old('discount_value', $test->discount_value)}}" id="discount_value" class="discount_value form-control p-1" value="0.00">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4"></td>
                                    <td colspan="1">VAT(5%)</td>{{-- القيمة المضافة--}}
                                    <td><input type="number" step="0.01" name="vat_value" id="vat_value" value="{{old('vat_value', $test->vat_value)}}" class="vat_value form-control" value="0.00" readonly="readonly"></td>
                                </tr>
                                <tr>
                                    <td colspan="4"></td>
                                    <td colspan="1">Shipping</td>{{-- الشحن--}}
                                    <td><input type="number" step="0.01" name="shipping" id="shipping" value="{{old('shipping', $test->shipping)}}" class="shipping form-control"></td>
                                </tr>
                                <tr>
                                    <td colspan="4"></td>
                                    <td colspan="1">Total Due</td>{{--إجمالي المستحقات--}}
                                    <td><input type="number" step="0.01" name="total_due" id="total_due" value="{{old('total_due', $test->total_due)}}" class="total_due form-control" readonly="readonly"></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="text-right pt-3">
                        <button type="submit" name="save" class="btn btn-success submit-info">update</button>
                    </div>
                    </form>
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
