<?php


namespace App\ExternalAPIClients;


use App\ExternalAPIClients\Models\SunriseSunsetModel;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class SunriseSunsetAPI implements SunriseSunsetAPIInterface
{
    const URL = 'https://api.sunrise-sunset.org';
    const GET_URI = '/json';

    /**
     * @var Client
     */
    protected $client;

    public function __construct()
    {
        $this->client = new Client(['base_uri' => self::URL]);
    }

    /**
     * @param float $latitude
     * @param float $longitude
     * @param string $date
     * @param string $timezone
     * @return SunriseSunsetModel
     */
    public function get(
        float $latitude,
        float $longitude,
        string $date = self::DEFAULT_DATE,
        string $timezone = self::DEFAULT_TIMEZONE
    ): SunriseSunsetModel {
        try {
            $response = $this->client->request('GET', self::GET_URI, [
                'query' => [
                    'lat' => $latitude,
                    'lng' => $longitude,
                    'date' => $date,
                    'formatted' => 0
                ]
            ]);

            $responseData = json_decode($response->getBody(), true);

            return new SunriseSunsetModel($responseData['results'], $timezone);
        } catch (GuzzleException $e) {
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }
}