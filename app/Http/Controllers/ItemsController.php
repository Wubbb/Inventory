<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use DB;
class ItemsController extends Controller

{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        $items = DB::table('items')
        ->leftjoin('employee', 'employee.id', '=','items.assignTo')
        ->select('items.*','employee.name')
        ->get();
        $employee = DB::table('employee')->get();
        return view('items.index')->with(['items' => $items, 'employee' => $employee]);
    }

    public function store(Request $request) {
        Item::create(["wahProp" => $request->wahProp,
        "type"=>$request->type,
        "details" => $request->details,
        "dateProc" => $request->dateProc,
        "method" => $request->method,
        "from" => $request->from,
        "cost" => $request->cost,
        "assignTo" => $request->assignTo,
        "depre" => $request->depre        
        ]);
        
        return redirect('/items')->with('status','Successfully Added!!');
    }

    public function create() {
        return view('items.index');
    }

    public function destroy($id) {
        $item = Item::find($id);
        $item->delete();
        return redirect('/items')->with('status','Successfully Deleted Item '. $item->title). '!';
    }
    public function show($id) { 
        $item = Item::find($id);
        return view('items.show')->with('item',$item); 
    }

    public function edit(Request $request){
        $item = Item::find($request->id);
     
    }
    public function update(Request $request) {
        $item = Item::find($request->id);
        $item->wahProp = $request->wahProp;
        $item->type = $request->type;
        $item->details = $request->details;
        $item->dateProc = $request->dateProc;
        $item->method = $request->method;
        $item->from = $request->from;
        $item->cost = $request->cost;
        $item->assignTo = $request->assignTo;
        $item->depre = $request->depre;

        $item->save();

        return redirect('/items')->with('status','Successfully updated!');
    }

    



    //
 }
