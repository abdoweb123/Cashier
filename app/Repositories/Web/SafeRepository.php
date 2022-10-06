<?php

namespace App\Repositories\Web;

use App\Http\Requests\SafeRequest;
use App\Http\Requests\SafeRequestCollectedData;
use App\Interfaces\Web\SafeRepositoryInterface;
use App\Models\Expenses;
use App\Models\Invoice;
use App\Models\Safe;
use App\Models\SalesProfits;
use App\Models\Sell;
use App\Models\Store;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SafeRepository implements SafeRepositoryInterface
{


    public function index()
    {
        $added_money = Safe::latest()->paginate(page);
        return view('safe.indexAddedToSafe', compact('added_money'));
    }



    public function create()
    {
        return view('safe.create');
    }



    public function store(SafeRequest $request)
    {
        $data = $request->all();
        $add_to_safe = Safe::create($data);

        return redirect()->route('safe.index')->with('success','money is added successfully');
    }



    public function edit(Safe $safe)
    {
        return view('safe.edit', compact('safe'));

    }



    public function update(SafeRequest $request, Safe $safe)
    {
        $data = $request->all();
        $safe->update($data);

        return redirect()->route('safe.index')->with('success','money is updated successfully');
    }



    public function forceDelete(Safe $safe)
    {
        $safe->forceDelete();
        return redirect()->route('safe.index')->with('success','money is deleted successfully');
    }



    public function sales(){

        /* المبيعات */
        $salesAll       = Sell::select('totalAfter')->sum('totalAfter');  // مبيعات مدي العمل
        $salesToday     = Sell::whereDate('created_at', Carbon::today())->get()->sum('totalAfter');  // مبيعات اليوم
        $salesYesterday = Sell::whereDate('created_at', Carbon::yesterday())->get()->sum('totalAfter');  // مبيعات الأمس
        $salesThisMonth = Sell::wheremonth('created_at', Carbon::now()->month)->get()->sum('totalAfter');  // مبيعات هذا الشهر
        $salesLastMonth = Sell::whereMonth('created_at','=', Carbon::now()->subMonth()->month)->get()->sum('totalAfter');  // مبيعات الشهر الماضي

        return view('safe.generalView.sales', compact('salesToday','salesYesterday','salesThisMonth','salesLastMonth','salesAll'));

    }



    public function profits(){

        /* الأرباح */
        $profitsAll       = Sell::select('profit')->sum('profit');     // الأرباح مدي العمل
        $profitsToday     = Sell::whereDate('created_at', Carbon::today())->get()->sum('profit');    // أرباح اليوم
        $profitsYesterday = Sell::whereDate('created_at', Carbon::yesterday())->get()->sum('profit');    // أرباح الأمس
        $profitsThisMonth = Sell::wheremonth('created_at', Carbon::now()->month)->get()->sum('profit');   // أرباح هذا الشهر
        $profitsLastMonth = Sell::whereMonth('created_at','=', Carbon::now()->subMonth()->month)->get()->sum('profit');    // أرباح الشهر الماضي

        return view('safe.generalView.profits', compact('profitsAll','profitsToday','profitsYesterday','profitsThisMonth','profitsLastMonth'));

    }



    public function salesBestSeller(){

        /* المنتجات الأكثر مبيعا */
        $maxSellAll       = SalesProfits::orderBy('sales','desc')->take(1)->get('name'); // مدي العمل
        $maxSellToday     = SalesProfits::whereDate('created_at', Carbon::today())->orderBy('sales','desc')->take(1)->get('name');    // اليوم
        $maxSellYesterday = SalesProfits::whereDate('created_at', Carbon::yesterday())->orderBy('sales','desc')->take(1)->get('name');   // الأمس
        $maxSellThisMonth = SalesProfits::wheremonth('created_at', Carbon::now()->month)->orderBy('sales','desc')->take(1)->get('name');  // هذا الشهر
        $maxSellLastMonth = SalesProfits::wheremonth('created_at', Carbon::now()->subMonth()->month)->orderBy('sales','desc')->take(1)->get('name');   // الشهر الماضي

        return view('safe.generalView.bestSeller', compact('maxSellAll','maxSellToday','maxSellYesterday','maxSellThisMonth', 'maxSellLastMonth'));

    }



    public function salesBestProfits()
    {

        /* المنتجات الأكثر ربحا */
        $maxProfitAll       = SalesProfits::orderBy('profit','desc')->take(1)->get('name'); // مدي العمل
        $maxProfitToday     = SalesProfits::whereDate('created_at', Carbon::today())->orderBy('profit','desc')->take(1)->get('name');    // اليوم
        $maxProfitYesterday = SalesProfits::whereDate('created_at', Carbon::yesterday())->orderBy('profit','desc')->take(1)->get('name');   // الأمس
        $maxProfitThisMonth = SalesProfits::wheremonth('created_at', Carbon::now()->month)->orderBy('profit','desc')->take(1)->get('name');  // هذا الشهر
        $maxProfitLastMonth = SalesProfits::wheremonth('created_at', Carbon::now()->subMonth()->month)->orderBy('profit','desc')->take(1)->get('name');   // الشهر الماضي


        return view('safe.generalView.bestProfit', compact('maxProfitAll','maxProfitToday','maxProfitYesterday','maxProfitThisMonth','maxProfitLastMonth'));

    }




    public function collectedData(Request $request)
    {
        $obj = new SafeRequestCollectedData();

        if ($request->has('startDate') and $request->has('endDate')){

            $validator = Validator::make($request->all(),$obj->rules(),$obj->messages());

            if ($validator->fails())
            {
                return redirect()->back()->withErrors($validator->errors())->withInput();
            }

            $startDate = $request['startDate'];
            $oldEndDate   = $request['endDate'];
            $endDate = new \DateTime($oldEndDate);       // To increase 1 day to the date
            $endDate->add(new \DateInterval('P1D'));  // P1D means a period of 1 day

            $salesInfo    = Sell::whereBetween('created_at',[$startDate,$endDate])->select('totalAfter','given','remaining','profit');

            $salesTotal   = $salesInfo->sum('totalAfter');
            $salesGiven   = $salesInfo->sum('given');
            $salesRemain  = $salesInfo->sum('remaining');
            $salesProfits = $salesInfo->sum('profit');

            if ($salesTotal == 0){
                $profitPercent = 0;
            } else{
                $profitPercent =  ($salesProfits/$salesTotal)*100;
            }
            $expenses     = Expenses::whereBetween('created_at',[$startDate,$endDate])->select('paid_money')->sum('paid_money');
            $salesProfitsMinusExpenses = $salesProfits - $expenses;
            $storeTotal   = Store::whereBetween('created_at',[$startDate,$endDate])->select('total')->sum('total');


            $paidInvoice  = Invoice::whereBetween('created_at',[$startDate,$endDate])->select('paid_all')->sum('paid_all');
            $storePaid    = Store::whereBetween('created_at',[$startDate,$endDate])->select('paid_money')->sum('paid_money');
            $storeRemain  = Store::whereBetween('created_at',[$startDate,$endDate])->select('remain_money')->sum('remain_money');

        }
        else{
            $salesInfo    = Sell::select('totalAfter','given','remaining','profit');

            $salesTotal   = $salesInfo->sum('totalAfter');
            $salesGiven   = $salesInfo->sum('given');
            $salesRemain  = $salesInfo->sum('remaining');
            $salesProfits = $salesInfo->sum('profit');


            if ($salesTotal == 0){
                $profitPercent = 0;
            } else{
                $profitPercent =  ($salesProfits/$salesTotal)*100;
            }

            $expenses     = Expenses::select('paid_money')->sum('paid_money');
            $salesProfitsMinusExpenses = $salesProfits - $expenses;
            $storeTotal   = Store::select('total')->sum('total');

            $paidInvoice  = Invoice::select('paid_all')->sum('paid_all');
            $storePaid    = Store::select('paid_money')->sum('paid_money');
            $storeRemain  = Store::select('remain_money')->sum('remain_money');

        }
        $totalPaidToSuppliers   = $storePaid + $paidInvoice;
        $totalRemainToSuppliers = $storeRemain - $paidInvoice;

        return view('safe.collectedData', compact('salesTotal','salesGiven',
            'salesRemain','salesProfits','profitPercent','expenses','salesProfitsMinusExpenses',
            'storeTotal', 'totalPaidToSuppliers','totalRemainToSuppliers'));
    }



    public function reports(Request $request)
    {
        if ($request->has('input_search')){

            $products = SalesProfits::where('name','LIKE','%'.$request->input_search.'%')->paginate(page);
        }
        else{
            $products = '';
        }

        return view('safe.reports', compact('products'));
    }



}
