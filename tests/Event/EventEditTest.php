<?php

namespace Tests\Event;

use App\Models\Event;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EventEditTest extends TestCase
{
    use DatabaseTransactions, WithFaker;

    private User $admin;
    private User $regularUser;
    private Event $event;

    protected function setUp(): void
    {
        parent::setUp();

        // Crear usuario administrador
        $this->admin = User::factory()->create([
            'role' => 'admin'
        ]);

        // Crear usuario regular
        $this->regularUser = User::factory()->create([
            'role' => 'user'
        ]);

        // Crear un evento de prueba
        $this->event = Event::factory()->create();
    }

    public function test_admin_can_access_edit_event_page(): void
    {
        $response = $this->actingAs($this->admin)
            ->get(route('events.edit', $this->event));

        $response->assertStatus(200)
            ->assertViewIs('events.edit')
            ->assertViewHas('event', $this->event);
    }

    public function test_regular_user_cannot_access_edit_event_page(): void
    {
        $response = $this->actingAs($this->regularUser)
            ->get(route('events.edit', $this->event));

        $response->assertStatus(403);
    }

    public function test_admin_can_update_event(): void
    {
        $updatedEventData = [
            'name' => 'Evento Actualizado',
            'description' => 'Descripción actualizada del evento',
            'date' => date('Y-m-d', strtotime('+2 days')),
            'time' => '16:00',
            'location' => 'Nuevo Centro de Convenciones',
            'max_capacity' => 150,
            'availableSpots' => 150,
            'status' => 'Inactive'
        ];

        $response = $this->actingAs($this->admin)
            ->put(route('events.update', $this->event), $updatedEventData);

        $response->assertRedirect(route('events.index'))
            ->assertSessionHas('success', 'Evento actualizado con éxito.');

        $this->assertDatabaseHas('events', [
            'id' => $this->event->id,
            'name' => 'Evento Actualizado',
            'location' => 'Nuevo Centro de Convenciones',
            'status' => 'Inactive'
        ]);
    }

    public function test_validate_update_event_form(): void
    {
        $updatedEventData = [
            'name' => '',
            'date' => date('Y-m-d', strtotime('-1 day')),
            'time' => '25:00',
            'max_capacity' => 0,
            'availableSpots' => -10
        ];

        $response = $this->actingAs($this->admin)
            ->put(route('events.update', $this->event), $updatedEventData);

        $response->assertSessionHasErrors([
            'name',
            'date',
            'time',
            'max_capacity',
            'availableSpots'
        ]);
    }
}