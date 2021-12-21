<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>MedTo</title>

    <!-- Favicons -->
    <link type="image/x-icon" href="{{ asset('public/assets/material/home') }}/img/favicon.png" rel="icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('public/assets/material/home') }}/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('public/assets/material/home') }}/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="{{ asset('public/assets/material/home') }}/plugins/fontawesome/css/all.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('public/assets/material/home') }}/css/style.css">



    <!--Jquery End-->

</head>

<body>

    <footer class="footer">

        <!-- Footer Top -->
        <div class="footer-top">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6">

                        <!-- Footer Widget -->
                        <div class="footer-widget footer-about">
                            <div class="footer-logo">
                                <img src="{{ asset('public/assets/material/home') }}/img/footer-logo.png" alt="logo">
                            </div>
                            <div class="footer-about-content">
                                <p>Doctor, Blood Bank, Diagonostics, Hospital, Pharmacy, Patient</p>
                                <div class="social-icon">
                                    <ul>
                                        <li>
                                            <a href="{{ getWeb()->fb }} " target="_blank"><i class="fab fa-facebook-f"></i> </a>
                                        </li>
                                        <li>
                                            <a href="{{ getWeb()->twitter }} " target="_blank"><i class="fab fa-twitter"></i> </a>
                                        </li>
                                        <li>
                                            <a href="{{ getWeb()->linkedin }} " target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                        </li>
                                        <li>
                                            <a href="{{ getWeb()->instagram }} " target="_blank"><i class="fab fa-instagram"></i></a>
                                        </li>
                                      
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /Footer Widget -->

                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget footer-menu">
                            <h2 class="footer-title">For Business Partners</h2>
                            <ul>
                            @foreach(getBusinessPartners5() as $r)
                                <li><a href="{{route('business.partners')}}">{{$r->name}}</a></li>
                               
                                @endforeach
                            </ul>
                           
                        </div>

                       




                        <!-- Footer Widget -->

                        <!-- /Footer Widget -->

                    </div>

                    <div class="col-lg-3 col-md-6">

                        <!-- Footer Widget -->
                        <div class="footer-widget footer-menu">
                            <h2 class="footer-title">Some Useful Links</h2>
                            <ul>
                               
                                <li><a href="{{route('login')}}">Login</a></li>
                                <li><a href="{{route('register')}}">Register</a></li>
                                <li><a href="{{route('appointment.book')}}">Appointments</a></li>
                                <li> <a href="{{route('category')}}">Medicine </a></li>
                            </ul>
                        </div>
                        <!-- /Footer Widget -->

                    </div>

                    <div class="col-lg-3 col-md-6">

                        <!-- Footer Widget -->
                        <div class="footer-widget footer-contact">
                            <h2 class="footer-title">Contact Us</h2>
                            <div class="footer-contact-info">
                                <div class="footer-address">
                                    <span><i class="fas fa-map-marker-alt"></i></span>
                                    <p> {{ getWeb()->address }}</p>
                                </div>
                                <p>
                                    <i class="fas fa-phone-alt"></i> {{ getWeb()->mobile }}, {{ getWeb()->mobile2 }}
                                </p>
                                <p class="mb-0">
                                    <i class="fas fa-envelope"></i> {{ getWeb()->email }}
                                </p>
                            </div>
                        </div>
                        <!-- /Footer Widget -->

                    </div>

                </div>
            </div>
        </div>
        <!-- /Footer Top -->

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="container-fluid">

                <!-- Copyright -->
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="copyright-text">
                                <p class="mb-0">&copy; 2021 MedTo. All rights reserved.</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">

                            <!-- Copyright Menu -->
                            <div class="copyright-menu">
                                <ul class="policy-menu">
                                    <!-- <li><a href="term-condition.html">Terms and Conditions</a></li>
                                    <li><a href="privacy-policy.html">Policy</a></li> -->
                                </ul>
                            </div>
                            <!-- /Copyright Menu -->

                        </div>
                    </div>
                </div>
                <!-- /Copyright -->

            </div>
        </div>
        <!-- /Footer Bottom -->

        <!-- /Main Wrapper -->

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