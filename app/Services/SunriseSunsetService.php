<?php


namespace App\Services;


use App\ExternalAPIClients\Models\SunriseSunsetModel;
use App\ExternalAPIClients\SunriseSunsetAPIInterface;

class SunriseSunsetService
{
    /**
     * @var SunriseSunsetAPIInterface
     */
    protected $api;

    public function __construct(
        SunriseSunsetAPIInterface $api
    )
    {
        $this->api = $api;
    }

    public function getByCoordinates(
        float $latitude,
        float $longitude,
        ?string $date = SunriseSunsetAPIInterface::DEFAULT_DATE,
        ?string $timezone = SunriseSunsetAPIInterface::DEFAULT_TIMEZONE
    ): SunriseSunsetModel {
        $date = $date ?? SunriseSunsetAPIInterface::DEFAULT_DATE;
        $timezone = $timezone ?? SunriseSunsetAPIInterface::DEFAULT_TIMEZONE;

        return $this->api->get($latitude, $longitude, $date, $timezone);
    }
}