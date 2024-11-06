<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\HousekeepingScheduleController;
use App\Http\Controllers\RoomMaintenanceController;
use App\Http\Controllers\ItemController;

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

Route::resource('housekeeping', HousekeepingScheduleController::class);
Route::resource('maintenance', RoomMaintenanceController::class);
Route::resource('items', ItemController::class);
