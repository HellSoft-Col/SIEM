<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class RegistroUsuarioTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    function it_creates_new_user()
    {
        $this->from(route('user.create'))
            ->put('user/create/store', [
            'email' => 'Andres@hotmail.com',
            'confirmEmail' => 'Andres@hotmail.com',
            'password' => 'aN1.aN1.',
                'confirmPassword' => 'aN1.aN1.'
        ])->assertRedirect(route('user.update'));

        $this->assertCredentials([
           'email' => 'Andres@hotmail.com',
            'password' => 'aN1.aN1.',
        ]);
    }

    /** @test */
    function the_email_is_required()
    {
        $this->from(route('user.create'))
            ->put('user/create/store', [
                'email' => '',
                'password' => 'aN1.aN1.',
                'confirmPassword' => 'aN1.aN1.'
            ])->assertRedirect(route('user.create'))
                ->assertSessionHasErrors(['email']);

        $this->assertEquals(0,User::count());

    }

    /** @test */
    function the_email_must_be_valid()
    {
        $this->from(route('user.create'))
            ->put('user/create/store', [
                'email' => 'correo-no-valido',
                'password' => 'aN1.aN1.',
                'confirmPassword' => 'aN1.aN1.'
            ])->assertRedirect(route('user.create'))
            ->assertSessionHasErrors(['email']);

        $this->assertEquals(0,User::count());

    }

    /** @test */
    function the_email_must_be_unique()
    {
        factory(User::class)->create([
            'email' => 'Andres@hotmail.com'
        ]);
        $this->from(route('user.create'))
            ->put('user/create/store', [
                'email' => 'Andres@hotmail.com',
                'password' => 'aN1.aN1.',
                'confirmPassword' => 'aN1.aN1.'
            ])->assertRedirect(route('user.create'))
            ->assertSessionHasErrors(['email']);

        $this->assertEquals(1,User::count());

    }

    /** @test */
    function the_password_is_required()
    {
        $this->from(route('user.create'))
            ->put('user/create/store', [
                'email' => 'Andres@hotmail.com',
                'confirmEmail' => 'Andres@hotmail.com',
                'password' => '',
            ])->assertRedirect(route('user.create'))
            ->assertSessionHasErrors(['password']);

        $this->assertEquals(0,User::count());

    }

    /** @test */
    function the_password_must_be_valid()
    {
        $this->from(route('user.create'))
            ->put('user/create/store', [
                'email' => 'Andres@hotmail.com',
                'confirmEmail' => 'Andres@hotmail.com',
                'password' => 'aaa',
            ])->assertRedirect(route('user.create'))
            ->assertSessionHasErrors(['password']);

        $this->assertEquals(0,User::count());

    }

    /** @test */
    function it_updates_new_user()
    {
        $user = factory(User::class)->create([
            'email' => 'Andres@gmail.com'
        ]);
        $this->from(route('user.update'))
            ->post("/user/update/profile/{$user->id}",[
                'name' => 'Andres',
                'lastName' => 'Cocunubo',
                'username' => 'andrescoconubo',
                'cedula' => '12345678',
                'identification' => '20143463',
                'semester' => '8'
            ])->assertRedirect(route('user.main'));

        $this->assertDatabaseHas('users',[
            'name' => 'Andres Cocunubo',
            'email' => 'Andres@gmail.com'
        ]);
    }

    /** @test */
    function the_name_is_required()
    {
        $user = factory(User::class)->create([
            'email' => 'Andres@gmail.com'
        ]);
        $this->from(route('user.update'))
            ->post("/user/update/profile/{$user->id}",[
                'name' => ''
            ])->assertRedirect(route('user.update'))
                ->assertSessionHasErrors(['name']);

        $this->assertDatabaseHas('users',[
            'name' => $user->name,
            'email' => 'Andres@gmail.com'
        ]);

    }

}
