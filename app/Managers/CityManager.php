<?php


namespace App\Managers;


use App\Models\City;
use Exception;
use \Illuminate\Contracts\Pagination\LengthAwarePaginator;

class CityManager
{
    const DEFAULT_PER_PAGE = 3;

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
     * @return City
     */
    public function search(array $searchParams = []): City
    {
        $query = City::where('name', $searchParams['name']);

        if (!empty($searchParams['lng']) && !empty($searchParams['lat'])) {
            $query->orWhere(
                [
                    'lng' => $searchParams['lng'],
                    'lat' => $searchParams['lat'],
                ]
            );
        }

        return $query->firstOrFail();
    }

    /**
     * @param City $city
     * @return City
     */
    public function find(City $city): City
    {
        return City::findOrFail($city)->first();
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
     * @throws Exception
     */
    public function remove($id): bool
    {
        $city = City::findOrFail($id);

        return $city->delete();
    }

    /**
     * @return LengthAwarePaginator
     */
    public function getAll(): LengthAwarePaginator
    {
        return City::paginate(self::DEFAULT_PER_PAGE);
    }
}