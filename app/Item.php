<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    protected $fillable = ["wahProp","type","details","dateProc","method","from","cost","depre","assignTo","dateProc"];

    public $timestamps = false;
    //
}
