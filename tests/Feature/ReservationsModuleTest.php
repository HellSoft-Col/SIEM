<?php

namespace Tests\Feature;

use App\Models\ResourceType;
use App\Models\Resource;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReservationsModuleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function it_creates_a_new_reservation()
    {
        $user = factory(User::class)->create([
            'name' => 'Licho',
            'identification' => '11111111',
            'email' => 'test@gmail.com',
            'role' => 'USER',
            'password' => bcrypt('secret'),
            'remember_token' => str_random(10),
        ]);

        $ct = factory(ResourceType::class)->create([
            'name' => 'estudio',
        ]);

        $r = factory(Resource::class)->create([
            'name' => 'sala 1',
            'description' => 'Tercer piso - 301',
            'type' => 'CLASSROOM',
            'state' => 'AVAILABLE',
            'resource_type_id' => $ct->id,
        ]);

        $this->put('/person/reservation/create', [
            'state' => 'ACTIVE',
            'start_time' => '2018-05-22 09:00:00',
            'end_time' => '2018-05-22 11:00:00',
            'user_id' => $user->id,
            'resource_id' => $r->id,
            'moulted' => '0', //0, no tiene
        ]);

        $this->assertDatabaseHas('reservation', [
            'state' => 'ACTIVE',
            'start_time' => '2018-05-22 09:00:00',
            'end_time' => '2018-05-22 11:00:00',
        ]);
    }
}
