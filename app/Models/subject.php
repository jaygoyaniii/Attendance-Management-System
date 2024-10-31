<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\IsDeletedScope;

class subject extends Model
{
    use HasFactory;

    protected $table = 'subjects';

    protected $fillable = [
        'subject_name',
        'class',
        'semester',
    ];

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new IsDeletedScope);
    }

}
