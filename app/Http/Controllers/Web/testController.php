<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\test;
use Illuminate\Http\Request;

class testController extends Controller
{
    // start invoice

    public function index()
    {
        $invoices = test::query()->latest('id')->paginate('10');
        return view('test.index', compact('invoices'));
    }



    public function create()
    {
        return view('test.create');
    }



    public function show($id)
    {
        $test = test::findOrFail($id);
        return view('test.show', compact('test'));
    }



    public function print($id)
    {
        $test = test::findOrFail($id);
        return view('test.print', compact('test'));
    }

    public function pdf($id)
    {
        $test = test::findOrFail($id);
        return view('test.pdf', compact('test'));
    }


    public function send_to_email($id)
    {
        $test = test::findOrFail($id);

    }


    public function edit($id)
    {
        $test = test::findOrFail($id);
        return view('test.edit', compact('test'));

    }



    public function delete($id)
    {
        $invoice = test::findOrFail($id)->delete();
        return redirect()->route('invoice.index')->with([
            'status'=> 'created successfully',
            'alert-type'=> 'success',
        ]);
    }



    public function store(Request $request)
    {
        $request->validate([

            'customer_name'=>'required',
            'customer_email'=>'required',
            'customer_phone'=>'required',
            'company_name'=>'required',
            'invoice_number'=>'required',
            'invoice_date'=>'required',
            'product_name'=>'required|array|min:1',
            //'product_name.*'=>'required|string|min:1',
            'unit'=>'required|array|min:1',
            //'unit.*'=>'required|string|min:1',
            'quantity'=>'required|array|min:1',
            // 'quantity.*'=>'required|string|min:1',
            'unit_price'=>'required|array|min:1',
            //'unit_price.*'=>'required|string|min:1',
            'row_sub_total'=>'required|array|min:1',
            //'row_sub_total.*'=>'required|string|min:1',
        ]);


        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_phone'] = $request->customer_phone;
        $data['company_name'] = $request->company_name;
        $data['invoice_number'] = $request->invoice_number;
        $data['invoice_date'] = $request->invoice_date;
        $data['sub_total'] = $request->sub_total;
        $data['discount_type'] = $request->discount_type;
        $data['discount_value'] = $request->discount_value;
        $data['vat_value'] = $request->vat_value;
        $data['shipping'] = $request->shipping;
        $data['total_due'] = $request->total_due;


        $invoice = test::create($data);


        $details_list = [];
        for ($i=0; $i<count($request->product_name); $i++){

            $details_list[$i]['product_name'] = $request->product_name[$i];
            $details_list[$i]['unit'] = $request->unit[$i];
            $details_list[$i]['quantity'] = $request->quantity[$i];
            $details_list[$i]['unit_price'] = $request->unit_price[$i];
            $details_list[$i]['row_sub_total'] = $request->row_sub_total[$i];
        }

        $details_list = $invoice->details()->createMany($details_list);

        if ($details_list)
        {
            return redirect()->back()->with([
                'status'=> 'created successfully',
                'alert-type'=> 'success',
            ]);
        }
        else{
            return redirect()->back()->with([
                'status'=> 'created failed',
                'alert-type'=> 'danger',
            ]);
        }

    }



    public function update(Request $request, $id)
    {

        $invoice = test::findOrFail($id);

        $request->validate([

            'customer_name'=>'required',
            'customer_email'=>'required',
            'customer_phone'=>'required',
            'company_name'=>'required',
            'invoice_number'=>'required',
            'invoice_date'=>'required',
            'product_name'=>'required|array|min:1',
            //'product_name.*'=>'required|string|min:1',
            'unit'=>'required|array|min:1',
            //'unit.*'=>'required|string|min:1',
            'quantity'=>'required|array|min:1',
            // 'quantity.*'=>'required|string|min:1',
            'unit_price'=>'required|array|min:1',
            //'unit_price.*'=>'required|string|min:1',
            'row_sub_total'=>'required|array|min:1',
            //'row_sub_total.*'=>'required|string|min:1',
        ]);


        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_phone'] = $request->customer_phone;
        $data['company_name'] = $request->company_name;
        $data['invoice_number'] = $request->invoice_number;
        $data['invoice_date'] = $request->invoice_date;
        $data['sub_total'] = $request->sub_total;
        $data['discount_type'] = $request->discount_type;
        $data['discount_value'] = $request->discount_value;
        $data['vat_value'] = $request->vat_value;
        $data['shipping'] = $request->shipping;
        $data['total_due'] = $request->total_due;


        $invoice->update($data);

        $invoice->details()->delete();

        $details_list = [];
        for ($i=0; $i<count($request->product_name); $i++){

            $details_list[$i]['product_name'] = $request->product_name[$i];
            $details_list[$i]['unit'] = $request->unit[$i];
            $details_list[$i]['quantity'] = $request->quantity[$i];
            $details_list[$i]['unit_price'] = $request->unit_price[$i];
            $details_list[$i]['row_sub_total'] = $request->row_sub_total[$i];
        }

        $details_list = $invoice->details()->createMany($details_list);

        if ($details_list)
        {
            return redirect()->back()->with([
                'status'=> 'updated successfully',
                'alert-type'=> 'success',
            ]);
        }
        else{
            return redirect()->back()->with([
                'status'=> 'updated failed',
                'alert-type'=> 'danger',
            ]);
        }

    }


}
