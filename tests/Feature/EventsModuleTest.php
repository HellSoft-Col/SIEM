<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Models\File;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventsModuleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function it_shows_the_events_list()
    {
        $user = factory(User::class)->create([
            'name' => 'Licho',
            'identification' => '111',
            'email' => 'test',
            'role' => 'ADMIN',
            'password' => bcrypt('secret'),
            'remember_token' => str_random(10),
        ]);

        factory(Event::class)->create([
            'date_time' => '10/10/10',
            'description' => 'test',
            'place' => 'test',
            'name' => 'test',
            'user_id' => $user->id,
        ]);

        $this->get('/events')
            ->assertStatus(200)
            ->assertSee('test');
    }

    function it_shows_a_default_message_if_the_events_list_is_empty()
    {
        $this->get('/events')
            ->assertStatus(200)
            ->assertSee('No hay eventos en el sistema.');
    }

    /** @test */
    function it_displays_the_events_details()
    {
        $user = factory(User::class)->create([
            'name' => 'Licho',
            'identification' => '111',
            'email' => 'test',
            'role' => 'ADMIN',
            'password' => bcrypt('secret'),
            'remember_token' => str_random(10),
        ]);

        $e = factory(Event::class)->create([
            'date_time' => '10/10/10',
            'description' => 'test',
            'place' => 'test',
            'name' => 'test',
            'user_id' => $user->id,
        ]);

        factory(File::class)->create([
            'path' => 'files\uploads',
            'description' => 'test',
            'event_id' => $e->id,
            'type' => 'EVENT',
        ]);

        $this->get('/events/'.$e->id)
        ->assertStatus(200)
            ->assertSee('test')
            ->assertSee('Licho')
            ->assertSee('files\uploads');
    }

    /** @test */
    function it_displays_a_404_error_if_the_event_is_not_found()
    {
        $this->get('/events/999')
            ->assertStatus(404);
    }
}
