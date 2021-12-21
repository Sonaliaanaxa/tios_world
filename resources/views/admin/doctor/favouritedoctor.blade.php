



@include("admin.layouts.sidebar")
@include("admin.layouts.app")



<link 
    rel="stylesheet"
    href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
    integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('public/material/admin') }}/assets2/css/style.css">
    <!-- Main Wrapper -->
    <div class="main-wrapper">

    
        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Review</h3>
                            <ul class="breadcrumb">
                               <!-- <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">Review</li>-->
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-sm-12">
                       

<div class="row row-grid">


<?php 

foreach($data as $row){
    

 ?>
                            <div class="col-md-6 col-lg-4 col-xl-3">
                                <div class="profile-widget">
                                    <div class="doc-img">
            <a href="{{url('/doctor-profile/'.$row->userid)}}">

<?php

if($row->doctor_image!=''){

?>

            <img class="img-fluid" alt="User Image" src="
{{ asset('public/uploads/profile_img') }}/{{$row->doctor_image}}
       ">

                                            <?php
}else{
?>


                <img class="img-fluid" alt="User Image" src="{{ asset('public/material/admin') }}/img/dummy.jpg">
<?php
}

                                            ?>
                                        </a>
                                      <!--  <a href="javascript:void(0)" class="fav-btn">
                                            <i class="far fa-bookmark"></i>
                                        </a>-->
                                    </div>
                                    <div class="pro-content">
                                        <h3 class="title">
                                    <a href="#">{{ $row->name}}</a>
                                            <i class="fas fa-check-circle verified"></i>
                                        </h3>
                                        <p class="speciality">{{$row->degree1}} - {{$row->college1}}, {{$row->degree2}} - {{$row->college2}}, {{$row->degree3}} - {{$row->college3}}</p>
                                        <div class="rating">

                                                           <?php  


        $review= DB::table('doctor_reviews')->where(['doctorID'=>$row->userid])->get(); 
        foreach($review as $r){
$r=$r->point;

        }
                                            $x=1;
                                                                
$y = 5-$r; 
                                         while($x <= $r) {
                            
                            
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

                                &nbsp;&nbsp;&nbsp;Rating : {{$r}}/5
                                      
                                        </div>
                                        <ul class="available-info">
                                            <li>
                                                <i class="fas fa-map-marker-alt"></i> {{$row->address}}
                                            </li>
                                            <li>
                                                <i class="far fa-clock"></i> Available on Fri, 22 Mar
                                            </li>
                                            <li>
                                                <i class="far fa-money-bill-alt"></i> ₹&nbsp;{{$row->price}} <i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
                                            </li>
                                        </ul>
                                        <div class="row row-sm">
                                            <div class="col-6">
<a href="{{url('/doctor-profile/'.$row->userid)}}" class="btn view-btn">View Profile</a>
                                            </div>
                                            <div class="col-6">
                                                <a href="{{url('/doctor-booking/'.$row->userid)}}" class="btn book-btn">Book Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <?php
}
                            ?>



                        </div>
                        

                    </div>
                </div>

            </div>
        </div>
        <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->
