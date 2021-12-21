@include("home.layouts.header")
  
<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">

      
        <!-- Page Content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    

                <div class="col-md-12 col-lg-4 col-xl-3 theiaStickySidebar">
<!-- Home Banner -->

      <!-- Search Filter -->
      <div class="card search-filter">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Search Filter</h4>
                            </div>
                            
                            <div class="card-body">
                                <div class="filter-widget">
                                    <form action="{{route('searched.dochosdig.loc')}}" method="post" style='padding:0px;'> 
                                        @csrf
                                        <div class="form-group ">
                                            <input type="text" id="search-b"  name="searched" class="form-control"  autocomplete="off" >
                                            <span class="form-text">Based on your Location</span>
                                            <div id="suggesstion"></div>
                                        </div>
                                    </form>
                                </div>
                                <div class="filter-widget">
                                    <form action="{{route('searched.dochosdig')}}" method="post" style='padding:0px;'> 
                                        @csrf
                                        <div class="form-group ">
                                            <input type="text" id="hospital_name" name="searched" class="form-control"  autocomplete="off">
                                             <span class="form-text">Search Doctors, Clinics, Hospitals</span>
                                             <div id="suggesstion"></div>
                                        </div>
                                    </form>
                                </div>
                                <div class="filter-widget">
                                    <form action="{{route('searched.dochosdig.speciality')}}" method="post" style='padding:0px;'> 
                                                        @csrf
                                        <div class="form-group ">
                                            <input type="text" id="hospital_name" name="searched" class="form-control"  autocomplete="off">
                                            <span class="form-text">Search Speciality</span>
                             
                                        </div>
                                  
                                    </form>
                                </div>
                                
                         
                                    <div class="filter-widget">
                                    <h4>Search :</h4>
                                    <div>
                                    <label class="custom_check">
                                        <!--<a href="{{route('doctor')}}"><input type="checkbox" name="select_specialist" ></a>-->
											<a href="{{route('doctor')}}">- Doctor</a>
										</label>
                                    </div>
                                    <br>
                                    <div>
                                    <label class="custom_check">
                                       <!-- <a href="{{route('doctors','hospital')}}"><input type="checkbox" name="select_specialist" ></a>-->
											<a href="{{route('doctors','hospital')}}">- Hospital</a>
										</label>
                                    </div>
                                    <br>
                                    <div>
                                    <label class="custom_check">
                                        <!---<a href="{{route('doctors','diagnostic')}}"><input type="checkbox" name="select_specialist" ></a>-->
											<a href="{{route('doctors','diagnostic')}}">- Diagonostic</a>
										</label>
                                    </div>
                                    <br>
                                    <div>
                                        <label class="custom_check">
                                      <!--  <a href="{{route('category')}}"><input type="checkbox" name="select_specialist" ></a>-->
											<a href="{{route('category')}}">- Medicine</a>
										</label>
                                    </div>
      
                                   
                                </div>
                            
                            </div>
                        </div>
                        <!-- /Search Filter -->

                    </div>
                    <div class="col-md-12 col-lg-8 col-xl-9">

    <!-- /Home Banner -->

    @foreach($doctor as $doc)
                    <div class="card my-3" >
                            <div class="card-body">
                                <div class="doctor-widget">
                                    <div class="doc-info-left">
                                        <div class="doctor-img">
                                            <a href="{{url('/doctor-profile/'.$doc->userid)}}">
                                                <?php 

if($doc->img){
                                                ?>
                                                
                                               
                                                <img src=" {{asset('public/uploads/profile_img/'.$doc->img)}}" class="img-fluid" alt="User Image">
<?php
}else{
?>
 <img src="{{asset('public/uploads/profile_img/dummy.jpg')}}" class="img-fluid" alt="User Image">
 <?php
}

 ?>

                                            </a>
                                        </div>
                                        <div class="doc-info-cont">
                                            <h4 class="doc-name"><a href="{{url('/doctor-profile/'.$doc->userid)}}">{{$doc->name}} </a></h4>
                                            <!--<p class="doc-speciality"></p>-->
                                            <h5 class="doc-department"><?php echo ucfirst($doc->specialization) ?></h5>
                                            
                                            <div class="rating">
                                                  
    
    <?php 
     $url= URL::current();
          
            $url_components = parse_url($url); 

            // parse_str($url_components['query'], $params); 
            
            $id = explode("/",end($url_components))[2];
   $review= DB::table('doctor_reviews')->where(['doctorID'=>$doc->id])->get();
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
                                    //echo $sum/$count;
                                $f = sprintf ("%.2f", $sum/$count);
echo " $f\n"; 
                                 }else{
                                //echo $sum;
                                $f = sprintf ("%.2f", $sum);
echo " $f\n";
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
                                                          <!--  <img src="{{asset('public/doctorprofile/uploads/clinic_img/'.$doc->clinic_image)}}" alt="Feature">-->
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
                                                <li><i class="far fa-money-bill-alt"></i> ₹&nbsp;{{$doc->price}} {{$doc->unit}} </li>
                                            </ul>
                                        </div>
                                        <div class="clinic-booking">
                                           
                                            <a class="view-pro-btn" href="{{url('/doctor-profile/'.$doc->id)}}">View Profile</a>
                                         

                                            <a class="apt-btn" href="{{url('/doctor-booking/'.$doc->id)}}">Book Appointment</a>

                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Doctor Widget -->

                        @endforeach

                          {!! $doctor->appends(request()->except('page'))->render() !!}
                    </div>
                    
                </div>

            </div>

        </div>
        <!-- /Page Content -->

     
    </div>
    <!-- /Main Wrapper -->
    
  
    

</body>


@include("home.layouts.footer")

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


<script>

$(document).ready(function(){
    $("#search-b").keyup(function(){
         var query = $(this).val();
         //alert('jk');
    
          $.ajax({
                        url:"{{ route('homesearchloc') }}",
                        type:"get",
                       data: {
           
               keyword:query
            },
                        success:function (data) {
             
                            //$("#suggesstion").html(data);



            $("#suggesstion").show();
            $("#suggesstion").html(data);
            $("#search-b").css("background","#FFF");
         
                        }
                    })


    });
});


function selectCountry(val) {
$("#search-b").val(val);
$("#suggesstion").hide();
}


 
</script>

