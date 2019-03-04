<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TechbagsController extends Controller
{
    public function index() {
        return view('techbag.index');
    }
    //
}
