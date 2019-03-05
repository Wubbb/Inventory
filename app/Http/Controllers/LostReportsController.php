<?php

namespace App\Http\Controllers;

use App\LostReports;
use Illuminate\Http\Request;
use DB;
class LostReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $reports = Reports::all();
        // return view('reports.lostReports');
        //
       return DB::table('lost_reports')
       ->join('reports', 'reports.id', '=','lost_reports.reports_id')
       ->select('lost_reports.last_used_by','reports.*')
       ->get();
    }

}
