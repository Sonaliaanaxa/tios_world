
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

@include("home.layouts.header") 

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
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
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
            <div class="content">
                <div class="container">
                
                    <div class="row">
                        <div class="col-12">
                        <?php
foreach($doctor as $row){
$fees=$row->price;
$address=$row->address;
$names=$row->name;
$userid = $row->id;
$img = $row->img;
$e = $row->email;

}

                        ?>
                      

              <?php 
     $url= URL::current();
          
            $url_components = parse_url($url); 

            // parse_str($url_components['query'], $params); 
            
            //$id = explode("/",end($url_components))[2];
  $review= DB::table('doctor_reviews')->where(['doctorId'=>$userid])->get();
   $count= count($review);
   if($count==0){
    $count = 1;
}
       $sum= 0;
   foreach ($review as $key ) {

    $sum = $sum+$key->point; 
$points =$key->point;

}


   if($count>1){
    $point =$points;
}else{
 $point=0;

}
   
    ?>
                            <div class="card">
                                <div class="card-body">
                                    
                                    <div class="booking-doc-info">
                                        
                                        <a href="{{url('/doctor-profile/'.$userid)}}" class="booking-doc-img">
                                            <img src="{{ asset('public/uploads')}}/profile_img/{{$img}}" alt="User Image">
                                        </a>
                                           

                                        <div class="booking-info">
                                            <h4><a href="{{url('/doctor-profile/'.$userid)}}">{{$names}}</a></h4>
                                            <div class="rating">

                            
        <?php 

               
                                 if($count>0){
                                   // echo $sum/$count; 
                                      $f = sprintf ("%.0f", $sum/$count);

                                 }else{
                             $f = sprintf ("%.0f", $sum);
echo " $f\n";
                               // echo $sum;
                                }?>                 

                <?php  
                

                                 $x=1;
                                                                
$y = 5- $f; 
                 while($x <=  $f) {
                   
                            
?>

                                <i class="fa fa-star" aria-hidden="true"style="color:#ffa500"></i>
                                    <?php
                           $x++;
}       
    $z=1;
    
 while($z <= $y) {
 
?>

<i class="fa fa-star" style="color:#dadada"></i>
<?php


           $z++;
}           
                        
                                                                    ?>

                                
                                                <span class="d-inline-block average-rating">


        <?php 

               
                                 if($count>0){
                                   // echo $sum/$count; 
                                      $f = sprintf ("%.0f", $sum/$count);
echo " $f\n";
                                 }else{
                             $f = sprintf ("%.0f", $sum);

                               // echo $sum;
                                }?>/5</h2>

                                                </span>
                                            </div>
                                            <p class="text-muted mb-0"><i class="fas fa-map-marker-alt"></i> {{$address}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>





                            <div class="row">
                                <div class="col-12 col-sm-4 col-md-6">
                                    <h4 class="mb-3">
                                        <script> document.write(new Date().toDateString()); </script>
                                    </h4>
                                </div>
                            </div>
                           
                                           
                            <div class="card ">
                            <!-- /Schedule Widget -->
                            <div class="card-body">
                                    <h4 class="card-title">Appointments Schedule Timings List</h4>
                                    <div class="profile-box">
                                    
                                    <div class="row">
                                    <div class="col-md-12">
                                    <div class="card schedule-widget mb-0">
                                        
                                        
                                        
                                        <div class="table-responsive">
                      <table class="table text-center" >
                    <thead class=" text-default" style='color:whitesmoke;'>
                    <th>
                         
                          @sortablelink('monday',__('Monday')) 
                      </th>
                      <th>
                      @sortablelink('Tuesday',__('Tuesday')) 
                    
                      </th>
                      <th>
                       @sortablelink('Wednesday',__('Wednesday'))  
                      </th>
                    
                      <th>
                       @sortablelink('Thursday',__('Thursday'))  
                      </th>
                     
                      <th>
                      @sortablelink('Friday',__('Friday')) 
                    
                      </th>
                     
                    
                      <th>
                      @sortablelink('Saturday',__('Saturday')) 
                    
                      </th>
                     <th>
                      @sortablelink('Sunday',__('Sunday')) 
                    
                      </th>
                    </thead>
                    <tbody id="myTable"> 
                   
                      
                    
                        <tr>
                        <td>
                         @foreach($monday as $mon)
                         
                           	<p class="timings-times">
									<span>{{$mon->start_time}} - {{$mon->end_time}}</span>
								</p> 
                          @endforeach
                             </td>
                   
                          <td>
                            @foreach($tuesday as $tue)  
                            	<p class="timings-times">
															<span>{{$tue->start_time}} - {{$tue->end_time}}</span>
														</p>
                         @endforeach
                            </td>
                        
                                
                          <td>
                       	 @foreach($wednesday as $wed)
							<p class="timings-times">
												<span> {{$wed->start_time}} - {{$wed->end_time}} </span>
											</p>
						 @endforeach
                            </td>
                             <td>
                       	 @foreach($thursday as $thu)
							<p class="timings-times">
												<span> {{$thu->start_time}} - {{$thu->end_time}} </span>
											</p>
						 @endforeach
                            </td>
                                <td>
                       	 @foreach($friday as $fri)
							<p class="timings-times">
												<span> {{$fri->start_time}} - {{$fri->end_time}} </span>
											</p>
						 @endforeach
                            </td>
                                <td>
                       	 @foreach($saturday as $sat)
							<p class="timings-times">
												<span> {{$sat->start_time}} - {{$sat->end_time}} </span>
											</p>
						 @endforeach
                            </td>
                                <td>
                       	 @foreach($sunday as $sun)
							<p class="timings-times">
												<span> {{$sun->start_time}} - {{$sun->end_time}} </span>
											</p>
						 @endforeach
                            </td>
                    
                     
                        
                        </tr>
                   
                    </tbody>
                  </table>
                </div>
                        </div>
                         </div>
                          </div>
                           </div>
                            </div>
                                        
                               </div>         
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        	 
                            <!-- Schedule Widget -->
                            <div class="card booking-schedule schedule-widget">
                            <!-- /Schedule Widget -->
                            <div class="card-body">
                                    <h4 class="card-title">Choice Schedule Timings With Date</h4>
                                    <div class="profile-box">
                                    
                                    <div class="row">
                                    <div class="col-md-12">
                                    <div class="card schedule-widget mb-0">
                                    
                                        <!-- Schedule Header -->
                                        <div class="schedule-header">
                                        
                                            <!-- Schedule Nav -->
                                            <!---<div class="schedule-nav">
                                                <ul class="nav nav-tabs nav-justified">
                                                    @foreach($schedule as $sc)
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#{{$sc->weekday}}">{{$sc->weekday}}</a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>-->

                                            <div class="schedule-nav">
                                   
    <form action="{{route('scheduletimes_dayfront')}}" id="update_date" method="post">  
    @csrf
                                                <table>
                                                    <tr>
                                                                                                            <?php
$ds=date("Y-m-d");
?>
                  
                               <td> <input class="form-control" name="appointment_date" id="appointment_date" type="date"  min="<?php echo $ds; ?>"></td>
                                 <td> <button class="btn btn-primary submit-btn" type="submit" value="Get Time Schedule">Get</button></td>
                                  </tr>
                                  </table>
                                </form>
<!-- <ul class="nav nav-tabs nav-justified">
    <li class="nav-item">
<a class="nav-link" data-toggle="tab" href="#slot_sunday"onclick="return change_statusun('sunday');" id="status_sunnday">Sunday</a>
                             </li>
                 <li class="nav-item">
         <a class="nav-link active" data-toggle="tab" href="#slot_monday"onclick="return change_statumon('monday');" id="status_monday">Monday</a>
                                                                    </li>
                             <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#slot_tuesday"onclick="return change_statusun('tuesday');" id="status_tuesday">Tuesday</a>
                                                                    </li>
                         <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#slot_wednesday"onclick="return change_statusun('Wednesday');" id="status_tuesday">Wednesday</a>
                                                                    </li>
                         <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#slot_thursday"onclick="return change_statusun('thursday');" id="status_thursday">Thursday</a>
                                                                    </li>
             <li class="nav-item">
             <a class="nav-link" data-toggle="tab" href="#slot_friday"onclick="return change_statusun('friday');" id="status_friday">Friday</a>
                                                                    </li>
            <li class="nav-item">
<a class="nav-link" data-toggle="tab" href="#slot_saturday"onclick="return change_statusun('saturday');" id="status_saturday">Saturday</a>
                                                                    </li>
                                                                </ul>-->
                                                            </div>
                                            <!-- /Schedule Nav -->
                                            
                                        </div>
                                        <!-- /Schedule Header -->
                                        
                                        <!-- Schedule Content -->
                                        <div class="tab-content schedule-cont">
        
                      <?php //$or=  "ORDS" . rand(10000,99999999);
                      ?>   
                      
                    
                <form method="post" id="update_service" action="{{route('booktime')}}"  enctype="multipart/form-data">
                                         @csrf
                             <div id="content"></div>


                            <!-- <input id="ORDER_ID" tabindex="1" maxlength="20" size="20"
                        name="ORDER_ID" autocomplete="off"
                        value=""type="hidden">
                        <input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="CUST001"type="hidden">
                        <input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail"type="hidden">
                        <input id="CHANNEL_ID" tabindex="4" maxlength="12"
                        size="12" name="CHANNEL_ID" autocomplete="off" value="WEB"type="hidden">
                        <input title="TXN_AMOUNT" tabindex="10"
                        type="text" name="TXN_AMOUNT"
                        value="1"type="hidden">-->
<br> 
                                            <div id="" class="tab-pane fade">
                                                <h4 class="card-title d-flex justify-content-between">
                                                    <span>Time Slots</span> 

                                                                                                                <br>
    

                                                </h4>
                                    
                                    
                                    
                                        <!-- Slot List -->
                                        <div class="doc-times">
                                            <div class="doc-slot-list">
                                            
                                            </div>
                                        </div>
                                        <!-- /Slot List --> 
                                        
                                    
                                            </div>
                                
                                            
                                    
                                            
                                    
                                        </div>
                                        <!-- /Schedule Content -->
                            
                                                
                                        </div>
                                    </div>
                                </div>
                        
                                <!-- /Schedule Content -->
                                
                            </div>
                            
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            <!-- Submit Section -->
                             

                         <div class="content">
            <div class="container">

                <div class="row">
                    <div class="col-md-7 col-lg-8">
                        <div class="card">
                            <div class="card-body">
<input type="hidden" value="{{ request()->id }}  " name="doctorId">

                                    <!-- Personal Information -->
                                    <div class="info-widget">
                                        <h4 class="card-title">Personal Information </h4>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group card-label">
                                                    <label>Patient Name</label>
                                                    <input class="form-control" type="text" name="name" id="name" >
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group card-label">
                                                    <label>Email</label>
                                                    <input class="form-control" type="email" id="email" name="email">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group card-label">
                                                    <label>Phone</label>
                                                    <input class="form-control" type="text" id="phone" name="phone">
                                                </div>
                                            </div>
                                            
                                            
                                           <!-- <div class="col-md-6 col-sm-12">
                                                <div class="form-group card-label">
                                                    <label>Date</label>
  
              <input class="form-control" name="appointment_date" id="appointment_date" type="date"  min="">
<!--<input type="date" min="2017-08-15" max="2018-08-26" step="7">
                                            
                                                </div>
                                            </div>-->
                                            
                                             <!--<div class="col-md-6 col-sm-12">
                                                <div class="form-group card-label">
                                                    <label>Day</label>
                                          <input type="text" id="day" name="day" value="" readonly>
                                                      </div>
                                        </div>-->
                                        
                                         <!--<div class="col-md-6 col-sm-12">
                                                <div class="form-group card-label">
                                                    <label>Time Slot</label>
                                            <select class="form-control" name="timeslot">
                                                        <option >-</option>
                                                        <option value="Time" selected>09:00AM To 11:00AM</option>
                                                        <option>09:00AM To 11:00AM</option>  
                                                        <option>09:00AM To 11:00AM</option>
                                                        
                                                    </select>
                                                      </div>
                                        </div>-->
                                        
                                        
                                        <div class="col-md-6 col-sm-12">
                                                <div class="form-group card-label">
                                                    <label>Doctor Fees</label>
                 <input class="form-control" type="text" name="price" value="{{$fees}}" readonly>
                                                </div>
                                            </div>

                   <!-- <div class="col-md-6 col-sm-12">
                <div class="form-group card-label">
         <label>Select Payment Method</label>
         <div class="col-md-6 col-sm-12">       
<input type="radio" name="m"id="showss" value="1" style="width:20px">Pay Online
</div>
<div class="col-md-6 col-sm-12">  
<input type="radio"name="m" id="hidess" value="0" style="width:20px">Pay later 
</div>
<!--<select>
<option id="hidess">Pay Online</option>
<option id="showss">Pay Offline</option>
    </select>--

                                                </div>
                                            </div>-->
                                        
                                        
                                            
                                             <div class="col-md-12 col-sm-12">
                                                <div class="form-group card-label">
                                                    <label>Address</label>
                                                    <input class="form-control" name="address" type="text">
                                                </div>
                                            </div>
                                                                                         <div class="col-md-12 col-sm-12">
                                                <div class="form-group card-label">
                                                    <label>Comment</label>
                                                    <input class="form-control" name="comment" type="text">
                                                </div>
                                            </div>
        
                                    
                                        </div>
                                           </div>

        <input name="do_email" type="hidden" value="<?php echo $e ?>">
                                   
                                    <!-- /Personal Information -->

                                        <!-- Submit Section -->
                                        <div class="submit-section mt-4">
                                          <input type="submit" name="form_submit"  class="btn btn-primary submit-btn" value="Submit" id="ps">
                                        </div>
                                        <!-- /Submit Section -->

                          


                                   </form>    
                                <!-- /Checkout Form -->
<div id="su" style="color:green"></div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-5 col-lg-4 theiaStickySidebar">

                        <!-- Booking Summary -->
                        <div class="card booking-card">
                            <div class="card-header">
                                <h4 class="card-title">Booking Summary</h4>
                            </div>
                            <div class="card-body">

                                <!-- Booking Doctor Info -->
                                <div class="booking-doc-info">
                                    <a href="{{url('/doctor-profile/'.$userid)}}" class="booking-doc-img">
 <img src="{{ asset('public/uploads')}}/profile_img/{{$img}}" alt="User Image">
                                    </a>
                                    <div class="booking-info">
                                        <h4><a href="{{url('/doctor-profile/'.$userid)}}">Dr. {{$names}}</a></h4>
                                        <div class="rating">


        <?php 

               
                                 if($count>0){
                                   // echo $sum/$count; 
                                      $f = sprintf ("%.0f", $sum/$count);

                                 }else{
                             $f = sprintf ("%.0f", $sum);
                               // echo $sum;
                                }?> 
                <?php   
                                 $x=1;
                                                                
$y = 5-$f; 
                 while($x <= $f) {
                   
                            
?>

    <i class="fa fa-star" aria-hidden="true"style="color:#ffa500"></i>
                                    <?php
                           $x++;
}       
    $z=1;
    
 while($z <= $y) {
 
?>

<i class="fa fa-star" style="color:#dadada"></i>
<?php


           $z++;
}           
                        
                                                                    ?>

                                
             


                                            <!--<i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star"></i>-->
                                            <span class="d-inline-block average-rating">
                                                
<?php
                                 if($count>0){
                                   // echo $sum/$count; 
                                      $f = sprintf ("%.0f", $sum/$count);
echo " $f\n";
                                 }else{
                             $f = sprintf ("%.0f", $sum);

                               // echo $sum;
                                }?>/5
                                

                                            </span>
                                        </div>
                                        <div class="clinic-details">
                                            <p class="doc-location"><i class="fas fa-map-marker-alt"></i> {{$address}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Booking Doctor Info -->
                           <?php
                            
$f= (int)$fees + 10;

                                                    ?>

                                <div class="booking-summary">
                                    <div class="booking-item-wrap">
                <form method="post" id="ss" action="https://medto.in/paytm/PaytmKit/TxnTest.php">
                                        <div id="suggesstion"></div>
                                        <!--<ul class="booking-date">
                                            <li>Date <span>16 Nov 2019</span></li>
                                            <li>Time <span>10:00 AM</span></li>
                                        </ul>-->
                                        <ul class="booking-fee">
                                            <li>Consulting Fee <span>₹&nbsp;{{$fees}}</span></li>
                                            <!-- <li>Booking Fee <span>₹&nbsp;10</span></li> -->
                                        </ul>
                                        <div class="booking-total">
                                            <ul class="booking-total-list">
                                                <li>
                                                    </li>
                                                   
                                                    <span>Total</span>
                                                    <span class="total-cost" style="float:right">₹&nbsp; {{$fees}}</span>
                                                </li>
                                            </ul>
                                                 <br>
                                          
                                               <input class="form-control" type="hidden" name="price" value="{{$fees}}" readonly>
                                             <input type="submit" name="form_submit" class="btn btn-primary submit-btn" value="Pay Now" id="pp"> 
                                            </form>
<style>
#pp{
    display:none;
}
</style>

    <script>
$(document).ready(function(){
  $("#hidess").click(function(){
    $("#pp").hide();

  });
  $("#showss").click(function(){
    $("#pp").show();
  });
});
</script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Booking Summary -->

                   
        </div>
                            <!-- /Submit Section -->
                            
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


        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.2.8/jquery.form-validator.min.js"></script>



 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    
    <script>
        function change_statusun(id){
    
$("#content").hide();
      if("<?php echo Auth::user()->user_type ?>" != "patient"){
        alert("This is not patient account");
      }
        else{
            var chk= $("#status_"+id).is(":checked"); 
            var id = id.replace('status','');
            var value=1;
            /*if(chk==true){
                value = 1;

            }  */ 
            
            $.ajax({
            url: "{{route('scheduletimes_dayfront')}}",
            type: 'POST',//dataType: 'json',
            data:{
           "_token": "{{ csrf_token() }}",
                weekday: id, 
                doctorid: {{ request()->id }},
            
            },
            success: function(msg) {
$("#content").html(msg);
         $("#content").show();    
            
             } 
            }) 

}

        }




        </script>


    <script>
        function change_statumon(id){
             if("<?php echo Auth::user()->user_type ?>"!="patient"){
        alert("This is not patient account");
      }
        else{
            var chk= $("#status_"+id).is(":checked"); 
            var id = id.replace('status','');
            var value=1;
            $.ajax({
            url: "{{route('scheduletimes_dayfront')}}",
            type: 'POST',//dataType: 'json',
            data:{
           "_token": "{{ csrf_token() }}",
                weekday: id, 
                doctorid: {{ request()->id }}
            
            },
            success: function(msg) {

         $("#content").html(msg);
        $("#content").show();
            
             } 
            })           
        }
    }
        </script>
        <!-- /Page Content -->







 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>




  <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


   $('#update_date').submit(function(e) {
    
       e.preventDefault();
       
       
       
        if("<?php echo Auth::user()->user_type ?>" != "patient"){
        alert("This is not patient account");
      }
        else{
date = $('#appointment_date').val();



if(date==''){

   alert("Please select date");
}else{

       let formData = new FormData(this);
       $('#image-input-error').text('');

       $.ajax({
          type:'POST',
          url: "{{route('scheduletimes_dayfront')}}",
            data:{
           "_token": "{{ csrf_token() }}",
                appointment_date: date, 
                doctorid: {{ request()->id }}
            
            },
          
        success: function(msg) {
         $("#content").html(msg);
        $("#content").show();
            
             } ,
           error: function(response){
              console.log(response);
                $('#image-input-error').text(response.responseJSON.errors.file);
           }
       });
}
}
  });

</script>


 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>




  <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


   $('#update_service').submit(function(e) {
    
       e.preventDefault();
//alert("ok");

name = $('#name').val();
time = $('#time').val();

email = $('email').val();
phone = $('#phone').val();
address = $('#address').val();

   var radioValue = $("input[name='m']:checked").val();
   var ge = $("input[name='time']:checked").val();
   
      var ge = $("input[name='time']:checked").val();
            if(!ge){
              alert("Please Select time slot.");  
            }else{
      

       let formData = new FormData(this);
       $('#image-input-error').text('');
       



       if(name==''|| email==''|| phone==''||time==''||address==''){

   alert("Field cannot be empty.");
}
else{
$("#ps").hide();
       $.ajax({
          type:'POST',
          url: "{{route('booktime')}}",
           data: formData,
           contentType: false,
           processData: false,
           success: (response) => {
             if (response) {
              // this.reset();
               
               alert('Appointment done successfully');
                $("#pp").show();
                 $("#ps").hide();
                  $("#su").html('<p>Please payment!</p>');
             }
             $("#suggesstion").html(response);
           },
           error: function(response){
               $("#ps").show();
              console.log(response);
                $('#image-input-error').text(response.responseJSON.errors.file);
           }
       });
   }
   
   }
  });

</script>




    </body>








    @include("home.layouts.footer")