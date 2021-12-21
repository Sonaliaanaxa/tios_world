@include("home.layouts.header") 

     <!-- Main Wrapper -->
     <div class="main-wrapper">



<!-- Page Content -->
<div class="content">
    <div class="container">

        <div class="row">
                           
            

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
                                    
                                      <?php   $billingdetail=$r->billing_det; ?>
                                  
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
                                        @foreach($cart as $r)
                                            <li>Subtotal <span>{{ $r->currency }} {{ $subtotalcart}}</span></li>
                                            @endforeach
                                        </ul>
                                        <ul class="booking-fee">
                                        @foreach($cart as $r)
                                            <li>Tax <span>{{ $r->currency }}<?php echo $total_taxprice; ?></span></li>
                                            @endforeach
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


                                <form action="https://demoaanaxagorasr.net/socialvaidya/paytms/PaytmKit/TxnTest.php" method="post">
                    <input type="hidden" name="price" value="{{$totalcart}}">
                   
                     <input type="hidden" name="ids" value="{{$idsw}}">
                                  <!--   <button type="submit" class="btn btn-primary my-3">Payment</button>-->
                                  
                            
    <input type="submit" value="Payment" name="submit"class="btn btn-primary my-3">
  
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




    <!-- Checkout Section End -->
    @include("home.layouts.footer")