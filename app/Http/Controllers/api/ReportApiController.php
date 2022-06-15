<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\ReportStatusHistory;
use App\Http\Requests\StoreReportRequest;
use App\Http\Requests\UpdateReportRequest;
use App\Http\Requests\StoreReportStatusHistoryRequest;
use App\Http\Controllers\ReportStatusHistoryController;

class ReportApiController extends Controller
{
    public function store(StoreReportRequest $request)
    {
        $validatedData = $request->validate($request->rules());

        Report::create($validatedData);

        // return redirect()->back();
        return $request;
    }

    public function showByCode($code) {
        return Report::with('reportStatusHistories')
                ->where(['code' => $code])
                ->first();
    } 
}  
