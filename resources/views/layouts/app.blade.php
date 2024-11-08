<!DOCTYPE html>
<html lang="en">

<!--begin::Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>AdminLTE v4 | Dashboard</title><!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="AdminLTE v4 | Dashboard">
    <meta name="author" content="ColorlibHQ">
    <meta name="description"
        content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS.">
    <meta name="keywords"
        content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard">
    <!--end::Primary Meta Tags--><!--begin::Fonts-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
        integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous">
    <!--end::Fonts--><!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/styles/overlayscrollbars.min.css"
        integrity="sha256-dSokZseQNT08wYEWiz5iLI8QPlKxG+TswNRD8k35cpg=" crossorigin="anonymous">
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css"
        integrity="sha256-Qsx5lrStHZyR9REqhUF8iQt73X06c8LGIUPzpOhwRrI=" crossorigin="anonymous">
    <!--end::Third Party Plugin(Bootstrap Icons)--><!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="{{ asset('adminlte/css/adminlte.css') }}">
    <!--end::Required Plugin(AdminLTE)--><!-- apexcharts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
        integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0=" crossorigin="anonymous"><!-- jsvectormap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css"
        integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4=" crossorigin="anonymous">

    <!-- Tambahkan CSS DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">


    <!-- Toast CSS (gunakan Bootstrap) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">

    <!-- Toast JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

</head> <!--end::Head-->

<!--begin::Body-->

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary"> <!--begin::App Wrapper-->
    <div class="app-wrapper"> <!--begin::Header-->

        <!-- Header -->
        @include('layouts.partials.header')

        <!-- Sidebar -->
        @include('layouts.partials.sidebar')

        <!--begin::App Main-->
        <main class="app-main"> <!--begin::App Content Header-->
            <div class="app-content"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div aria-live="polite" aria-atomic="true" class="position-relative">
                        <div class="toast-container position-fixed top-0 end-0 p-5">

                            <!-- Toast untuk pesan sukses -->
                            @if (Session::has('success'))
                                <div class="toast align-items-center text-bg-success border-0" role="alert"
                                    aria-live="assertive" aria-atomic="true">
                                    <div class="d-flex">
                                        <div class="toast-body">
                                            {{ Session::get('success') }}
                                        </div>
                                        <button type="button" class="btn-close btn-close-white me-2 m-auto"
                                            data-bs-dismiss="toast" aria-label="Close"></button>
                                    </div>
                                </div>
                            @endif

                            <!-- Toast untuk pesan error -->
                            @if (Session::has('error'))
                                <div class="toast align-items-center text-bg-danger border-0" role="alert"
                                    aria-live="assertive" aria-atomic="true">
                                    <div class="d-flex">
                                        <div class="toast-body">
                                            {{ Session::get('error') }}
                                        </div>
                                        <button type="button" class="btn-close btn-close-white me-2 m-auto"
                                            data-bs-dismiss="toast" aria-label="Close"></button>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                    @yield('content')


                    <script>
                        // Aktifkan toast saat halaman dimuat
                        document.addEventListener("DOMContentLoaded", function() {
                            var toastElList = [].slice.call(document.querySelectorAll('.toast'));
                            var toastList = toastElList.map(function(toastEl) {
                                return new bootstrap.Toast(toastEl);
                            });
                            toastList.forEach(toast => toast.show());
                        });
                    </script>
                </div>
            </div>
        </main> <!--end::App Main--> <!--begin::Footer-->
        <!-- Footer -->
        @include('layouts.partials.footer')


        <!-- Tambahkan jQuery dan JS DataTables -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

        <!-- Inisialisasi DataTables -->
        <script>
            $(document).ready(function() {
                $('#shortTable').DataTable({
                    "order": [
                        [1, "asc"]
                    ],
                    "columnDefs": [{
                        "orderable": true,
                        "targets": [1, 3]
                    }]
                });
            });
        </script>
</body><!--end::Body-->

</html>
