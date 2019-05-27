<?php

namespace App\Http\Controllers;

use App\Services\SunriseSunsetService;
use Illuminate\Http\Request;

class SunriseSunsetController extends Controller
{
    protected $service;

    public function __construct(
        SunriseSunsetService $service
    )
    {
        $this->service = $service;
    }

    public function get()
    {
        // TODO: integrate get method from service
    }
}
