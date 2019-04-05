<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use DB;
use Validator;
class ItemsController extends Controller

{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        $items = DB::table('items')->get();
        return view('items.index')->with('items', $items);
    }

    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'prop_no' => 'required|unique:items'
        ]);
         
        if ($validator->fails()) {
            return redirect('/items')
                        ->with('failed','Failed Adding Item!')
                        ->withErrors($validator)
                        ->withInput();
        }
        Item::create(["prop_no" => $request->prop_no,
        "org"=>$request->org,
        "type"=>$request->type,
        "item_name" => $request->item_name,
        "source" => $request->source,
        "date_procured" => $request->date_procured,
        "date_acquired" => $request->date_acquired,
        "cost" => $request->cost,
        "salvage_value" => $request->salvage_value,
        "life_span" => $request->life_span        
        ]);
        
        return redirect('/items')->with('status','Successfully Added!!');
    }

    public function create() {
        return view('items.index');
    }

    public function destroy($id) {
        $item = Item::find($id);
        $item->delete();
        return redirect('/items')->with('status','Successfully Deleted Item '. $item->prop_no). '!';
    }
    public function show($id) { 
        $item = Item::find($id);
        return view('items.show')->with('item',$item); 
    }

    public function edit(Request $request){
        $item = Item::find($request->id);
     
    }
    public function update(Request $request) {
        $item = Item::find($request->id1);
        $item->prop_no = $request->wahProp1;
        $item->org = $request->org1;
        $item->type = $request->type1;
        $item->item_name = $request->name1;
        $item->source = $request->source1;
        $item->date_procured = $request->dateProc1;
        $item->date_acquired = $request->dateAcq1;
        $item->cost = $request->cost1;
        $item->salvage_value = $request->salv_val1;
        $item->life_span = $request->life_span1;

        $item->save();

        return redirect('/items')->with('status','Successfully updated!');
    }

    



    //
 }
