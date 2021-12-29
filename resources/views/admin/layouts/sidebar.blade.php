<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>{{ $title ?? "Tios World - Dashboard"}} </title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets\front\img\logo\logo.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('material/admin/css/bootstrap.min.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('material/admin/css/font-awesome.min.css') }}">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="{{ asset('material/admin/css/feathericon.min.css') }}">

    <link rel="stylesheet" href="{{ asset('material/admin/plugins/morris/morris.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('material/admin/css/style.css') }}">
    <style>
        .user-menu.nav>li>a>i {

            color: black;
        }

        .user-menu.nav>li>a {
            color: black !important;
        }
    </style>

</head>

<body class="{{ $class ?? '' }}">
    @auth()
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    @endauth

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Header -->
        <div class="header">

            <!-- Logo -->
            <div class="header-left">
                <a href="{{ route('home')}}" class="logo">
                    <img src="{{ asset('uploads/logo') }}/{{ getWeb()->logo }}" alt="Logo" style="height:100px;width:150px;">
                </a>
                <a href="{{ route('home')}}" class="logo logo-small">
                    <img src="{{ asset('uploads/logo') }}/{{ getWeb()->logo }}" alt="Logo" width="30" height="30">
                </a>
            </div>
            <!-- /Logo -->

            <a href="javascript:void(0);" id="toggle_btn">
                <i class="fe fe-text-align-left"></i>
            </a>

            <!-- <div class="top-nav-search">
                <form>
                    <input type="text" class="form-control" placeholder="Search here">
                    <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div> -->

            <!-- Mobile Menu Toggle -->
            <a class="mobile_btn" id="mobile_btn">
                <i class="fa fa-bars"></i>
            </a>
            <!-- /Mobile Menu Toggle -->

            <!-- Header Right Menu -->
            <ul class="nav user-menu">
                <!-- Order -->
                <li class="nav-item dropdown noti-dropdown">
                    <a href="{{ route('home')}}" class="dropdown-toggle nav-link">
                        <i class="fa fa-home text-primary"></i>
                    </a>
                </li>



                <!-- User Menu -->
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">

                        <span class="user-img">
                            <h6>Hello <?php $ar = explode(" ", auth()->user()->name);
                                        echo $ar[0];  ?>!</h6>
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="user-header">

                            <div class="user-text">
                                <h6>Hello <?php $ar = explode(" ", auth()->user()->name);
                                            echo $ar[0];  ?>!</h6>
                                @if(auth()->user()->user_type=='admin')
                                <p class="text-muted mb-0">Administrator</p>
                                @endif
                            </div>
                        </div>
                        <a class="dropdown-item" href="{{ route('my.profile.view')}}">My Profile</a>

                        <a class="dropdown-item" href="{{ route('logout')}}">Logout</a>
                    </div>
                </li>
                <!-- /User Menu -->

            </ul>
            <!-- /Header Right Menu -->

        </div>
        <!-- /Header -->

        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>

                        @if(auth()->user()->user_type=='admin')
                        <li class="item{{ $activePage == 'Dashboard' ? ' active' : '' }}">
                            <a href="{{ route('admin.dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i><span>Dashboard</span></a>
                        </li>
                        @else
                        <li class="item{{ $activePage == 'Dashboard' ? ' active' : '' }}">
                            <a href="{{ route('seller.dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i><span>Dashboard</span></a>
                        </li>
                        @endif
                        <!-- @if(auth()->user()->user_type=='seller')
                        <li class="item{{ $activePage == 'Navbar' ? ' active' : '' }}">
                            <a href="{{ route('navbar.list')}}"><i class="fa fa-bars" aria-hidden="true"></i> <span>{{ __('Navbar') }} </a>
                        </li>
                        @endif -->
                        @if(auth()->user()->user_type=='store')
                        <li class="submenu">
                            <a href="#"><i class="fa fa-sliders" aria-hidden="true"></i> <span> Home Slider/Banner </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="{{ route('home.slide.list')}}">Home Slider</a></li>
                                <li><a href="{{ route('home.banner.list')}}">Home Page Banner</a></li>
                            </ul>
                        </li>
                        @endif

                        @if(auth()->user()->user_type=='store')
                        <li class="item{{ $activePage == 'AllSlider' ? ' active' : '' }}">
                            <a href="{{ route('all.slider.list')}}"><i class="fa fa-sliders" aria-hidden="true"></i> <span>{{ __('All Banner') }} </a>
                        </li>
                        @endif

                        @if(auth()->user()->user_type=='admin')
                        <li class="item{{ $activePage == 'Category' ? ' active' : '' }}">
                            <a href="{{ route('categories.list')}}"><i class="fa fa-filter" aria-hidden="true"></i> <span>{{ __('Category') }} </a>
                        </li>
                        @endif


                        <!-- @if(auth()->user()->user_type=='admin')
                        <li class="item{{ $activePage == 'Subcategory' ? ' active' : '' }}">
                            <a href="{{ route('subcategories.list')}}"><i class="fa fa-filter" aria-hidden="true"></i> <span>{{ __('Subcategory') }} </a>
                        </li>
                        @endif -->

                        @if(auth()->user()->user_type=='admin')
                        <li class="item{{ $activePage == 'Unit' ? ' active' : '' }}">
                            <a href="{{ route('units.list')}}"><i class="fa fa-sliders" aria-hidden="true"></i> <span>{{ __('Units') }} </a>
                        </li>
                        @endif

                       

                        @if(auth()->user()->user_type=='admin')
                        <li class="submenu">
                            <a href="#"><i class="fa fa-user" aria-hidden="true"></i> <span> Manage Seller </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                @if(auth()->user()->user_type=='admin')
                                <li class="item{{ $activePage == 'Seller' ? ' active' : '' }}">
                                    <a href="{{ route('customer.list')}}"><span>{{ __('All Seller') }} </a>
                                </li>
                                @endif
                            </ul>
                        </li>
                        </li>
                        @endif

                        @if(auth()->user()->user_type=='admin')
                        <li class="submenu">
                            <a href="#"><i class="fa fa-bars" aria-hidden="true"></i> <span> Collection</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li class="item{{ $activePage == 'Collections' ? ' active' : '' }}">
                                    <a href="{{ route('collections.list')}}">Curated Collection</a>
                                </li>
                                <li class="item{{ $activePage == 'CustomCollections' ? ' active' : '' }}">
                                    <a href="{{ route('custom-collections.list')}}">Custom Collection</a>
                                </li>
                              

                            </ul>
                        </li>
                        @endif



                        @if(auth()->user()->user_type=='admin' || auth()->user()->user_type=='seller')
                        <li class="submenu">
                            <a href="#"><i class="fa fa-product-hunt" aria-hidden="true"></i> <span> Other Products </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                            @if(auth()->user()->user_type=='admin')
                                <li><a href="{{ route('products.list')}}">Products</a></li>
                                @else
                                <li><a href="{{ route('seller-products.list')}}">Products</a></li>
                                @endif
                            </ul>
                        </li>
                        @endif

                        @if(auth()->user()->user_type=='admin')
                        <li class="submenu">
                            <a href="#"><i class="fa fa-product-hunt" aria-hidden="true"></i> <span> Trial Products </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                            @if(auth()->user()->user_type=='admin')
                                <li><a href="{{route('trial-products.list')}}">Products</a></li>
                                @else
                                <li><a href="{{route('seller-trial-products.list')}}">Products</a></li>
                                @endif
                            </ul>
                        </li>
                        @endif

                        @if(auth()->user()->user_type=='seller')
                        <li class="submenu">
                            <a href="#"><i class="fe fe-document" aria-hidden="true"></i> <span> Warehouses </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                            @if(auth()->user()->user_type=='seller')
                                <li><a href="{{route('warehouse.list')}}">Warehouse List</a></li>
                                @endif
                            </ul>
                        </li>
                        @endif

                        @if(auth()->user()->user_type=='store')

                        <li class="submenu">
                            <a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span> Orders </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">

                                @if(auth()->user()->user_type=='admin')
                                <li><a href="{{ route('orders.list')}}">All Orders</a></li>
                                <li><a href="{{ route('orders.pending')}}">Pending Orders</a></li>

                                <li><a href="{{ route('orders.shipped')}}">Shipped Orders</a></li>
                                <li><a href="{{ route('orders.delivered')}}">Delivered Orders</a></li>
                                <!-- <li><a href="{{ route('orders.cancelled')}}">Cancelled Orders</a></li> -->

                                @endif

                                <!-- <li><a href="{{ route('my.orders.his.list')}}">Orders History</a></li> -->

                            </ul>
                        </li>
                        @endif

                        @if(auth()->user()->user_type=='')
                        <li class="submenu">
                            <a href="#"><i class="fa fa-money" aria-hidden="true"></i> <span>Product Payments </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                @if(auth()->user()->user_type=='admin')
                                <li><a href="">New Payments </a></li>
                                <li><a href="">All Payments </a></li>
                                <li><a href="">1 Month Payments </a></li>
                                <li><a href=""> 1 Year Payments </a></li>
                                @endif
                                @if(auth()->user()->user_type=='seller')

                                <li><a href="{{ route('seller.payments.list')}}">All Payments </a></li>
                                @endif
                            </ul>
                        </li>
                        @endif


                        @if(auth()->user()->user_type=='admin' )
                        <li class="submenu">
                            <a href="#"><i class="fa fa-cogs"></i> <span> Website Setting </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="{{ route('web.info')}}"> Website Info </a></li>
                                <!-- <li><a href="{{ route('home.slide.list')}}"> Slide </a></li> -->
                                <!--  <li><a href="{{ route('about.list')}}"> About</a></li> -->
                                <!-- <li><a href="{{ route('policy.list')}}"> Privacy Policy</a></li>
                                 <li><a href="{{ route('return-refund.list')}}"> Return & Refund Policy</a></li> -->
                                <!--  <li><a href="{{ route('home.notification.list')}}"> Home Notifications</a></li> -->

                            </ul>
                        </li>
                        @endif

                        <!--  <li class="submenu">
                            <a href="#"><i class="fe fe-document"></i> <span> Authentication </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="{{ route('my.profile.view')}}"> My Profile </a></li>
                              
                            </ul>
                        </li>
                   
             -->

                    </ul>
                </div>
            </div>
        </div>
        <!-- /Sidebar -->
        <!-- jQuery -->
        <script src="{{ asset('material/admin') }}/js/jquery-3.2.1.min.js"></script>

        <!-- Bootstrap Core JS -->
        <script src="{{ asset('material/admin') }}/js/popper.min.js"></script>
        <script src="{{ asset('material/admin') }}/js/bootstrap.min.js"></script>

        <!-- Slimscroll JS -->
        <script src="{{ asset('material/admin') }}/plugins/slimscroll/jquery.slimscroll.min.js"></script>

        <script src="{{ asset('material/admin') }}/plugins/raphael/raphael.min.js"></script>
        <script src="{{ asset('material/admin') }}/plugins/morris/morris.min.js"></script>
        <script src="{{ asset('material/admin') }}/js/chart.morris.js"></script>

        <!-- Custom JS -->
        <script src="{{ asset('material/admin') }}/js/script.js"></script>
        @stack('js')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                $("#myInput").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#myTable tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
        </script>
        <script>
            $(function() {
                $(".select2").select2({});

            });
            $(function() {
                $(".select3").select2({});
            });
            $(function() {
                $(".select1").select2({});


            });
        </script>
</body>

</html>