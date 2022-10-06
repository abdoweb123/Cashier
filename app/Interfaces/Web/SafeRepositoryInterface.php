<?php

namespace App\Interfaces\Web;

use App\Http\Requests\SafeRequest;
use App\Http\Requests\SafeRequestCollectedData;
use App\Models\Safe;
use Illuminate\Http\Request;

interface SafeRepositoryInterface
{

    public function index();

    public function create();

    public function store(SafeRequest $request);

    public function edit(Safe $safe);

    public function update(SafeRequest $request, Safe $safe);

    public function forceDelete(Safe $safe);

    public function sales();

    public function profits();

    public function salesBestSeller();

    public function salesBestProfits();

    public function collectedData(Request $request);

    public function reports(Request $request);


}
