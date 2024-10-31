<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\IsDeletedScope;

class student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = [
        'name',
        'email',
        'enrollment_no',
        'dob',
        'mobile_no',
        'gender',
        'address',
        'class',
        'course',
        'semester',
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new IsDeletedScope);
    }
}
