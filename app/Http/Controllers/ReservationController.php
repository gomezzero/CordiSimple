<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Http\Requests\ReservationRequest;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = auth()->user()->reservations()->where('status', 'Agendada')->with('event')->get();


        return view('reservations.userindex', compact('reservations'));
    }

    public function indexAdmin()
    {
        $reservations = Reservation::all();
        return view('reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(ReservationRequest $request)
    {
        $validatedData = $request->all();

        // Crear la nueva reserva
        $reservation = Reservation::create($validatedData);

        return response()->json([
            'message' => 'Reserva creada con éxito',
            'reservation' => $reservation,
        ], 201);
    }

    public function storeForEvent($eventId)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para agendar un evento.');
        }

        // Verificar si el evento existe y tiene cupos disponibles
        $event = Event::find($eventId);

        if ($event->availableSpots == 0) {
            return redirect()->route('events.usershow', $eventId)->with('error', 'Este evento no tiene cupos disponibles');
        }

        // Verificar si ya existe una reserva para este evento y usuario
        $existingReservation = Reservation::where('user_id', $user->id)->where('event_id', $eventId)->first();

        if ($existingReservation) {
            return redirect()->route('events.usershow', $eventId)->with('error', 'Ya tienes una reserva para este evento.');
        }

        // Crear la reserva y reducir availableSpots
        $reservation = new Reservation();
        $reservation->status = 'Agendada';
        $reservation->user_id = $user->id;
        $reservation->event_id = $eventId;
        $reservation->save();

        $event->decrement('availableSpots');

        return redirect()->route('events.usershow', $eventId)
            ->with('success', 'Reserva creada exitosamente.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReservationRequest $request)
    {
        // Valida los datos ingresados
        $validatedData = $request->all();

        // Crea y guarda un nuevo Event
        Reservation::create($validatedData);

        // Redirecciona con un mensaje de éxito
        return redirect()->route('reservations.index')->with('success', 'reservacion creada con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $reservation = Reservation::with(['user', 'event'])->find($id);

        if (!$reservation) {
            return response()->json(['message' => 'Reserva no encontrada'], 404);
        }

        return response()->json($reservation);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('reservations.edit', compact('reservation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReservationRequest $request, string $id)
    {
        // Validar los datos de entrada
        $validatedData = $request->all();

        // Buscar la reserva por ID
        $reservation = Reservation::find($id);

        if (!$reservation) {
            return response()->json(['message' => 'Reserva no encontrada'], 404);
        }

        // Actualizar los datos de la reserva
        $reservation->update($validatedData);

        return response()->json([
            'message' => 'Reserva actualizada con éxito',
            'reservation' => $reservation,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Buscar la reserva por ID
        $reservation = Reservation::find($id);

        if (!$reservation) {
            return response()->json(['message' => 'Reserva no encontrada'], 404);
        }

        $event = Event::find($reservation->event_id);
        if ($event && $event->availableSpots < $event->max_capacity) {
            $event->increment('availableSpots');
        }

        // Eliminar la reserva
        $reservation->delete();

        return response()->json(['message' => 'Reserva eliminada con éxito']);
    }

    public function updateStatus(string $id)
    {
        // Busca la reserva usando el ID y actualiza su estado
        $reservation = Reservation::findOrFail($id);
        $reservation->status = 'Cancelado';

                $event = Event::find($reservation->event_id);
        if ($event && $event->availableSpots < $event->max_capacity) {
            $event->increment('availableSpots');
        }
        // Redirige a la ruta `reservations.index` con un mensaje de éxito
        return redirect()->route('reservations.index')->with('success', 'La reserva ha sido cancelada exitosamente.');
    }
}
