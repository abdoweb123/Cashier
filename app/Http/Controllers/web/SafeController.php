<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Requests\SafeRequest;
use App\Http\Requests\SafeRequestCollectedData;
use App\Interfaces\SafeRepositoryInterface;
use App\Models\Safe;
use Illuminate\Http\Request;


class SafeController extends Controller
{

    private $safeRepositoryInterface;


    public function __construct(SafeRepositoryInterface $safeRepositoryInterface)
    {
        $this->safeRepositoryInterface = $safeRepositoryInterface;
    }



    public function index()
    {
        return  $this->safeRepositoryInterface->index();
    }



    public function create()
    {
        return $this->safeRepositoryInterface->create();
    }



    public function store(SafeRequest $request)
    {
        return $this->safeRepositoryInterface->store($request);
    }



    public function edit(Safe $safe)
    {
        return $this->safeRepositoryInterface->edit($safe);
    }



    public function update(SafeRequest $request, Safe $safe)
    {
        return $this->safeRepositoryInterface->update($request,$safe);
    }



    public function forceDelete(Safe $safe)
    {
        return $this->safeRepositoryInterface->forceDelete($safe);
    }



    public function sales()
    {
        return $this->safeRepositoryInterface->sales();
    }



    public function profits()
    {
        return $this->safeRepositoryInterface->profits();
    }



    public function salesBestSeller()
    {
        return $this->safeRepositoryInterface->salesBestSeller();
    }



    public function salesBestProfits()
    {
        return $this->safeRepositoryInterface->salesBestProfits();
    }



    public function collectedData(Request $request)
    {
        return $this->safeRepositoryInterface->collectedData($request);
    }


    public function reports(Request $request)
    {
        return $this->safeRepositoryInterface->reports($request);
    }



}
