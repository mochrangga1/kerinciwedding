<!DOCTYPE html>

<html dir="ltr" lang="en">



<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Tell the browser to be responsive to screen width -->

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">

    <meta name="author" content="">

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Favicon icon -->

    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">

    <title>Administrator</title>
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.css" />
    <!-- Custom CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet"> --}}

    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <link href="{{asset('FreeDash-lite-master/src')}}/assets/extra-libs/c3/c3.min.css" rel="stylesheet">

    <link href="{{asset('FreeDash-lite-master/src')}}/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css">

    <link href="{{asset('FreeDash-lite-master/src')}}/assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css">

    <link href="{{asset('FreeDash-lite-master/src')}}/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">

    <link href="{{asset('FreeDash-lite-master/src')}}/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />

    <!-- Custom CSS -->

    <link href="{{asset('FreeDash-lite-master/src')}}/dist/css/style.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    {{-- CSS select2 --}}
    {{-- <link rel="stylesheet" href="{{ asset('select2-4.1.0-rc.0/dist/css/select2.min.css') }}"> --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .dropdown-container {
            position: relative;
        }

        .dropdown-container select {
            padding: 5px 10px;
        }

        .dropdown-container select option {
            background-repeat: no-repeat;
            background-position: left center;
            padding-left: 30px;
            /* Jarak antara gambar dan teks */
        }

        .dropdown-container select option[value="1"] {
            background-image: url('gambar_tema1.jpg');
            /* Lokasi gambar tema 1 */
            background-size: 20px 20px;
            /* Ukuran gambar */
        }

        .select-sim {
            width: 200px;
            height: px;
            line-height: 22px;
            vertical-align: middle;
            position: relative;
            background: white;
            border: 1px solid #ccc;
            overflow: hidden;
        }

        .select-sim::after {
            content: "▼";
            font-size: 0.5em;
            font-family: arial;
            position: absolute;
            top: 50%;
            right: 5px;
            transform: translate(0, -50%);
        }

        .select-sim:hover::after {
            content: "";
        }

        .select-sim:hover {
            overflow: visible;
        }

        .select-sim:hover .options .option label {
            display: inline-block;
        }

        .select-sim:hover .options {
            background: white;
            border: 1px solid #ccc;
            position: absolute;
            top: -1px;
            left: -1px;
            width: 100%;
            height: 88px;
            overflow-y: scroll;
        }

        .select-sim .options .option {
            overflow: hidden;
        }

        .select-sim:hover .options .option {
            height: 22px;
            overflow: hidden;
        }

        .select-sim .options .option img {
            vertical-align: middle;
        }

        .select-sim .options .option label {
            display: none;
        }

        .select-sim .options .option input {
            width: 0;
            height: 0;
            overflow: hidden;
            margin: 0;
            padding: 0;
            float: left;
            display: inline-block;
            /* fix specific for Firefox */
            position: absolute;
            left: -10000px;
        }

        .select-sim .options .option input:checked+label {
            display: block;
            width: 100%;
        }

        .select-sim:hover .options .option input+label {
            display: block;
        }

        .select-sim:hover .options .option input:checked+label {
            background: #fffff0;
        }
    </style>

    <style type="text/css">
        /* Chart.js */

        @keyframes chartjs-render-animation {
            from {
                opacity: .99
            }

            to {
                opacity: 1
            }
        }

        .chartjs-render-monitor {
            animation: chartjs-render-animation 1ms
        }

        .chartjs-size-monitor,
        .chartjs-size-monitor-expand,
        .chartjs-size-monitor-shrink {
            position: absolute;
            direction: ltr;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            overflow: hidden;
            pointer-events: none;
            visibility: hidden;
            z-index: -1
        }

        .chartjs-size-monitor-expand>div {
            position: absolute;
            width: 1000000px;
            height: 1000000px;
            left: 0;
            top: 0
        }

        .chartjs-size-monitor-shrink>div {
            position: absolute;
            width: 200%;
            height: 200%;
            left: 0;
            top: 0
        }

        body {
            padding: 40px;
        }

        .dropdown-toggle,
        .dropdown-menu {
            width: 300px
        }

        .btn-group img {
            margin-right: 10px
        }

        .dropdown-toggle {
            padding-right: 50px
        }

        .dropdown-toggle .glyphicon {
            margin-left: 20px;
            margin-right: -40px
        }

        .dropdown-menu>li>a:hover {
            background: #f1f9fd
        }

        .dropdown-header {
            background: #ccc;
            font-size: 14px;
            font-weight: 700;
            padding-top: 5px;
            padding-bottom: 5px;
            margin-top: 10px;
            margin-bottom: 5px
        }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

<![endif]-->

    @yield('head')

</head>



<body>

    <!-- ============================================================== -->

    <!-- Preloader - style you can find in spinners.css -->

    <!-- ============================================================== -->

    <div class="preloader">

        <div class="lds-ripple">

            <div class="lds-pos"></div>

            <div class="lds-pos"></div>

        </div>

    </div>

    <!-- ============================================================== -->

    <!-- Main wrapper - style you can find in pages.scss -->

    <!-- ============================================================== -->

    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">

        <!-- ============================================================== -->

        <!-- Topbar header - style you can find in pages.scss -->

        <!-- ============================================================== -->

        <header class="topbar" data-navbarbg="skin6">

            <nav class="navbar top-navbar navbar-expand-lg">

                <div class="navbar-header" data-logobg="skin6">

                    <!-- This is for the sidebar toggle which is visible on mobile only -->

                    <a class="nav-toggler waves-effect waves-light d-block d-lg-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>

                    <!-- ============================================================== -->

                    <!-- Logo -->

                    <!-- ============================================================== -->

                    <div class="navbar-brand">

                        <!-- Logo icon -->

                        <a href="/admin/dashboard">

                            <img src="{{asset('FreeDash-lite-master/src')}}/assets/images/logo.png" alt="" class="img-fluid">

                        </a>

                    </div>

                    <!-- ============================================================== -->

                    <!-- End Logo -->

                    <!-- ============================================================== -->

                    <!-- ============================================================== -->

                    <!-- Toggle which is visible on mobile only -->

                    <!-- ============================================================== -->

                    <a class="topbartoggler d-block d-lg-none waves-effect waves-light" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>

                </div>

                <!-- ============================================================== -->

                <!-- End Logo -->

                <!-- ============================================================== -->

                @if(auth()->check())

                <div class="navbar-collapse collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav float-end">

                        <!-- ============================================================== -->

                        <!-- User profile and search -->

                        <!-- ============================================================== -->

                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <img src="{{asset('FreeDash-lite-master/src')}}/assets/images/users/profile-pic.jpg" alt="user" class="rounded-circle" width="40">



                                <span class="ms-2 d-none d-lg-inline-block"><span>Hello,</span>

                                    <span class="text-dark">{{ auth()->user()->name }}</span> <i data-feather="chevron-down" class="svg-icon"></i></span>



                            </a>

                        </li>

                        <!-- ============================================================== -->

                        <!-- User profile and search -->

                        <!-- ============================================================== -->

                    </ul>

                </div>

                @endif

            </nav>

        </header>

        <!-- ============================================================== -->

        <!-- End Topbar header -->

        <!-- ============================================================== -->

        <!-- ============================================================== -->

        <!-- Left Sidebar - style you can find in sidebar.scss  -->

        <!-- ============================================================== -->

        <aside class="left-sidebar" data-sidebarbg="skin6">

            <!-- Sidebar scroll-->

            <div class="scroll-sidebar" data-sidebarbg="skin6">

                <!-- Sidebar navigation-->

                <nav class="sidebar-nav">

                    <ul id="sidebarnav">

                        @if(auth()->check())

                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/admin/dashboard" aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span class="hide-menu">Dashboard</span></a></li>

                        @if(auth()->check() && auth()->user()->level == "SuAdmin")

                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/admin/user" aria-expanded="false"><i class="icon-user-follow"></i><span class="hide-menu"> Admin</span></a></li>



                        @endif
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/admin/client" aria-expanded="false"><i class=" icon-notebook"></i><span class="hide-menu">Client</span></a></li>

                        {{-- <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/undangan" aria-expanded="false"><i class=" icon-notebook"></i><span class="hide-menu">Undangan Baru</span></a></li> --}}



                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/admin/undangan" aria-expanded="false"><i class=" icon-notebook"></i><span class="hide-menu">Daftar Undangan</span></a></li>

                        <li class="list-divider"></li>

                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link logout" href="#" data-toggle="modal" data-target="#logoutModal"><i class="icon-logout"></i><span class="hide-menu">Log Out</span></a></li>

                        @else

                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/dash/client/{{$client}}" aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span class="hide-menu">Dashboard</span></a>

                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/dash/undangan/client/{{$client}}" aria-expanded="false"><i class=" icon-notebook"></i><span class="hide-menu">Undangan Saya</span></a></li>

                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link" href="/dash/client/whatsapp/{{$client}}" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square feather-icon"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                                <span class="hide-menu">WhatsApp</span>
                            </a>
                        </li>

                        @endif

                    </ul>

                </nav>

                <!-- End Sidebar navigation -->

            </div>

            <!-- End Sidebar scroll-->

        </aside>

        <!-- ============================================================== -->

        <!-- End Left Sidebar - style you can find in sidebar.scss  -->

        <!-- ============================================================== -->

        <!-- ============================================================== -->

        <!-- Page wrapper  -->

        <!-- ============================================================== -->

        <div class="page-wrapper">

            @yield('container')

        </div>

        <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

            <div class="modal-dialog modal-dialog-centered">

                <div class="modal-content">

                    <div class="modal-header">

                        <h5 class="modal-title" id="exampleModalLabel">Logout</h5>

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    </div>

                    <div class="modal-body">

                        Apakah anda yakin ingin logout?

                    </div>

                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>

                        <form action="/admin/logout" method="POST">

                            @csrf

                            <button type="submit" class="btn btn-primary">Iya</button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

        <!-- ============================================================== -->

        <!-- End Wrapper -->

        <!-- ============================================================== -->

        <!-- End Wrapper -->

        <!-- ============================================================== -->

        <!-- All Jquery -->

        <!-- ============================================================== -->

        <script src="{{asset('FreeDash-lite-master/src')}}/assets/libs/jquery/dist/jquery.min.js"></script>

        <script src="{{asset('FreeDash-lite-master/src')}}/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

        <!-- apps -->

        <!-- apps -->

        <script src="{{asset('FreeDash-lite-master/src')}}/dist/js/app-style-switcher.js"></script>

        <script src="{{asset('FreeDash-lite-master/src')}}/dist/js/feather.min.js"></script>

        <script src="{{asset('FreeDash-lite-master/src')}}/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>

        <script src="{{asset('FreeDash-lite-master/src')}}/dist/js/sidebarmenu.js"></script>

        <!--Custom JavaScript -->

        <script src="{{asset('FreeDash-lite-master/src')}}/dist/js/custom.min.js"></script>

        <!--This page JavaScript -->

        <script src="{{asset('FreeDash-lite-master/src')}}/assets/extra-libs/c3/d3.min.js"></script>

        <script src="{{asset('FreeDash-lite-master/src')}}/assets/extra-libs/c3/c3.min.js"></script>

        <script src="{{asset('FreeDash-lite-master/src')}}/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>

        <script src="{{asset('FreeDash-lite-master/src')}}/assets/extra-libs/datatables.net-bs4/js/dataTables.responsive.min.js"></script>



        <script src="{{asset('FreeDash-lite-master/src')}}/assets/libs/chartist/dist/chartist.min.js"></script>

        <script src="{{asset('FreeDash-lite-master/src')}}/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>

        <script src="{{asset('FreeDash-lite-master/src')}}/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>

        <script src="{{asset('FreeDash-lite-master/src')}}/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>

        <script src="{{asset('FreeDash-lite-master/src')}}/dist/js/pages/dashboards/dashboard1.min.js"></script>

        <script src="{{asset('FreeDash-lite-master/src')}}/dist/js/pages/chartjs/chartjs.init.js"></script>

        <script src="{{asset('FreeDash-lite-master/src')}}/assets/libs/chart.js/dist/Chart.min.js"></script>
        <!-- scripts -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.js"></script>

        {{-- script select2 --}}
        {{-- <script src="{{ asset('select2-4.1.0-rc.0/dist/js/select2.min.js') }}"></script> --}}
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script type="text/javascript">
            function custom_template(obj) {
                var data = $(obj.element).data();
                var text = $(obj.element).text();
                if (data && data['img_src']) {
                    img_src = data['img_src'];
                    template = $("<div><img src=\"" + img_src + "\" style=\"width:100%;height:100px;\"/><p style=\"font-weight: 100;font-size:14pt;text-align:center;\">" + text + "</p></div>");
                    return template;
                }
            }
            var options = {
                'templateSelection': custom_template,
                'templateResult': custom_template,
            }
            // $('#id_select2_example').select2(options);
            // $('.select2-container--default .select2-selection--single').css({
            //     'height': '220px'
            // });
        </script>

        <script>
            $(document).ready(function() {

                $('#zero_config').DataTable();

                $('.logout').click(function() {

                    $('#logoutModal').modal('show');

                });

            });
        </script>


        {{-- <script>
            $(document).ready(function() {
                $('.select-with-images').select2({
                    escapeMarkup: function(markup) {
                        return markup;
                    }
                });
            });
        </script> --}}

        @yield('script')

</body>



</html>
