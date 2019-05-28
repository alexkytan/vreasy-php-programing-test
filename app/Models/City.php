<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class City
 * @package App\Models
 * @mixin \Eloquent
 */
class City extends Model
{
    public $timestamps = false;

    protected $casts = [
        'lat' => 'float',
        'lng' => 'float',
    ];

    protected $fillable = [
        'name',
        'lat',
        'lng',
    ];
}
