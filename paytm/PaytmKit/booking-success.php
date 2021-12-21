<?php
$connect = mysqli_connect("127.0.0.1","socialvaidya", "Socialvaidya@123", "socialvaidya");

$sq = "SELECT id,purpose FROM book_appoint ORDER BY id DESC LIMIT 1";
$result = $connect->query($sq);

if ($result->num_rows > 0) {
 
  while($row = $result->fetch_assoc()) {
    $p=$row["purpose"];
    $ids=$row["id"];
  }
} 
$sql = "UPDATE book_appoint SET purpose='1' WHERE id=$ids";

 if($connect->query($sql)===TRUE){
  echo 'New record created successfully';
 }

$sql1 = "SELECT * FROM book_appoint where id=$ids ";
$result1 = $connect->query($sql1);

if ($result1->num_rows > 0) {
 
  while($row1 = $result1->fetch_assoc()) {
    $doctorid=$row1["doctorId"];
    $patientId = $row1["patientId"];
    $name= $row1["name"];
    $email= $row1["email"];
    $phone= $row1["phone"];
    $date= $row1["date"];
    $day= $row1["day"];
    $time= $row1["time"];
  }
}

$sql1 = "SELECT * FROM users where id='$doctorid' ";
$result1 = $connect->query($sql1);

if ($result1->num_rows > 0) {
 
  while($row1 = $result1->fetch_assoc()) {
    $doctorname=$row1["name"];
    $doctoremail=$row1["email"];
    $doctorphone=$row1["mobile"];
    $doctoraddress=$row1["address"];
    $doctorcity=$row1["city"];
    $doctorstate=$row1["state"];
    $doctorcountry=$row1["country"];
    $doctorzipcode=$row1["zipcode"];
    }
}
 $too="admin@medto.in";
   $to = $email;
         $subject = "Appointment Booking";
         
                // To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
 $url = 'http://medto.in/';        
         // Compose a simple HTML email message
$message = '<html><body>';
$message .='<center><p><img src="https://medto.in/public/uploads/logo/logo_1621938110.png" alt="Logo" style="height:70px;width:180px;"></p>';
$message .= '<i class="fas fa-check"></i><h3>Hey '.  $name  .' ,Your  Appointment  booked Successfully!</h3><p>This is a reminder message to inform you that yourAppointment booked with <strong>'.$doctorname.' </strong><br> on <strong>'.$day.' '.$date.' from ' .$time.'</strong> at <br> #'.$doctoraddress.',<br>'.$doctorcity.',<br>'.
$doctorstate.',<br'.$doctorcountry.'-'.$doctorzipcode.'</p><p>Please visit <a href="'.$url.'"> MedTo</a> if you want to reschedule the appointment. Thank you !</p>';
$message .= '</center></body></html>';
         
mail($to, $subject, $message, $headers);

mail($doctoremail, $subject, $message, $headers);

mail($too, $subject, $message, $headers);
       
       
       
    
  $message  = 'Hey '.  $name  .', this is a reminder message to inform you that your appointment is booked. Please visit '.$url.' if you want to reschedule the appointment. Thank you ! SOCIAL VAIDYA MEDICAL PRIVATE LIMITED';
  
  //$to   = $phone;


$url = "http://byebyesms.com/app/smsapi/index.php?key=36012AD7175995&campaign=10709&routeid=37&type=text&contacts=".$phone."&senderid=FIVEDU&msg=".urlencode($message)."&template_id=";
  // Send the request
  $output = file($url);





?>

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