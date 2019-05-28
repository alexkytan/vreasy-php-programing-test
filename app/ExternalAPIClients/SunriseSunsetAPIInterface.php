<?php


namespace App\ExternalAPIClients;


use App\ExternalAPIClients\Models\SunriseSunsetModel;
use App\Utils\DateUtil;

interface SunriseSunsetAPIInterface
{
    const DEFAULT_DATE = 'today';
    const DEFAULT_TIMEZONE = DateUtil::DEFAULT_TIMEZONE;

    public function get(
        float $latitude,
        float $longitude,
        string $date = self::DEFAULT_DATE,
        string $timezone = self::DEFAULT_TIMEZONE
    ): SunriseSunsetModel;
}