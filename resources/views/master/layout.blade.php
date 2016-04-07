
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Sistema de Prestamos y Cobros‎</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="/favicon.ico">
        <link rel="apple-touch-icon" href="/images/icons/favicon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="{{asset("images/icons/favicon-72x72.png")}}">
        <link rel="apple-touch-icon" sizes="114x114" href="images/icons/favicon-114x114.png">
        <!--Loading bootstrap css-->
        <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700">
        <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">
        <link type="text/css" rel="stylesheet" href="/styles/jquery-ui-1.10.4.custom.min.css">
        <link type="text/css" rel="stylesheet" href="/styles/font-awesome.min.css">
        <link type="text/css" rel="stylesheet" href="/styles/bootstrap.min.css">
        <link type="text/css" rel="stylesheet" href="/styles/animate.css">
        <link type="text/css" rel="stylesheet" href="/styles/all.css">
        <link type="text/css" rel="stylesheet" href="/styles/main.css">
        <link type="text/css" rel="stylesheet" href="/styles/style-responsive.css">
        <link type="text/css" rel="stylesheet" href="/styles/zabuto_calendar.min.css">
        <link type="text/css" rel="stylesheet" href="/styles/pace.css">
        <link type="text/css" rel="stylesheet" href="/styles/jquery.news-ticker.css">
    </head>
    <body>
        <div>
            <!--BEGIN THEME SETTING-->

            <!--END THEME SETTING-->
            <!--BEGIN BACK TO TOP-->
            <a id="totop" href="#"><i class="fa fa-angle-up"></i></a>
            <!--END BACK TO TOP-->
            <!--BEGIN TOPBAR-->
            <div id="header-topbar-option-demo" class="page-header-topbar">
                <nav id="topbar" role="navigation" style="margin-bottom: 0;" data-step="3" class="navbar navbar-default navbar-static-top">
                    <div class="navbar-header">
                        <button type="button" data-toggle="collapse" data-target=".sidebar-collapse" class="navbar-toggle"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                        <a id="logo" href="#" class="navbar-brand"><span class="fa fa-rocket"></span><span class="logo-text">KPresta</span><span style="display: none" class="logo-text-icon">µ</span></a></div>
                    <div class="topbar-main"><a id="menu-toggle" href="#" class="hidden-xs"><i class="fa fa-bars"></i></a>



                        <ul class="nav navbar navbar-top-links navbar-right mbn">

                            <li class="dropdown topbar-user"><a data-hover="dropdown" href="#" class="dropdown-toggle"><img src="" alt="" class="img-responsive img-circle"/>&nbsp;<span class="hidden-xs">{{Auth::user()->name}} {{Auth::user()->lastname}}</span>&nbsp;<span class="caret"></span></a>
                                <ul class="dropdown-menu dropdown-user pull-right">
                                    <li><a href="#"><i class="fa fa-user"></i>Mi perfil</a></li>

                                    <li><a href="{{URL::to("logout")}}"><i class="fa fa-key"></i>Cerrar sesión</a></li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </nav>
                <!--BEGIN MODAL CONFIG PORTLET-->

                <!--END MODAL CONFIG PORTLET-->
            </div>
            <!--END TOPBAR-->
            <div id="wrapper">
                <!--BEGIN SIDEBAR MENU-->
                @if(Auth::user()->role_id == 1)
                    @include('master.admin-navbar')
                @elseif(Auth::user()->role_id == 2)
                    @include('master.manager-navbar')
                @elseif(Auth::user()->role_id == 3)
                    @include('master.collector-navbar')
                @endif



                <div id="page-wrapper">
                    <!--BEGIN TITLE & BREADCRUMB PAGE-->
                    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                        <div class="page-header pull-left">
                            <div class="page-title">
                                Sistema de Prestamos y Cobros‎</div>
                        </div>

                        <div class="clearfix">
                        </div>
                    </div>
                    <!--END TITLE & BREADCRUMB PAGE-->
                    <!--BEGIN CONTENT-->
                    <div class="page-content">

                        @yield('contenido')		

                    </div>
                </div>
                <!--END CONTENT-->
                <!--BEGIN FOOTER-->
                <div id="footer">
                    <div class="copyright">
                        &copy; {{Carbon\Carbon::now()->year}} <a target="_blank" href="http://jodamapi.com/" title="jodamapi inversiones s.r.l">Jodamapi</a>. Todos los derechos reservados.</div>
                </div>
                <!--END FOOTER-->
            </div>
            <!--END PAGE WRAPPER-->
        </div>
    </div>
    <script src="/script/jquery-1.10.2.min.js"></script>
    <script src="/script/jquery-migrate-1.2.1.min.js"></script>
    <script src="/script/jquery-ui.js"></script>
    <script src="/script/bootstrap.min.js"></script>
    <script src="/script/bootstrap-hover-dropdown.js"></script>
    <script src="/script/html5shiv.js"></script>
    <script src="/script/respond.min.js"></script>
    <script src="/script/jquery.metisMenu.js"></script>
    <script src="/script/jquery.slimscroll.js"></script>
    <script src="/script/jquery.cookie.js"></script>
    <script src="/script/icheck.min.js"></script>
    <script src="/script/custom.min.js"></script>
    <script src="/script/jquery.news-ticker.js"></script>
    <script src="/script/jquery.menu.js"></script>
    <script src="/script/pace.min.js"></script>
    <script src="/script/holder.js"></script>
    <script src="/script/responsive-tabs.js"></script>
    <script src="/script/jquery.flot.js"></script>
    <script src="/script/jquery.flot.categories.js"></script>
    <script src="/script/jquery.flot.pie.js"></script>
    <script src="/script/jquery.flot.tooltip.js"></script>
    <script src="/script/jquery.flot.resize.js"></script>
    <script src="/script/jquery.flot.fillbetween.js"></script>
    <script src="/script/jquery.flot.stack.js"></script>
    <script src="/script/jquery.flot.spline.js"></script>
    <script src="/script/zabuto_calendar.min.js"></script>
    <script src="/script/index.js"></script>
    <!--LOADING SCRIPTS FOR CHARTS-->
    <script src="/script/highcharts.js"></script>
    <script src="/script/data.js"></script>
    <script src="/script/drilldown.js"></script>
    <script src="/script/exporting.js"></script>
    <script src="/script/highcharts-more.js"></script>
    <script src="/script/charts-highchart-pie.js"></script>
    <script src="/script/charts-highchart-more.js"></script>
    <!--CORE JAVASCRIPT-->
    <script src="/script/main.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="/styles/jasny-bootstrap.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="/script/jasny-bootstrap.min.js"></script>

</body>
</html>
