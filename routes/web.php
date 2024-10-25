<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Incluir las rutas de autenticación
require __DIR__.'/auth.php';