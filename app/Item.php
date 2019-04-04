<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Item extends Model
{

    protected $fillable = ["prop_no","org","type","item_name","source","date_procured","date_acquired","cost","salvage_value","life_span","age","disposed_date","disposed_method","remarks","location"];
    //
}
