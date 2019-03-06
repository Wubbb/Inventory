<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use DB;
class ReportsController extends Controller
{
    public function index() {
         $reports = DB::table('items')
         ->join('employee', 'employee.id', '=','items.assignTo')
         ->select('items.*','employee.name')
         ->get();
        return view('reports.reports')->with("reports",$reports);
    }
    //
}
