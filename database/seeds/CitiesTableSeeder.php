<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [];
        $cities[] = [
            'name' => 'New York',
            'lat'  => 40.712784,
            'lng'  => -74.005943
        ];
        $cities[] = [
            'name' => 'Lincoln',
            'lat'  => 33.613159,
            'lng'  => -86.118309
        ];
        $cities[] = [
            'name' => 'Forest Hill',
            'lat'  => 31.041857,
            'lng'  => -92.531250
        ];
        $cities[] = [
            'name' => 'Old Town',
            'lat'  => 44.951935,
            'lng'  => -68.674011
        ];
        $cities[] = [
            'name' => 'New Leipzig',
            'lat'  => 46.376118,
            'lng'  => -101.939873
        ];
        $cities[] = [
            'name' => 'Woodland',
            'lat'  => 45.904560,
            'lng'  => -122.743988
        ];
        $cities[] = [
            'name' => 'Middletown',
            'lat'  => 40.199814,
            'lng'  => -76.731079
        ];

        foreach ($cities as $city) {
            DB::table('cities')->insert([
                'name' => $city['name'],
                'lat' => $city['lat'],
                'lng' => $city['lng'],
            ]);
        }
    }
}
