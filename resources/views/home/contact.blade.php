@include("home.layouts.header") 

<style>
        .info-box {
            color: #444;
            text-align: center;
            box-shadow: 0 0 30px rgb(214 215 216 / 60%);
            padding: 20px 0 0px 0;
            margin-bottom: 30px;
            width: 100%;
            background-color: #ffffff;
            border-radius: 10px;
        }
        
        .info-box i {
            font-size: 50px;
            color: #428bca;
            border-radius: 50%;
            padding: 8px;
        }
        
        .section-title {
            text-align: center;
            padding-bottom: 30px;
        }
        
        .section-title h2 {
            font-size: 32px;
            font-weight: 600;
            margin-bottom: 20px;
            padding-bottom: 0;
            color: #5c768d;
        }
        
        .php-email-form {
            box-shadow: 0 0 30px rgba(214, 215, 216, 0.6);
            padding: 30px;
            background-color: #ffffff;
            border-radius: 10px;
        }
        
        .form-control:focus {
            color: #495057;
            background-color: #fff;
            border-color: #80bdff !important;
            outline: 0;
        }
    </style>
</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Header -->
        <div class="header"></div>
        <!-- /Header -->


        <div class="container my-5">

            <div class="section-title">
                <h2>Contact Us</h2>
            </div>

            <div class="row">
                <div class="col-lg-6 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up">
                    <div class="info-box">
                        <i class="fa fa-location-arrow" aria-hidden="true"></i>
                        <h3>Our Address</h3>
                        <p><a href="https://goo.gl/maps/ugov7uQBzcfSyMF9A">{{ getWeb()->address }}<br><br>
                  </a></p>
                      
                    </div>
                
                </div>
            
                <div class="col-lg-3 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                   
                    <div class="info-box">
                        <a>
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <h3>Email Us</h3>
                        </a>
                        <p>
                           <a href="mailto:{{ getWeb()->email }}">{{ getWeb()->email }}</a><br></p>
                    </div>
                </div>


                <div class="col-lg-3 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                    <div class="info-box ">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <h3>Call Us</h3>
                        <p><a href="tel:{{ getWeb()->mobile }}">{{ getWeb()->mobile }}</a><br></p>
                       
                    </div>
                </div>





                <div class="col-lg-12 aos-init" data-aos="fade-up" data-aos-delay="300">
                <form method='post'  action="{{ route('contact') }}"  enctype="multipart/form-data">
            @csrf
      
                @include('home.layouts.flash_msg')
                        <div class="form-row">
                            <div class="col-lg-6 form-group">
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                               <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('  Name') }}"  value="{{ old('name') }}"  aria-required="true"/>
                               @if ($errors->has('name'))
                                 <span id="name-error" class="error text-danger" for="input-name">Name is Empty!</span>
                               @endif
                             </div>
                            </div>
                            <div class="col-lg-6 form-group">
                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                               <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="text" placeholder="{{ __(' Email id') }}"  value="{{ old('email') }}"  aria-required="true"/>
                               @if ($errors->has('email'))
                                 <span id="email-error" class="error text-danger" for="input-email">Email is Empty!</span>
                               @endif
                             </div>
                            </div>
                            <div class="col-lg-6 form-group">
                            <div class="form-group{{ $errors->has('mobile') ? ' has-danger' : '' }}">
                               <input class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" id="input-mobile" type="number" placeholder="{{ __(' Mobile No') }}"  value="{{ old('mobile') }}"  aria-required="true"/>
                               @if ($errors->has('mobile'))
                                 <span id="mobile-error" class="error text-danger" for="input-mobile">Mobile No is Empty!</span>
                               @endif
                             </div>
                            </div>
                        
                        <div class="col-lg-6 class="form-group">
                        <div class="form-group{{ $errors->has('subject') ? ' has-danger' : '' }}">
                               <input class="form-control{{ $errors->has('subject') ? ' is-invalid' : '' }}" name="subject" id="input-subject" type="text" placeholder="{{ __('Subject') }}"  value="{{ old('subject') }}"  aria-required="true"/>
                               @if ($errors->has('subject'))
                                 <span id="subject-error" class="error text-danger" for="input-subject">Subject is Empty!</span>
                               @endif
                             </div>
                          
                        </div>
                        </div>
                        <div class="form-group">
                        <div class="form-group{{ $errors->has('msg') ? ' has-danger' : '' }}">
                        <textarea class="form-control{{ $errors->has('msg') ? ' is-invalid' : '' }}" name="msg" rows="5"  id="input-msg" type="text" placeholder="{{ __('Message') }}"  value="{{ old('msg') }}"  aria-required="true"/></textarea>
                               @if ($errors->has('msg'))
                                 <span id="msg-error" class="error text-danger" for="input-msg">Subject is Empty!</span>
                               @endif
                             </div>
                          
                          
                        </div>

                        <div class="text-center">
                        <input type="submit" class="btn btn-primary btn-block btn-lg login-btn text-white w-50 m-auto" id="submit" name="submit"value="Send Message">
               
                        </div>
                    </form>
                </div>
            </div>
            <div data-aos="fade-up" class="aos-init aos-animate my-5">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3579.083759686879!2d84.3610477145058!3d26.226467845608763!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf9a439dbac4f77b7!2sSadar%20Hospital%2C%20Siwan!5e0!3m2!1sen!2sin!4v1616654833646!5m2!1sen!2sin"
                    width="100%" height="350px" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

            </div>
        </div>
















    @include("home.layouts.footer")