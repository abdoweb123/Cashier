<?php

namespace App\Repositories\web;

use App\Http\Requests\ExpensesRequest;
use App\Interfaces\ExpensesRepositoryInterface;
use App\Models\Expenses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExpensesRepository implements ExpensesRepositoryInterface
{

    public function index(Request $request)
    {
        if ($request->has('input_search')){
            $expenses = Expenses::where('expenses_side', 'LIKE' ,'%'. $request->input_search . '%')->latest()->paginate(page);
        }
        else{
            $expenses = Expenses::latest()->paginate(page);
        }

        return view('expenses.index', compact('expenses'));
    }



    public function create()
    {
        return view('expenses.create');
    }



    public function store(ExpensesRequest $request)
    {
        $data = $request->all();
        $expenses =  Expenses::create($data);
        return redirect()->route('expenses.index')->with('success','expenses is created successfully');
    }



    public function edit(Expenses $expense)
    {
        return view('expenses.edit', compact('expense'));
    }



    public function update(ExpensesRequest $request, Expenses $expense)
    {
        $data = $request->all();
        $expense->update($data);
        return redirect()->route('expenses.index')->with('success','expenses is created successfully');
    }



    public function forceDelete(Expenses $expense)
    {
        $expense->forceDelete();
        return redirect()->route('expenses.index')->with('success','expenses is deleted successfully');
    }


}
