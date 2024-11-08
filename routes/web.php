<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ReservationController;

Route::resource('users', UserController::class);
Route::resource('reservations', ReservationController::class);

Route::get('/dashboard', [EventController::class, 'indexDashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/', [EventController::class, 'indexWelcome'])
    ->name('welcome');


// Rutas de eventos
Route::get('events', [EventController::class, 'index'])->name('events.index'); // Cambiado a 'events.index'
Route::get('events/create', [EventController::class, 'create'])->name('events.create'); // Cambiado a 'events.create'
Route::post('events', [EventController::class, 'store'])->name('events.store'); // Cambiado a 'events.store'
Route::get('events/{id}', [EventController::class, 'show'])->name('events.show'); // Cambiado a 'events.show'
Route::get('events/users/{id}', [EventController::class, 'usershow'])->name('events.usershow'); // Cambiado a 'events.show-to-users'
Route::get('events/{id}/edit', [EventController::class, 'edit'])->name('events.edit'); // Cambiado a 'events.edit'
Route::put('events/{id}', [EventController::class, 'update'])->name('events.update'); // Cambiado a 'events.update'
Route::delete('events/{id}', [EventController::class, 'destroy'])->name('events.destroy'); // Cambiado a 'events.destroy'
Route::post('/users/{user}/role', [UserController::class, 'changeRole'])->name('users.role');
Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');

//Profiles
Route::get('/user/edit', [UserController::class, 'edit'])->name('profile.edit');
Route::put('/user/update', [UserController::class, 'update'])->name('profile.update');

// reservation
Route::get('/events/{eventId}/schedule', [ReservationController::class, 'storeForEvent'])->name('reservations.schedule');
Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.userindex');
Route::get('admin/reservations', [ReservationController::class, 'indexAdmin'])->name('reservations.index');
Route::get('admin/users', [UserController::class, 'index'])->name('users.index');
Route::post('/reservations/{id}', [ReservationController::class, 'destroy'])->name('reservations.destroy');
Route::put('/reservations/{id}/cancel', [ReservationController::class, 'updateStatus'])->name('reservations.cancel');
Route::put('/reservations/cancel/{id}', [ReservationController::class, 'cancel'])->name('reservations.cancel');



// Incluir las rutas de autenticación
require __DIR__ . '/auth.php';
