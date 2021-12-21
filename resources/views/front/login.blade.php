<div class="modal fade form-center" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document" >
    <div class="modal-content">
      
      @if(Session::has('loginfalse'))
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{Session::get('loginfalse')}}
      </div>
      @endif
 
      <form id="msform" class="login-modal" method="post" action="{{route('user.login')}}">

        @csrf
          <!-- step 1 -->
          <fieldset>
            <div id="font-style">
            <h2 class="h2" >Welcome to Thehygieneherbs </h2>
            <h3 class="h3">Sign in to track order and more </h3>
            <!--<label>Name</label>-->
            </div>
            
            <input type="text" id="mobileno" name="phone" placeholder="Enter mobile number" />
            <p>We will send you an OTP on this number.</p>
            <button onclick="return sendOtp();" type="button" name="phone"  class="next action-button">Send</button>
            
          </fieldset>
            
          <!-- step 2 -->
          <fieldset>
         
            <h2 class="h2">We sent your code</h2>
            <h5 class="h5">Enter the confirmation code below</h5>
            <div class="flex justify-center " id="OTPInput">
            </div>
            <input hidden id="otp" name="verification_code" placeholder="Enter confirmation code" value="">
            <!-- <input type="number" name="verification_code" placeholder="Enter confirmation code" /> -->
            <p>We send an OTP to your number, please confirm! </p>
            <input type="button" name="go back" class="previous  " value="Go back" />
            <input type="submit" name="submit" class="next action-button" value="Submit" id="otpSubmit"/>
                
          </fieldset>
            
        <!-- step 3 -->  
        <fieldset>
            <h1 class="h1">Welcome To Hygiene Herbs!</h1>
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRbj2ilAlgmm8a_80s3CNgg2L8pOFispQ87dw&usqp=CAU" style="height:100px; width:100px"/>
            <h3 class="h3">Mobile No Verified!</h3>
    
            <input type="button" name="previous" class="next action-button" value="Close" />
          
                
          </fieldset>
    </form>
    </div>
  </div>
</div>

<!-- The Modal -->
<div class="modal" id="signupmodal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">
          @if(Session::has('usersignup'))
            {{Session::get('usersignup')}}
          @endif
        </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

        <form method="post" action="{{route('user.register')}}">
          @csrf
          <div class="form-group">
            <input type="text" class="form-control" name="fname" placeholder="first name" required>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="lname" placeholder="last name" required>
          </div>
          <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="email" required>
          </div>
          <div class="form-group d-flex">
            <div class="mr-4">Title:</div>
            <div class="mr-2">Mr.</div>
            <input type="radio" name="title" value="mr" class="mt-1 mr-1">
            <div class="mr-2">Mrs.</div>
            <input type="radio" name="title" value="mrs" class="mt-1 mr-1">
            <div class="mr-2">Miss.</div>
            <input type="radio" name="title" value="miss" class="mt-1 mr-1">
          </div>

          <button type="submit" class="btn btn-sm btn-rounded btn-primary">Submit</button>
        </form>

      </div>

    </div>
  </div>
</div>