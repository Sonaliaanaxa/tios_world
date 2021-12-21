@include("home.layouts.header") 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Social Vaidya</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <!-- Favicons -->
    <link href="{{ asset('public/material/home') }}/img/favicon.png" rel="icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('public/material/home') }}/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('public/material/home') }}/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="{{ asset('public/material/home') }}/plugins/fontawesome/css/all.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('public/material/home') }}/css/style.css">



    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script>
        $(function() {
            $(".header").load("header.html");
            $(".footer").load("footer.html");
        });
    </script>

    <!--Jquery End-->

</head>

<body class="account-page">

<!-- Main Wrapper -->
<div class="main-wrapper">

<!-- Header -->
<div class="header"></div>
<!-- /Header -->

    <!-- Page Content -->
    <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-8 offset-md-2">

                      
                         <div class="account-content">
                                    <div class="row align-items-center justify-content-center">
                                        <div class="col-md-7 col-lg-6 login-left">
                                            <img src="{{ asset('public/material/home') }}/img/login-banner.png" class="img-fluid" alt="Social Vaidya Login">
                                        </div>

                                       
                                        <div class="col-md-12 col-lg-6 login-right my-5">
     @include('home.layouts.flash_msg')
                                            <nav>
                                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                  
                                                  <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Phone</a>
                                                <a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Email</a>
                                                </div>
                                              </nav>
                                              <div class="tab-content" id="nav-tabContent">
                                                <div class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"> <div class="login-header">
                                                    <h3>Login <span>MedTo</span></h3>
                                                </div>
                                           
                    <form class="form" method="POST" action="{{route('login')}}">
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
                                                    <!-- <div class="login-or">
                                                        <span class="or-line"></span>
                                                        <span class="span-or">or</span>
                                                    </div> -->
                                                    <!-- <div class="row form-row social-login">
                                                        <div class="col-6">
                                                            <a href="#" class="btn btn-facebook btn-block"><i class="fab fa-facebook-f mr-1"></i> Login</a>
                                                        </div>
                                                        <div class="col-6">
                                                            <a href="#" class="btn btn-google btn-block"><i class="fab fa-google mr-1"></i> Login</a>
                                                        </div>
                                                    </div> -->
                                                    <div class="text-center dont-have">Don’t have an account? <a href="{{route('register')}}">Register</a></div>
                                                </form>
                                            </div>
                                                <div class="tab-pane fade  show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"> <div class="login-header">
                                                    <h3>Login <span>MedTo</span></h3>
                                                </div>
                                              
                    <form class="form" method="POST" action="{{route('phone.login')}}">
                      @csrf
 
                                                     <div class="form-group form-focus">
                        <label>Mobile : <span class="text-danger"></span></label>
                            <input type="mobile"  name="mobile" class="form-control floating">
                         
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
                                            </div></div>
                                              </div>
                                         
                                           
                                    </div>
                                </div>
                                <!-- /Login Tab Content -->
        
                        </div></div>
                          </div>

                       













      <!-- Footer -->
      <div class="footer"></div>
      <!-- /Footer -->

  </div>
  <!-- /Main Wrapper -->

  <!-- jQuery -->
  <script src="{{ asset('public/material/home') }}/js/jquery.min.js"></script>

  <!-- Bootstrap Core JS -->
  <script src="{{ asset('public/material/home') }}/js/popper.min.js"></script>
  <script src="{{ asset('public/material/home') }}/js/bootstrap.min.js"></script>

  <!-- Custom JS -->
  <script src="{{ asset('public/material/home') }}/js/script.js"></script>

</body>

</html>


    @include("home.layouts.footer")