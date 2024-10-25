<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\EventRequest;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Events = Event::all();
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequest $request)
    {
        // Valida los datos ingresados
        $validatedData = $request->validate();

        // Crea y guarda un nuevo Event
        Event::create($validatedData);

        // Redirecciona con un mensaje de éxito
        return redirect()->route('events.index')->with('success', 'Evento creado con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // obtiene un Event por el ID
        $Event = Event::findOrFail($id);

        return view('events.show', compact('Event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Event = Event::findOrFail($id);
        return view('events.edit', compact('Event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventRequest $request, string $id)
    {
        $validatedData = $request->validate();

        $Event = Event::findOrFail($id);
        $Event->update($validatedData);

        return redirect()->route('events.index')->with('success', 'Evento actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Event = Event::findOrFail($id);
        $Event->delete();

        return redirect()->route('events.index')->with('succes', 'Evento eliminado con exito');
    }
}
