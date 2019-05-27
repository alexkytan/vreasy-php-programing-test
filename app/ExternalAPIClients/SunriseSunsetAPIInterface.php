<?php


namespace App\ExternalAPIClients;


use App\ExternalAPIClients\Models\SunriseSunsetModel;

interface SunriseSunsetAPIInterface
{
    const DEFAULT_DATE = 'today';

    public function get(
        float $latitude,
        float $longitude,
        string $date = self::DEFAULT_DATE
    ): SunriseSunsetModel;
}