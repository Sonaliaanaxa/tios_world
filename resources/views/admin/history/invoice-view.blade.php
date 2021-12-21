
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Medto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <!-- Favicons -->
    <link href="{{ asset('public/material/home') }}/img/favicon.png" rel="icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('public/material/home') }}/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('public/material/home') }}/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="{{ asset('public/material/home') }}/plugins/fontawesome/css/all.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('public/material/home') }}/css/style.css">


    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
   

    <!--Jquery End-->
</head>

<body onload="window.print()" class="{{ $class ?? '' }}">
 <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Header -->
        <div class="header"></div>
        <!-- /Header -->



        <!-- Page Content -->
        <div class="content">
            <div class="container-fluid">

<?php

foreach($data as $row){


?>

                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="invoice-content">
                            <div class="invoice-item">
                                <div class="row">
                                    
        <div class="col-md-12" >
                        <div class="card-header" style="background-color:#fafafa;color:black;margin-bottom:30px;" >
                <h3 class="card-title" >
                {{ getWeb()->name}}
                <br><br>
                 <p style='font-size:14px;margin-top:-4px;'>Mobile :  {{ getWeb()->mobile}}</p>
                 <p style='font-size:14px;margin-top:-4px;'>Email:{{ getWeb()->email}}</p><br>
                 <p style='font-size:14px;margin-top:-28px;'>Website :  {{ getWeb()->url}}/</p>
                 
                <img src="{{ asset('public/uploads/logo') }}/{{ getWeb()->logo }}" style='height:60px;width:150px;margin-left:10px;box-shadow:0px 6px 10px whitesmoke;margin-top:-155px;' align='right' />
       <p style='font-size:14px;margin-top:0px;' align='right' >GST No. :  {{ getWeb()->gst}}</p>
                    <p style='font-size:14px;margin-top:0px;' align='right' >CIN No. :  {{ getWeb()->cin}}</p>
                   
                </h3>
            </div></div>
                    </div>       

                            <!-- Invoice Item -->
                            <div class="invoice-item" >
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="invoice-info">
                                            <strong class="customer-text">Invoice From</strong>
                                            <p class="invoice-details invoice-details-two">
                                                {{$row->name}} <br> {{$row->address}} <br>
                                                 
                          
                                            </p>
                                            
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                             <div class="invoice-info">
                                            <strong class="customer-text">Doctor Name</strong>
                                            <p class="invoice-details invoice-details-two">
                                                {{$row->name1}} <br> {{$row->address1}} <br>
                                                <span class="d-block text-info">[{{$row->day}} ,<?php echo date('d-m-Y', strtotime($row->date)); ?>,
                          {{ $row->time}} ]</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                             <p class="invoice-details">
                                            <strong>Order:</strong> #MED56{{$row->id}} <br>
                                            <strong>Booking Date:</strong> <?php echo date('d-m-Y', strtotime($row->date)); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- /Invoice Item -->

                            <!-- Invoice Item -->
                            <div class="invoice-item">
                                <div class="row">
                                    <div class="col-md-12">
                                      
                                </div>
                            </div>
                            <!-- /Invoice Item -->

                            <!-- Invoice Item -->
                            <div class="invoice-item invoice-table-wrap" style="margin-top:60px;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="invoice-table table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Description</th>
                                                       <!-- <th class="text-center">Quantity</th>-->
                                                        <th class="text-center">Appointment Fee</th>
                                                        <th class="text-right">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>General Consultation</td>
                                                       <!-- <td class="text-center">1</td>-->
    <td class="text-center">₹&nbsp;{{$row->fees}} </td>
 <td class="text-right">₹&nbsp;{{$row->fees}}</td>
                                                    </tr>
                        <!--<tr>
            <td>Video Call Booking</td>
                                                        <td class="text-center">1</td>
                                                        <td class="text-center">₹&nbsp;0</td>
                                                        <td class="text-right">₹&nbsp;250</td>
                                                    </tr>-->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-4 ml-auto">
                                        <div class="table-responsive">
                                            <table class="invoice-table-two table">
                                                <tbody>
                                                    <tr>
                                                        <th>Total:</th>
    <td><span>₹&nbsp;{{$row->fees}}</span></td>
                                                    </tr>
                                               <!--     <tr>
                    <th>Discount:</th>
                    <td><span>-10%</span></td>
                                                    </tr>-->
                                                    <!--<tr>
                    <th>Total Amount:</th>
                    <td><span>₹&nbsp;

                    </span></td>
                                                    </tr>-->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Invoice Item -->

            <!--<center>     <a href="#" onclick="window.print()" class="btn btn-primary view-inv-btn">Print</a></center>-->

                            <!-- Invoice Information --
                            <div class="other-info">
                                <h4>Other information</h4>
                                <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed dictum ligula, cursus blandit risus. Maecenas eget metus non tellus dignissim aliquam ut a ex. Maecenas sed vehicula dui, ac suscipit lacus. Sed finibus
                                    leo vitae lorem interdum, eu scelerisque tellus fermentum. Curabitur sit amet lacinia lorem. Nullam finibus pellentesque libero.</p>
                            </div>
                            <!-- /Invoice Information -->

                        </div>
                    </div>
                </div>

            </div>


            
    <?php

}
    ?>






        </div>
        <!-- /Page Content -->



    </div>

    <!-- /Main Wrapper -->

</body>
  <script>
$(document).ready(function(){
  window.print();
});
</script>
</html>