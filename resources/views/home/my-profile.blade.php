@include("home.layouts.header") 

    <!-- Breadcrumb Section Begin -->

    <!-- Breadcrumb Section End -->

    <!-- Contact Form Begin -->
    <div class="contact-form login-form spad">
        <div class="container" style="padding:40px 2px;box-shadow: 0px 0px 1px 1px #dad4d4;border-radius:6px;max-width:600px;">
            <div class="row">
                <div class="col-lg-12">
               
                    <div class="contact__form__title">
                    <span style='font-size:16px;'>
                        @include('home.layouts.flash_msg')
                    </span>
                        <h3><i class="fa fa-user-circle"> </i> My Profile</h2>
                    </div>
                </div>
            </div>
            <form method='post'  action="{{ route('myProfile') }}"  enctype="multipart/form-data" >
            @csrf
            <div class="row">
                    
                    <div class="col-md-8 offset-md-2">
          
            </div></div>
                <div class="row">
                        <div class="col-md-6">
                        <span style='font-size:12px;color:gray;'> Name*</span>
                            @if ($errors->has('name'))
                                <div style="color:red;font-size:13px;text-transform:setence;">Name is Empty!</div>
                                @endif
                                <input type="text" name="name"  placeholder="Enter Name" value="{{$profile->name}}">
                        </div>
                            

                        <div class="col-md-6">
                        <span style='font-size:12px;color:gray;'> Email*</span>
                            @if ($errors->has('email'))
                                <div style="color:red;font-size:13px;text-transform:setence;">Email is Empty!</div>
                                @endif
                                <input type="email" name="email" readonly value="{{$profile->email}}">
                            </div>
               

                     <div class="col-md-6">
                     <span style='font-size:12px;color:gray;'> Mobile*</span>
                    @if ($errors->has('mobile'))
                           <div style="color:red; font-size:13px;text-transform:setence;">Mobile is Empty!</div>
                       @endif
                        <input type="number" name="mobile"  placeholder="Enter Mobile" value="{{$profile->mobile}}">
                     </div>
                     </div>

                    <div class="row">

                    <div class="col-md-6">
                    <span style='font-size:12px;color:gray;'> Street Address*</span>
                    @if ($errors->has('address_line_1'))
                           <div style="color:red; font-size:13px;text-transform:setence;">Street Address</div>
                       @endif
                        <input type="text" name="address_line_1"  placeholder="Enter Street Address " value="{{$profile->address_line_1}}">
                     </div>

                     <div class="col-md-6">
                     <span style='font-size:12px;color:gray;'> City*</span>
                    @if ($errors->has('city'))
                           <div style="color:red; font-size:13px;text-transform:setence;">City is Empty!</div>
                       @endif
                        <input type="text" name="city"  placeholder="Enter City" value="{{$profile->city}}">
                     </div>
                   </div>
                   <div class="row">
                    <div class="col-md-6">
                    <span style='font-size:12px;color:gray;'> State*</span>
                    @if ($errors->has('state'))
                           <div style="color:red; font-size:13px;text-transform:setence;">State</div>
                       @endif
                        <input type="text" name="state"  placeholder="Enter State " value="{{$profile->state}}">
                     </div>

                     <div class="col-md-6">
                     <span style='font-size:12px;color:gray;'> Zipcode*</span>
                    @if ($errors->has('zipcode'))
                           <div style="color:red; font-size:13px;text-transform:setence;">Zipcode</div>
                       @endif
                        <input type="text" name="zipcode"  placeholder="Enter Zipcode" value="{{$profile->zipcode}}">
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