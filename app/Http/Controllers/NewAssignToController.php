<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Assign;
use DB;
class NewAssignToController extends Controller
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
    public function index(Request $request)
    {
        try{
        DB::table('assigns')
            ->where('id', $request->item_id)
            ->update(['date_returned' => $request->date_returned, 'remarks' => $request->remarks]);
        return "Item Returned Successfully";
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
        // $request = $request->input();
        /**
         * {"emp_id":"1","item_id":"4","_token":"T7xCnqUpiA9hwrppF2yEhauJqnYmCbLMptrt3g8R"}
         */
        $user_id = $request->emp_id;
        $item_id = $request->item_id;
        $date_assigned = Carbon::now();
        $if_exists = Assign::select()
        ->where("item_id","=",$item_id)
        ->whereNull("date_returned")
        ->count();
// echo $if_exists;
        if($if_exists > 0){
            return 2;
        }
        $data = new Assign;
        $data->user_id = $user_id;
        $data->item_id = $item_id;
        $data->date_assigned = $date_assigned;
        $data->save();
        return 1;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
