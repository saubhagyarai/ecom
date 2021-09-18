<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('front/assets/img/apple-icon.png')}}" />
    <link rel="icon" type="image/png" href="{{asset('front/assets/img/favicon.png')}}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>{{ucfirst(config('app.name'))}} @yield('title')</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Canonical SEO -->
    <link rel="canonical" href="http://www.creative-tim.com/product/material-dashboard-pro" />
    <!--  Social tags      -->
    <meta name="keywords" content="material dashboard, bootstrap material admin, bootstrap material dashboard, material design admin, material design, creative tim, html dashboard, html css dashboard, web dashboard, freebie, free bootstrap dashboard, css3 dashboard, bootstrap admin, bootstrap dashboard, frontend, responsive bootstrap dashboard, premiu material design admin">
    <meta name="description" content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Material Dashboard PRO by Creative Tim | Premium Bootstrap Admin Template">
    <meta itemprop="description" content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
    <meta itemprop="image" content="http://s3.amazonaws.com/creativetim_bucket/products/51/opt_mdp_thumbnail.jpg">
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="Material Dashboard PRO by Creative Tim | Premium Bootstrap Admin Template">
    <meta name="twitter:description" content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
    <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image" content="http://s3.amazonaws.com/creativetim_bucket/products/51/opt_mdp_thumbnail.jpg">
    <!-- Open Graph data -->
    <meta property="fb:app_id" content="655968634437471">
    <meta property="og:title" content="Material Dashboard PRO by Creative Tim | Premium Bootstrap Admin Template" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="http://www.creative-tim.com/product/material-dashboard-pro" />
    <meta property="og:image" content="http://s3.amazonaws.com/creativetim_bucket/products/51/opt_mdp_thumbnail.jpg" />
    <meta property="og:description" content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design." />
    <meta property="og:site_name" content="Creative Tim" />
    <!-- Bootstrap core CSS     -->
    <link href="{{asset('front/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="{{asset('front/assets/css/material-dashboard.css?v=1.2.0')}}" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{asset('front/assets/css/demo.css')}}" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

    @yield('css')
    
</head>

<body class="off-canvas-sidebar">
    <div class="wrapper">
        @if (Auth::guard('admin')->check())
            
        <div class="sidebar" data-active-color="rose" data-background-color="black" data-image="{{asset('front/assets/img/sidebar-1.jpg')}}">
            <!--
            Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
            Tip 2: you can also add an image using data-image tag
            Tip 3: you can change the color of the sidebar with data-background-color="white | black"
            -->
                <div class="logo">
                    <a href="{{route('index')}}" class="simple-text logo-mini">
                        GU
                    </a>
                    <a href="{{route('index')}}" target="_blank" class="simple-text logo-normal">
                        {{config('app.name')}}
                    </a>
                </div>
                <div class="sidebar-wrapper">
                    <div class="user">
                        <div class="photo">
                            <img src="{{asset('frontend/assets/img/fav.png')}}" />
                        </div>
                        <div class="info">
                            <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                                <span>
                                    @auth
                                    
                                    {{ Auth::user()->name }} 
                                    @endauth
                                    <b class="caret"></b>
                                </span>
                            </a>
                            <div class="clearfix"></div>
                            <div class="collapse  {{request()->is('admin/change-password') ? 'in':''}}" id="collapseExample">
                                <ul class="nav">
                                    <li  class="{{request()->is('admin/change-password') ? 'active':''}}">
                                    <a href="{{route('password.get')}}">
                                            <span class="sidebar-mini"><i class="material-icons">lock</i></span>
                                            <span class="sidebar-normal">Change Password</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.logout') }}"
                                            onclick="event.preventDefault();
                                                document.getElementById('logout-form-nav').submit();">
                                            <span class="sidebar-mini">                                <i class="material-icons">logout</i>
                                            </span>
                                            <span class="sidebar-normal">Log Out</span>
                                        </a>
        
                                        <form id="logout-form-nav" action="{{ route('admin.logout') }}" method="GET" style="">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <ul class="nav">
                        <li  class="{{request()->is('admin') ? 'active':''}}">
                            <a href="{{route('admin.dashboard')}}">
                                <i class="material-icons">dashboard</i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        <li>
                            <a data-toggle="collapse" href="#slider" class="active">
                                <i class="material-icons">wallpaper</i>
                                <p>Slider
                                    <b class="caret"></b>
                                </p>
                            </a>                       
                            <div class="collapse {{ (request()->is('admin/slider*')) ? 'in' : '' }}" id="slider">
                                <ul class="nav">
                                    <li class="{{request()->is('admin/slider/create') ? 'active':''}}">
                                        <a href="{{route('slider.create')}}">
                                            <span class="sidebar-mini">AN</span>
                                            <span class="sidebar-normal">Add New Slider</span>
                                        </a>
                                    </li>
                                    <li class="{{request()->is('admin/slider') ? 'active':''}}">
                                        <a href="{{route('slider.index')}}">
                                            <span class="sidebar-mini">VA</span>
                                            <span class="sidebar-normal">View All Sliders</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a data-toggle="collapse" href="#product">
                                <i class="material-icons">inventory_2</i>
                                <p>Products
                                    <b class="caret"></b>
                                </p>
                            </a>
                            <div class="collapse {{ (request()->is('admin/product*') || request()->is('admin/category*')) ? 'in' : '' }}" id="product">
                                <ul class="nav">
                                    <li class="{{request()->is('admin/product/create') ? 'active':''}}">
                                    <a href="{{route('product.create')}}">
                                            <span class="sidebar-mini">AC</span>
                                            <span class="sidebar-normal">Add New Product</span>
                                        </a>
                                    </li>
                                    <li class="{{request()->is('admin/product') ? 'active':''}}">
                                    <a href="{{route('product.index')}}">
                                            <span class="sidebar-mini">VA</span>
                                            <span class="sidebar-normal">View All Products</span>
                                        </a>
                                    </li>
                                    <li class="{{request()->is('admin/category*') ? 'active':''}}">
                                    <a href="{{route('category.index')}}">
                                            <span class="sidebar-mini">CAT</span>
                                            <span class="sidebar-normal">Categories</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a data-toggle="collapse" href="#page">
                                <i class="material-icons">article</i>
                                <p>Pages
                                    <b class="caret"></b>
                                </p>
                            </a>
                            <div class="collapse {{ (request()->is('admin/page*')) ? 'in' : '' }}" id="page">
                                <ul class="nav">
                                    <li class="{{request()->is('admin/page/create') ? 'active':''}}">
                                    <a href="{{route('page.create')}}">
                                            <span class="sidebar-mini">AC</span>
                                            <span class="sidebar-normal">Add New page</span>
                                        </a>
                                    </li>
                                    <li class="{{request()->is('admin/page') ? 'active':''}}">
                                    <a href="{{route('page.index')}}">
                                            <span class="sidebar-mini">VA</span>
                                            <span class="sidebar-normal">View All Pages</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li> 

                        <li class="{{request()->is('order*') ? 'active':''}}">
                            <a href="{{route('order.index')}}">
                                <i class="material-icons">shopping_cart
                                </i>
                                <p>Orders
                                </p>
                            </a>
                        </li>

                        <li class="{{request()->is('admin/user*') ? 'active':''}}">
                            <a href="{{route('user.index')}}">
                                <i class="material-icons">people
                                </i>
                                <p>All Users
                                </p>
                            </a>
                        </li>

                        <li class="{{request()->is('admin/contact*') ? 'active':''}}">
                            <a href="{{route('contact.index')}}">
                                <i class="material-icons">mail
                                </i>
                                <p>Messages
                                </p>
                            </a>
                        </li>

                        <li  class="{{request()->is('admin/setting') ? 'active':''}}">
                            <a href="{{route('setting.get')}}">
                                <i class="material-icons">settings</i>
                                <p>Settings</p>
                            </a>
                        </li>
        
                    </ul>
                </div>
            </div>
            <div class="main-panel">
                <nav class="navbar navbar-transparent navbar-absolute">
                    <div class="container-fluid">
                        <div class="navbar-minimize">
                            <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                                <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                                <i class="material-icons visible-on-sidebar-mini">view_list</i>
                            </button>
                        </div>
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#"> Dashboard </a>
                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a href="#pablo" class="dropdown-toggle btn-success" data-toggle="dropdown">
                                        <i class="material-icons">person</i>
                                        <p class="hidden-lg hidden-md">Profile</p>
                                    </a>                                
                                    @Auth
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        
                                        <li>
                                            <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                            onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                            </a>
        
                                        <form id="logout-form" action="{{ route('admin.logout') }}" method="GET" style="">
                                            @csrf
                                        </form>
                                        </li>
                                    </ul>
                                    @endAuth
        
                                </li>
                                <li class="separator hidden-lg hidden-md"></li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="content">

                @include('admin.includes.message')

                @yield('content')
                
                </div>

        @else

                @yield('content')

                <footer class="footer">
                    <div class="container">
                        <p class="copyright pull-right">
                            &copy;
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            <a href="http://www.thesunbi.com">Powered by SunBi</a>, made with love for a better web
                        </p>
                    </div>
                </footer>
        </div>
        @endif
    </div>
</body>

<!--   Core JS Files   -->
<script src="{{asset('front/assets/js/jquery-3.2.1.min.js')}}" type="text/javascript"></script>
<script src="{{asset('front/assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('front/assets/js/material.min.js')}}" type="text/javascript"></script>
<script src="{{asset('front/assets/js/perfect-scrollbar.jquery.min.js')}}" type="text/javascript"></script>
<!-- Library for adding dinamically elements -->
<script src="{{asset('front/assets/js/arrive.min.js')}}" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="{{asset('front/assets/js/jquery.validate.min.js')}}"></script>
<!-- Promise Library for SweetAlert2 working on IE -->
<script src="{{asset('front/assets/js/es6-promise-auto.min.js')}}"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="{{asset('front/assets/js/moment.min.js')}}"></script>
<!--  Charts Plugin, full documentation here: https://gionkunz.github.io/chartist-js/ -->
<script src="{{asset('front/assets/js/chartist.min.js')}}"></script>
<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="{{asset('front/assets/js/jquery.bootstrap-wizard.js')}}"></script>
<!--  Notifications Plugin, full documentation here: http://bootstrap-notify.remabledesigns.com/    -->
<script src="{{asset('front/assets/js/bootstrap-notify.js')}}"></script>
<!--   Sharrre Library    -->
<script src="{{asset('front/assets/js/jquery.sharrre.js')}}"></script>
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="{{asset('front/assets/js/bootstrap-datetimepicker.js')}}"></script>
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="{{asset('front/assets/js/jquery-jvectormap.js')}}"></script>
<!-- Sliders Plugin, full documentation here: https://refreshless.com/nouislider/ -->
<script src="{{asset('front/assets/js/nouislider.min.js')}}"></script>
<!--  Google Maps Plugin    -->
{{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFPQibxeDaLIUHsC6_KqDdFaUdhrbhZ3M"></script> --}}
<!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="{{asset('front/assets/js/jquery.select-bootstrap.js')}}"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
<script src="{{asset('front/assets/js/jquery.datatables.js')}}"></script>
<!-- Sweet Alert 2 plugin, full documentation here: https://limonte.github.io/sweetalert2/ -->
<script src="{{asset('front/assets/js/sweetalert2.js')}}"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{asset('front/assets/js/jasny-bootstrap.min.js')}}"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="{{asset('front/assets/js/fullcalendar.min.js')}}"></script>
<!-- Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="{{asset('front/assets/js/jquery.tagsinput.js')}}"></script>
<!-- Material Dashboard javascript methods -->
<script src="{{asset('front/assets/js/material-dashboard.js?v=1.2.0')}}"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="{{asset('front/assets/js/demo.js')}}"></script>
<script type="text/javascript">
    $().ready(function() {
        demo.checkFullPageBackgroundImage();

        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });
</script>


@yield('scripts')

</html>