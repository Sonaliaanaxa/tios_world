@include("home.layouts.header") 


<div class="container-fluid"  id="login-page"  style="height:auto;margin-top:40px;">

  <div class="row align-items-center" >
    <div class="col-md-9 ml-auto mr-auto mb-3 text-center">
      <h3></h3>  </div>
  
    <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto" >
    @include('home.layouts.flash_msg')
      <form class="form" method="POST" action="{{ route('password.recovery') }}">
        @csrf
        
        <div class="card card-login card-hidden mb-3" style='background-color:white;color:white;'>
          <div class="card-header  text-center" style='    background-image: background: rgb(2,0,36);
             background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(54,126,152,1) 0%, rgba(28,153,184,1) 49%, rgba(13,176,209,1) 100%);'>
            <h4 class="card-title" style='color:white;'><strong>{{ __('Password Recovery') }}</strong></h4>
            
          </div>

          <div class="row"  style="margin:6px;text-align:center;">

<div class="col-md-12 ">
    <span style='font-size:13px;color:gray;'>Enter your registered email address*</span>
    </div>
 
 </div>

          
          <div class="card-body">
            <p class="card-description text-center"> </p>




            <div class="bmd-form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <!-- <span class="input-group-text">
                    Hello
                  </span> -->
                </div>
                <input type="email" name="email" class="form-control" placeholder="{{ __('Email') }}..." value="{{old('email')}}"  >
              </div>
              @if ($errors->has('email'))
                <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;" autocomplete='off' >
                  <strong>{{ $errors->first('email') }}</strong>
                </div>
              @endif
            </div>
    
           
          </div>
          <div class="card-footer ">
                                <button type="submit" class="btn btn-sm  col-sm-2  col-md-4 offset-4" style="background-color:#0088aa;color:white;width:150px" >{{ __('Submit') }}</button>
                              </div>
          <div class="col-12 text-center" style="font-size:14px;color:#00cc77;">
            <a href="" class="text-light">
                <small  style="font-size:14px;color:#00cc77;">{{ __(' New password will be sent on your regsitered email address!') }}</small>
            </a>
        </div>
                          
                              <div class="row">
  <div class="col-md-12">
  <div class="container-fluid" style="margin-top:20px;">
  <div class="row">
          <div class="col-6 text-left " style="color:black;">
            <a href="{{route('register')}}" class="text-light">
                <small  style="color:black;font-size:13px;">{{ __('New User? Register') }}</small>
            </a>
        </div>
        <div class="col-6 text-right" style="color:black;">
            <a href="{{route('login')}}" class="text-light">
                <small  style="color:black;font-size:13px;">{{ __('Login') }}</small>
            </a>
        </div></div></div></div>
 
         
         
        </div> 

     
      </form>

    </div>
  </div>
</div>
<div class="container-fluid"   style="margin-top:290px;">
</div>




    @include("home.layouts.footer")