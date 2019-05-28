<?php

namespace Tests\Unit;

use App\Models\City;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CityTest extends TestCase
{
    public function __call($method, $args)
    {
        if (in_array($method, ['get', 'post', 'put', 'patch', 'delete'])) {
            return $this->call($method, $args[0]);
        }

        throw new \BadMethodCallException;
    }

    public function testCanCreateCity()
    {
        $data = [
            'name' => $this->faker->word,
            'lat' => $this->faker->randomFloat(2, 1, 100 ),
            'lng' => $this->faker->randomFloat(2, 1, 100 )
        ];

        $this->post(route('cities.store'), $data)
            ->assertStatus(201)
            ->assertJson($data);
    }

    public function testCanUpdateCity()
    {
        $city = factory(City::class)->create([
            'name' => $this->faker->word,
            'lat' => $this->faker->randomFloat(2, 1, 100 ),
            'lng' => $this->faker->randomFloat(2, 1, 100 )
        ]);

        $data = [
            'name' => $this->faker->word,
            'lat' => $this->faker->randomFloat(2, 1, 100 ),
            'lng' => $this->faker->randomFloat(2, 1, 100 ),
        ];

        $this->put(route('cities.update', $city->id), $data)
            ->assertStatus(200)
            ->assertJson($data);
    }

    public function testCanShowCity()
    {
        $city = factory(City::class)->create([
            'name' => $this->faker->word,
            'lat' => $this->faker->randomFloat(2, 1, 100 ),
            'lng' => $this->faker->randomFloat(2, 1, 100 )
        ]);

        $this->get(route('cities.show', $city->id))
            ->assertStatus(200);
    }

    public function testCanDeleteCity()
    {
        $city = factory(City::class)->create([
            'name' => $this->faker->word,
            'lat' => $this->faker->randomFloat(2, 1, 100 ),
            'lng' => $this->faker->randomFloat(2, 1, 100 )
        ]);

        $this->delete(route('cities.destroy', $city->id))
            ->assertStatus(204);
    }

    public function testCanListCities()
    {
        $this->get(route('cities.index'))
            ->assertStatus(200)
            ->assertJsonStructure([
                '*' => ['id', 'name', 'lat', 'lng'],
            ]);
    }
}
