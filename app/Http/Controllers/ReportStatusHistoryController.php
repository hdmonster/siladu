<?php

namespace App\Http\Controllers;

use App\Models\ReportStatusHistory;
use App\Http\Requests\StoreReportStatusHistoryRequest;
use App\Http\Requests\UpdateReportStatusHistoryRequest;

class ReportStatusHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReportHistoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReportHistoryRequest $request)
    {   
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReportStatusHistory  $reportStatusHistory
     * @return \Illuminate\Http\Response
     */
    public function show(ReportStatusHistory $reportStatusHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReportStatusHistory  $reportStatusHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(ReportStatusHistory $reportStatusHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReportHistoryRequest  $request
     * @param  \App\Models\ReportStatusHistory  $reportStatusHistory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReportHistoryRequest $request, ReportStatusHistory $reportStatusHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReportStatusHistory  $reportStatusHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReportStatusHistory $reportStatusHistory)
    {
        //
    }

    public function storeStatusLog($id, $status) {
        $existingStatus = ReportStatusHistory::where(['report_id' => $id, 'status' => $status]);

        if ($existingStatus->exists()) {
            $existingStatusId = $existingStatus->first()->id;
            $existingStatus->where('id', $existingStatusId)->update(['status' => $status]);
        } else {
            ReportStatusHistory::create([
                'report_id' => $id,
                'admin_id' => auth()->user()->id,
                'status' => $status
            ]);
        }
    }
}
