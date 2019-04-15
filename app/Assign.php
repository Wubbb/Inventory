<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assign extends Model
{
    protected $fillable = [
        "id",
        "item_id",
        "user_id",
        "date_assigned",
        "date_returned",
        "remarks",
        "created_at",
        "updated_at"
];
protected $table = "assigns";
}
