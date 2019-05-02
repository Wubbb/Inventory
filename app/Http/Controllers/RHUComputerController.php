<?php

namespace App\Http\Controllers;

use App\RHUComputer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class RHUComputerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $computers = DB::table('rhu_computers')->get();
        return view('rhucomputers.index')->with('computers',$computers);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        RHUComputer::Create(["municipality" => $request->municipality,
        "rhu" => $request->rhu,
        "owned_by" => $request->owned_by,
        "property_no" => $request->property_no,
        "type" => $request->type,
        "spec" => $request->spec,
        "ram" => $request->ram,
        "hdd" => $request->hdd,
        "os" => $request->os,
        "location" => $request->location,
        "status" => $request->status,
        "wah_adoption" => $request->wah_adoption,
        "date_acquired" => $request->date_acquired
        ]);
        return redirect('/rhucomputers')->with('status','Successfully Added!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RHUComputer  $rHUComputer
     * @return \Illuminate\Http\Response
     */
    public function show(RHUComputer $rHUComputer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RHUComputer  $rHUComputer
     * @return \Illuminate\Http\Response
     */
    public function edit(RHUComputer $rHUComputer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RHUComputer  $rHUComputer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $computer = RHUComputer::find($request->id1);
        $computer->municipality = $request->municipality1;
        $computer->rhu = $request->rhu1;
        $computer->owned_by = $request->owned_by1;
        $computer->property_no = $request->property_no1;
        $computer->type = $request->type1;
        $computer->spec = $request->spec1;
        $computer->ram = $request->ram1;
        $computer->hdd = $request->hdd1;
        $computer->os = $request->os1;
        $computer->location = $request->location1;
        $computer->status = $request->status1;
        $computer->wah_adoption = $request->wah_adoption1;
        $computer->date_acquired = $request->date_acquired1;
        $computer->save();

        return redirect('/rhucomputers')->with('status','Successfully Updated!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RHUComputer  $rHUComputer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $computer = RHUComputer::find($request->id2);
        $computer->delete();
        return redirect('/rhucomputers')->with('status','Successfully Deleted Item!');
    }
}
