<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use DB;
class ReportsController extends Controller
{
    public function index() {
         $reports = DB::table("reports")->get();
        // $reports = Report::all();
        //$reports = array();
        return view('reports.reports')->with("reports",$reports);
    }
    //
}