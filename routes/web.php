<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\HousekeepingScheduleController;
use App\Http\Controllers\RoomMaintenanceController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\InventoryCategoryController;
use App\Http\Controllers\InventoryItemController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\AssetResponsibleController;
use App\Http\Controllers\AssetCategoryController;
use App\Http\Controllers\AssetController;

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
Route::resource('inventory_categories', InventoryCategoryController::class);
Route::resource('inventory_items', InventoryItemController::class);


Route::resource('departments', DepartmentController::class);
Route::resource('responsibles', AssetResponsibleController::class);
Route::resource('asset_categories', AssetCategoryController::class);
Route::resource('assets', AssetController::class);
