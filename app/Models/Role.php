<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // insert data yang boleh diisi hanya dalam Role
    // DB::insert
    // Role::create
    protected $fillable =
    [
        'name',
        'is_active'
    ];
}
