<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/favicon.png') }}">
    <title>Admin | {{ $title }}</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- Template CSS -->

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/select.bootstrap4.min.css') }}">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <ul class="navbar-nav mr-auto">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="{{ asset('assets/images/favicon.png') }}" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, {{ session()->get('user')->name }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ url('/user/profile') }}" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ url('/user/logout') }}" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>

            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href={{ url('dashboard') }}>Digium</a>
                    </div>

                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="{{ url('dashboard') }}">DG</a>
                    </div>

                    <ul class="sidebar-menu">
                        <li class="menu-header">Menu Utama</li>
                        <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('/dashboard') }}">
                                <i class="fas fa-chart-bar"></i>
                                <span>Halaman Dashboard</span>
                            </a>
                        </li>

                        <li class="{{ Request::is('user') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('user') }}">
                                <i class="fas fa-users"></i>
                                <span>Daftar Pengguna</span>
                            </a>
                        </li>

                        <li class="menu-header">Menu Museum</li>
                        <li class="{{ Request::is('/dashboard') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('museum') }}">
                                <i class="fas fa-building"></i>
                                <span>Halaman Museum</span>
                            </a>
                        </li>

                        <li class="{{ Request::is('/user') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('transaction') }}">
                                <i class="fas fa-book"></i>
                                <span>Halaman Transaksi</span>
                            </a>
                        </li>
                    </ul>
                </aside>
            </div>
