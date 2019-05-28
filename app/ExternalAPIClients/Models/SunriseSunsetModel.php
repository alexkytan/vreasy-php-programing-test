<?php


namespace App\ExternalAPIClients\Models;

use App\Utils\DateUtil;
use Carbon\Carbon;
use Exception;


/**
 * Class EstimateItem
 *
 * @property int $day_length
 * @property Carbon $astronomical_twilight_begin
 * @property Carbon $astronomical_twilight_end
 * @property Carbon $civil_twilight_begin
 * @property Carbon $civil_twilight_end
 * @property Carbon $date
 * @property Carbon $nautical_twilight_begin
 * @property Carbon $nautical_twilight_end
 * @property Carbon $solar_noon
 * @property Carbon $sunrise
 * @property Carbon $sunset
 *
 * @package App\ExternalAPIClients\Models
 */
class SunriseSunsetModel extends ExternalAPIModel
{
    const DATE_ATTRIBUTE_FORMAT = 'Y-m-d';

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
     * @var string
     */
    protected $timezone;

    public function __construct(array $attributes = [], string $timezone = null)
    {
        parent::__construct($attributes);

        $this->timezone = $timezone;
    }

    /**
     * Get the date of sunrise/sunset.
     *
     * @return string
     * @throws Exception
     */
    public function getDateAttribute()
    {
        return DateUtil::getDateWithTimezone($this->attributes['sunrise'], $this->timezone, self::DATE_ATTRIBUTE_FORMAT);
    }

    /**
     * Get the date of sunrise/sunset.
     *
     * @return string
     * @throws Exception
     */
    public function getSunriseAttribute()
    {
        return DateUtil::getDateWithTimezone($this->attributes['sunrise'], $this->timezone);
    }

    /**
     * Get the date of sunrise/sunset.
     *
     * @return string
     * @throws Exception
     */
    public function getSunsetAttribute()
    {
        return DateUtil::getDateWithTimezone($this->attributes['sunset'], $this->timezone);
    }
}