<footer>

            <div class="footer-area gray-bg pt-80 pb-30">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="footer-widget mb-50">
                                <!-- <div class="footer-logo mb-25">
                                    <a href="{{route('home')}}"><img src="{{asset('assets/front/img/logo/logo.png')}}" alt=""></a>
                                </div> -->
                                <div class="fw-title">
                                    <h5 class="title">Hygieneherbs Agro Fresh Pvt.Ltd</h5>
                                </div>
                                <div class="footer-contact-list">
                                    <ul>
                                        <!-- <p><span style="color:#4AA02C" "font-size:20px"><strong>Hygieneherbs</strong></span><span style="color:#f73d13"> <strong>Agro Fresh</strong></span><span style="color:#4AA02C"><strong> Pvt.Ltd</strong></span></p><br> -->
                                        <li>
                                            <div class="icon"><i class="flaticon-place"></i></div>
                                            <p>966, Pocket C, Ghazipur, Delhi</p>
                                        </li>
                                        <li>
                                            <div class="icon"><i class="flaticon-telephone-1"></i></div>
                                            <p class="number"><a href="tel:8920867591">+91-8920867591</a></p>
                                        </li>
                                        <li>
                                            <div class="icon"><i class="flaticon-mail"></i></div>
                                            <p><a href="/cdn-cgi/l/email-protection#20535550504f525460564547454e0e434f4d"><span class="__cf_email__" data-cfemail="a6d5d3d6d6c9d4d2e6d0c3c1c3c888c5c9cb">contact@hygieneherbs.in</span></a></p>
                                        </li>
                                       
                                    </ul>
                                </div>
                               
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="footer-widget mb-50">
                                <div class="fw-title">
                                    <h5 class="title">Customer Service</h5>
                                </div>
                                <div class="fw-link">
                                    <ul>
                                        <li><a href="{{route('privacy-policy')}}">Privacy Policy</a></li>
                                        <li><a href="{{route('return-and-refund')}}">Return and Refund</a></li>
                                        <li><a href="{{route('about')}}">About us</a></li>
                                        <li><a href="{{route('terms-condition')}}">Terms & Condition</a></li>
                                     
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="footer-widget mb-50">
                                <div class="fw-title">
                                    <h5 class="title">Social Links</h5>
                                </div>
                                 <div class="footer-social">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <!-- <li><a href="#"><i class="fab fa-youtube"></i></a></li> -->
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                               
                            </div>
                        </div>
                       
                      
                    </div>
                </div>
            </div>
            <div class="copyright-wrap">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="copyright-text">
                                <p>Copyright &copy; 2021 Hygieneherbs Agro Fresh Pvt Ltd | All Rights Reserved</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="payment-accepted text-center text-md-right">
                                <img src="{{asset('assets/front/img/images/payment_card.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- footer-area-end -->
		<!-- JS here -->
        <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
        <script src="{{asset('assets/front/js/vendor/jquery-3.6.0.min.js')}}"></script>
        <script src="{{asset('assets/front/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/front/js/isotope.pkgd.min.js')}}"></script>
        <script src="{{asset('assets/front/js/imagesloaded.pkgd.min.js')}}"></script>
        <script src="{{asset('assets/front/js/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{asset('assets/front/js/jquery.countdown.min.js')}}"></script>
        <script src="{{asset('assets/front/js/jquery-ui.min.js')}}"></script>
        <script src="{{asset('assets/front/js/slick.min.js')}}"></script>
        <script src="{{asset('assets/front/js/ajax-form.js')}}"></script>
        <script src="{{asset('assets/front/js/wow.min.js')}}"></script>
        <script src="{{asset('assets/front/js/aos.js')}}"></script>
        <script src="{{asset('assets/front/js/plugins.js')}}"></script>
        <script src="{{asset('assets/front/js/main.js')}}"></script>
        <script src="{{asset('assets/front/js/script.js')}}"></script>
        <script src="{{asset('assets/front/js/jquery.easing.min.js')}}"></script>
      
            
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-34149245-3', 'clubdesign.github.io');
          ga('send', 'pageview');


        @if(!Auth::user() && !Session::has('usersignup'))
            $('#modalLoginForm').modal('show');
        @else
            $('#modalLoginForm').modal('hide');
            $('#modalLoginForm').css("display","none");
        @endif
        

        @if(!Session::has('usersignup'))
            $('#signupmodal').modal('hide');
        @else
            $('#signupmodal').modal('show');
            $('#modalLoginForm').css("display","none");
        @endif

        $(document).ready(function(){
            $('.action-button').hide();
            
            $('#mobileno').keyup(function(){
                var mobile = $('#mobileno').val();
                if($.isNumeric(mobile) && (mobile.length == 10 )){
                    $('.action-button').show();
                }else{
                    $('.action-button').hide();
                }
            });
        });


        
        function sendOtp(){
            var mobile = $('#mobileno').val();
            if(!$.isNumeric(mobile) && !(mobile.length == 10 )){
                return false;
            }
            $.ajax({
                url: "{{route('send.otp')}}",
                type: "POST",
                data: {mobile:mobile,_token:'{{ csrf_token() }}'},
                success: function(response)
                {
                    console.log(response);
                }
            });
        }

        function increment(id){
            let qty = parseInt($('.qty-'+id).val());
            let newqty = qty + 1;
            $.ajax({
                url: "{{ route('addToCart') }}",
                type: 'POST',
                data: {proid:id,qty:newqty,_token:'{{ csrf_token() }}'},
                success: function(response)
                {
                    location.reload();
                    // console.log(response);
                }
            });
        }

        function decrement(id){
            let qty = parseInt($('.qty-'+id).val());
            let newqty = qty - 1;
            $.ajax({
                url: "{{ route('addToCart') }}",
                type: 'POST',
                data: {proid:id,qty:newqty,_token:'{{ csrf_token() }}'},
                success: function(response)
                {   
                    // console.log(response);
                    location.reload();
                }
            });
        }

        $('#addressarea').hide();
        $('.order-summary-wrap').hide();

        function checkPin(){

            var pincode = $('#pincode').val();
            if(pincode.length != 6){
                alert('Please enter valid pincode');
                return false;
            }

            $.ajax({
                url: "{{ route('check.pincode') }}",
                type: 'POST',
                data: {pincode:pincode,_token:'{{ csrf_token() }}'},
                success: function(response)
                {   
                    // console.log(response);
                    if(response.status == true){
                        $('#addressarea').show();
                        $('.order-summary-wrap').show();
                        $('#pininput').val(response.pincode);
                    }else{
                        alert('Delivery not vailable in your area');
                        $('#addressarea').hide();
                        $('.order-summary-wrap').hide();
                    }
                }
            });

        }

        $(document).ready(function(){
            $('.cod_button').show();
            $('.razorpay_btn').hide();
            $("input[type='radio']").change(function(){
                var paymethod = $("input[name=paymethod]:checked").val();
                if(paymethod == 'cash_on_delivery'){
                    $('.cod_button').show();
                    $('.razorpay_btn').hide();
                }
                if(paymethod == 'online'){
                    $('.cod_button').hide();
                    $('.razorpay_btn').show();
                }
            });

        });
        

        function placeOrder(){

            var phone = $("input[name=phone]").val();
            if(phone == ''){
                alert('Phone is required!');
                $("input[name=phone]").focus();
                return false;
            }

            var name = $("input[name=name]").val();
            if(name == ''){
                alert('Name is required!');
                $("input[name=myname]").focus();
                return false;
            }

            var pincode = $("input[name=pincode]").val();
            if(pincode == ''){
                alert('pincode is required!');
                $("input[name=pincode]").focus();
                return false;
            }

            var apartment = $("input[name=apartment]").val();
            if(apartment == ''){
                alert('This field is required!');
                $("input[name=apartment]").focus();
                return false;
            }

            var area = $("input[name=area]").val();
            if(area == ''){
                alert('This field is required!');
                $("input[name=area]").focus();
                return false;
            }

            var landmark = $("input[name=landmark]").val();
                $("input[name=landmark]").focus();
                
           

            var city = $("input[name=city]").val();
            if(city == ''){
                alert('city is required!');
                $("input[name=city]").focus();
                return false;
            }

            var state = $("input[name=state]").val();
            if(state == ''){
                alert('state is required!');
                $("input[name=state]").focus();
                return false;
            }

            var paymethod = $("input[name=paymethod]:checked").val();
            if(paymethod == ''){
                alert('Please select payment method is required!');
                $("input[name=paymethod]").focus();
                return false;
            }

            $.ajax({
                url: "{{ route('create.order') }}",
                type: 'POST',
                data: {phone:phone,name:name,pincode:pincode,apartment:apartment,area:area,landmark:landmark,city:city,state:state,paymethod:paymethod,_token:'{{ csrf_token() }}'},
                success: function(response)
                {   
                    console.log(response);
                    if(response.status == true){
                        alert(response.message);
                        window.location.replace("{{route('myProfile')}}");
                    }
                }
            });

        }
        const $otp_length = 4;

const element = document.getElementById('OTPInput');
for (let i = 0; i < $otp_length; i++) {
  let inputField = document.createElement('input'); // Creates a new input element
  inputField.className = "w-12 h-12 bg-gray-100 border-gray-100 outline-none focus:bg-gray-200 m-2 text-center rounded focus:border-blue-400 focus:shadow-outline";
  // Do individual OTP input styling here;
  inputField.style.cssText = "color: transparent; text-shadow: 0 0 0 gray;"; // Input field text styling. This css hides the text caret
  inputField.id = 'otp-field' + i; // Don't remove
  inputField.maxLength = 1; // Sets individual field length to 1 char
  element.appendChild(inputField); // Adds the input field to the parent div (OTPInput)
}

/*  This is for switching back and forth the input box for user experience */
const inputs = document.querySelectorAll('#OTPInput > *[id]');
for (let i = 0; i < inputs.length; i++) {
  inputs[i].addEventListener('keydown', function(event) {
    if (event.key === "Backspace") {

      if (inputs[i].value == '') {
        if (i != 0) {
          inputs[i - 1].focus();
        }
      } else {
        inputs[i].value = '';
      }

    } else if (event.key === "ArrowLeft" && i !== 0) {
      inputs[i - 1].focus();
    } else if (event.key === "ArrowRight" && i !== inputs.length - 1) {
      inputs[i + 1].focus();
    } else if (event.key != "ArrowLeft" && event.key != "ArrowRight") {
      inputs[i].setAttribute("type", "text");
      inputs[i].value = ''; // Bug Fix: allow user to change a random otp digit after pressing it
      setTimeout(function() {
        inputs[i].setAttribute("type", "password");
      }, 1000); // Hides the text after 1 sec
    }
  });
  inputs[i].addEventListener('input', function() {
    inputs[i].value = inputs[i].value.toUpperCase(); // Converts to Upper case. Remove .toUpperCase() if conversion isnt required.
    if (i === inputs.length - 1 && inputs[i].value !== '') {
      return true;
    } else if (inputs[i].value !== '') {
      inputs[i + 1].focus();
    }
  });

}
/*  This is to get the value on pressing the submit button
  *   In this example, I used a hidden input box to store the otp after compiling data from each input fields
  *   This hidden input will have a name attribute and all other single character fields won't have a name attribute
  *   This is to ensure that only this hidden input field will be submitted when you submit the form */

        document.getElementById('otpSubmit').addEventListener("click", function() {
          const inputs = document.querySelectorAll('#OTPInput > *[id]');
          let compiledOtp = '';
          for (let i = 0; i < inputs.length; i++) {
            compiledOtp += inputs[i].value;
          }
          document.getElementById('otp').value = compiledOtp;
          return true;
        });
    

        // code to make nav bar sticky
        window.onscroll = function() {myFunction()};
        var navbar = document.getElementById("header-desk");
        var sticky = navbar.offsetTop;

        function myFunction() {
          if (window.pageYOffset >= sticky) {
            navbar.classList.add("fixnav")
          } else {
            navbar.classList.remove("fixnav");
          }
        }
        // code to make navbar sticky



        </script>




    </body>
</html>
