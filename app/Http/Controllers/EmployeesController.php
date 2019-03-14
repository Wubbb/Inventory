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
       $employee = Employee::find($id);
        return view('employee.show')->with('employee',$employee); 
    }

    public function store(Request $request) {
        Employee::create(["name" => $request->name,"assignment"=>$request->assignment]);
        
        return redirect('/employee')->with('status','Successfully Added!!');
    }
 
    public function update(Request $request,$id) {
        $employee = Employee::find($id);
        $employee->title = $request->title;
        $employee->desc = $request->desc;
        $employee->save();

        return redirect('/employee')->with('status','Successfully updated!');
    }



    public function edit() {
        return DB::table('employee')->get();
    }
    //
}
