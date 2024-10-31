<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attendanceStatus extends Model
{
    use HasFactory;

    protected $table = "attendance_statuses";

    protected $fillable = [
        'fill_attendance_id',
        'student_id',
        'status'
    ];
}
