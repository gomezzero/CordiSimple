<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase; // Cambia esta línea para que extienda de TestCase de Laravel

class UserTest extends TestCase
{
    /** @test */
    public function testDisplaysUsersIndexPage()
    {
        // Seed de 3 usuarios específicos
        User::factory()->count(3)->create();

        // Realiza la solicitud y verifica la respuesta
        $response = $this->get(route('users.index'));

        // Verifica la vista y los usuarios
        $response->assertViewIs('users.index');
        $response->assertViewHas('users');
    }
}
