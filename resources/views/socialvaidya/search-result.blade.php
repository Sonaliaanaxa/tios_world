@extends('socialvaidya.layouts.master')
@section('content')
  <style>
   

.visuallyhidden{
  position: absolute !important; clip: rect(1px 1px 1px 1px); clip: rect(1px, 1px, 1px, 1px);
}

.stars-outer {
  display: inline-block;
  position: relative;
  font-family: FontAwesome;
}

.stars-outer::before {
  content: "\f006 \f006 \f006 \f006 \f006";
}

.stars-inner {
  position: absolute;
  top: 0;
  left: 0;
  white-space: nowrap;
  overflow: hidden;
  width: 0;
}


.stars-inner::before {
  content: "\f005 \f005 \f005 \f005 \f005";
  color: #f8ce0b;
}

 </style>
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
                    <div class="col-md-8 col-12">
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{('/')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Search</li>
                            </ol>
                        </nav>
                        <h2 class="breadcrumb-title">2245 matches found for : Dentist In Bangalore</h2>
                    </div>
                    <div class="col-md-4 col-12 d-md-block d-none">
                        <div class="sort-by">
                            <span class="sort-title">Sort by</span>
                            <span class="sortby-fliter">
                  <select class="select">
                    <option>Select</option>
                    <option class="sorting">Rating</option>
                    <option class="sorting">Popular</option>
                    <option class="sorting">Latest</option>
                    <option class="sorting">Free</option>
                  </select>
                </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Breadcrumb -->

        <!-- Page Content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12 col-lg-4 col-xl-3 theiaStickySidebar">

                        

                    </div>

                    <div class="col-md-12 col-lg-8 col-xl-9">
<!-- Home Banner -->

  
      
    <!-- /Home Banner -->

    @foreach($doctor as $doc)
                    <div class="card">
                            <div class="card-body">
                                <div class="doctor-widget">
                                    <div class="doc-info-left">
                                        <div class="doctor-img">
                                            <a href="{{url('/doctor-profile/'.$doc->userid)}}">
                                                <img src="{{asset('public/uploads/doctors/'.$doc->doctor_image)}}" class="img-fluid" alt="User Image">
                                            </a>
                                        </div>
                                        <div class="doc-info-cont">
                                            <h4 class="doc-name"><a href="{{url('/doctor-profile/'.$doc->userid)}}">{{$doc->first_name}} {{$doc->last_name}}</a></h4>
                                            <!--<p class="doc-speciality"></p>-->
                                            <h5 class="doc-department">{{$doc->specialist}}</h5>
                                            
                                            <div class="rating">
                                                  
    <?php 
     $url= URL::current();
          
            $url_components = parse_url($url); 

            // parse_str($url_components['query'], $params); 
            
            $id = explode("/",end($url_components))[2];
   $review= DB::table('doctor_reviews')->where(['doctorID'=>$doc->userid])->get();
   $count= count($review);
   if($count==0)
   $count = 1;
       $sum= 0;
   foreach ($review as $key ) {
        

    $sum= $sum+$key->point;
}
   
    ?>
                          <h2 style="font-size:13px; color: orange;">Rating :
              
                 <?php 
                                 if($count>0){
                                    echo $sum/$count; 
                                 }else{
                                echo $sum;
                                }?>/5</h2>
                                
                                
                                
                                 <script>
                
                var ratings = {
                  hotel_a : '{{$sum/$count}}',
                };
                
                // total number of stars
                const starTotal = 5;
                
                for(var rating in ratings) {  
                  var starPercentage = (ratings[rating] / starTotal) * 100;
                  var starPercentageRounded = `${(Math.round(starPercentage / 10) * 10)}%`;
                  
                }document.querySelector(`.${rating} .stars-inner`).style.width = starPercentageRounded; 
            
                </script>
                                  
                                            </div>
                                            <div class="clinic-details">
                                                <p class="doc-location"><i class="fas fa-map-marker-alt"> </i> {{$doc->address}}</p>
                                                <ul class="clinic-gallery">
                                                    <li>
                                                        <a href="assets/img/features/feature-01.jpg" data-fancybox="gallery">
                                                            <img src="{{asset('public/uploads/doctors/'.$doc->clinic_image)}}" alt="Feature">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!--<div class="clinic-services">-->
                                            <!--    <span>Dental Fillings</span>-->
                                            <!--    <span> Whitneing</span>-->
                                            <!--</div>-->
                                        </div>
                                    </div>
                                    <div class="doc-info-right">
                                        <div class="clini-infos">
                                            <ul>
                                                <!--<li><i class="far fa-thumbs-up"></i> 98%</li>-->
                                                <li><i class="far fa-comment"></i> <?php $reviewCount = DB::table('doctor_reviews')->where(['doctorId'=>$doc->userid])->count(); echo $reviewCount ;?> Feedback</li>
                                                <li><i class="fas fa-map-marker-alt"></i>{{$doc->city}} {{$doc->state}}</li>
                                                <li><i class="far fa-money-bill-alt"></i> ₹&nbsp;{{$doc->price}} </li>
                                            </ul>
                                        </div>
                                        <div class="clinic-booking">
                                           
                                            <a class="view-pro-btn" href="{{url('/doctor-profile/'.$doc->userid)}}">View Profile</a>
                                         
                                            <a class="apt-btn" href="{{url('/doctor-booking/'.$doc->userid)}}">Book Appointment</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Doctor Widget -->

                        @endforeach

                       
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
    
    
    <!--Rating script-->
  
  
  
   
             
  
  <!--end Rating script-->
  

</body>


@endsection