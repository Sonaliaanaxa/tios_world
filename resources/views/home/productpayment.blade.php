
@include("home.layouts.header") 

     <!-- Main Wrapper -->
     <div class="main-wrapper">



<!-- Page Content -->
<div class="content">
    <div class="container">

        <div class="row">
            <div class="col-md-6 col-lg-7">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Payment</h3>
                    </div>
                    <div class="card-body">

                        <!-- Checkout Form -->
        <form action="http://socialvaidya.aanaxagorasr.in/Paytms/PaytmKit/TxnTest.php" method="post" style='padding:0px;'>
                            @csrf

                              <!-- Personal Information -->
                            <div class="info-widget">
                                <h4 class="card-title">Personal Information</h4>
                              
                                <div class="row">


                                <?php
foreach($cart as $r){
 $name =  $r->user_name;
$email = $r->user_email;
$mobile = $r->user_mobile;
$address = $r->user_address;

}

$user_id = Auth::user()->id;
?>
                                
                            
                                <p>
                                                <b>Name :</b> {{$name}} <br>
                                                <b>Email :</b> {{$email}} 
                                               
                                            </p>
                                        
                                   
                            
                                         
                                            
                                            <div class="col-md-12 col-sm-12">
                                        <div class="form-group card-label">
                                            <label>Phone</label>
                                            <input class="form-control" type="text"  name="user_mobile" id="input-user_mobile"    value="{{ $mobile }}"  aria-required="true">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group card-label">
                                            <label>Address</label>
                                            <input class="form-control" type="text"  name="user_address" id="input-user_address"    value="{{$address}}"  aria-required="true">
                                        </div>
                                    </div>
                              
                                    
                          
                                            
                                 
                                  
                                  
                                  
                              
                               
                           
                            
                                </div>
                             
                               
                            </div>
                            <!-- /Personal Information -->

       
                            <!-- /Shipping Details -->
                            <?php $totalcart=0; ?>
                                <?php $totalsaving=0; ?>
                                <?php $totalitems=0; ?>
                                <?php $total_taxprice=0; ?>
                                <?php $subtotalcart=0; ?>
                             @foreach($cart as $r)
                                         
                                            
                                            <?php   $totalcart=$totalcart + ($r->price * $r->quantity); ?>
                                    <?php   $totalsaving=$totalsaving + $r->saving; ?>
                                    <?php   $total_taxprice=$total_taxprice + ($r->tax_price * $r->quantity); ?>
                                    <?php   $subtotalcart=$subtotalcart + (($r->price * $r->quantity)-($r->tax_price * $r->quantity)); ?>  
                                    <input type='hidden' name='final_price' value="{{$totalcart}}">
                                    <input type='hidden' name='final_saving' value="{{$totalsaving}}">
                                    <input type='hidden' name='final_taxprice' value="{{$total_taxprice}}">
                                    <input type='hidden' name='final_subtoatal_price' value="{{$subtotalcart}}">

                                @endforeach

                            <div class="payment-widget">
                                <h4 class="card-title">Payment Method</h4>


                                
                                <!-- Paypal Payment -->
                                <div class="payment-list">
                                    <label class="payment-radio paytm-option">
                                         <div class="custom-control custom-radio">
                                    <input id="paytm" name="payment_method" value="paytm"type="radio" class="custom-control-input paytm" >
                                    <label class="custom-control-label" for="paytm">Paytm</label>
                                </div>
                                               
                                            </label>
                                </div>
                                <!-- /Paypal Payment -->

<?php
foreach($cart as $r){
    $price=$r->price;
    $q=$r->quantity;
    break;

}
$p= $price*$q;

?>
<input type="hidden" value="{{ $p }}" name="price">


                                <!-- Submit Section -->
                                <div class="submit-section mt-4">
                                     <button type="submit" name="form_submit" class="btn btn-primary my-3" onclick="return selectPaymentMethod('$user_id');">Confirm and Pay</button>


                                </div>
                                <!-- /Submit Section -->

                            </div>
                        </form>
                        <!-- /Checkout Form -->

                    </div>
                </div>

            </div>

           
                                                                  
                                    </div>
                                </div>
                            </div>
                </div>
                <!-- /Booking Summary -->

            </div>
        </div>

    </div>

</div>




    <!-- Checkout Section End -->
    @include("home.layouts.footer")
