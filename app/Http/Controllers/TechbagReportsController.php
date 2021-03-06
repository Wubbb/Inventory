<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;

class TechbagReportsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index() {
        $items = DB::table('items')->where('location','like', 'Tech Bag'.'%')->whereNotNull('location')->whereNull('disposed_date')
            ->get();
        $location = DB::table('items')->select('location')->groupBy('location')->where('location','like','Tech Bag%')->get();

        return view('reports.index')->with(['items'=>$items, 'location'=>$location]);
    }
}
