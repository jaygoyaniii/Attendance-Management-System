<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fillAttendance extends Model
{
    use HasFactory;

    protected $table = 'fill_attendances';

    protected $fillable=[
        'class',
        'subject',
        'faculty',
        'date',
        'attendance',
    ];
}
