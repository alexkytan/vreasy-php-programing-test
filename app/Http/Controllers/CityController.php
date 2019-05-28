<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Http\Requests\CityRequest;
use App\Services\CityService;
use Illuminate\Http\Request;

class CityController extends Controller
{
    protected $service;

    public function __construct(
        CityService $service
    )
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
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
     */
    public function store(CityRequest $request)
    {
        return $this->service->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(City $city)
    {
        return $this->service->find($city);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CityRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, int $id)
    {
        if ($this->service->remove($id)) {
            return response(null, 204);
        }
    }
}
