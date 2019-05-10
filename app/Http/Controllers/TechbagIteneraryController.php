<?php

namespace App\Http\Controllers;

use DB;
use App\TechbagItenerary;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class TechbagIteneraryController extends Controller
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
        $techbags = DB::table('techbag_itenerary')->get();
        $location = DB::table('items')->select('location')->groupBy('location')->where('location','like','Tech Bag'.'%')
        ->whereNotIn("location",TechbagItenerary::select("location")->whereNull("date_in"))->get();
        $local = DB::table('techbag_itenerary')->select('location')->groupBy('location')->get();
        return view('techbag.index')->with(['techbags'=>$techbags, 'location'=>$location, 'local'=>$local]);

    }

    public function change(Request $request){
        try{
            DB::table('techbag_itenerary')
                ->where('id', $request->techbag_id)
                ->update(['date_in' => $request->date_in]);
            return "Techbag Returned Successfully";
            }catch( Exception $e){
                return json_encode($e);
            }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        TechbagItenerary::create([
            "location" => $request->location,
            "training" => $request->training,
            "purpose" => $request->purpose,
            "date_out" => $request->date_out,
            //"date_in" => $request->date_in
        ]);
        return redirect('/techbagItenerary')->with('status','Successfully Added!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TechbagItenerary  $techbagItenerary
     * @return \Illuminate\Http\Response
     */
    public function show(TechbagItenerary $techbagItenerary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TechbagItenerary  $techbagItenerary
     * @return \Illuminate\Http\Response
     */
    public function edit(TechbagItenerary $techbagItenerary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TechbagItenerary  $techbagItenerary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TechbagItenerary $techbagItenerary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TechbagItenerary  $techbagItenerary
     * @return \Illuminate\Http\Response
     */
    public function destroy(TechbagItenerary $techbagItenerary)
    {
        //
    }
}
