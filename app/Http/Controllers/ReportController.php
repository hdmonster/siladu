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
            'reports' => Report::latest('updated_at')->get(),
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
        $validatedData = $request->validate($request->rules());

        Report::create($validatedData);

        // return redirect()->back();
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        return Report::with('reportStatusHistories')
                ->where(['id' => $report->id])
                ->first();
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
        Report::destroy($report->id);

        return redirect()->back();
    }

    public function updateStatus($id, $changeStatus) {
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
        Report::where('id', $id)->update(['status' => $status]);
        
        $reportStatusHistoryC = new ReportStatusHistoryController();
        $reportStatusHistoryC->storeStatusLog($id, $status);

        return redirect()->back();
    }

    public function showByCode($code) {
        return Report::with('reportStatusHistories')
                ->where(['code' => $code])
                ->first();
    } 
}  
