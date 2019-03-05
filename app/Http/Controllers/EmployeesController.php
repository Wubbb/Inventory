<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use DB;

class EmployeesController extends Controller
{
    public function index() {
        // return view('employees');
        return DB::table('employee')
        ->join('employee', 'employee.id', '=','items.assignTo')
        ->select('items.*','employee.*')
        ->get();
    }
    //
}
