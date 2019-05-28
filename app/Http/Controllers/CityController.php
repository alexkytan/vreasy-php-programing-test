<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Http\Requests\CityRequest;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return City::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $request)
    {
        $city = City::create($request->validated());

        return $city;
    }

    /**
     * Display the specified resource.
     *
     * @param  City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        return City::findOrFail($city);
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
        $city = City::findOrFail($id);
        $city->fill($request->validated());
        $city->save();

        return response()->json($city);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CityRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CityRequest $request, int $id)
    {
        $city = City::findOrFail($id);

        if ($city->delete()) {
            return response(null, 204);
        }
    }
}
