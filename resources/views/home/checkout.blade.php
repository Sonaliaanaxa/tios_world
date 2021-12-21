 @include("home.layouts.header") 

     <!-- Main Wrapper -->
     <div class="main-wrapper">



<!-- Page Content -->
<div class="content">
    <div class="container">
   @if($cCount>0)
        <div class="row">
            
                                <?php
foreach($cart as $r){

   $billingdetail=$r->billing_det; 
    $orderno =  $r->order_no;
}



?>
            <div class="col-md-6 col-lg-7">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Shipping details</h3>
                    </div>
                    <div class="card-body">

                        <!-- Checkout Form -->
                  <form action="{{route('placeorder')}}" method="post" style='padding:0px;'>
                            @csrf

                              <!-- Personal Information -->
                            <div class="info-widget">
                                <!--<h4 class="card-title">Personal Information</h4>-->
                              
                                <div class="row">


                                <?php
foreach($cart as $r){
 $name =  $r->user_name;
$email = $r->user_email;
$mobile = $r->user_mobile;
$address = $r->user_address;
$city = $r->user_city;
$state = $r->user_state;
$zipcode = $r->user_zipcode;
$country = $r->user_country;

  
 $idsw =  $r->o_id;



}


$user_id = Auth::user()->id;
?>
                          
                            
                                                <div class="col-md-12 col-sm-12">
                                        <div class="form-group card-label">
                                            <label>Name</label>
                                        
                                            <input class="form-control" type="text"  name="user_name" id="input-user_mobile"       value="{{ $name }}"   aria-required="true">
                                       
                                        </div>
                                    </div>
                                            
                                            <div class="col-md-12 col-sm-12">
                                        <div class="form-group card-label">
                                            <label>Phone</label>
                                        
                                            <input class="form-control" type="text"  name="user_mobile" id="input-user_mobile"       value="{{ $mobile }}"   aria-required="true">
                                       
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group card-label">
                                            <label>Full Address</label>
                                         
                                            <input class="form-control" type="text"  name="user_address" id="input-user_address"    value="{{ $address }}"   aria-required="true">
                                       
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group card-label">
                                            <label>City</label>
                                         
                                            <input class="form-control" type="text"  name="user_city" id="input-user_city"    value="{{ $city }}"   aria-required="true">
                                       
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group card-label">
                                            <label>State</label>
                                         
                                            <input class="form-control" type="text"  name="user_state" id="input-user_state"    value="{{ $state }}"   aria-required="true">
                                       
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group card-label">
                                            <label>Zipcode</label>
                                         
                                            <input class="form-control" type="text"  name="user_zipcode" id="input-user_zipcode"    value="{{ $zipcode }}"   aria-required="true">
                                       
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group card-label">
                                            <label>Country</label>
                                         
                                            <input class="form-control" type="text"  name="user_country" id="input-user_country"    value="{{ $country }}"   aria-required="true">
                                       
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
                                <h4 class="card-title"></h4>


                                
                                <!-- Paypal Payment -->
                                                          <!-- /Paypal Payment -->


                                <!-- Submit Section -->
                                <div class="submit-section mt-4">
                                                                @if($billingdetail == '0')
                                     <button type="submit" class="btn btn-primary my-3" onclick="return selectPaymentMethod('$user_id');">Submit</button>
                                     @else
                                     
                                    <div class="container" style="padding:15px 2px;box-shadow: 1px 1px 1px 1px #dad4d4;border-radius:6px;max-width:600px;text-align:center;background-color:white;">
                                        <div class="row">
                                            <div class="col-lg-12">
                            
                                          
                            
                                                <div class="contact__form__title" style="text-align:center;">
                                                    <h3 style="color:blue;">Please pay to complete your Orders!</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                     <!--<span style="color:blue;">Please pay to complete your Orders!</span>-->
     @endif

                                </div>
                                <!-- /Submit Section -->

                            </div>
                        </form>
                        <!-- /Checkout Form -->

                    </div>
                </div>

            </div>

            <div class="col-md-6 col-lg-5 theiaStickySidebar">

                <!-- Booking Summary -->
                <div class="card booking-card">
                            <div class="card-header">
                                <h3 class="card-title">Your Order</h3>
                            </div>
                         
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-center mb-0">
                                        <tr>
                                            <th>Product</th>
                                            <th>Price & Quantity </th>
                                         

                                            <th class="text-right">Total</th>
                                        </tr>

                                     
                                 
                                         <tbody id="myTable"> 
                                         <?php $totalcart=0; ?>
                                <?php $totalsaving=0; ?>
                                <?php $totalitems=0; ?>
                            
                                <?php $subtotalcart=0; ?>
                             
                                <?php $total_taxprice=0; ?>
                             @foreach($cart as $r)
                                            <tr>
                                                <td>{{$r->name}} {{$r->weight}} {{$r->unit}}</td>
                                                <td>{{$r->price}} X {{$r->quantity}}</td>
                                                <td class="text-right">{{ $r->currency }} {{$r->price * $r->quantity}}</td>
                                            </tr>
                                            
                                            <?php   $totalcart=$totalcart + ($r->price * $r->quantity); ?>
                                    <?php   $totalsaving=$totalsaving + $r->saving; ?>
                                    <?php   $total_taxprice=$total_taxprice + ($r->tax_price * $r->quantity); ?>
                                    <?php   $subtotalcart=$subtotalcart + (($r->price * $r->quantity)-($r->tax_price * $r->quantity)); ?>     
                                     <?php   $currencyv=$r->currency; ?>
                                    <input type='hidden' name='final_price' value="{{$totalcart}}">
                                    <input type='hidden' name='final_saving' value="{{$totalsaving}}">
                                    <input type='hidden' name='final_taxprice' value="{{$total_taxprice}}">
                                @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="booking-summary pt-5">
                                    <div class="booking-item-wrap">
                                        <ul class="booking-date">
                                   
                                            <li>Subtotal <span>{{ $currencyv }} {{ $subtotalcart}}</span></li>
                                    
                                        </ul>
                                        <ul class="booking-fee">
                                
                                            <li>Tax <span>{{ $currencyv }}<?php echo $total_taxprice; ?></span></li>
                                      
                                        </ul>
                                        <div class="booking-total">
                                            <ul class="booking-total-list">
                                                <li>
                                                    <span>Total</span>
                                                 
                                                    <span class="total-cost"> &#8377; {{ $totalcart}}</span>
                                               
                                                </li>
                                                <li>
                                            </ul>
                                        </div>
                                  
                                        <div style='color:#00cc77;font-size:15px;'>Total Saving on this Order<span> &#8377;  {{ $totalsaving}}</span></div>
                                     
                                    </div>
                                                  <!-- Submit Section -->
                                <div class="submit-section mt-4">


                                <form action="https://medto.in/paytms/PaytmKit/TxnTest.php" method="post">
                    <input type="hidden" name="price" value="{{$totalcart}}">
                     <input type="hidden" name="phone" value="{{$mobile}}">
                     <input type="hidden" name="id" value="{{$idsw}}">
                    <input type="hidden" name="order_no" value="{{$orderno}}">
                     <input type="hidden" name="email" value="{{$email}}">
                    
                                  <!--   <button type="submit" class="btn btn-primary my-3">Payment</button>-->
                                      
                                                                  @if($billingdetail == '1')
                                    <input type="submit" value="Payment" name="submit"class="btn btn-primary my-3">
                                       @endif
                                     </form>





                                </div>
                                <!-- /Submit Section -->
                                </div>
                            </div>
                </div>
                <!-- /Booking Summary -->
   
            </div>
        </div>

    </div>

</div>
      @else
                                    <div align='center' class='col-md-12' style='box-shadow:0px 0px 1px 2px whitesmoke;padding:20px;'>
                                        <img src="{{ asset('public/material/home') }}/img/cart.jpg" style='width:300px;height:200px;'>
                                        <h3 align='center' style='padding:10px 100px;color:#0099cc;'> Cart is Empty!</h3>
                                        <a href="{{route('home')}}" class="site-btn" style=""> Continue Shopping <i class='fa fa-shopping-cart'> </i></a>
                                    </div>
                                    
                                    <br>
                                    <br>
                                @endif


    </div>

</div>
    <!-- Checkout Section End -->
    @include("home.layouts.footer")