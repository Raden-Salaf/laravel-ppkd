<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable =
    [
        'major_id',
        'name',
        'phone',
    ];

    // ORM -> Object Relations Model
    // ada 3 :
    // 1. One to one : Jarang Sekali dipakai untuk relasi
    // 2. One to Many : satu ke banyak (satu jurusan bisa dipilih banyak siswa)
    // 3. Many to Many :
    // user user_roles roles
    // 1        1       1
    // 1        2       2

    // major    Student
    // 1        1 1
    // 1        2 1

    // belongsTo
    // left joint -> perelasasian
    public function major()
    {
        return $this->belongsTo(Majors::class, 'major_id', 'id');
    }
}
