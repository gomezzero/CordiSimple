<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Events = Event::all();
        return view('Events.index', compact('Events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valida los datos ingresados 
        $validatedData = $request->validate(
            [
                'name' => 'required|string',
                'description' => 'required|string',
                'date' => 'required|dateTime',
                'time' => 'required|dateTime',
                'location' => 'required|string',
                'max_capacity' => 'required|numeric',
                'availableSports' => 'required|numeric',
                'status' => 'required|string'
            ]
        );
    
        // Crea y guarda un nuevo Event
        Event::create($validatedData);
    
        // Redirecciona con un mensaje de éxito
        return redirect()->route('Events.index')->with('success', 'Evento creado con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // obtiene un Event por el ID
        $Event = Event::findOrFail($id);

        return view('Events.show', compact('Event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Event = Event::findOrFail($id);
        return view('Events.edit', compact('Event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate(
            [
                'name' => 'required|string',
                'description' => 'required|string',
                'date' => 'required|dateTime',
                'time' => 'required|dateTime',
                'location' => 'required|string',
                'max_capacity' => 'required|numeric',
                'availableSports' => 'required|numeric',
                'status' => 'required|string'
            ]
        );

        $Event = Event::findOrFail($id);
        $Event->update($validatedData);

        return redirect()->route('Events.index')->with('success', 'Evento actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Event = Event::findOrFail($id);
        $Event->delete();

        return redirect()->route('Events.index')->with('succes', 'Evento eliminado con exito');
    }
}
