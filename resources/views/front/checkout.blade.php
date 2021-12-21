@include('front.layouts.flash-msg')
@include('front.layouts.header')


       <!-- main-area -->
       <main>

            <!-- breadcrumb-area -->
            <section class="breadcrumb-area breadcrumb-bg"  style="background-image:url('{{ asset('/uploads/banner/'.$slider->image) }}');">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="breadcrumb-content">
                                <h2 class="title">Checkout</h2>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                                        </ol>
                                    </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <!-- breadcrumb-area-end -->

        <!-- checkout-area -->
        <div class="checkout-area pt-90 pb-90">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div id="pincheckarea" class="checkout-progress-wrap mb-0 pt-0">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input id="pincode" class="form-control" type="text" placeholder="Enter Pincode">
                                </div>
                                <div class="col-lg-6">
                                    <button class="btn btn-primary" onclick="return checkPin()">Check For Delivery</button>
                                </div>
                                
                            </div>
                        </div>
                        <div id="addressarea" class="checkout-form-wrap">
                            
                                <div class="checkout-form-top">
                                    <h5 class="title">Contact information</h5>
                                </div>
                                <input type="number" placeholder="Phone Number *" name="phone" value="{{Auth::user()->phone}}">
                                
                                <div class="building-info-wrap">
                                    <h5 class="title">Billing Information</h5>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Full Name*" name="name" value="{{Auth::user()->name}}">
                                        </div>
                                        
                                    </div>
                                    <input id="pininput" type="text" placeholder="Pincode*" name="pincode" >
                                    <input type="text" placeholder="Flat, House No, Building, Company, Apartment Name*" name="apartment" value="{{@$userAddress->apartment}}">
                                    <input type="text" placeholder="Area, Colony, Street, Sector, Village*" name="area" value="{{@$userAddress->area}}">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" placeholder="Landmark e.g. Near Kailash Hospital" name="landmark" value="{{@$userAddress->landmark}}">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" placeholder="Town\City" name="city" value="{{@$userAddress->city}}">
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <input type="text" placeholder="State*" name="state" value="{{@$userAddress->state}}">
                                        </div>
                                    </div>
                                    
                                    <!-- <textarea name="message" id="message" placeholder="Comment"></textarea> -->
                                </div>
                           
                        </div>
                    </div>
                    <div class="col-lg-5">
                    
                        <div class="shop-cart-total order-summary-wrap">
                           
                            <h3 class="title">Order Summary</h3>
                            @php
                                $total = 0;
                                $delcharge = 0;
                              
                            @endphp
                            @foreach($carts as $cart)
                                @php
                                  
                                    $prosum = $cart->quantity * $cart->products->price;
                                    $total = $total + $prosum;
                                    $cart_price = $cart->price;
                                @endphp
                            <div class="os-products-item">
                                <div class="thumb">
                                   <img src="{{asset('uploads/products/'.$cart->products->upload_image)}}" alt="">
                                </div>
                                <div class="content">
                                    <h6 class="title">{{$cart->products->name}}</h6>
                                    <span class="price">{{$cart->currency}} {{$cart->price}}.00</span>
                                    <span class="quantity">{{$cart->quantity}} Products</span>
                                    <span class="quantity">Total : {{$cart->currency}} {{$prosum}}.00</span>
                                    
                                    
                                </div>
                                <div class="remove"><a href="{{url('delete-cart/'.$cart->id)}}">x</a></div>
                            </div>
                            @endforeach

                            <div class="shop-cart-widget">
                                
                                    <ul>
                                        <li class="cart-total-amount"><span>Subtotal</span> <span class="amount">{{$cart->currency}}  {{$total}}.00</span></li>
                                        <li class="cart-total-amount"><span>Delivery Charges</span> <span class="amount"><del>{{$cart->currency}} {{$delivery_charges->delivery_charges}}</del></span></li>
                                        <li class="sub-total"><span>Grand Total</span> {{$cart->currency}}  {{$total}}.00</li>
                                        
                                        
                                    </ul>
                                    <div class="payment-method-info">
                                        <div class="paypal-method-flex">
                                            <input id="cod" type="radio" name="paymethod" value="cash_on_delivery" checked>
                                            <label for="cod">Cash on delivery</label>
                                        </div>
                                        <div class="paypal-method-flex">
                                            <input id="rozar" type="radio" name="paymethod" value="online">
                                            <label for="rozar">Online Payment</label>
                                        </div>
                                    </div>
                                   <!-- <div class="cod_button">
                                        <input type="button" value="Place Order" class="btn" onclick="return placeOrder()">
                                    </div> -->
                                     
                                    @if($total >= 200)    
                                    <div class="cod_button">
                                        <input type="button" value="PLACE ORDER" class="btn" onclick="return placeOrder()">
                                    </div>
                                    @else
                                    <p style="color:red;text-align:center;">Minimum Order value is Rs. 200</p>
                                    @endif
                                   
                                    @if($total >= 200)      
                                    <div class="razorpay_btn">
                                        <div class="card-body text-center p-0">
                                            <form action="{{route('razorpay')}}" method="POST" onclick="return placeOrder()">
                                                @csrf
                                                <script src="https://checkout.razorpay.com/v1/checkout.js"
                                                        data-key="{{ env('RAZORPAY_KEY') }}"
                                                        data-amount="{{$total * 100}}"
                                                        data-buttontext="PLACE ORDER"
                                                        data-name="Hygieneherbs Agro Fresh Private Limited"
                                                        data-description="RazorPay"
                                                        data-image="{{url('assets/front/img/logo/logo.png')}}"
                                                        data-prefill.contact="{{Auth::user()->phone}}"
                                                        data-prefill.name="{{Auth::user()->name}}"
                                                        data-prefill.email="{{Auth::user()->email}}"
                                                        data-theme.color="#ff7529">
                                                </script>
                                            </form>
                                      

                                
                            </div>
                            
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- checkout-area-end -->

    </main>
    <!-- main-area-end -->

@include('front.layouts.footer')
        <script>
</script>