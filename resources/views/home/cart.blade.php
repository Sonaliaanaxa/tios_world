@include("home.layouts.header") 
   

    <!-- Main Wrapper -->
    <div class="main-wrapper">

    @include('home.layouts.flash_msg')
        <!-- /Breadcrumb -->
  
        <!-- Page Content -->
        <div class="content">
            <div class="container">
            @if($cCount>0)
                <div class="card card-table">
                    <div class="card-body">
               
                                <div class="shoping__product"><b style="font-size:17px;margin:5px;">Saved Products ({{countCart()}})</b></div>

                        <div class="table-responsive">
                            <table class="table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Weight</th>
                                     
                                        <th>Price</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-center">Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="myTable"> 
                                <?php $totalcart=0; ?>
                                <?php $subtotalcart=0; ?>
                                <?php $totalsaving=0; ?>
                                <?php $total_taxprice=0; ?>
                                @foreach($cart as $r)
                                    <tr class="tr-{{$r->o_id}}">
                                        <td>
                                            <h2 class="table-avatar">
                                               
                                                <a href="{{'productDetails',$r->id}}" class="avatar avatar-sm mr-2">
                                                                <img class="avatar-img" src="{{ asset('public/uploads') }}/products/{{$r->img}}" alt="" >
                                                            
                                                            </a>
                                            </h2>
                                            <a href="{{'productDetails',$r->id}}">{{$r->name}}</a>
                                        </td>
                                        <td>{{$r->weight}} {{$r->unit}}
                                        </td>
                                    
                                        <td> <strong style="font-size: 16px;color:black;">Price: {{ $r->currency }}{{$r->price}}</strong>
                                               <p><span style="font-size: 12px;color:black;">MRP: <strike>{{ $r->currency }}{{$r->mrp}}</strike> | {{$r->discount}}% OFF</span></p></td>
                                        <td class="text-center">
                                            <div class="custom-increment cart">
                                            <div class="input-group1">
                                            <div class="quantity">
                                              
                                              <div class="pro-qty" class="form-group"   style="width:90px;">
                                                  <select class="form-control ls_quantity" name='qunatity'  class="q-{{$r->o_id}}" id="{{$r->o_id}}">
                                               
                                                  @for($i=1;$i<=100;$i++)
                                                  
                                                     <option value="{{$i}}" {{ ($i==$r->quantity)?'selected':''}} >{{$i}}</option>
                                                  @endfor
                                              </select> 
                                              
                                              </div>
                                          </div>
                                            
                                          
                                                </div>
                                            </div>
                                        </td>
                                       
                                        <td class="text-center">{{ $r->currency }} {{$r->price * $r->quantity}}</td>
                                        <td class="text-right">
                                        <button type="button" class="icon_close delete-product" data-id="{{$r->o_id}}" class="btn btn-secondary" style='color:#000;'><i class="fa fa-trash"></i></button>
                                         
                                        </td>
                                        <?php   $totalcart=$totalcart + ($r->price * $r->quantity); ?>
                                    <?php   $totalsaving=$totalsaving + $r->saving; ?>
                                    <?php   $total_taxprice=$total_taxprice + ($r->tax_price * $r->quantity); ?>
                                    <?php   $subtotalcart=$subtotalcart + (($r->price * $r->quantity)-($r->tax_price * $r->quantity)); ?>              
                                        @endforeach 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @else
                                    <div align='center' class='col-md-12' style='box-shadow:0px 0px 1px 2px whitesmoke;padding:20px;'>
                                        <img src="{{ asset('public/material/home') }}/img/cart.jpg" style='width:300px;height:200px;'>
                                        <h3 align='center' style='padding:10px 100px;color:#0099cc;'> Cart is Empty!</h3>
                                        <a href="{{route('home')}}" class="site-btn" style=""> Continue Shopping <i class='fa fa-shopping-cart'> </i></a>
                                    </div>
                                @endif
                @if($cCount>0)

                <div class="row">
                    <div class="col-md-7 col-lg-8">
                    </div>

                    <div class="col-md-5 col-lg-4">

                        <!-- Booking Summary -->
                        <div class="card booking-card">
                            <div class="card-header">
                                <h4 class="card-title">Cart Totals</h4>
                            </div>
                            <div class="card-body">

                                <div class="booking-summary">
                                    <div class="booking-item-wrap">
                                        <ul class="booking-date">
                                            <li>Subtotal <span>{{ $r->currency }} <?php echo $subtotalcart; ?></span></li>
  
                                        </ul>
                                        <ul class="booking-fee pt-4">
                                            <li>Tax <span>{{ $r->currency }}<?php echo $total_taxprice; ?></span></li>
                                        </ul>
                                      
                                        <div class="booking-total">
                                            <ul class="booking-total-list">
                                                <li>
                                                    <span>Total</span>
                                                    <span class="total-cost">{{ $r->currency }} <?php echo $totalcart; ?></span>
                                                </li>
                                                <li>
                                                    <div class="clinic-booking pt-4">
                                                        <a class="apt-btn" href="{{route('checkout')}}">Proceed to checkout</a>
                                                    </div>
                                                    <div style='color:#00cc77;font-size:15px;'>Total Saving on this Order {{ $r->currency }}    {{ $totalsaving}}</div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Booking Summary -->

                    </div>
                </div>
                @endif

            </div>
        </div>




















    <script>
        $(document).ready(function() {

               //----to remove an item from cart---
            $('.delete-product').on('click', function (e) {
                if (!confirm("Are you sure? This item will be removed from cart!")) {
                    e.preventDefault();
                    return false;
                }

                var id = $(this).data('id');
                var tr=".tr-"+id;
              
                $.ajax({
                    type: 'POST',
                    url:"{{route('deleteCartProduct')}}",
                    data: {id: id, _token: '{{ csrf_token() }}'},
                    success: function (data) {
                        if (data.success == 1) {
                           $(tr).hide();
                             swal("Success!", "Selected Item Successfully Deleted!", "success");
                             
                        }

                     
                       
                    }
                });
            }); 
            
            //----to update an item qunatity--------------------------------------

        
            
                $('.ls_quantity').on('change', function() {
            

                var id = $(this).attr('id');
                var quantity =  $(this).val();
                alert(quantity);
               
                $.ajax({
                    type: 'POST',
                    url:"{{route('updateQuantity')}}",
                    data: {id: id,quantity:quantity, _token: '{{ csrf_token() }}'},
                    success: function (data) {
                        if (data.success == 1) {
                           location.reload();
                        }

                    }
                });
            }); 

            
            
            });
  </script>

    <!-- Shoping Cart Section End -->
    @include("home.layouts.footer")