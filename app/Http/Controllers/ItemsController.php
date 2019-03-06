<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use DB;
class ItemsController extends Controller

{
    public function index() {
        $items = DB::table('items')
        ->leftjoin('employee', 'employee.id', '=','items.assignTo')
        ->select('items.*','employee.name')
        ->get();
        return view('items.index')->with('items', $items);
    }

    public function store(Request $request) {
        Item::create(["title" => $request->title,"desc"=>$request->desc,"from" => $request->from]);
        
        return redirect('/items')->with('status','Successfully Added!!');
    }

    public function create() {
        return view('items.addform');
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

    public function edit($id){
        $item = Item::find($id);
        return view('items.editform')->with('item',$item);
    }
    public function update(Request $request,$id) {
        $item = Item::find($id);
        $item->title = $request->title;
        $item->desc = $request->desc;
        $item->from = $request->from;
        $item->save();

        return redirect('/items')->with('status','Successfully updated!');
    }

    public function craig() {
        return DB::table('items')
        ->join('employee', 'employee.id', '=','items.assignTo')
        ->select('items.*','employee.name')
        ->get();
    }



    //
 }
