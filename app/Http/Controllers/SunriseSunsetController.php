<?php

namespace App\Http\Controllers;

use App\Http\Requests\SunriseSunsetRequest;
use App\Services\CityService;
use App\Services\SunriseSunsetService;
use Exception;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SunriseSunsetController extends Controller
{
    protected $service;

    protected $cityService;

    public function __construct(
        SunriseSunsetService $service,
        CityService $cityService
    ) {
        $this->service = $service;
        $this->cityService = $cityService;
    }

    /**
     * Display a listing of the resource.
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

        return $this->service->getByCoordinates(
            $lat,
            $lng,
            $request->get('date'),
            $request->get('timezone')
        );
    }

    private function findCity($cityName)
    {
        try {
            return $this->cityService->search([
                'name' => $cityName
            ]);
        } catch (Exception $exception) {
            throw new NotFoundHttpException('Cannot find sunrise/sunset data for ' . $cityName);
        }
    }
}
