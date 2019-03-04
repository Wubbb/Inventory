<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use DB;

class EmployeesController extends Controller
{
    public function index() {
        // return view('employees');
         DB::table("employee")->get();
    }
    //
}
