<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\EventController;
Route::resource('users', UserController::class);
Route::resource('notifications', NotificationController::class);
Route::get('/', function () {
    return view('welcome');
});
// Incluir las rutas de autenticación
require __DIR__.'/auth.php';
Route::get('Events', [EventController::class, 'index'])->name('Events.index');
Route::get('Events/create', [EventController::class, 'create'])->name('Events.create');
Route::post('Events', [EventController::class, 'store'])->name('Events.store');
Route::get('Events/{id}', [EventController::class, 'show'])->name('Events.show');
Route::get('Events/{id}/edit', [EventController::class, 'edit'])->name('Events.edit');
Route::put('Events/{id}', [EventController::class, 'update'])->name('Events.update');
Route::delete('Events/{id}', [EventController::class, 'destroy'])->name('Events.destroy');