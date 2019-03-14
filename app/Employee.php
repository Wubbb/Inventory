<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ["name", "assignment"];
    protected $table = "employee";
    //
}
