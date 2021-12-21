<?php

$connect = mysqli_connect("127.0.0.1","socialvaidya", "Socialvaidya@123", "socialvaidya");

$sq = "SELECT * FROM subscription_payments ORDER BY id DESC LIMIT 1";
$result = $connect->query($sq);

if ($result->num_rows > 0) {
 
  while($row = $result->fetch_assoc()) {
    $ids=$row["id"];
    $name=$row["u_name"];
    $email=$row["u_email"];
    $phone=$row["u_mobile"];
   
  }
} 


$sql = "UPDATE subscription_payments SET payment_status='completed' WHERE id=$ids";

 if($connect->query($sql)===TRUE){
  echo 'New record created successfully';
 }
 
 
 
 
 
//$do ="shailendra@aanaxagorasr.com";
   $too="admin@gmail.com";
   $to = $email;
         $subject = "Subscription confirmation";
         
                // To send HTML mail, the Content-type header must be set
 $headers = "From: admin@medto.in";
 
         
         
         // Compose a simple HTML email message
$message = '<html><body>';
$message .= '<p style="color:#080;font-size:18px;">Hi '.$name.'Thank you for subscribing to Medto. Get updates from medto that are most important to you. Let us know what types of 
updates you would like to receive</p>';
$message .= '</body></html>';
         
mail($to, $subject, $message, $headers);


mail($too, $subject, $message, $headers);


 
 
 
$api_key = '36012AD7175995';
$contacts = $phone;
$from = 'SVMEDT';
$sms_text = urlencode('Thank you for subscribing to social vaidya. Get updates from social vaidya that are most important to you. Let us know what types of updates you would like to receive. SOCIAL VAIDYA MEDICAL PRIVATE LIMITED');
$template_id = '1007107028802406228';

$api_url = "http://byebyesms.com/app/smsapi/index.php?key=".$api_key."&campaign=10709&routeid=37&type=text&contacts=".$contacts."&senderid=".$from."&msg=".$sms_text."&template_id=".$template_id;
//print_r($api_url);die;

                  $ch = curl_init();
                            // Set The Response Format to Json
                            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
                            // Disable SSL verification
                            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                            // Will return the response, if false it print the response
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            // Set the url
                            curl_setopt($ch, CURLOPT_URL, $api_url);
                            // Execute
                            $result = curl_exec($ch);
                        //echo"<pre>";print_r($result);
                            // Closing
                            curl_close($ch);



 
 



?>

<!DOCTYPE html>
   <script type="text/javascript">
        window.history.forward();
        function noBack() {
            window.history.forward();
        }
    </script>
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
    $(function(){
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
                                <li class="breadcrumb-item"><a href="http://medto.in/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Booking</li>
                            </ol>
                        </nav>
                        <h2 class="breadcrumb-title">Booking</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Breadcrumb -->

        <!-- Page Content -->
        <div class="content success-page-cont">
            <div class="container-fluid">

                <div class="row justify-content-center">
                    <div class="col-lg-6">

                        <!-- Success Card -->
                        <div class="card success-card">
                            <div class="card-body">
                                <div class="success-cont">
                                    <i class="fas fa-check"></i>
                                    <h3>Payment Done !</h3>
                                  <!--  <p>Appointment booked with <strong>
                                        
                                    </strong><br> on <strong>
                                    ?></strong></p>-->






                                    <a href="http://medto.in/" class="btn btn-primary view-inv-btn">Home</a>
                                </div>
                            </div>
                        </div>
                        <!-- /Success Card -->

                    </div>
                </div>

            </div>
        </div>
        <!-- /Page Content -->


        <!-- Footer -->
  <div class="footer"></div>
        <!-- /Footer -->

    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="assets/js/jquery.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>

</body>

</html>