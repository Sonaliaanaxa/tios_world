<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Social Vaidya</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="assets/plugins/fancybox/jquery.fancybox.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
            <script src="assets/js/html5shiv.min.js"></script>
            <script src="assets/js/respond.min.js"></script>
        <![endif]-->

    <!--    jquery for header & footer-->

    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script>
        $(function() {
            $(".header").load("header.html");
            $(".footer").load("footer.html");
        });
    </script>

    <!--Jquery End-->

</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Header -->
        <div class="header"></div>
        <!-- /Header -->

        <!-- Breadcrumb -->
        <div class="breadcrumb-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-12 col-12">
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Overview</li>
                            </ol>
                        </nav>
                        <h2 class="breadcrumb-title">Overview</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Breadcrumb -->

        <!-- Page Content -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                         @if(Session::has('flash_message_error'))
            <div class="alert alert-sm alert-danger alert-block" role="alert">
              <button type="button" class="close" data-dismiss="alert" area-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <strong>{!! session('flash_message_error')!!}</strong>
            </div>
            @endif
             
             @if(Session::has('flash_message_success'))
              <div class="alert alert-sm alert-success alert-block" role="alert">
              <button type="button" class="close" data-dismiss="alert" area-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <strong>{!! session('flash_message_success')!!}</strong>
            </div>
            @endif
                        <div class="card card-table">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-center mb-0">
                                        <thead>

                                            <tr>
                                                <th>Product</th>
                                                <th>SKU</th>
                                                <th>Price</th>
                                                <th class="text-center">Quantity</th>
                                                <th class="text-center">Total</th>
                                                <th>Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $total_amount =0;?>
                                    @foreach($userCart as $cart)
                                            <tr>
                                                <td>
                                                    
                                                    <a href>{{ $cart->product_name}}</a>
                                                </td>
                                                 <td>{{ $cart->product_code}}</td>
                                        <td>₹&nbsp;{{ $cart->price}}</td>

                                                <td class="text-center">
                                  
                                   {{$cart->quantity}}
                                   
                                </td>
                                 <td class="text-center">₹&nbsp;{{$cart->price*$cart->quantity}}</td>
                                
                                        <td class="text">
                                            <div class="table-action">
                                            <a href="{{url('/cart/delete-product/'.$cart->id)}}" class="btn btn-sm bg-danger-light">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                   </a>
                                   
                                            </div>
                                        </td>
                                    </tr>
                                  <?php $total_amount = $total_amount +($cart->price*$cart->quantity);?>
                                       @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card booking-card">
                            <div class="card-header">
                                <h4 class="card-title">Delivery Address</h4>
                            </div>
                            <div class="card-body">

                                <div class="booking-summary">
                                    <div class="booking-item-wrap">
                                        <ul class="booking-date">
                                            <li>Name:<span>{{ $shippingDetails->name}}</span></li>
                                            <li>Phone:<span>{{ $shippingDetails->phone}}</li>
                                        </ul>
                                        <ul class="booking-fee">
                                            <li>Address:<span>{{ $shippingDetails->address}}</span></li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Booking Summary -->

                <div class="card-body bg-white">

                    <!-- Checkout Form -->
                     <form method="post" name="paymentForm" id="paymentForm" action="{{url('/place-order')}}"> 
                                                 {!! csrf_field() !!}  
                             <?php $grand_total = $total_amount;?>
                             
                          <input type="text" value="{{ $grand_total }}" name="grand_total">    

                        <div class="payment-widget">
                            <h4 class="card-title">Payment Method</h4>

                            <!-- Credit Card Payment -->
                            <div class="payment-list">


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


                                <!-- Submit Section -->
                                <div class="submit-section mt-4">
                                     <button type="submit" class="btn btn-primary my-3" onclick="return selectPaymentMethod();">Confirm and Pay</button>

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

            </div>
        </div>

            



    <!-- Booking Summary -->

    <!-- /Page Content -->

    <!-- Footer -->
    <div class="footer"></div>


<script>
   function selectPaymentMethod(){
           if($('.paytm').is(':checked')){
            //   alert('checked');
           }else{
               
               alert('Please select payment ');
               return false;
           }
        }
</script>

    <!-- jQuery -->
    <script src="assets/js/jquery.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Fancybox JS -->
    <script src="assets/plugins/fancybox/jquery.fancybox.min.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>

</body>

</html>