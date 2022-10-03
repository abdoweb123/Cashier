<?php

namespace App\Interfaces;

use App\Http\Requests\ExpensesRequest;
use App\Models\Expenses;
use Illuminate\Http\Request;

interface ExpensesRepositoryInterface
{


    public function index(Request $request);

    public function create();

    public function store(ExpensesRequest $request);

    public function edit(Expenses $expense);

    public function update(ExpensesRequest $request, Expenses $expense);

    public function forceDelete(Expenses $expense);




}
