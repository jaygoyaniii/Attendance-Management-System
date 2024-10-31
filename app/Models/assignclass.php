<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assignclass extends Model
{
    use HasFactory;

    protected $table = 'assignclasses';

    protected $fillable=[
        'classId',
        'id'
    ];

}
