<?php

namespace App\Http\Controllers;

use App\Http\Requests\SunriseSunsetRequest;
use App\Managers\CityManager;
use App\Managers\SunriseSunsetManager;
use Exception;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SunriseSunsetController extends Controller
{
    /**
     * @var SunriseSunsetManager
     */
    protected $manager;

    /**
     * @var CityManager
     */
    protected $cityManager;

    /**
     * SunriseSunsetController constructor.
     * @param SunriseSunsetManager $manager
     * @param CityManager $cityManager
     */
    public function __construct(SunriseSunsetManager $manager, CityManager $cityManager)
    {
        $this->manager = $manager;
        $this->cityManager = $cityManager;
    }

    /**
     * Display a listing of the resource.
     * @param SunriseSunsetRequest $request
     * @return \App\ExternalAPIClients\Models\SunriseSunsetModel
     */
    public function index(SunriseSunsetRequest $request)
    {
        $lat = $request->get('lat');
        $lng = $request->get('lng');

        if ($request->get('cityName')) {
            $city = $this->findCity($request->get('cityName'));

            $lat = $city->lat;
            $lng = $city->lng;
        }

        return $this->manager->getByCoordinates(
            $lat,
            $lng,
            $request->get('date'),
            $request->get('timezone')
        );
    }

    /**
     * @param $cityName
     * @return \App\Models\City
     */
    private function findCity($cityName)
    {
        try {
            return $this->cityManager->search([
                'name' => $cityName
            ]);
        } catch (Exception $exception) {
            throw new NotFoundHttpException('Cannot find sunrise/sunset data for ' . $cityName);
        }
    }
}
