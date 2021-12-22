@include('front.layouts.header')

<!--lgoin page-->
<section class="login-page">
  <div class="container">
    <div class="row">
      <div class="form-modal">
        <div class="form-toggle">
          <button id="login-toggle" onclick="toggleLogin()">log in</button>
          <button id="signup-toggle" onclick="toggleSignup()">sign up</button>
        </div>
        <div id="login-form">
          <form>
            <input type="text" placeholder="Enter email or username" />
            <input type="password" placeholder="Enter password" id="password-field" />


            <button type="button" class="btn login">login</button>
            <p><a href="#">Forgotten account</a></p>
            <hr />
            <button type="button" class="btn -box-sd-effect"> <i class="fa fa-google fa-lg" aria-hidden="true"></i> sign in with google</button>
            <button type="button" class="btn -box-sd-effect"> <i class="fa fa-facebook fa-lg" aria-hidden="true"></i> sign in with facebook</button>
          </form>
        </div>
        <div id="signup-form">
          <form>
            <input type="email" placeholder="Enter your email" />
            <input type="text" placeholder="Choose username" />
            <input type="password" placeholder="Create password" id="password-field" />

            <button type="button" class="btn signup">create account</button>
            <p>Clicking <strong>create account</strong> means that you are agree to our <a href="#">terms of services</a>.</p>
            <hr />
            <button type="button" class="btn -box-sd-effect"> <i class="fa fa-google fa-lg" aria-hidden="true"></i> sign up with google</button>
            <button type="button" class="btn -box-sd-effect"> <i class="fa fa-facebook fa-lg" aria-hidden="true"></i> sign up with facebook</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!--login page end-->

@include('front.layouts.footer')