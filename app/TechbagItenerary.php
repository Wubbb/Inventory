<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TechbagItenerary extends Model
{

    protected $table = "techbag_itenerary";

    protected $fillable = [
        "training",
        "purpose",
        "employee_name",
        "date_out",
        "date_in",
        "location"
    ];
}
