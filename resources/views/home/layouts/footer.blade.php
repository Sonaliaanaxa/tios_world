<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>MedTo</title>

    <!-- Favicons -->
    <link type="image/x-icon" href="{{ asset('public/material/home') }}/img/favicon.png" rel="icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('public/material/home') }}/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('public/material/home') }}/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="{{ asset('public/material/home') }}/plugins/fontawesome/css/all.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('public/material/home') }}/css/style.css">



    <!--Jquery End-->
    <style>
    .footer .footer-widget .footer-about-content p {
  
    text-align: justify;
}
</style>

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
                                <img src="{{ asset('public/material/home') }}/img/footer-logo.png" alt="logo">
                            </div>
                            <div class="footer-about-content">
                                <p>MedTo is one of the best online Service Result.

                                    Search Online Doctor Us, Top Results From Trusted Resources.</p>
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
                                <li><a href="{{route('subscription.plan',$r->id)}}">{{$r->name}}</a></li>
                               
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
                                    <p><a href="https://goo.gl/maps/ugov7uQBzcfSyMF9A" style="color:white;">{{ getWeb()->address }}
                  </a></p>
                                </div>
                                <p>
                                    <i class="fas fa-phone-alt"></i><a href="tel:{{ getWeb()->mobile }}" style="color:white;">{{ getWeb()->mobile }}, </a> <a href="tel:{{ getWeb()->mobile2 }}" style="color:white;">{{ getWeb()->mobile2 }}</a>
                                </p>
                                <p class="mb-0">
                                    <i class="fas fa-envelope"></i>  <a href="mailto:{{ getWeb()->email }}" style="color:white;">{{ getWeb()->email }}</a>
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
                                    <!-- <li><a href="term-condition.html">History About Company</a></li> -->
                                    <li><a href="{{route('policy')}}">Privacy Policy</a></li>
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
        <script src="{{ asset('public/material/home') }}/js/jquery.min.js"></script>

        <!-- Bootstrap Core JS -->
        <script src="{{ asset('public/material/home') }}/js/popper.min.js"></script>
        <script src="{{ asset('public/material/home') }}/js/bootstrap.min.js"></script>

        <!-- Slick JS -->
        <script src="{{ asset('public/material/home') }}/js/slick.js"></script>

        <!-- Custom JS -->
        <script src="{{ asset('public/material/home') }}/js/script.js"></script>


 <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background-color: #fff0 !important; border: none !important;">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
                </div>
                <div class="modal-body p-0">
                    <div class="col-md-12 login-right p-5">
                        
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="true">Phone</a>
                                <a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="false">Email</a>
                                
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="login-header">
                                    <h3>Login <span>MedTo</span></h3>
                                </div>

                                     <form class="form" method="POST" action="{{route('login.model')}}">
                      @csrf
 
                                    

                                    <div class="form-group form-focus">
                                        <label>Email : <span class="text-danger"></span></label>
                                     <input type="email"  name="email" class="form-control floating">
                         
                            @if ($errors->has('email'))
                <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;" autocomplete='off' >
                  <strong>{{ $errors->first('email') }}</strong>
                </div>
              @endif
                                    </div>
                                    <br>
                                    <div class="form-group form-focus">
                                        <label>Password : <span class="text-danger"></span></label>
                                        <input type="password" name="password" id="password" class="form-control floating">
               @if ($errors->has('password'))
                <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                  <strong>{{ $errors->first('password') }}</strong>
                </div>
              @endif
                                    </div>
                                    <br>
                                    <div class="text-right">
                                        <a class="forgot-link" href="{{route('password.recovery')}}">Forgot Password ?</a>
                                    </div>
                                    <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Login</button>
                  
                                    <div class="text-center dont-have">Don’t have an account? <a href="{{route('register')}}">Register</a></div>
                                </form>
                            </div>
                            <div class="tab-pane fade active show" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <div class="login-header">
                                        <h3>Login <span>MedTo</span></h3>
                                    </div>
                                                             
                    <form class="form" method="POST" action="{{route('phone.login.model')}}">
                      @csrf
                                        <div class="form-group form-focus">
                                            <label>Mobile : <span class="text-danger"></span></label>
                                            <input type="mobile" name="mobile" class="form-control floating">
              @if ($errors->has('mobile'))
                <div id="mobile-error" class="error text-danger pl-3" for="mobile" style="display: block;" autocomplete='off' >
                  <strong>{{ $errors->first('mobile') }}</strong>
                </div>
              @endif
                                        </div>
                                        <br>
                                        <div class="form-group form-focus">
                                            <label>Password : <span class="text-danger"></span></label>
                                            <input type="password" name="password" id="password" class="form-control floating">
              @if ($errors->has('password'))
                <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                  <strong>{{ $errors->first('password') }}</strong>
                </div>
              @endif
                                        </div>
                                        <br>
                                    <div class="text-right">
                                        <a class="forgot-link" href="{{route('password.recovery')}}">Forgot Password ?</a>
                                    </div>
                                        <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Login</button>
<div class="text-center dont-have">Don’t have an account? <a href="{{route('register')}}">Register</a></div>
                                
                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>