<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\Item;
use DB;
class ReportsController extends Controller
{
    public function index() {


    //    echo  $items = Item::find(1);

        // foreach($items as $item) {
        //     echo 
        // }
        $reports = DB::table("items")
        ->join('employee', 'employee.id', '=','items.assignTo')
        ->select('items.*','employee.name')
        ->get();
        // // $reports = Report::all();
        // //$reports = array();

        return view('reports.reports')->with("reports",$reports);
    }
    //
}
