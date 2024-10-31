<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assignsubject extends Model
{
    use HasFactory;

    protected $table = 'assignsubjects';

    protected $fillable=[
        'subject_id',
        'faculty_id'
    ];

}
