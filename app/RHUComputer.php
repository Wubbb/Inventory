<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RHUComputer extends Model
{
    protected $table = "rhu_computers";

    protected $fillable = [
        "municipality",
        "rhu",
        "owned_by",
        "property_no",
        "type",
        "spec",
        "ram",
        "hdd",
        "os",
        "location",
        "status",
        "wah_adoption",
        "date_acquired"
    ];
}
