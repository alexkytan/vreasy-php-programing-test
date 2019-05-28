<?php

namespace App\Http\Controllers;

use App\Http\Requests\SunriseSunsetRequest;
use App\Services\SunriseSunsetService;

class SunriseSunsetController extends Controller
{
    protected $service;

    public function __construct(
        SunriseSunsetService $service
    )
    {
        $this->service = $service;
    }

    public function get(SunriseSunsetRequest $request)
    {

        return $this->service->getByCoordinates(
            $request->get('lat'),
            $request->get('lng'),
            $request->get('date'),
            $request->get('timezone')
        );
    }
}
