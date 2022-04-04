<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
    ];

    public function propertiable()
    {
        return $this->morphTo();
    }

    public function values()
    {
        return $this->belongsToMany(Value::class, 'property_value');
    }
}
