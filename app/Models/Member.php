<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable =
    [
        "member_name",
        "loan_date",
        "loan_end_date",
    ];
}
