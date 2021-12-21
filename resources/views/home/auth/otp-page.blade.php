 @include("home.layouts.header") 

<body class="account-page">

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <div class="header"></div>

        <!-- Page Content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row my-5">
                    <div class="col-md-6 p-5 border offset-md-3 shadow p-3 mb-5 bg-white rounded"">

                        <!-- Register Content -->
                        <div class="account-content">
                            <div class="row align-items-center justify-content-center">
                         
                                <div class="col-md-10 col-lg-10 ">
                                    <div class="login-header">
                                        <h2 class="text-center pb-3">Phone Number Validation </h2>
                                    </div>

                                    <!-- Register Form -->
                                      <form class="form" method="POST" action="{{route('phone.otp')}}">
                    @csrf
                      @include('home.layouts.flash_msg')
                      <div class="row">
                         
              

                         
                           <div class="col-sm-12">
                             <div class="form-group{{ $errors->has('mobile_otp') ? ' has-danger' : '' }}">
                               <input class="form-control{{ $errors->has('mobile_otp') ? ' is-invalid' : '' }}" name="mobile_otp" id="input-mobile_otp" type="number" placeholder="{{ __(' Enter OTP') }}"  value="{{ old('mobile_otp') }}"  aria-required="true"/>
                               @if ($errors->has('mobile_otp'))
                                 <span id="mobile_otp-error" class="error text-danger" for="input-mobile_otp">Enter Valid OTP!</span>
                               @endif
                             </div>
                           </div>
                          
                   
                     
                                      <div class="col-md-5">
                                        
                                        <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Submit</button>
                             </div>
                                    </form>
                                    <!-- /Register Form -->

                                </div>
                            </div>
                        </div>
                        <!-- /Register Content -->

                    </div>
                </div>

            </div>

        </div>
  @include("home.layouts.footer")