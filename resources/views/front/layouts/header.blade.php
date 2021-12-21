<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>{{$title}}</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">


		<link rel="shortcut icon" type="image/x-icon" href="{{url('assets/front/img/favicon.png')}}">
        <!-- Place favicon.ico in the root directory -->

		<!-- CSS here -->
        <link rel="stylesheet" href="{{url('assets/front/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{url('assets/front/css/animate.min.css')}}">
        <link rel="stylesheet" href="{{url('assets/front/css/magnific-popup.css')}}">
        <link rel="stylesheet" href="{{url('assets/front/css/fontawesome-all.min.css')}}">
        <link rel="stylesheet" href="{{url('assets/front/css/jquery-ui.css')}}">
        <link rel="stylesheet" href="{{url('assets/front/css/flaticon.css')}}">
        <link rel="stylesheet" href="{{url('assets/front/css/aos.css')}}">
        <link rel="stylesheet" href="{{url('assets/front/css/slick.css')}}">
        <link rel="stylesheet" href="{{url('assets/front/css/default.css')}}">
        <link rel="stylesheet" href="{{url('assets/front/css/style.css')}}">
        <link rel="stylesheet" href="{{url('assets/front/css/responsive.css')}}">
        <link rel="stylesheet" href="{{url('assets/front/css/tailwind.min.css')}}">
        
       

         
    </head>
    <body>

        <!-- preloader -->
        <!-- <div id="preloader">
            <div id="loading-center">
                <div class="loader">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div> -->
        <!-- preloader-end -->


		<!-- Scroll-top -->
        <button class="scroll-top scroll-to-target" data-target="html">
            <i class="fas fa-angle-up"></i>
        </button>
        <!-- Scroll-top-end-->

        <!-- header-area -->
        <header>

            <!-- header-message -->
            <!-- <div class="header-message-wrap">
                <div class="container custom-container">
                    <div class="row">
                        <div class="col-12">
                            <div class="top-notify-message">
                                <p>place your complaints (if any) within 24hrs of receiving your delivery</p>
                                <span class="message-remove">X</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- header-message-end -->

    
            <!-- header-search-area -->
            <div id="header-desk" class="header-search-area">
                <div class="container custom-container">
                    <div class="row align-items-center">
                        <div class="col-xl-2 col-lg-3 d-none d-lg-block">
                            <div class="logo">
                                <a href="{{route('home')}}"><img src="{{url('assets/front/img/logo/logo.png')}}" alt="Logo"></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-9">
                            <div class="d-block d-sm-flex align-items-center justify-content-end">

                               <!----- mobile view navigation---->



<!--                                 <div class="header-search-wrap ">
                                    
                                        <div class="navbar-wrap main-menu d-none d-lg-flex">
                                            <ul class="navigation">
                                                <li class="active"><a href="{{route('home')}}">Home</a>
                                                </li>
                                          
                                          
                                             <li><a href="{{route('about')}}">About Us</a></li>
                                            
                                                <li><a href="{{route('contact')}}">Contact Us</a></li>
                                                

                                            </ul>
                                        </div>
                                   
                                </div> -->

                                  <div class="header-search-wrap">
                <div class="container custom-container">
                    <div class="navbar-wrap main-menu">
                       <!--  <div class="col-md-7">
                            <div class="header-top-left">
                                <ul>
                                 
                                 
                                    <li class="header-work-time">
                                        Working time: <span> Mon - Sat : 8:00 - 21:0</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
 -->                        <div class="">
                            <div class="header-top-center">
                                <ul>
                                    <li>
                                        @if(Auth::user())
                                            <a href="{{route('myProfile')}}">My Profile</a>
                                        @else 
                                            <a href="{{route('home')}}"><strong>Login</strong></a>
                                        @endif
                                    </li>
                                    @if(Auth::user())
                                    <li><a href="{{route('logout')}}">Logout</a></li>
                                    @endif
                                    <!-- <li><a href="{{route('contact')}}">Contact</a></li>
                                    <li><a href="{{route('contact')}}">FAQ</a></li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                                <div class="header-action">
                                    <ul>
                                        <li class="header-phone">
                                            <div class="icon"><i class="flaticon-telephone"></i></div>
                                            <a href="tel:8920867591"><span>Call Us Now</span>+91-8920867591</a>
                                        </li>
                                        <!-- <li class="header-user"><a href="#"><i class="flaticon-user"></i></a></li> -->
                                        <!-- <li class="header-wishlist">
                                            <a href="#"><i class="flaticon-heart-shape-outline"></i></a>
                                            <span class="item-count">0</span>
                                        </li> -->
                                        <li class="header-cart-action">
                                       
                                            <div class="header-cart-wrap">
                                               
                                                <a href="{{route('cart')}}"><i class="flaticon-shopping-basket"></i></a>
                                                @if(Auth::user())
                                                @php
                                                    $cursighn = '₹';
                                                    $total = 0;
                                                    $carts = App\Cart::where('user_id', Auth::user()->id)->get();

                                                @endphp
                                                <span class="item-count">{{count($carts)}}</span>
                                               
                                                <ul class="minicart">
                                                    @foreach($carts as $cart)
                                                    <li class="d-flex align-items-start">
                                                        <div class="cart-img">
                                                            <img src="{{url('uploads/products/'.$cart->products->upload_image)}}" alt="{{$cart->products->name}}">
                                                        </div>
                                                        <div class="cart-content">
                                                            <h4>{{$cart->products->name}} ({{$cart->quantity}})</h4>
                                                            <div class="cart-price">
                                                                <span class="new">{{$cart->products->currency}} {{$cart->products->price}}</span>
                                                                <span><del>{{$cart->products->currency}} {{$cart->products->mrp}}</del></span>
                                                            </div>
                                                        </div>
                                                        <div class="del-icon">
                                                            <a href="{{url('delete-cart/'.$cart->id)}}"><i class="far fa-trash-alt"></i></a>
                                                        </div>
                                                    </li>
                                                        @php
                                                            $price = $cart->quantity *  $cart->products->price;
                                                            $total = $total + $price;


                                                        @endphp
                                                    @endforeach
                            
                                                    <li>
                                                        <div class="total-price">
                                                            <span class="f-left">Total:</span>
                                                            <span class="f-right">{{ $cursighn }} {{$total}}</span>
                                                        </div>
                                                    </li>
                                               
                                                    <li>
                                                        <div class="checkout-link">
                                                            <a href="{{route('cart')}}">Shopping Cart</a>
                                                            <a class="black-color" href="{{route('checkout')}}">Checkout</a>
                                                        </div>
                                                    </li>
                                                </ul>
                                             
                                            </div>
                                            <div class="cart-amount">{{ $cursighn }} {{$total}}</div>
                                            @else 
                                            <span class="item-count">0</span>
                                            @endif
                                          
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header-search-area-end -->

            <div id="sticky-header" class="menu-area">
                <div class="container custom-container">
                    <div class="row">
                        <div class="col-12">
                            <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
                            <div class="menu-wrap">
                                <nav class="menu-nav">
                                    <div class="logo d-block d-lg-none">
                                        <a href="{{route('home')}}"><img src="{{url('assets/front/img/logo/logo.png')}}" alt=""></a>
                                    </div>
                                  
                                    <div class="navbar-wrap main-menu d-none d-lg-flex d-lg-none d-xl-none">
                                        <ul class="navigation">
                                            <li><a href="{{route('home')}}">Home</a></li>
                                            <li><a href="{{route('about')}}">About Us</a></li>
                                            <li><a href="{{route('contact')}}">Contact Us</a></li>
                                           
                                        </ul>
                                    </div>
                                 
                                </nav>
                            </div>
                            <!-- Mobile Menu  -->
                            <div class="mobile-menu">
                                <nav class="menu-box">
                                    <div class="close-btn"><i class="fas fa-times"></i></div>
                                    <div class="nav-logo"><a href="{{route('home')}}"><img src="{{url('assets/front/img/logo/logo.png')}}" alt="" title=""></a>
                                    </div>
                                    <div class="menu-outer">
                                        <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                                    </div>
                                    <div class="social-links">
                                        <ul class="clearfix">
                                            <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                            <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                                            <!-- <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li> -->
                                            <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                                            <!-- <li><a href="#"><span class="fab fa-youtube"></span></a></li> -->
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                            <div class="menu-backdrop"></div>
                            <!-- End Mobile Menu -->
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header-area-end -->

        <script type="text/javascript">

</script>
