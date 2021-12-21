<?php


	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");


if(isset($_POST['form_submit'])){

$price=$_POST['price'];
$date = $_POST['appointment_date'];
$phone = $_POST['phone'];
//$phone='9319442860';
$email = $_POST['email'];
$name = $_POST['name'];
$address = $_POST['address'];
$time = $_POST['time'];
$days = $_POST['days'];
$doctorId = $_POST['doctorId'];
//$user_type="patient";

$do_email = $_POST['do_email'];



}




$connect = mysqli_connect("127.0.0.1","socialvaidya", "Socialvaidya@123", "socialvaidya");

$sq = "SELECT id,purpose FROM book_appoint ORDER BY id DESC LIMIT 1";
$result = $connect->query($sq);

if ($result->num_rows > 0) {
 
  while($row = $result->fetch_assoc()) {
    $p=$row["purpose"];
    $ids=$row["id"];
  }
} 
/*
$sq1 = "SELECT name FROM book_appoint where id='$doctorId' ";
$result1 = $connect->query($sq1);

if ($result1->num_rows > 0) {
 
  while($row1 = $result1->fetch_assoc()) {
    $doctorname=$row1["name"];
  }
} 

if($p==0){
$price=$_POST['price'];
$id=$_POST['id'];

$sql = "UPDATE book_appoint SET purpose='1' WHERE id=$ids";

 if($connect->query($sql)===TRUE){
  echo 'New record created successfully';
 }
}


//$do ="shailendra@aanaxagorasr.com";
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
$message .= '<i class="fas fa-check"></i><h3>Hey '.  $name  .' ,Your  Appointment  booked Successfully!</h3><p>This is a reminder message to inform you that yourAppointment booked with <strong>'.$doctorname.' </strong><br> on <strong>'.$date.' from ' .$time.'</strong></p><p>Please visit <a href="'.$url.'"> MedTo</a> if you want to reschedule the appointment. Thank you !</p>';


$message .= '</center></body></html>';
         
mail($to, $subject, $message, $headers);

mail($do_email, $subject, $message, $headers);

mail($too, $subject, $message, $headers);
       
       
       
    
  $message  = 'Hey '.  $name  .', this is a reminder message to inform you that your appointment is booked. Please visit '.$url.' if you want to reschedule the appointment. Thank you ! SOCIAL VAIDYA MEDICAL PRIVATE LIMITED';
  
  //$to   = $phone;


$url = "http://byebyesms.com/app/smsapi/index.php?key=36012AD7175995&campaign=10709&routeid=37&type=text&contacts=".$phone."&senderid=FIVEDU&msg=".urlencode($message)."&template_id=";
  // Send the request
  $output = file($url);


*/

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Merchant Check Out Page</title>
<meta name="GENERATOR" content="Evrsoft First Page">
</head>
<body style="display:none;">
	<h1>Merchant Check Out Page</h1>
	<pre>
	</pre>
	<form method="post" action="pgRedirect.php" id="dateForm">
		<table border="1">
			<!-- <tbody> -->
				<tr>
					<th>S.No</th>
					<th>Label</th>
					<th>Value</th>
				</tr>
				<tr>
					<td>1</td>
					<td><label>ORDER_ID::*</label></td>
					<td><input id="ORDER_ID" tabindex="1" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off"
						value="<?php echo  "ORDS" . rand(10000,99999999)?>">
					</td>
				</tr>
				<tr>
					<td>2</td>
					<td><label>CUSTID ::*</label></td>
					<td><input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php echo $ids ?>"></td>
				</tr>
				<tr>
					<td>3</td>
					<td><label>INDUSTRY_TYPE_ID ::*</label></td>
					<td><input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail"></td>
				</tr>
				<tr>
					<td>4</td>
					<td><label>Channel ::*</label></td>
					<td><input id="CHANNEL_ID" tabindex="4" maxlength="12"
						size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
					</td>
				</tr>
				<tr>
					<td>5</td>
					<td><label>txnAmount*</label></td>
					<td><input title="TXN_AMOUNT" tabindex="10"
						type="text" name="TXN_AMOUNT"
						value="<?php echo $price ?>">
					</td>
				</tr>
				<tr>
					<td></td>
					<td></td>

<input type="hidden" value="<?php echo $price ?>" name="price">
<input type="hidden" value="<?php echo $date ?>" name="date">
<input type="hidden" value="<?php echo $phone ?>" name="phone">
<input type="hidden" value="<?php echo $email ?>" name="email">
<input type="hidden" value="<?php echo $name ?>" name="name">
<input type="hidden" value="<?php echo $address ?>" name="address">
<input type="hidden" value="<?php echo $time ?>" name="time">
<input type="hidden" value="<?php echo $days ?>" name="days">
<input type="hidden" value="<?php echo $doctorId ?>" name="doctorId">
<input type="hidden" value="<?php echo $do_email ?>" name="do_email">
<input type="hidden" value="<?php echo $ids ?>" name="rowid">

					<td><input value="Submit" type="submit"	onclick=""></td>
				</tr>


				<script type="text/javascript">
    document.getElementById('dateForm').submit(); // SUBMIT FORM
</script>
			</tbody>
		</table>
		* - Mandatory Fields
	</form>
</body>
</html>