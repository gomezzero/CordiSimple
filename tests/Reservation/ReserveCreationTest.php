<?php

namespace Tests\Reservation;

use App\Models\User;
use App\Models\Event;
use App\Models\Reservation;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ReservationConfirmation;
use App\Notifications\ReservationCanceledNotification;

class ReserveCreationTest extends TestCase
{
    use DatabaseTransactions;

    private User $user;
    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();

        // Crear un usuario regular
        $this->user = User::factory()->create([
            'role' => 'user'
        ]);

        // Crear un usuario administrador
        $this->admin = User::factory()->create([
            'role' => 'admin'
        ]);
    }

    /**
     * Test para asegurar que un usuario pueda crear una reserva válida
     */
    public function test_user_can_create_reservation_for_event(): void
    {
        // Crear un evento con spots disponibles
        $event = Event::factory()->create([
            'availableSpots' => 50,
            'max_capacity' => 100,
        ]);

        $response = $this->actingAs($this->user)
            ->post(route('reservations.storeForEvent', $event->id));

        $response->assertRedirect(route('events.usershow', $event->id))
            ->assertSessionHas('success', 'Reserva creada exitosamente.');

        $this->assertDatabaseHas('reservations', [
            'user_id' => $this->user->id,
            'event_id' => $event->id,
            'status' => 'Agendada',
        ]);

        // Verificar que los spots disponibles se hayan decrementado
        $this->assertEquals(49, $event->fresh()->availableSpots);
    }

    /**
     * Test para asegurar que no se puede hacer una reserva si no hay cupos disponibles
     */
    public function test_user_cannot_create_reservation_when_no_spots_available(): void
    {
        $event = Event::factory()->create([
            'availableSpots' => 0,
            'max_capacity' => 100,
        ]);

        $response = $this->actingAs($this->user)
            ->post(route('reservations.storeForEvent', $event->id));

        $response->assertRedirect(route('dashboard', $event->id))
            ->assertSessionHas('error', 'Este evento no tiene cupos disponibles o está cancelado.');

        // Verificar que no se haya creado la reserva
        $this->assertDatabaseMissing('reservations', [
            'user_id' => $this->user->id,
            'event_id' => $event->id,
        ]);
    }

    /**
     * Test para prevenir reservas duplicadas para el mismo evento
     */
    public function test_user_cannot_create_duplicate_reservation_for_same_event(): void
    {
        $event = Event::factory()->create([
            'availableSpots' => 50,
            'max_capacity' => 100,
        ]);

        // Crear una reserva inicial
        Reservation::create([
            'status' => 'Agendada',
            'user_id' => $this->user->id,
            'event_id' => $event->id,
        ]);

        $response = $this->actingAs($this->user)
            ->post(route('reservations.storeForEvent', $event->id));

        $response->assertRedirect(route('dashboard', $event->id))
            ->assertSessionHas('error', 'Ya tienes una reserva para este evento.');

        // Verificar que no se haya creado una nueva reserva
        $this->assertCount(1, Reservation::where('user_id', $this->user->id)->get());
    }

    /**
     * Test para validar que no se puede hacer una reserva para un evento pasado
     */
    public function test_user_cannot_create_reservation_for_past_event(): void
    {
        $event = Event::factory()->create([
            'availableSpots' => 50,
            'max_capacity' => 100,
            'date' => now()->subDay(), // Evento pasado
        ]);

        $response = $this->actingAs($this->user)
            ->post(route('reservations.storeForEvent', $event->id));

        $response->assertRedirect(route('dashboard', $event->id))
            ->assertSessionHas('error', 'Este evento ya ha pasado.');
    }

    /**
     * Test para validar que un administrador puede cancelar una reserva
     */
    public function test_admin_can_cancel_reservation(): void
    {
        $event = Event::factory()->create([
            'availableSpots' => 50,
            'max_capacity' => 100,
        ]);

        // Crear una reserva
        $reservation = Reservation::create([
            'status' => 'Agendada',
            'user_id' => $this->user->id,
            'event_id' => $event->id,
        ]);

        $response = $this->actingAs($this->admin)
            ->put(route('reservations.updateStatus', $reservation->id));

        $response->assertRedirect(route('reservations.index'))
            ->assertSessionHas('success', 'La reserva ha sido cancelada exitosamente.');

        // Verificar que el estado de la reserva haya cambiado a "Cancelado"
        $this->assertDatabaseHas('reservations', [
            'id' => $reservation->id,
            'status' => 'Cancelado',
        ]);

        // Verificar que los spots disponibles se hayan incrementado
        $this->assertEquals(51, $event->fresh()->availableSpots);
    }

    /**
     * Test para asegurarse de que se envíe una notificación al usuario cuando la reserva se crea
     */
    public function test_user_receives_notification_on_reservation_creation(): void
    {
        $event = Event::factory()->create([
            'availableSpots' => 50,
            'max_capacity' => 100,
        ]);

        Notification::fake(); // Fake para las notificaciones

        $this->actingAs($this->user)
            ->post(route('reservations.storeForEvent', $event->id));

        Notification::assertSentTo(
            $this->user, ReservationConfirmation::class
        );
    }

    /**
     * Test para verificar la validación de los campos obligatorios
     */
    public function test_validation_required_fields(): void
    {
        $event = Event::factory()->create();

        $response = $this->actingAs($this->user)
            ->post(route('reservations.storeForEvent', $event->id), []); // Enviar sin datos

        $response->assertSessionHasErrors(['status', 'user_id', 'event_id']);
    }

    /**
     * Test para verificar que un usuario no autenticado no pueda crear una reserva
     */
    public function test_guest_user_cannot_create_reservation(): void
    {
        $event = Event::factory()->create();

        $response = $this->post(route('reservations.storeForEvent', $event->id));

        $response->assertRedirect(route('login'))
            ->assertSessionHas('error', 'Debes iniciar sesión para agendar un evento.');
    }
}
