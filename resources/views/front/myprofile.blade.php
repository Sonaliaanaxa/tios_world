   @include('front.layouts.header')
   @include('front.layouts.flash-msg')
      <!-- breadcrumb-area -->
<section class="breadcrumb-area breadcrumb-bg"  style="background-image:url('{{ asset('/uploads/banner/'.$slider->image) }}');">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <h2 class="title">My Profile</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">My Profile</li>
                            </ol>
                        </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb-area-end -->
          

          <div class="container-fluid my-5">
            <div class="breadcrumb-content text-center">
               
            </div>
        </div>



          <div class=" my-account-area pb-120 ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        <div class="myaccount-tab-menu nav" role="tablist">
                            <a href="#dashboad" class="active" data-bs-toggle="tab"><i class="far fa-tachometer-slowest"></i>  Dashboard</a>
                            <a href="#orders" data-bs-toggle="tab">Orders</a>
                            <!-- <a href="#payment-method" data-bs-toggle="tab">Payment Method</a> -->
                            <!-- <a href="#download" data-bs-toggle="tab">Download</a> -->
                            <a href="#address-edit" data-bs-toggle="tab">Address</a>
                            <a href="#account-info" data-bs-toggle="tab">Account Details</a>
                            <a href="{{route('logout')}}">Logout</a>
                        </div>
                    </div>
                    <!-- My Account Tab Menu End -->
                    <!-- My Account Tab Content Start -->
                    <div class="col-lg-9 col-md-8">
                        <div class="tab-content" id="myaccountContent">
                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Dashboard</h3>
                                    <div class="welcome">
                                        <p>Hello <strong>{{Auth::user()->name}}, </strong></p>
                                    </div>

                                    <p class="mb-0">Welcome to <strong>HygieneHerbs Agro Fresh Pvt. Ltd.!</strong> <br/>From your account dashboard. you can easily check &amp; view your recent orders, manage your shipping and billing addresses and edit account details.</p>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->
                            <!-- Single Tab Content Start -->
                            <div class="tab-pane" id="orders" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Orders</h3>
                                    <div class="myaccount-table table-responsive text-center">
                                    @if(count($orders)>0)
                                        <table class="table table-bordered">
                                           
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Order No</th>
                                                    <th>Order Date</th>
                                                    <th>Total</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                @foreach($orders as $order)
                                                <tr>
                                                    <td>{{$order->order_no}}</td>
                                                    <td>{{Carbon\Carbon::parse($order->created_at)->format('d M, Y h:i')}}</td>
                                                    
                                                    <td>₹ {{$order->total_price}}</td>
                                                    <td><a href="#view-order" class="check-btn sqr-btn">View</a></td>
                                                </tr>
                                                @endforeach
                                                
                                        </table>
                                        @else 
                                        <p>No Order Found!!</p>
                                        @endif
                                        <div class="order-details">
                                        <div class="tab-pane fade" id="view-order" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Order Details</h3>
                                    <div class="myaccount-table table-responsive text-center">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    
                                                    <th>Product Image</th>
                                                    <th>Product Name</th>
                                                    <th>Total Price</th>
                                                    <th>Quantity</th>
                                                    <th>Status</th>
                                                    <th>Order Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($orderDetails as $order)
                                                <tr>
                                                    
                                                    <td><img src="{{asset('uploads/products/'. $order->image)}}" style="height:60px; width:60px;" ></td>
                                                    <td>{{$order->name}}</td>
                                                    <td>₹ {{$order->price * $order->quantity}}.00</td>
                                                    <td>{{$order->quantity}}</td>
                                                    <td>{{$order->payment}}
                                                    <td>{{Carbon\Carbon::parse($order->created_at)->format('d M, Y h:i')}}</td>
                                                </tr>
                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->
                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="download" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Downloads</h3>
                                    <div class="myaccount-table table-responsive text-center">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Date</th>
                                                    <th>Expire</th>
                                                    <th>Download</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Haven - Free Real Estate PSD Template</td>
                                                    <td>Aug 22, 2018</td>
                                                    <td>Yes</td>
                                                    <td><a href="#" class="check-btn sqr-btn "><i class="fa fa-cloud-download"></i> Download File</a></td>
                                                </tr>
                                                <tr>
                                                    <td>HasTech - Profolio Business Template</td>
                                                    <td>Sep 12, 2018</td>
                                                    <td>Never</td>
                                                    <td><a href="#" class="check-btn sqr-btn "><i class="fa fa-cloud-download"></i> Download File</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->
                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="payment-method" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Payment Method</h3>
                                    <p class="saved-message">You Can't Saved Your Payment Method yet.</p>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->
                            <!-- Single Tab Content Start -->
                            @foreach($orders as $order)
                            <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Billing Address</h3>
                                    <address>
                                      
                                        <p>{{$order->apartment}}, {{$order->area}}, {{$order->city}}<br>
                                           {{$order->state}}, {{$order->landmark}}, {{$order->pincode}}</p>
                                        <p>Mobile: {{Auth::user()->phone}}</p>
                                    </address>
                                    <a href="#edit-address" class="check-btn sqr-btn "><i class="fa fa-edit"></i> Edit Address</a>
                                    <div class="myaccount-content" id="edit-address">
                                    <h3>Edit Address</h3>
                                    <div class="account-details-form">
                                        <form action="{{route('edit-address')}}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="single-input-item">
                                                        <label for="first-name" class="required">Apartment</label>
                                                        <input type="text" id="first-name" name="apartment" value="{{$user->apartment}}">
                                                    </div>
                                                    <div class="single-input-item">
                                                        <label for="area" class="required">Area</label>
                                                        <input type="area" id="area" name="area" value="{{$user->area}}">
                                                    </div>
                                                    <div class="single-input-item">
                                                        <label for="landmark" class="required">Landmark</label>
                                                        <input type="landmark" id="landmark" name="landmark" value="{{$user->landmark}}">
                                                    </div>
                                                    <div class="single-input-item">
                                                        <label for="city" class="required">City</label>
                                                        <input type="city" id="city"  name="city" value="{{$user->city}}">
                                                    </div>
                                                    <div class="single-input-item">
                                                        <label for="state" class="required">State</label>
                                                        <input type="state" id="state" name="state" value="{{$user->state}}">
                                                    </div>
                                                </div>
                                               
                                            </div>
                                           
                                            <div class="single-input-item">
                                                <button class="check-btn sqr-btn " type="submit">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- Single Tab Content End -->
                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="account-info" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Account Details</h3>
                                    <div class="account-details-form">
                                        <form action="{{route('edit-account-details')}}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="single-input-item">
                                                        <label for="first-name" class="required">Full Name</label>
                                                        <input type="text" id="first-name" name="name" value="{{Auth::user()->name}}">
                                                    </div>
                                                    <div class="single-input-item">
                                                        <label for="email" class="required">Email Address</label>
                                                        <input type="email" id="email" name="email" value="{{Auth::user()->email}}">
                                                    </div>
                                                    <div class="single-input-item">
                                                        <label for="phone" class="required">Phone</label>
                                                        <input type="phone" id="phone" readonly value="{{Auth::user()->phone}}">
                                                    </div>
                                                </div>
                                               
                                            </div>
                                           
                                            <div class="single-input-item">
                                                <button class="check-btn sqr-btn " type="submit">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> <!-- Single Tab Content End -->
                        </div>
                    </div> <!-- My Account Tab Content End -->
                </div>
            </div>
        </div>
   

 
 <!--End header-->
 @include('front.layouts.footer')
 <script>
     /*=============================================
	=    	   My_account tab  	         =
=============================================*/

$(function(){
	$('a[data-bs-toggle=tab]').click(function(event){
		event.preventDefault();
		$(this).parent().find('a[data-bs-toggle=tab]').removeClass('active');
		$(this).addClass('active')
		$('.tab-pane').removeClass('fade show active');
		$($(this).attr('href')).addClass('fade show active');
	})
})



 </script>






