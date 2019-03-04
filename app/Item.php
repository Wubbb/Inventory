<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    protected $fillable = ["assignTo","dateProc"];
    public $timestamps = false;
    //
}
