<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NotificationController;

Route::resource('users', UserController::class);
Route::resource('notifications', NotificationController::class);


Route::get('/', function () {
    return view('welcome');
});
