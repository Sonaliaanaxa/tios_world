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
                         
                         <label class="col-sm-2 col-form-label" style='color:black;'>{{ __('Name*') }}</label>
                           <div class="col-sm-4">
                             <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                               <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('  Name') }}"  value="{{ old('name') }}"  aria-required="true"/>
                               @if ($errors->has('name'))
                                 <span id="name-error" class="error text-danger" for="input-name">Name is Empty!</span>
                               @endif
                             </div>
                           </div> 
                           <label class="col-sm-2 col-form-label"style='color:black;'>{{ __('Email id') }}</label>
                           <div class="col-sm-4">
                             <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                               <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="text" placeholder="{{ __(' Email id') }}"  value="{{ old('email') }}"  />
                               @if ($errors->has('email'))
                                 <span id="email-error" class="error text-danger" for="input-email">Enter Email Id!</span>
                               @endif
                             </div>
                           </div>

                           <label class="col-sm-2 col-form-label" style='color:black;'>{{ __('Mobile No*') }}</label>
                           <div class="col-sm-4">
                             <div class="form-group{{ $errors->has('mobile') ? ' has-danger' : '' }}">
                               <input class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" id="input-mobile" type="number" placeholder="{{ __(' Mobile No') }}"  value="{{ old('mobile') }}"  aria-required="true"/>
                               @if ($errors->has('mobile'))
                                 <span id="mobile-error" class="error text-danger" for="input-mobile">Enter Unique Mobile No!</span>
                               @endif
                             </div>
                           </div>
                           <label class="col-sm-2 col-form-label" style='color:black;'>{{ __('User Type*') }}</label>
                                  <div class="col-sm-4">
                                    <div class="form-group{{ $errors->has('user_type') ? ' has-danger' : '' }}">
                                    <select  class="custom-select {{ $errors->has('user_type') ? ' is-invalid' : '' }}" name='user_type' id="input-user_type"   >
                                            <option value=''>Select the User Type?</option>
                                            <option value="doctor"{{ ('doctor'==old('user_type'))?'selected':''}}>Doctor</option>
                                            <option value="blood_bank"{{ ('blood_bank'==old('user_type'))?'selected':''}}>Blood Bank</option>
                                            <option value="diagnostic"{{ ('diagnostic'==old('user_type'))?'selected':''}}>Diagnostic</option>
                                            <option value="hospital"{{ ('hospital'==old('user_type'))?'selected':''}}>Hospital</option>
                                            <option value="pharmacy"{{ ('pharmacy'==old('user_type'))?'selected':''}}>Pharmacy</option>
                                            <option value="patient"{{ ('patient'==old('user_type'))?'selected':''}}>Patient</option>
                                                         
                                            </select>  @if ($errors->has('user_type'))
                                        <span id="user_type-error" class="error text-danger" for="input-user_type">User Type is Empty!</span>
                                      @endif
                                    </div>
                                  </div> 

                           
                           <label class="col-sm-2 col-form-label" style='color:black;'>{{ __('Password*') }}</label>
                           <div class="col-sm-4">
                           <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                       
                         <input class="form-control" type="password" name="password" id="password"  placeholder="{{ __('Password...') }}" value="{{ old('password') }}"  aria-required="true"/>
                       
                       @if ($errors->has('password'))
                         <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                             <p>Please enter min. 6 digit</p> 
                          <!-- <strong>{{ $errors->first('password') }}</strong>-->
                         </div>
                       @endif
					      <small class="form-text text-muted">Enter minimum 6 digits</small>
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
                           <small class="form-text text-muted">Optional</small>
                     </div>
                     </div> 
                     
                              </div> 
                         
                                        <div class="row"  id="file-content" >
                          <label class="col-sm-2 col-form-label">{{ __('Upload  Image')}}</label>
                          <div class="col-sm-10">
                          <label htmlFor="myImage" > 
                          <input type="file" name="myImage" 
                      

                              class="form-control-file" 
                              accept="image/x-png,image/gif,image/jpeg,image/jpg" 
                              id="myImage"
                          /></label>
                             </div>
                                     </div>
									  <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                     </div>
                                     </div>
                                        <div class="text-right">
                                            <a class="forgot-link" href="{{route('login')}}">Already have an account?</a>
                                        </div>
                                        
                                        <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Signup</button>
                                        <!-- <div class="login-or">
                                            <span class="or-line"></span>
                                            <span class="span-or">or</span>
                                        </div>
                                        <div class="row form-row social-login">
                                            <div class="col-6">
                                                <a href="#" class="btn btn-facebook btn-block"><i class="fab fa-facebook-f mr-1"></i> Login</a>
                                            </div>
                                            <div class="col-6">
                                                <a href="#" class="btn btn-google btn-block"><i class="fab fa-google mr-1"></i> Login</a>
                                            </div>
                                        </div> -->
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