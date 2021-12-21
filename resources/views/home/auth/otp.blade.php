 @include("home.layouts.header") 

<body class="account-page">

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <div class="header"></div>

        <!-- Page Content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row my-5">
                    <div class="col-md-8 p-5 border offset-md-2 shadow p-3 mb-5 bg-white rounded"">

                        <!-- Register Content -->
                        <div class="account-content">
                            <div class="row align-items-center justify-content-center">
                                <!-- <div class="col-md-7 col-lg-6 login-left">
                                    <img src="{{ asset('public/material/home') }}/img/login-banner.png" class="img-fluid" alt="Social Vaidya Register">
                                </div> -->
                                <div class="col-md-12 col-lg-12 ">
                                    <div class="login-header">
                                        <h2 class="text-center pb-3">Register </h2>
                                    </div>

                                    <!-- Register Form -->
                                    <form method='post'  action="{{ __('register') }}"  enctype="multipart/form-data">
                    @csrf
                      @include('home.layouts.flash_msg')
                      <div class="row">
                         
              

                           <label class="col-sm-2 col-form-label" style='color:black;'>{{ __('Mobile No*') }}</label>
                           <div class="col-sm-4">
                             <div class="form-group{{ $errors->has('mobile') ? ' has-danger' : '' }}">
                               <input class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" id="input-mobile" type="number" placeholder="{{ __(' Mobile No') }}"  value="{{ old('mobile') }}"  aria-required="true"/>
                               @if ($errors->has('mobile'))
                                 <span id="mobile-error" class="error text-danger" for="input-mobile">Enter Unique Mobile No!</span>
                               @endif
                             </div>
                           </div>
                          
                    <label class="col-sm-2 col-form-label" style='color:black;'>{{ __('Referral Id') }}</label>
                           <div class="col-sm-4">
                           <div class="form-group{{ $errors->has('referral') ? ' has-danger' : '' }}">
                       
                         <input class="form-control" type="text" name="referral" id="referral"  placeholder="{{ __('Referral Id') }}" value="{{ old('referral') }}"  aria-required="true"/>
                       
                       @if ($errors->has('referral'))
                         <div id="password-error" class="error text-danger pl-3" for="referral" style="display: block;">
                           <strong>{{ $errors->first('referral') }}</strong>
                         </div>
                       @endif
                        
                     </div>
                     </div> 
                     
                              </div> 
                         
								
                                     </div>
                                        <div class="text-right">
                                            <a class="forgot-link" href="{{route('login')}}">Already have an account?</a>
                                        </div>
                                        
                                        <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Signup</button>
                            
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