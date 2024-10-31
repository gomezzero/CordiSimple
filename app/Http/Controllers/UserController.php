<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Show the form for editing the authenticated user's profile.
     */
    public function edit()
    {
        // Verifica si el usuario está autenticado
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to edit your profile.');
        }

        // Obtiene el usuario autenticado
        $user = Auth::user();

        // Retorna la vista de edición con el usuario actual
        return view('layouts.edit', compact('user')); // Cambia 'user.edit' a 'layouts.edit'
    }

    /**
     * Update the authenticated user's profile.
     */
    public function update(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Obtiene el usuario autenticado
        $user = Auth::user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        // Solo actualiza la contraseña si se proporciona
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        // Guarda los cambios
        $user->save();

        return redirect()->route('dashboard')->with('success', 'Profile updated successfully!');
    }
}
