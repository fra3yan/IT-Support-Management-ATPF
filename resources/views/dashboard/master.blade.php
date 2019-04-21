<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'IT') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A premium admin dashboard template by mannatthemes" name="description" />
        <meta content="Mannatthemes" name="author" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('images/favicon.ico')}}">

        <link href="{{ asset('plugins/jvectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet">
        <!-- DataTables -->
        <link href="{{ asset('plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/icons.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/metismenu.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/style.css')}}" rel="stylesheet" type="text/css" />

    </head>

    <body>



        <!-- Top Bar End -->
        <div class="page-wrapper-img">
            <div class="page-wrapper-img-inner">
                <div class="sidebar-user media">
                       <!--  <img src="{{ asset('images/users/user-1.jpg')}}" alt="user" class="rounded-circle img-thumbnail mb-1"> -->
                    <div class="media-body">

                            <h5 class="text-light">{{ $users[0]->email }}</h5>

                            <ul class="list-unstyled list-inline mb-0 mt-2">
                                <li class="list-inline-item">
                                        <a href="{{ url('/dashboard') }}" class=""><i class="mdi mdi-home text-light"></i></a>
                                    </li>
                            <li class="list-inline-item">
                                <a href="{{ url('/setting') }}" class=""><i class="mdi mdi-settings text-light"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"
                                class=""><i class="mdi mdi-power text-danger"></i></a>
                            </li>


                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                             @csrf
                         </form>

                        </ul>
                    </div>
                </div>
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="float-right align-item-center mt-2">
                                <a href="{{ url('/dashboard/create') }}" class="btn btn-info px-4 align-self-center report-btn">Tambah Request</a>
                            </div>
                            <h4 class="page-title mb-2"><i class="mdi mdi-view-dashboard-outline mr-2"></i>Dashboard</h4>
                            <div class="">
                                <ol class="breadcrumb">
                                    @foreach ($breadcrumbs as $breadcrumb)
                                    <li class="breadcrumb-item active">{{ $breadcrumb }}</li>
                                    @endforeach

                                </ol>
                            </div>
                        </div><!--end page title box-->
                    </div><!--end col-->
                </div><!--end row-->
                <!-- end page title end breadcrumb -->
            </div><!--end page-wrapper-img-inner-->
        </div><!--end page-wrapper-img-->

        <div class="page-wrapper">
            <div class="page-wrapper-inner">

                <!-- Left Sidenav -->
                <div class="left-sidenav">

                    <ul class="metismenu left-sidenav-menu" id="side-nav">

                        <li class="menu-title">Main</li>

                        <li>
                            <a href="{{ url('/dashboard') }}"><i class="mdi mdi-monitor"></i><span>Dashboards</span></a>

                        </li>

                        <li>
                                <a href="{{ url('/dashboard/password') }}"><i class="mdi mdi-apps"></i><span>Setting</span></a>

                            </li>

                            <li>
                                    <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"><i class="mdi mdi-power text-danger"></i><span>Logout</span></a>

                                </li>




                    </ul>
                </div>
                <!-- end left-sidenav-->

                <!-- Page Content-->
                <div class="page-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">

                                @if(Session::has('message'))
                                <div class="alert {{ Session::get('alert-class', 'alert-info') }} alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                                        </button>

                                        {{ Session::get('message') }}
                                    </div>
                                @endif




                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-9">


                                                <h4 class="mt-0">Hello ! {{ $users[0]->name }}</h4>
                                                <p class="text-muted">{{ $greet }}, Semoga hari kamu menyenangkan.</p>
                                                <div class="row justify-content-center">
                                                    <div class="col-md-4">
                                                        <div class="card mb-0">
                                                            <div class="card-body">
                                                                <div class="float-right">
                                                                    <i class="dripicons-pin font-24 text-secondary"></i>
                                                                </div>
                                                                <span class="badge badge-info">Total Request</span>
                                                                <h3 class="font-weight-bold">{{ $req_total }}</h3>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="card mb-0">
                                                            <div class="card-body">
                                                                <div class="float-right">
                                                                    <i class="dripicons-thumbs-down  font-20 text-secondary"></i>
                                                                </div>
                                                                <span class="badge badge-danger">Belum Selesai</span>
                                                                <h3 class="font-weight-bold">{{ $req_belum }}</h3>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="card mb-0">
                                                            <div class="card-body">
                                                                <div class="float-right">
                                                                    <i class="dripicons-thumbs-up font-20 text-secondary"></i>
                                                                </div>
                                                                <span class="badge badge-success">Sudah Selesai</span>
                                                                <h3 class="font-weight-bold">{{ $req_selesai }}</h3>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-3 align-self-center">
                                                <img src="{{ asset('images/dash.svg')}}" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                    </div><!--end card-body-->
                                    <div class="card-body bg-light">

                                    </div><!--end card-body-->
                                </div><!--end card-->
                            </div> <!--end col-->
                        </div><!--end row-->

                        @yield('content')






                    </div><!-- container -->

                    <footer class="footer text-center text-sm-left">
                        &copy; 2019 AsiatradeFX <span class="text-muted d-none d-sm-inline-block float-right">Crafted with <i class="mdi mdi-heart text-danger"></i> by fra3yan</span>
                    </footer>
                </div>
                <!-- end page content -->
            </div>
            <!--end page-wrapper-inner -->
        </div>
        <!-- end page-wrapper -->

        <!-- jQuery  -->
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('js/metisMenu.min.js') }}"></script>
        <script src="{{ asset('js/waves.min.js') }}"></script>
        <script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>

        <script src="{{ asset('plugins/moment/moment.js') }}"></script>



        <!-- Required datatable js -->
        <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

        <script src="{{ asset('js/dashboard.js') }}" defer></script>

        <!-- App js -->
        <script src="{{ asset('js/app.js') }}"></script>


    </body>
</html>
