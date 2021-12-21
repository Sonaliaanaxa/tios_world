@include("admin.layouts.app")
<div class="container"  id="login-page"  style="height:auto;">

  <div class="row align-items-center" >
    <div class="col-md-9 ml-auto mr-auto mb-3 text-center">
      <h3></h3>  </div>
  
    <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto" >
    @include('admin.layouts.flash_msg')
      <form class="form" method="POST" action="{{route('login')}}">
        @csrf
        
        <div class="card card-login card-hidden mb-3" style='background-color:white;color:white;'>
          <div class="card-header  text-center" style='    background-image: background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(54,126,152,1) 0%, rgba(28,153,184,1) 49%, rgba(13,176,209,1) 100%);'>
            <h4 class="card-title" style='color:white;'><strong>{{ __('Login') }}</strong></h4>
            
          </div>

          <div class="card-header  text-center" >
          <img src="{{ asset('public/material') }}/img/logo.png" style='height:50px;width:50px;border-radius:5px;'>
          <!-- <img src="{{ asset('public/material') }}/img/logo.png" style='height:100px;width:150px;border-radius:5px;box-shadow:0px 6px 10px whitesmoke;'> -->
          </div>

          
          <div class="card-body">
            <p class="card-description text-center"> </p>




            <div class="bmd-form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <!-- <span class="input-group-text">
                    
                  </span> -->
                </div>
                <input type="email" name="email" class="form-control" placeholder="{{ __('Email') }}..."  >
              </div>
              @if ($errors->has('email'))
                <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;" autocomplete='off' >
                  <strong>{{ $errors->first('email') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <!-- <span class="input-group-text">
                   
                  </span> -->
                </div>
                <input type="password" name="password" id="password"  class="form-control" placeholder="{{ __('Password') }}..."  >
              </div>
              @if ($errors->has('password'))
                <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                  <strong>{{ $errors->first('password') }}</strong>
                </div>
              @endif
            </div>
           
          </div>

          <div class="bmd-form-group mt-3">
          <div class="mt-3 card-footer justify-content-center">
            <button type="submit" class="btn btn-sm  col-sm-8  col-md-12 offset-2"  
            style='background-color:#5b87ad; ;color:white;'>{{ __('Login') }} </button>
          </div>
          </div>


          <div class="col-6 text-right pull-right" style="color:black;">
            <a href="{{route('register')}}" class="text-light">
                <small  style="color:black;font-size:13px;">{{ __('New User? Register') }}</small>
            </a>
        </div>
        
         
         
        </div> 

     
      </form>
      <div class="row">
        
        <div class="col-6 text-right pull-right" style="color:black;">
            <a href="{{route('register')}}" class="text-light">
                <small  style="color:#F7E6A2;">{{ __('') }}</small>
            </a>
        </div>
      </div>
    </div>
  </div>
</div>

