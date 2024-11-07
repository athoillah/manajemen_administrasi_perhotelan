@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Dashboard</h3>
                </div>
            </div>
            <!--end::Row-->
        </div>
    </div>
    <!--end::App Content Header-->

    <!--begin::App Content-->
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 text-end">
                    <h3 class="mb-0">Rooms</h3>
                </div>
            </div>
            <!--begin::Row-->
            <div class="row my-4">
                <!-- Total Room Types -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <a href="{{ route('room_types.index') }}" class="info-box-icon text-bg-info shadow-sm">
                            <i class="bi bi-house-fill"></i>
                        </a>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Room Types</span>
                            <span class="info-box-number">{{ $totalRoomTypes }}</span>
                        </div>
                    </div>
                </div>

                <!-- Total Rooms -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <a href="{{ route('rooms.index') }}" class="info-box-icon text-bg-success shadow-sm">
                            <i class="bi bi-door-open-fill"></i>
                        </a>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Rooms</span>
                            <span class="info-box-number">{{ $totalRooms }}</span>
                        </div>
                    </div>
                </div>

                <!-- Total Reservations -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <a href="{{ route('reservations.index') }}" class="info-box-icon text-bg-warning shadow-sm">
                            <i class="bi bi-calendar-check-fill"></i>
                        </a>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Reservations</span>
                            <span class="info-box-number">{{ $totalReservations }}</span>
                        </div>
                    </div>
                </div>

                <!-- Total Guests -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <a href="{{ route('guests.index') }}" class="info-box-icon text-bg-danger shadow-sm">
                            <i class="bi bi-person-fill"></i>
                        </a>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Guests</span>
                            <span class="info-box-number">{{ $totalGuests }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <div class="row">
                <div class="col-sm-12 text-end">
                    <h3 class="mb-0">Housekeeping</h3>
                </div>
            </div>
            <!--begin::Row-->
            <div class="row my-4">
                <!-- Total Housekeeping Schedules -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <a href="{{ route('housekeeping.index') }}" class="info-box-icon text-bg-info shadow-sm">
                            <i class="bi bi-calendar-check-fill"></i> <!-- Ikon kalender untuk jadwal housekeeping -->
                        </a>
                        <div class="info-box-content">
                            <span class="info-box-text">HK Schedules</span>
                            <span class="info-box-number">{{ $totalSchedules }}</span>
                        </div>
                    </div>
                </div>

                <!-- Total Room Maintenances -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <a href="{{ route('maintenance.index') }}" class="info-box-icon text-bg-success shadow-sm">
                            <i class="bi bi-tools"></i> <!-- Ikon peralatan untuk perawatan kamar -->
                        </a>
                        <div class="info-box-content">
                            <span class="info-box-text">Maintenances</span>
                            <span class="info-box-number">{{ $totalMaintenances }}</span>
                        </div>
                    </div>
                </div>

                <!-- Total Items -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <a href="{{ route('items.index') }}" class="info-box-icon text-bg-warning shadow-sm">
                            <i class="bi bi-box-seam"></i> <!-- Ikon kotak untuk barang/barang inventaris -->
                        </a>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Items</span>
                            <span class="info-box-number">{{ $totalItems }}</span>
                        </div>
                    </div>
                </div>

                <!-- Total Inventory Items -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <a href="{{ route('inventory_items.index') }}" class="info-box-icon text-bg-primary shadow-sm">
                            <i class="bi bi-archive-fill"></i> <!-- Ikon arsip untuk item inventaris -->
                        </a>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Inventory</span>
                            <span class="info-box-number">{{ $totalInventoryItems }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Ringkasan Data Housekeeping Schedule dan Room Maintenance -->
            <div class="row">
                <!-- Housekeeping Schedules by Status -->
                <div class="col-lg-6 connectedSortable">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Housekeeping Schedules by Status</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th>Count</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($schedulesByStatus as $schedule)
                                        <tr>
                                            <td>{{ $schedule->status }}</td>
                                            <td>{{ $schedule->count }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Room Maintenance by Status -->
                <div class="col-lg-6 connectedSortable">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Room Maintenance by Status</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th>Count</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($maintenanceByStatus as $maintenance)
                                        <tr>
                                            <td>{{ $maintenance->status }}</td>
                                            <td>{{ $maintenance->count }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <!--end::Row-->
            <hr class="my-4">
            <div class="row">
                <div class="col-sm-12 text-end">
                    <h3 class="mb-0">Assets</h3>
                </div>
            </div>

            <div class="row my-4">
                <!-- Total Assets -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <a href="{{ route('assets.index') }}" class="info-box-icon text-bg-info shadow-sm">
                            <i class="bi bi-box-seam"></i> <!-- Ikon kotak untuk aset -->
                        </a>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Assets</span>
                            <span class="info-box-number">Rp {{ number_format($totalAssetsValue, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>

                <!-- Total Categories -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <a href="{{ route('asset_categories.index') }}" class="info-box-icon text-bg-success shadow-sm">
                            <i class="bi bi-tags-fill"></i> <!-- Ikon tag untuk kategori -->
                        </a>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Categories</span>
                            <span class="info-box-number">{{ $totalCategories }}</span>
                        </div>
                    </div>
                </div>

                <!-- Total Departments -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <a href="{{ route('departments.index') }}" class="info-box-icon text-bg-warning shadow-sm">
                            <i class="bi bi-building"></i> <!-- Ikon gedung untuk departemen -->
                        </a>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Departments</span>
                            <span class="info-box-number">{{ $totalDepartments }}</span>
                        </div>
                    </div>
                </div>

                <!-- Total Employees -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <a href="{{ route('responsibles.index') }}" class="info-box-icon text-bg-danger shadow-sm">
                            <i class="bi bi-people-fill"></i> <!-- Ikon orang untuk karyawan/penanggung jawab -->
                        </a>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Employees</span>
                            <span class="info-box-number">{{ $totalResponsible }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Row-->

            <!--begin::Row-->
            <div class="row">
                <!-- Assets by Condition -->
                <div class="col-lg-6 connectedSortable">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Assets by Condition</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Condition</th>
                                        <th>Count</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($assetsByCondition as $asset)
                                        <tr>
                                            <td>{{ $asset->condition }}</td>
                                            <td>{{ $asset->count }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
@endsection
