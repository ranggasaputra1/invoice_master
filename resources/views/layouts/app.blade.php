<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>CV. Refcool Mitra Teknik </title>

    <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/nprogress/nprogress.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/iCheck/skins/flat/green.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('assets/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

    <!-- Datatables -->
    <link href="{{ asset('assets/datatables.net-bs/css/dataTables.bootstrap.min.css ') }}" rel="stylesheet">
    <link href="{{ asset('assets/datatables.net-buttons-bs/css/buttons.bootstrap.min.css ') }}" rel="stylesheet">
    <link href="{{ asset('assets/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css ') }}"
        rel="stylesheet">
    <link href="{{ asset('assets/datatables.net-responsive-bs/css/responsive.bootstrap.min.css ') }}" rel="stylesheet">
    <link href="{{ asset('assets/datatables.net-scroller-bs/css/scroller.bootstrap.min.css ') }}" rel="stylesheet">

    <link href="{{ asset('assets/build/css/custom.min.css') }}" rel="stylesheet">

</head>

<body class="nav-md fixed_sidebar">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <ul><img src="{{ asset('/image/image.png') }}" alt="..." class="img-circle" height="65px">
                    </ul>
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="{{ url('/home') }}" class="site_title"></i><span>CV. Refcool Mitra Teknik</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>Menu Utama</h3>
                            <ul class="nav side-menu">
                                <li>
                                    <a class="nav-link {{ Request::is('/home') ? 'active' : '' }}" href="/home"><i
                                            class="fa fa-home"></i> Dashboard</a>
                                </li>

                                {{-- Yang Bisa Dilakukan Admin --}}
                                @if (auth()->user()->level == 'admin')
                                    <li>
                                        <a class="nav-link {{ Request::is('/product') ? 'active' : '' }}"
                                            href="{{ url('/product') }}"> <i class="fa fa-product-hunt"></i> Produk</a>
                                    </li>

                                    <li>
                                        <a
                                            class="nav-link {{ Request::is('/customer') ? 'active' : '' }}"href="{{ url('/customer') }}"><i
                                                class="fa fa-user"></i> Customer</a>
                                    </li>
                                    <li>
                                        <a class="nav-link {{ Request::is('/invoice/new') ? 'active' : '' }}"
                                            href="{{ route('invoice.create') }}"> <i class="fa fa-edit"></i>
                                            Invoice</a>
                                    </li>
                                    <li>
                                        <a class="nav-link {{ Request::is('/invoice') ? 'active' : '' }}"
                                            href="{{ route('invoice.index') }}"> <i class="fa fa-list-alt"></i>Rekapan
                                            Invoice Keluaran</a>
                                    </li>
                                    <li>
                                        <a class="nav-link {{ Request::is('/masukan') ? 'active' : '' }}"
                                            href="{{ url('/masukan') }}"><i class="fa fa-book"></i> Data Invoice
                                            Masukan</a>
                                    </li>
                                    <li>
                                        <a class="nav-link {{ Request::is('/laporan') ? 'active' : '' }}"
                                            href="{{ route('laporan.index') }}"><i class="fa fa-file"></i>Laporan
                                            Kurang
                                            Bayar atau Lebih Setor</a>
                                    </li>
                                    <li>
                                        <a class="nav-link {{ Request::is('/data_user') ? 'active' : '' }}"
                                            href="{{ url('/data_user') }}"><i class="	fa fa-user-secret"></i>Data
                                            User</a>
                                    </li>
                                @endif

                                {{-- End Admin --}}

                                {{-- Yang bisa dilakukan Keuangan --}}
                                @if (auth()->user()->level == 'keuangan')
                                    <li>
                                        <a class="nav-link {{ Request::is('/invoice/new') ? 'active' : '' }}"
                                            href="{{ route('invoice.create') }}"> <i class="fa fa-edit"></i>
                                            Invoice</a>
                                    </li>
                                    <li>
                                        <a class="nav-link {{ Request::is('/invoice') ? 'active' : '' }}"
                                            href="{{ route('invoice.index') }}"> <i class="fa fa-list-alt"></i>Rekapan
                                            Invoice Keluaran</a>
                                    </li>
                                    <li>
                                        <a class="nav-link {{ Request::is('/masukan') ? 'active' : '' }}"
                                            href="{{ url('/masukan') }}"><i class="fa fa-book"></i> Data Invoice
                                            Masukan</a>
                                    </li>
                                    <li>
                                        <a class="nav-link {{ Request::is('/laporan') ? 'active' : '' }}"
                                            href="{{ route('laporan.index') }}"><i class="fa fa-file"></i>Laporan
                                            Kurang
                                            Bayar atau Lebih Setor</a>
                                    </li>
                                @endif
                                {{-- End Keuangan --}}

                                {{-- Yang bisa Dilakukan Direktur --}}
                                @if (auth()->user()->level == 'direktur')
                                    <li>
                                        <a
                                            class="nav-link {{ Request::is('/customer') ? 'active' : '' }}"href="{{ url('/customer') }}"><i
                                                class="fa fa-user"></i> Customer</a>
                                    </li>

                                    <li>
                                        <a class="nav-link {{ Request::is('/laporan') ? 'active' : '' }}"
                                            href="{{ route('laporan.index') }}"><i class="fa fa-file"></i>Laporan
                                            Kurang
                                            Bayar atau Lebih Setor</a>
                                    </li>
                                @endif
                                {{-- End Direktur --}}
                            </ul>
                        </div>
                    </div>

                </div>
            </div>


            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <nav>
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                                    aria-expanded="false">
                                    <img src="{{ asset('/image/image.png') }}" alt="">
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>

            <div class="right_col" role="main">

                <div class="row">
                    @yield('content')
                </div>
            </div>

            <footer>
                <div class="clearfix"></div>
            </footer>



            <!-- jQuery -->
            <script src="{{ asset('assets/jquery/dist/jquery.min.js') }}"></script>
            <!-- Bootstrap -->
            <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
            <!-- NProgress -->
            <script src="{{ asset('assets/nprogress/nprogress.js') }}"></script>
            <!-- iCheck -->
            <script src="{{ asset('assets/iCheck/icheck.min.js') }}"></script>
            <!-- DateJS -->
            <script src="{{ asset('assets/DateJS/build/date.js') }}"></script>
            <!-- Datatables -->
            <script src="{{ asset('assets/datatables.net/js/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('assets/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
            <script src="{{ asset('assets/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
            <script src="{{ asset('assets/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
            <script src="{{ asset('assets/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
            <script src="{{ asset('assets/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
            <script src="{{ asset('assets/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
            <script src="{{ asset('assets/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
            <script src="{{ asset('assets/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
            <script src="{{ asset('assets/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
            <script src="{{ asset('assets/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
            <script src="{{ asset('assets/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
            <script src="{{ asset('assets/jszip/dist/jszip.min.js') }}"></script>
            <script src="{{ asset('assets/pdfmake/build/pdfmake.min.js') }}"></script>
            <script src="{{ asset('assets/pdfmake/build/vfs_fonts.js') }}"></script>

            <!-- Custom Theme Scripts -->
            <script src="{{ asset('assets/build/js/custom.min.js') }}"></script>

</body>

</html>
