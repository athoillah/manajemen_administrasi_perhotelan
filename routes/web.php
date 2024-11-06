<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\GuestController;


// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('dashboard');
});

Route::resource('room_types', RoomTypeController::class);
Route::resource('rooms', RoomController::class);
Route::resource('reservations', ReservationController::class);
Route::resource('guests', GuestController::class);
