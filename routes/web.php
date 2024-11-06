<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\RoomController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('room_types', RoomTypeController::class);
Route::resource('rooms', RoomController::class);
