<!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->
    <div class="sidebar-brand"> <!--begin::Brand Link--> <a href="./index.html" class="brand-link">
            <!--begin::Brand Image--> <img src="adminlte/assets/img/AdminLTELogo.png" alt="AdminLTE Logo"
                class="brand-image opacity-75 shadow"> <!--end::Brand Image--> <!--begin::Brand Text--> <span
                class="brand-text fw-light">AdminLTE 4</span> <!--end::Brand Text--> </a>
        <!--end::Brand Link-->
    </div> <!--end::Sidebar Brand--> <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2"> <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>
                            Dashboard
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/dashboard') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Dashboard v1</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('room_types.index') }}"
                        class="nav-link {{ request()->routeIs('room_types.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-collection"></i>
                        <p>Room Type</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('rooms.index') }}"
                        class="nav-link {{ request()->routeIs('rooms.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-house"></i>
                        <p>Rooms</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('reservations.index') }}"
                        class="nav-link {{ request()->routeIs('reservations.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-journal-bookmark"></i>
                        <p>Reservation</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('guests.index') }}"
                        class="nav-link {{ request()->routeIs('guests.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-people"></i>
                        <p>Guest</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs(['housekeeping.*', 'maintenance.*']) ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ request()->routeIs(['housekeeping.*', 'maintenance.*']) ? 'active' : '' }}">
                        <i class="nav-icon bi bi-clipboard-check-fill"></i>
                        <p>
                            Housekeeping
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('housekeeping.index') }}"
                                class="nav-link {{ request()->routeIs('housekeeping.*') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-calendar-check"></i>
                                <p>Housekeeping Schedule</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('items.index') }}"
                                class="nav-link {{ request()->routeIs('items.index') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-clipboard-data"></i>
                                <p>Manage Items</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('maintenance.index') }}"
                                class="nav-link {{ request()->routeIs('maintenance.*') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-gear-fill"></i>
                                <p>Room Maintenance</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
            </li>

            <li class="nav-header">DOCUMENTATIONS</li>
            <li class="nav-item"> <a href="./docs/introduction.html" class="nav-link"> <i
                        class="nav-icon bi bi-download"></i>
                    <p>Installation</p>
                </a> </li>
            <li class="nav-item"> <a href="./docs/layout.html" class="nav-link"> <i
                        class="nav-icon bi bi-grip-horizontal"></i>
                    <p>Layout</p>
                </a> </li>

            </ul> <!--end::Sidebar Menu-->
        </nav>
    </div> <!--end::Sidebar Wrapper-->
</aside> <!--end::Sidebar-->
