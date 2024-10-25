<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\EventController;

Route::resource('users', UserController::class);
Route::resource('notifications', NotificationController::class);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::get('events', [EventController::class, 'index'])->name('events.index'); // Cambiado a 'events.index'
Route::get('events/create', [EventController::class, 'create'])->name('events.create'); // Cambiado a 'events.create'
Route::post('events', [EventController::class, 'store'])->name('events.store'); // Cambiado a 'events.store'
Route::get('events/{id}', [EventController::class, 'show'])->name('events.show'); // Cambiado a 'events.show'
Route::get('events/{id}/edit', [EventController::class, 'edit'])->name('events.edit'); // Cambiado a 'events.edit'
Route::put('events/{id}', [EventController::class, 'update'])->name('events.update'); // Cambiado a 'events.update'
Route::delete('events/{id}', [EventController::class, 'destroy'])->name('events.destroy'); // Cambiado a 'events.destroy'


// Incluir las rutas de autenticación
require __DIR__.'/auth.php';
