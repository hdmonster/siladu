<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\ReportStatusHistory;
use App\Http\Requests\StoreReportRequest;
use App\Http\Requests\UpdateReportRequest;
use App\Http\Requests\StoreReportStatusHistoryRequest;
use App\Http\Controllers\ReportStatusHistoryController;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.reports.index', [
            'title' => 'Laporan Aduan',
            'reports' => Report::latest()->get(),
        ]);
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
     * @param  \App\Http\Requests\StoreReportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReportRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        return $report;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReportRequest  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReportRequest $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        Report::destroy($report->uuid);

        return redirect()->back();
    }

    public function updateStatus($uuid, $changeStatus) {
        if ($changeStatus == 'confirm'){
            $status = 'sedang diproses';
        } elseif ($changeStatus == 'finish') {
            $status = 'selesai';
        } elseif ($changeStatus == 'spam') {
            $status = 'spam';
        } else {
            $status = 'butuh konfirmasi';
        }

        // Update report status
        Report::where('uuid', $uuid)->update(['status' => $status]);
        
        $reportStatusHistoryC = new ReportStatusHistoryController();
        $reportStatusHistoryC->storeStatusLog($uuid, $status);

        return redirect()->back();
    }

    
}
