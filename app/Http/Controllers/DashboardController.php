<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomType;
use App\Models\Room;
use App\Models\Reservation;
use App\Models\Guest;

use App\Models\HousekeepingSchedule;
use App\Models\RoomMaintenance;
use App\Models\Item;
use App\Models\InventoryCategory;
use App\Models\InventoryItem;

use App\Models\Asset;
use App\Models\Department;
use App\Models\AssetResponsible;
use App\Models\AssetCategory;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data ringkasan dari berbagai model
        $totalRoomTypes = RoomType::count();
        $totalRooms = Room::count();
        $totalReservations = Reservation::count();
        $totalGuests = Guest::count();

        // Mengambil data ringkasan dari berbagai model housekeeping
        $totalSchedules = HousekeepingSchedule::count();
        $totalMaintenances = RoomMaintenance::count();
        $totalItems = Item::count();
        $totalInventoryItems = InventoryItem::count();

        // Ambil data ringkasan dari berbagai model
        $totalAssets = Asset::count();
        $totalAssetsValue = Asset::sum('value'); // Jumlahkan kolom 'value' di tabel assets
        $totalDepartments = Department::count();
        $totalResponsible = AssetResponsible::count();
        $totalCategories = AssetCategory::count();

        // Memperbaiki query dengan mengapit `condition` menggunakan backticks untuk menghindari konflik dengan kata kunci SQL
        $assetsByCondition = Asset::selectRaw('`condition`, COUNT(*) as count')
            ->groupBy('condition')
            ->get();

        // Mengelompokkan Housekeeping Schedule berdasarkan status
        $schedulesByStatus = HousekeepingSchedule::selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->get();

        // Mengelompokkan Room Maintenance berdasarkan jenis perawatan atau status
        $maintenanceByStatus = RoomMaintenance::selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->get();

        return view('dashboard', compact(
            'totalRoomTypes',
            'totalRooms',
            'totalReservations',
            'totalGuests',
            'totalSchedules',
            'totalMaintenances',
            'totalItems',
            'totalInventoryItems',
            'totalAssets',
            'totalAssetsValue',
            'totalDepartments',
            'totalResponsible',
            'totalCategories',
            'assetsByCondition',
            'schedulesByStatus',
            'maintenanceByStatus'
        ));
    }
}
