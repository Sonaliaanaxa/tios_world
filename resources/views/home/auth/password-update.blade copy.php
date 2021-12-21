@include("home.layouts.header") 

    <!-- Breadcrumb Section Begin -->

    <!-- Breadcrumb Section End -->

    <!-- Contact Form Begin -->
    <div class="contact-form login-form spad">
        <div class="container" style="padding:40px 2px;box-shadow: 0px 0px 1px 1px #dad4d4;border-radius:6px;max-width:600px;">
            <div class="row">
                <div class="col-lg-12">
                <div class="col-md-8 offset-md-2">
                    <span style='font-size:16px;'>
                        @include('home.layouts.flash_msg')
                    </span>
                    </div></div>
              
                    <div class="contact__form__title">
                        <h3> <i class='fa fa-cogs'> </i>Change Password</h3>
                    </div>
                </div>
            </div>
            <form method='post'  action="{{ route('password.change') }}"  enctype="multipart/form-data" >
            @csrf
            <div class="row">
                    
                 
                    <div class="row">
                    <div class="col-md-8 offset-md-2">
                    <span style='font-size:12px;color:gray;'> Enter new password*</span>
                    @if ($errors->has('password'))
                           <div style="color:red; font-size:13px;text-transform:setence;">Password is Empty!</div>
                       @endif
                        <input type="password" name="password"  placeholder="Enter Password" >
                      
                    </div>

                    <div class="col-md-8 offset-md-2">
                    <span style='font-size:12px;color:gray;'> Confirm password*</span>
                    @if ($errors->has('password_1'))
                           <div style="color:red; font-size:13px;text-transform:setence;">Confirm Password is Empty!</div>
                       @endif
                        <input type="password" name="password_1"  placeholder="Confirm Password"  >
                      
                    </div>
                     
                    </div>
                    <div class="row">
                    
                    <div class="col-md-8 text-center offset-md-2">
                    
                        <button type="submit" class="btn btn-primary" style='padding:2px 30px;'>Update</button>

                    </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Contact Form End -->




    @include("home.layouts.footer")