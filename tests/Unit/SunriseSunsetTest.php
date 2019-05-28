<?php

namespace Tests\Unit;

use App\ExternalAPIClients\Models\SunriseSunsetModel;
use Tests\TestCase;

class SunriseSunsetTest extends TestCase
{
    public function testCanShowCity()
    {
        $this->call('GET', route('get_sunrise-sunset'), ['cityName' => 'New York'])
            ->assertStatus(200);
    }
}
