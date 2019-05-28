<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityRequest;
use App\Http\Resources\CityCollection;
use App\Models\City;
use App\Managers\CityManager;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CityController extends Controller
{
    /**
     * @var CityManager
     */
    protected $manager;

    /**
     * CityController constructor.
     * @param CityManager $manager
     */
    public function __construct(CityManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * Display a listing of the resource.
     * @param CityRequest $request
     * @return CityCollection|City
     */
    public function index(CityRequest $request)
    {
        $searchData = $request->validated();

        if (count($searchData) !== 0) {
            return $this->manager->search($request->validated());
        }

        return new CityCollection($this->manager->getAll());
    }

    /**
     * Store a newly created resource in storage.
     * @param CityRequest $request
     * @return City
     */
    public function store(CityRequest $request)
    {
        return $this->manager->create($request->validated());
    }

    /**
     * Display the specified resource.
     * @param City $city
     * @return City
     */
    public function show(City $city)
    {
        return $this->manager->find($city);
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
            $this->manager->update($request->validated(), $id)
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
        if ($this->manager->remove($id)) {
            return response(null, 204);
        }
    }
}
