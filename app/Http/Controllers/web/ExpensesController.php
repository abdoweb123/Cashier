<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExpensesRequest;
use App\Interfaces\ExpensesRepositoryInterface;
use App\Models\Expenses;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{

    private $expensesRepositoryInterface;


    public function __construct(ExpensesRepositoryInterface $expensesRepositoryInterface)
    {
        $this->expensesRepositoryInterface = $expensesRepositoryInterface;
    }


    public function index(Request $request)
    {
        return $this->expensesRepositoryInterface->index($request);
    }


    public function create()
    {
        return $this->expensesRepositoryInterface->create();
    }


    public function store(ExpensesRequest $request)
    {
        return $this->expensesRepositoryInterface->store($request);
    }



    public function edit(Expenses $expense)
    {
        return $this->expensesRepositoryInterface->edit($expense);
    }


    public function update(ExpensesRequest $request, Expenses $expense)
    {
        return $this->expensesRepositoryInterface->update($request, $expense);
    }


    public function forceDelete(Expenses $expense)
    {
        return $this->expensesRepositoryInterface->forceDelete($expense);
    }


}
