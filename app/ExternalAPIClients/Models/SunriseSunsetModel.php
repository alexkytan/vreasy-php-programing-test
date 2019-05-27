<?php


namespace App\ExternalAPIClients\Models;


/**
 * Class EstimateItem
 *
 * @property int $day_length
 * @property \Carbon\Carbon $astronomical_twilight_begin
 * @property \Carbon\Carbon $astronomical_twilight_end
 * @property \Carbon\Carbon $civil_twilight_begin
 * @property \Carbon\Carbon $civil_twilight_end
 * @property \Carbon\Carbon $date
 * @property \Carbon\Carbon $nautical_twilight_begin
 * @property \Carbon\Carbon $nautical_twilight_end
 * @property \Carbon\Carbon $solar_noon
 * @property \Carbon\Carbon $sunrise
 * @property \Carbon\Carbon $sunset
 *
 * @package App\ExternalAPIClients\Models
 */
class SunriseSunsetModel extends ExternalAPIModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'astronomical_twilight_begin',
        'astronomical_twilight_end',
        'civil_twilight_begin',
        'civil_twilight_end',
        'day_length',
        'nautical_twilight_begin',
        'nautical_twilight_end',
        'solar_noon',
        'sunrise',
        'sunset',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'astronomical_twilight_begin' => 'datetime',
        'astronomical_twilight_end' => 'datetime',
        'civil_twilight_begin' => 'datetime',
        'civil_twilight_end' => 'datetime',
        'nautical_twilight_begin' => 'datetime',
        'nautical_twilight_end' => 'datetime',
        'solar_noon' => 'datetime',
        'sunrise' => 'datetime',
        'sunset' => 'datetime',
    ];

    /**
     * The attributes that should be visible in arrays.
     *
     * @var array
     */
    protected $visible = [
        'date',
        'sunrise',
        'sunset',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['date'];

    /**
     * Get the date of sunrise/sunset.
     *
     * @return string
     */
    public function getDateAttribute()
    {
        return $this->attributes['sunrise'];
    }
}