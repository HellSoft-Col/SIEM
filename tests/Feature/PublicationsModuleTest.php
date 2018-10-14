<?php

namespace Tests\Feature;

use App\Models\File;
use App\Models\Publication;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PublicationsModuleTest extends TestCase
{
    use RefreshDatabase;


    /** @test */
    function it_shows_the_publications_list()
    {
        $user = factory(User::class)->create([
            'name' => 'Licho',
            'identification' => '111',
            'email' => 'test',
            'role' => 'ADMIN',
            'password' => bcrypt('secret'),
            'remember_token' => str_random(10),
        ]);

        $p = factory(Publication::class)->create([
            'header' => 'testPublication',
            'user_id' => $user->id,
        ]);

        factory(File::class)->create([
            'path' => 'files\uploads',
            'description' => 'test',
            'publication_id' => $p->id,
            'type' => 'PUBLICATION',
        ]);

        $this->get('/feed')
            ->assertStatus(200)
            ->assertSee('testPublication')
            ->assertSee('Licho')
            ->assertSee('files\uploads');
    }

    /** @test */
    function it_shows_a_default_message_if_the_publications_list_is_empty()
    {
        $this->get('/feed')
            ->assertStatus(200)
            ->assertSee('No hay publicaciones en el sistema.');
    }
}
