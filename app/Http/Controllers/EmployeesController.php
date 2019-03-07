<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use DB;

class EmployeesController extends Controller
{
    public function index() {
        $employee = Employee::all();
         return view('employee.index')->with('employee', $employee);
        // return DB::table('employee')
        // ->join('employee', 'employee.id', '=','items.assignTo')
        // ->select('items.*','employee.*')
        // ->get();
    }

    public function create() {
        return view('employee.addform');
    }

    public function show($id) { 
        $item = Item::find($id);
        return view('employee.show')->with('item',$item); 
    }

    public function craig() {
        return DB::table('items')
        ->join('employee', 'employee.id', '=','items.assignTo')
        ->select('items.*','employee.name')
        ->get();
    }
    //
}
