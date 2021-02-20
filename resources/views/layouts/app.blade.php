<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/libs/css/style.css">
    <link rel="stylesheet" href="/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">

    <link rel="stylesheet" href="/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">

    <link rel="stylesheet" href="/assets/vendor/fonts/flag-icon-css/flag-icon.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">

    <link rel="stylesheet" href="/assets/libs/css/custom.css?{{ time() }}">
    <title>GOTracking</title>
</head>

<body>
<!-- ============================================================== -->
<!-- main wrapper -->
<!-- ============================================================== -->
<div class="dashboard-main-wrapper">
    <!-- ============================================================== -->
    <!-- navbar -->
    <!-- ============================================================== -->
    <div class="dashboard-header">
        <nav class="navbar navbar-expand-lg bg-white fixed-top">
            <a class="navbar-brand" href="{{ route('admin.home') }}">GOTracking</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto navbar-right-top">
                    <li class="nav-item dropdown notification">
                        <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-bell"></i> <span class="indicator"></span></a>
                        <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                            <li>
                                <div class="notification-title"> Notificações</div>
                                <div class="notification-list">
                                    @if(isset($notifications))
                                        @foreach($notifications as $notification)
                                            <div class="list-group">
                                                <a href="#" class="list-group-item list-group-item-action active">
                                                    <div class="notification-info">
                                                        <div class="notification-list-user-img"><img src="/assets/images/avatar-2.jpg" alt="" class="user-avatar-md rounded-circle"></div>
                                                        <div class="notification-list-user-block"><span class="notification-list-user-name">{{ $notification->message }}
                                                            <div class="notification-date">2 min ago</div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </li>
                            <li>
                                <div class="list-footer"> <a href="#">View all notifications</a></div>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown nav-user">
                        <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="/assets/images/avatar-1.jpg" alt="" class="user-avatar-md rounded-circle"></a>
                        <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                            <div class="nav-user-info">
                                <h5 class="mb-0 text-white nav-user-name">{{ \Illuminate\Support\Facades\Auth::user()->name }} </h5>
                                <span class="status"></span><span class="ml-2">Available</span>
                            </div>
                            <!--<a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Account</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a>-->
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fas fa-power-off mr-2"></i>Sair</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- ============================================================== -->
    <!-- end navbar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- left sidebar -->
    <!-- ============================================================== -->
    <div class="nav-left-sidebar sidebar-dark">
        <div class="menu-list">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav flex-column">
                        <li class="nav-divider">
                            Menu
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link active" href="{{ route('admin.home') }}"  aria-controls="submenu-1">
                                <i class="fa fa-fw fa-user-circle"></i>Início <span class="badge badge-success">6</span>
                            </a>
                        </li>
                        @if(\Illuminate\Support\Facades\Auth::user()->profile_type == 'producer')
                            <li class="nav-item ">
                                <a class="nav-link active" href="{{ route('admin.product.index') }}"  aria-controls="submenu-1">
                                    <i class="fa fa-fw fa-leaf"></i>Meus produtos <span class="badge badge-success">6</span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="{{ route('admin.process.index') }}"  aria-controls="submenu-1">
                                    <i class="fa fa-fw fa-map"></i>Rastreabilidade <span class="badge badge-success">6</span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="{{ route('admin.chart') }}"  aria-controls="submenu-1">
                                    <i class="fa fa-fw fa-chart-area"></i>Relatórios <span class="badge badge-success">6</span>
                                </a>
                            </li>
                        @endif
                        <li class="nav-item ">
                            <a class="nav-link active" href="{{ route('admin.company.index') }}"  aria-controls="submenu-1">
                                <i class="fa fa-fw fa-building"></i>Lista de empresas <span class="badge badge-success">6</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end left sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- wrapper  -->
    <!-- ============================================================== -->
    <div class="dashboard-wrapper">
        <div class="container-fluid dashboard-content ">
            @if (\Session::has('success'))
                <div class="p-3 mb-2 bg-success text-white">{!! \Session::get('success') !!}</div>
            @endif

                @if (\Session::has('error'))
                    <div class="p-3 mb-2 bg-danger text-white">{!! \Session::get('error') !!}</div>
                @endif
           @yield('content')
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end wrapper  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- end main wrapper  -->
<!-- ============================================================== -->
<!-- Optional JavaScript -->
<!-- jquery 3.3.1 -->
<script src="/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>

<!-- bootstap bundle js -->
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

<!-- slimscroll js -->
<script src="/assets/vendor/slimscroll/jquery.slimscroll.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js" integrity="sha256-U0YLVHo5+B3q9VEC4BJqRngDIRFCjrhAIZooLdqVOcs=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>

<script src="/assets/libs/js/jquery.mask.js"></script>

<script src="/assets/libs/js/custom.js?{{ time() }}"></script>
@yield('scripts')
</body>

</html>
