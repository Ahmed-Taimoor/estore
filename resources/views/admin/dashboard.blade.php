<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="{{ asset('assets/css/admin-app.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    @livewireStyles

</head>

<body id="page-top">

    @livewireScripts

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a href="#" class="sidebar-brand d-flex align-items-center justify-content-center">
                <img src="assets/images/logo-light.png" alt="Site Logo">
            </a>


            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Catagory & Products
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('category.index') }}">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Category</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('subcategory.index') }}">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Sub-Category</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('product.index') }}">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>New Product</span>
                </a>
            </li>


            <hr class="sidebar-divider d-none d-md-block">
            <div class="sidebar-heading">
                Frontend
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('featuredproduct.index') }}">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Featured Product</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Insights
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('vieworders.index') }}">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>View Orders</span>
                </a>
            </li>






        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <div class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                </div>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @yield('dashboard-content')

                    @isset($slot)
                        {{ $slot }}
                    @endisset

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


        </div>

        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->





    <script src="{{ asset('assets/js/admin-app.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


</body>
