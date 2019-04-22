<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;

class TechbagReportsController extends Controller
{
    //
    public function index() {
        $items = DB::table('items')->where('org', 'WAH-Techbag')->whereNotNull('location')->whereNull('disposed_date')
            ->get();

        return view('reports.index')->with('items',$items);
    }
}
