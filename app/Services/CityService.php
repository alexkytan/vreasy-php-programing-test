<?php


namespace App\Services;


use App\Models\City;
use Illuminate\Database\Eloquent\Collection;

class CityService
{
    /**
     * @param array $data
     * @return City
     */
    public function create(array $data): City
    {
        return City::create($data);
    }

    /**
     * @param array $searchParams
     * @return Collection
     */
    public function search(array $searchParams = []): Collection
    {
        return City::where($searchParams);
    }

    /**
     * @param City $city
     * @return City
     */
    public function find(City $city): City
    {
        return City::findOrFail($city);
    }

    /**
     * @param array $data
     * @param int $id
     * @return City
     */
    public function update(array $data, int $id): City
    {
        $city = City::findOrFail($id);

        $city->fill($data);
        $city->save();

        return $city;
    }

    /**
     * @param $id
     * @return bool
     */
    public function remove($id): bool
    {
        $city = City::findOrFail($id);

        return $city->delete();
    }
}