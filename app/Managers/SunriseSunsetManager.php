<?php


namespace App\Managers;


use App\ExternalAPIClients\Models\SunriseSunsetModel;
use App\ExternalAPIClients\SunriseSunsetAPIInterface;

class SunriseSunsetManager
{
    /**
     * @var SunriseSunsetAPIInterface
     */
    protected $api;

    /**
     * SunriseSunsetManager constructor.
     * @param SunriseSunsetAPIInterface $api
     */
    public function __construct(SunriseSunsetAPIInterface $api)
    {
        $this->api = $api;
    }

    /**
     * @param float $latitude
     * @param float $longitude
     * @param string|null $date
     * @param string|null $timezone
     * @return SunriseSunsetModel
     */
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