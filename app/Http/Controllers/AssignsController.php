<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Assign;
class AssignsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($id){
        $items = DB::table('items')
        ->whereNotIn("id",Assign::select("item_id")->whereNull("date_returned"))
        ->whereNull('disposed_date')->orderBy('id','desc')->get();
        $users = User::find($id);
        return view('assign.index')->with(['items'=> $items, 'users'=>$users]);
    }
}
