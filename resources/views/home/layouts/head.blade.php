<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MedTo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <!-- Favicons -->
    <link href="{{ asset('public/assets/material/home') }}/img/favicon.png" rel="icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('public/assets/material/home') }}/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('public/assets/material/home') }}/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="{{ asset('public/assets/material/home') }}/plugins/fontawesome/css/all.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('public/assets/material/home') }}/css/style.css">


    <script src="{{ asset('public/assets/material/home') }}/js/html5shiv.min.js"></script>
    <script src="{{ asset('public/assets/material/home') }}/js/respond.min.js"></script>


    <!--    jquery for header & footer-->



    <!--Jquery End-->

</head>

<body>

    <div class="container-fluid" style="background-color:#00385e;">
        <nav class="navbar navbar-expand-lg" style="padding: 0px 16px !important; font-size: 14px;">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav" style="margin-left: 700px;">
                    <!-- <li class="nav-item active">
                        <a class="nav-link text-white" href="#">Get the App </a>
                    </li> -->
                    <li class="nav-item active mx-3">
                        <a class="nav-link text-white" href="{{route('business.partners')}}">For Business Partner</a>
                    </li>
                    <li class="nav-item active mx-3">
                        <a class="nav-link text-white" href="{{route('blogs')}}">Blog</a>
                    </li>
                    <li class="nav-item active mx-3">
                        <a class="nav-link text-white" href="{{route('about')}}">About Us</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link text-white" href="{{route('contact')}}">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <!-- Header -->
    <header class="header">
        <nav class="navbar navbar-expand-lg header-nav">
            <div class="navbar-header">
                <a id="mobile_btn" href="javascript:void(0);">
                    <span class="bar-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </a>
                <a href="{{route('home')}}" class="navbar-brand logo">
                    <img src="{{ asset('public/uploads/logo') }}/{{ getWeb()->logo }}"  alt="Logo" style="height:70px;width:180px;">
                </a>
            </div>
            <div class="main-menu-wrapper">
                <div class="menu-header">
                    <a href="{{route('home')}}" class="menu-logo">
                        <img src="{{ asset('public/uploads/logo') }}/{{ getWeb()->logo }}" class="img-fluid" alt="Logo">
                    </a>
                    <a id="menu_close" class="menu-close" href="javascript:void(0);">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
       <ul class="main-nav">
                    <li class="">
                        <a href="{{route('home')}}">Home</a>
                    </li>
                    <li class="">
                        <a href="{{route('doctors','doctor')}}">Doctors </a>
                    </li>
                     <li class="">
                        <a href="{{route('doctors','hospital')}}">Hospital </a>
                    </li>
                     <li class="">
                        <a href="{{route('doctors','diagnostic')}}">Diagnostic </a>
                    </li>
                    <li class="">
                        <a href="{{route('category')}}">Medicine </a>
                    </li>
                    <li class="login-link">
                    <a href="{{route('blood.bank')}}">Blood Bank</a>
                </li>
             
                <li class="login-link">
                        <a href="{{route('ask.question')}}"> &nbsp;Ask a Question</a>
                    </li>
                    <li class="login-link">
                        <a  href="{{route('appointment.book')}}">&nbsp;Book Appointments</a>
                    </li>
                    <li class="login-link">
                        <a href="{{route('business.partners')}}">For Business Partner</a>
                    </li>
                    <li class="login-link">
                        <a href="{{route('blogs')}}">Blog</a>
                    </li>
                    <li class="login-link">
                        <a href="{{route('about')}}">About Us</a>
                    </li>
                    <li class="login-link">
                        <a href="{{route('contact')}}">Contact</a>
                    </li>
                 
                    <li class="login-link">
                    @if(isset(auth()->user()->name)!=null && isset(auth()->user()->name)!='')
                        <div class="btn-group show">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Hello <?php  $ar=explode(" ",auth()->user()->name); echo $ar[0];  ?></button>
                            <div class="dropdown-menu show" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
                                <a class="dropdown-item" href="{{ route('my.orders.his.list')}}"><i class="fa fa-shopping-cart" style='color:black; '></i> Orders</a>
                                <a class="dropdown-item" href="{{ route('appointment.history.list')}}"><i class="fa fa-user-md" style='color:#155b96; '></i> Appointment History</a>
                                <a class="dropdown-item" href="{{route('my.profile.view')}}"><i class="fa fa-user-circle" style='color:black; '></i> Profile</a>
                                <a class="dropdown-item" href="{{route('my.profile.view')}}"> <i class="fa fa-key" style='color:black; '></i> Change Password</a>
                                <a class="dropdown-item" href="{{route('userLogout')}}"><i class="fa fa-power-off" style='color:black;'></i>Logout</a>

                            </div>
                        </div>
                        @else
                        <a href="{{route('login')}}">Login / Signup</a>
                        @endif 
                    </li>
                      
                </ul>
            </div>
            <ul class="nav header-navbar-rht">

              
               
                <li class="nav-item">
                    <a class="nav-link header-login bg-danger text-white" href="{{route('blood.bank')}}">Blood Bank</a>
                </li>

                @if(isset(auth()->user()->name)!=null && isset(auth()->user()->name)!='')

                

      <div class="btn-group show">
<a class="nav-item dropdown submenu " style="font-size: 14px;">
    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
    <i class="icon-user icons"></i> <span style="font-size: 15px;">Hello <?php  $ar=explode(" ",auth()->user()->name); echo $ar[0];  ?> <i class="fas fa-chevron-down"></i>  </i>
    </a>

    <ul class="dropdown-menu" >

<li class="nav-item" style="margin:10px;"><a href="{{ route('my.orders.his.list')}}" style='color:black;font-size:12px;'><i class="fa fa-shopping-cart" style='color:black; '></i> Orders</a></li><br>
<li class="nav-item" style="margin:10px;"><a href="{{ route('appointment.history.list')}}" style='color:black;font-size:12px;'><i class="fa fa-user-md" style='color:black; '></i> Appointment History</a></li><br>
<li class="nav-item" style="margin:10px;"><a href="{{route('my.profile.view')}}" style='color:black;font-size:12px;'> <i class="fa fa-user-circle" style='color:black; '></i> Profile</a></li>
<li class="nav-item" style="margin:10px;"><a href="{{route('my.profile.view')}}" style='color:black;font-size:12px;'> <i class="fa fa-key" style='color:black; '></i> Change Password</a></li>
<li class="nav-item" style="margin:10px;"><a href="{{route('userLogout')}}" style='color:black;font-size:12px;'><i class="fa fa-power-off" style='color:black;'></i> Logout</a></li>
    

    </ul> 

</div>

@else
<li class="nav-item">
<a class="nav-link header-login" href="{{route('login')}}">login / Signup </a>
                    
                    
                   
                    </li>
          
            @endif 



 


                
                  <li class="nav-item view-cart-header mr-3">
                    <a href="{{route('cart')}}"><i class="fas fa-shopping-cart"></i> <small class="unread-msg1">{{countCart()}}</small></a>
                    <!-- Shopping Cart -->

                </li>

            </ul>
        </nav>
    </header>

    <div class="container-fluid col-md-12" style="background-color:#00385e;">
        <nav class="navbar navbar-expand-lg navbar-light" style="padding: 0px 16px !important;">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav" style="margin-left: 250px; color: aqua; ">
                    <li class="nav-item active mx-5">
                        <a class="nav-link text-white" href="{{route('ask.question')}}"> <i class="fa fa-comment" aria-hidden="true"></i>&nbsp;Ask a Question</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link text-white" href="{{route('appointment.book')}}"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;Book Appointments</a>
                    </li>
             
                </ul>
            </div>
        </nav>
    </div>
    <!-- /Header -->

    <!-- jQuery -->
    <script src="{{ asset('public/assets/material/home') }}/js/jquery.min.js"></script>

    <!-- Bootstrap Core JS -->

    <script src="{{ asset('public/assets/material/home') }}/js/bootstrap.min.js"></script>



    <!-- Custom JS -->
    <script src="{{ asset('public/assets/material/home') }}/js/script.js"></script>
    <script>
        $('.dropdown-sub .dropdown-list-sub a').on('touchstart', function(e) {
            e.preventDefault();
            window.location.href = $(this).attr('href');
        })

    </script>


   <!-- jQuery -->
   <script src="{{ asset('public/assets/material/home') }}/js/jquery.min.js"></script>

<!-- Bootstrap Core JS -->
<script src="{{ asset('public/assets/material/home') }}/js/popper.min.js"></script>
<script src="{{ asset('public/assets/material/home') }}/js/bootstrap.min.js"></script>

<!-- Slick JS -->
<script src="{{ asset('public/assets/material/home') }}/js/slick.js"></script>

<!-- Custom JS -->
<script src="{{ asset('public/assets/material/home') }}/js/script.js"></script>

</body>

</html>
