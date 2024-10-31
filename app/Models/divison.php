<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\IsDeletedScope;

class divison extends Model
{
    use HasFactory;

    protected $table = 'classes';

    protected $fillable=[
        'classCode',
        'course',
        'semester',
        'year',
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new IsDeletedScope);
    }
}
