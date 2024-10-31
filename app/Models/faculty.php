<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\IsDeletedScope;

class faculty extends Model
{
    use HasFactory;

    protected $table = 'faculties';

    protected $fillable = [
        'name',
        'email',
        'qualification',
        'dob',
        'gender',
        'mobile_no',
        'address',
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new IsDeletedScope);
    }
}
