<?php

use Illuminate\Support\Facades\Route;

Route::resource('users', UserController::class);

Route::get('/', function () {
    return view('welcome');
});
