<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ReservUp</title>

    <!-- Custom fonts for this template-->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="/https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">ReservUp</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="/index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->


            <!-- Nav Item - Pages Collapse Menu -->


            <!-- Nav Item - Utilities Collapse Menu -->




            <!-- Nav Item - Pages Collapse Menu -->
           @if(Auth::guard('admin')->check())
            
            
           <li class="nav-item active">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseSalle" aria-expanded="true"
                aria-controls="collapseSalle">
                <i class="fas fa-fw fa-building"></i>
                <span>{{ __('messages.menu_room') }}</span>
            </a>
            <div id="collapseSalle" class="collapse show" aria-labelledby="headingSalle"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">{{ __('messages.menu_GDS') }}</h6>
                    <a class="collapse-item" href="{{ route('salles.index') }}">{{ __('messages.room_list') }}</a>
                    <a class="collapse-item" href="{{ route('salles.create') }}">{{ __('messages.menu_room_create') }}</a>
                    <a class="collapse-item" href="{{ route('salle.import.form') }}">{{ __('messages.menu_room_import') }}</a>
                    <a class="collapse-item" href="{{ route('salles.export') }}">{{ __('messages.menu_room_export') }}</a>
                </div>
            </div>
        </li>

        <li class="nav-item active">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseAdmin" aria-expanded="true"
                aria-controls="collapseAdmin">
                <i class="fas fa-fw fa-user-shield"></i>
                <span>{{ __('messages.menu_admin') }}</span>
            </a>
            <div id="collapseAdmin" class="collapse show" aria-labelledby="headingAdmin" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">{{ __('messages.menu_GDA') }}</h6>
                    <a class="collapse-item" href="{{ route('admin.index') }}">{{ __('messages.menu_admin_list') }}</a>
                    <a class="collapse-item" href="{{ route('admin.create') }}">{{ __('messages.menu_admin_create') }}</a>
                </div>
            </div>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true"
                aria-controls="collapseUser">
                <i class="fas fa-fw fa-user-shield"></i>
                <span>{{ __('messages.users') }}</span>
            </a>
            <div id="collapseUser" class="collapse show" aria-labelledby="headingAdmin" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">{{ __('messages.users_list') }}</h6>
                    <a class="collapse-item" href="{{ route('users.index') }}">{{ __('messages.users_list') }}</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseReservations" aria-expanded="false"
               aria-controls="collapseReservations">
                <i class="fas fa-fw fa-calendar-check"></i>
                <span>{{ __('messages.menu_room_reservation') }}</span>
            </a>
            <div id="collapseReservations" class="collapse" aria-labelledby="headingReservations" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">{{ __('messages.menu_room_GDR') }}</h6>
                    <a class="collapse-item" href="{{ route('reservations.index') }}">{{ __('messages.menu_reservation_list') }}</a>
                </div>
            </div>
        </li>
        @else
        <li class="nav-item active">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseAdmin" aria-expanded="true"
                aria-controls="collapseAdmin">
                <i class="fas fa-fw fa-user-shield"></i>
                <span>{{ __('messages.menu_room_reservation') }}</span>
            </a>
            <div id="collapseAdmin" class="collapse show" aria-labelledby="headingAdmin" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">{{ __('messages.menu_room_reservation') }}:</h6>
                    <a class="collapse-item" href="{{ route('reservation.index') }}">{{ __('messages.menu_reservation_list') }}</a>
                    <a class="collapse-item" href="{{ route('reservations.xml') }}">{{ __('messages.menu_reservation_history') }}</a>
                </div>
            </div>
        </li>
        @endif
            <!-- Nav Item - Charts -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="/flags/{{ LaravelLocalization::getCurrentLocale() }}.svg" alt="{{ LaravelLocalization::getCurrentLocaleName() }}" style="width: 20px;" class="me-2">
                            {{ LaravelLocalization::getCurrentLocaleName() }}
                        </button>
                     
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $properties['native'] }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <!-- Topbar Search -->
                    {{-- <a href="{{ route('change.language', ['lang' => 'en']) }}">
                        <img src="https://upload.wikimedia.org/wikipedia/en/a/a4/Flag_of_the_United_States.svg" width="20" alt="English">
                    </a>
                    <a href="{{ route('change.language', ['lang' => 'fr']) }}">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/c/c3/Flag_of_France.svg" width="20" alt="Français">
                    </a> --}}
                    {{-- <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> --}}

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="/#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        

                        <!-- Nav Item - Messages -->
                      

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="/#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
                                <img class="img-profile rounded-circle"
                                    src="/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                {{-- <a class="dropdown-item" href="/#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="/#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="/#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a> --}}
                                <div class="dropdown-divider"></div>
                                <form action="{{route('logout')}}" method="post">
                                    @csrf
                                    <button type="submit" class="btn ">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>

                                        Logout</button>
                                </form>
                            
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    @yield("content")

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; ReservUp 2025</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="/#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="/login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/js/sb-admin-2.min.js"></script>

</body>

</html>