<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityRequest;
use App\Models\City;
use App\Services\CityService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CityController extends Controller
{
    /**
     * @var CityService
     */
    protected $service;

    /**
     * CityController constructor.
     * @param CityService $service
     */
    public function __construct(CityService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     * @param CityRequest $request
     * @return City|\Illuminate\Database\Eloquent\Collection
     */
    public function index(CityRequest $request)
    {
        $searchData = $request->validated();

        return count($searchData) === 0
            ? $this->service->getAll()
            : $this->service->search($request->validated());
    }

    /**
     * Store a newly created resource in storage.
     * @param CityRequest $request
     * @return City
     */
    public function store(CityRequest $request)
    {
        return $this->service->create($request->validated());
    }

    /**
     * Display the specified resource.
     * @param City $city
     * @return City
     */
    public function show(City $city)
    {
        return $this->service->find($city);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CityRequest $request
     * @param int $id
     * @return Response
     */
    public function update(CityRequest $request, int $id)
    {
        return response()->json(
            $this->service->update($request->validated(), $id)
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     * @throws \Exception
     */
    public function destroy(Request $request, int $id)
    {
        if ($this->service->remove($id)) {
            return response(null, 204);
        }
    }
}
