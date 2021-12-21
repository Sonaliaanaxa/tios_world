@include("home.layouts.header")            

<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script>
        $(function() {
            $(".header").load("header.html");
            $(".footer").load("footer.html");
        });
    </script>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
           // alert(getCookie("showed"));
            if(getCookie("showed")!="1"){
            $("#exampleModalCenter").modal('show');
            setCookie('showed','1','1');
}
function getCookie(c_name)
{
   var c_value = document.cookie;
   var c_start = c_value.indexOf(" " + c_name + "=");
   if (c_start == -1)
   {
       c_start = c_value.indexOf(c_name + "=");
   }
   if (c_start == -1)
   {
       c_value = null;
   }
   else
   {
       c_start = c_value.indexOf("=", c_start) + 1;
       var c_end = c_value.indexOf(";", c_start);
       if (c_end == -1)
       {
         c_end = c_value.length;
       }
       c_value = unescape(c_value.substring(c_start,c_end));
    }
    return c_value;
}

function setCookie(c_name,value,exdays)
{
   var exdate=new Date();
    exdate.setDate(exdate.getDate() + exdays);
    var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
    document.cookie=c_name + "=" + c_value;
}
            
            
            
        });
    </script>

    <!--Jquery End-->


<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <div class="header"></div>
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">{{ getHomenotification()->title }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                   
                    <a href="{{getHomenotification()->link}}">  <img src="{{ asset('public/uploads/homenotifications') }}/{{ getHomenotification()->img }}" alt="offers" width="100%" /></a>
                </div>


            </div>
        </div>
    </div>


    <!-- Home Banner -->
    <section class="section section-search">
        <div class="container-fluid search-top" style="
              padding: 40px 30px;
                width: 80%;
                margin-top: 18px;
                border: 1px solid #09dca45e;
                background-color: rgba(44, 130, 201, 0.2)">
            <div class="banner-wrapper">
                <div class="banner-header text-center">
                    <h1>Search Doctor, Make an Appointment</h1>
                    <p>Discover the best doctors, clinic & hospital the city nearest to you.</p>
                </div>



<!-- Search -->
   <div class="search-box">
        <div class="row  justify-content-center" >
       <div class="col-md-12 text-center" >
               <form action="{{route('searched.dochosdig.keyword')}}" method="post" style='padding:0px; display: flex; justify-content:center;'> 
			         @csrf
              <div class="col-md-7">
                        <div class="form-group search" >
                        <div class="form-group top-add-search">
                            <input class="form-control"  required name="searched" id="searched" type="text" placeholder="search as Keyword"  autocomplete="off"  aria-required="true"/>
                            </div>
                         
                        </div>
                        </div>
                        <div class="col-md-2 ">
                        <button type="submit" class="btn btn-primary search-btn top-search-btton" style=" margin-left: -103px;" ><i class="fas fa-search"></i> <span>Search</span></button>
                        </div>
                    </form>
                    
                    </div> 
                    </div>
            
                    <br>
                       <div class="row d-flex justify-content-center">
   <form action="{{route('searched.dochosdig.location')}}" method="post" style='padding:0px;'> 
			         @csrf
                        <div class="form-group search-location">
                        <div class="form-group">
                            <input class="form-control" id="search-b"  name="location" type="text" placeholder="Search Location" autocomplete="off"  aria-required="true"/>
                        </div>
                      
                        <span class="form-text">Based on your Location</span>
                        <div id="suggesstion"></div>
                        </div>
                        <div class="form-group search-info">
                        <div class="form-group">
                                                    <select  class="form-control " id="hospital_name" name="dochos"  >
                                                    <option value=''style="color:black;">Select Doctor,Hospital</option>
                                                        <option value="doctor">Doctor</option>
                                                        <option value="diagonostics">Diagonostics</option>
                                                        <option value="hospital">Hospital</option>
                                                    </select>
                                                    </div>
                                            <span class="form-text">Ex : Doctor,Hospital,etc.</span>
                                            <div id="suggesstions"></div>                           
                        </div>

                        <div class="form-group search-doc" style="width: 100%;">
                        <div class="form-group">
                            <input class="form-control" name="specialit" id="speciality" type="text" placeholder="Speciality"  autocomplete="off"  aria-required="true"/>
                            </div>
                            <span class="form-text">Ex : Surgical Gastroenterology.</span>
                             <div id="suggesstionss"></div> 
                        </div>
                        <button type="submit" class="btn btn-primary search-btn"><i class="fas fa-search"></i> <span>Search</span></button>
                    </form>
                </div>
                <!-- /Search -->



               

            </div>
        </div>
        </div></div>
    </section>
    <!-- /Home Banner -->


    <section class="section home-tile-section">

        <div class="section-header text-center">
            <h2>What are you looking for?</h2>
        </div>
        <div class="container">

            <div class="col-md-12">
                <div class="doctor-slider slider">

                    <!-- Doctor Widget -->
                    @foreach(getBusinessPartners4() as $r)
                    <div class="col-md-12 mb-3">
                        <div class="card text-center doctor-book-card">
                        @if($r->img)
                        <a href="#" target='_blank'> <img src="{{ asset('public/uploads/businesspartners') }}/{{ $r->img }}" style='height:150px;width:200px;'/></a>
                        @else
                            <p class='text-center' style='padding-top:15px;height:100px;width:140px;border-radius:50%; background-color:#0099cc;color:white;font-size:26px;'>
                              {{ substr($r->name,0,1) }}
                            </p>
                      @endif
                            
                            <div class="doctor-book-card-content tile-card-content-1">
                                <div>
                                    <h3 class="card-title mb-0">{{$r->name}}</h3>

           <a href="{{$r->link}}" class="btn book-btn1 px-3 py-2 mt-3" tabindex="0">Book Now</a>
           

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                   
                </div>
            </div>
        </div>

    </section>

    <!-- Clinic and Specialities -->
    <section class="section section-specialities">
        <div class="container-fluid">
            <div class="section-header text-center">
                <h2>Specialities</h2>
                <p class="sub-title">When a person has a medical concern, they may turn to a doctor for help. There are many types of doctor, and a person’s specific concern will usually determine the type of doctor they choose.</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <!-- Slider -->
                    <div class="specialities-slider slider">

                    @foreach(getSpecialities() as $r)
                        <!-- Slider Item -->
                       
                        <div class="speicality-item text-center">
                            <a href="{{route('specelists',$r->name)}}">
                            <div class="speicality-img">
                            @if($r->img)
                              <img src="{{ asset('public/uploads/specialities') }}/{{ $r->img }}" class="img-fluid" alt="Speciality" />
                            @else
                                <p class='text-center' style='padding-top:15px;height:100px;width:140px;border-radius:50%; background-color:#0099cc;color:white;font-size:26px;'>
                                  {{ substr($r->name,0,1) }}
                                </p>
                            @endif

                                <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                            </div>
                            <p>{{$r->name}}</p>
                            </a>
                        </div>
                        <!-- /Slider Item -->
                        @endforeach


                    </div>
                    <!-- /Slider -->

                </div>
            </div>
        </div>
    </section>
    <!-- Clinic and Specialities -->
                    <style>

.doc-img {
   
    min-width: 200px;
    min-height: 200px;
}
                            
                        </style>
    <!-- Popular Section -->
    <section class="section section-doctor">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="section-header ">
                        <h2>Book Our Doctor</h2>
                        <p>MedTo is one of the best online Service Result.</p>
                    </div>
                    <div class="about-content">
                    <p>Search Online Doctor Us, Top Results From Trusted Resources. Search Online Doctor Us, Get Expert Advice and Curated Content on Searchley. Find All Info You Want. 100+ Unique Results. Quick Answers. Find in Seconds. Explore the Best Info Now.</p>
                     
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="doctor-slider slider">
    

                        <!-- Doctor Widget -->

<?php 

foreach($favdoctor as $row){
    $userid = $row->id;

 ?> 
                        <div class="profile-widget">
                            <div class="doc-img">
                                <a href="{{route('doctor.profile',$row->id)}}">


<?php

if($row->img!=''){

?>

        <img class="img-fluid" alt="User Image" src="{{ asset('public/uploads/profile_img') }}/{{ $row->img }}" id="imgs">

                                                                        <?php
}else{
?>

                <img class="img-fluid" alt="User Image" src="public/uploads/doctors/dummy.jpg" id="imgs">
<?php
}
?>

                                </a>
                               <!-- <a href="javascript:void(0)" class="fav-btn">
                                    <i class="far fa-bookmark"></i>
                                </a>-->
                            </div>
                            <div class="pro-content">
                                <h3 class="title">
                                    <a href="{{route('doctor.profile',$row->id)}}">{{ $row->name}}</a>
                                    <i class="fas fa-check-circle verified"></i>
                                </h3>
                                <!-- <p class="speciality">{{$row->degree}} - {{$row->college}}, {{$row->degree}} - {{$row->college2}}, {{$row->degree3}} - {{$row->college3}}</p> -->
                                <div class="rating">
        <?php 
     $url= URL::current();
          
            $url_components = parse_url($url); 

            // parse_str($url_components['query'], $params); 
            
            //$id = explode("/",end($url_components))[2];
   $review= DB::table('doctor_reviews')->where(['doctorId'=>$userid])->get();
   $count = count($review);
   if($count==0)
   $count = 1;
       $sum= 0;
   foreach ($review as $key ) {
        

    $sum= $sum+$key->point;
    $point =$key->point;
}
   
    ?>

                <?php   
                                 $x=1;
                                                                
$y = 5-$point; 
                 while($x <= $point) {
                   
                            
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
                                    <span class="d-inline-block average-rating">({{$sum}})</span>
                                </div>
                                <ul class="available-info">
                                    <li>
                                        <i class="fas fa-map-marker-alt"></i> {{$row->address}}
                                    </li>
                                    <li>
                                        <i class="far fa-clock"></i> Available on Fri, 22 Mar
                                    </li>
                                    <li>
                                        <i class="far fa-money-bill-alt"></i> ₹&nbsp;{{$row->price}}
                                        <i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
                                    </li>
                                </ul>
                                <div class="row row-sm">
                                    
                                                            @if (Auth::check())
   
                                    <div class="col-6">
                                        <a href="{{route('doctor.profile',$row->id)}}" class="btn view-btn">View Profile</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="{{url('/doctor-bookings/'.$row->id)}}" class="btn book-btn">Book Now</a>
                                    </div>
          
@else
   
                                    <div class="col-6">
                                        <a href="" class="btn view-btn" data-toggle="modal" data-target="#exampleModal">View Profile</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="" class="btn book-btn" data-toggle="modal" data-target="#exampleModal">Book Now</a>
                                    </div>

@endif
                                    
                                    
                                    
                                 
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
    </section>
    <!-- /Popular Section -->


    <section class="section home-tile-section">

        <div class="section-header text-center">
            <h2>Features Products</h2>
        </div>
        <div class="container-fluid">

            <div class="col-md-12">
                <div class="our-products-slider doctor-slider slider">

                    <!-- Doctor Widget -->
                    @foreach(getCategory() as $r)
                    <div class="col-md-12 mb-3">
                        <div class="card text-center Products-card doctor-book-card">
                             <a href="{{route('products',$r->id)}}"><img src="{{ asset('public/uploads/categories') }}/{{ $r->img }}" style='height:200px;width:200px;' alt="" class="img-fluid"></a>
                            <div class="product-content doctor-book-card-content tile-card-content-1">
                                <div>
                                    <h3 class="card-title mb-0"> <a href="{{route('products',$r->id)}}" style="color:white;">{{$r->name}}</h3></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach
                  
                </div>
            </div>
        </div>

    </section>
    <!-- /Availabe Features -->

    <!-- Blog Section -->
    <style>
        
         #imgss {
  width: auto;
  height: auto;
  max-height:200px;
     display:block;
    margin:auto;


}
#oe #iu {
   
    min-width: 200px;
    min-height: 180px;
}
.blog-content{
    height:150px;
}
    </style>
    
    <!-- Blog Section -->
    <section class="section section-blogs">
        <div class="container-fluid">

            <!-- Section Header -->
            <div class="section-header text-center">
                <h2>Blogs and News</h2>
              
            </div>
            <!-- /Section Header -->

            <div class="row blog-grid-row">
                @foreach($blogs as $blog)
                <div class="col-md-6 col-lg-3 col-sm-12">

                    <!-- Blog Post -->
                    <div class="blog grid-blog" id="oe">
                        <div class="blog-image" id="iu">
                            <a href="{{url('/blog-details/'.$blog->id)}}">
                                <img class="img-fluid" src="{{asset('public/uploads/blog/'.$blog->image)}}" alt="Post Image" id="imgss"  style="height:200px;width:100%;">


                            </a>
                        </div>
                        <div class="blog-content">
                            <ul class="entry-meta meta-item">
                                <li>
                                    <div class="post-author">
                                        <a href="{{url('/blog-details/'.$blog->id)}}"><img src="{{ asset('public/material/home') }}/img/doctors/doctor-thumb-01.jpg" alt="Post Author"> <span>{{ ucfirst(trans($blog->user_name))}}</span></a>
                                    </div>
                                </li>
                                <li><i class="far fa-clock"></i> &nbsp;{{date('d-m-Y', strtotime($blog->date))}}</li>
                            </ul>
                            <h3 class="blog-title"><a href="{{url('/blog-details/'.$blog->id)}}">
                             
                                <?php echo substr($blog->blog_title,0,44);?>...
                                </a></h3>
                            <!-- <p class="mb-0">{{$blog->descriptions}}</p> -->
                        </div>
                    </div>
                    <!-- /Blog Post -->

                </div>
                @endforeach
               
            </div>
            <div class="view-all text-center">
     
                <a href="{{route('blogs')}}" class="btn btn-primary">View All</a>
          
            </div>
        </div>
    </section>
    <!-- /Blog Section -->






    <!-- Footer -->
    <div class="footer"></div>


    </div>
    <!-- /Main Wrapper -->

 



</body></html>



<script>
  	if($('.our-products-slider').length > 0) {
		$('.our-products-slider').slick({
			dots: false,
			autoplay:true,
			infinite: true,
			variableWidth: true,
		});
	}
</script>









<style>
#suggesstions #country-list { width: 100%!important;
    position: absolute;
    top: 48px;
    max-height: 170px !important;
    overflow: auto !important;
    z-index: 99;
    margin-top: 0px!important; }
#country-list{float:left;list-style:none;margin-top:-3px;padding:0;}
#country-list li{padding: 10px; background: #ffffff; border-bottom: #bbb9b9 1px solid;}
#country-list li:hover{background:#ece3d2;cursor: pointer;}
#search-box{padding: 10px;border: #a8d4b1 1px solid;border-radius:4px;}



</style>    


   


@include("home.layouts.footer")
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
           // $("#search-b").css("background","#FFF");
         
                        }
                    })


    });
});


function selectCountry(val) {
$("#search-b").val(val);
$("#suggesstion").hide();
}


 
</script>

<script>

$(document).ready(function(){
    $("#hospital_name").keyup(function(){
         var quer = $(this).val();
         var que = $('#search-b').val();

          $.ajax({
                        url:"{{ route('hospitalname') }}",
                        type:"get",
                       data: {
           
               keywords:quer,
                key:que,
            },
                        success:function (data) {
             
                            //$("#suggesstion").html(data);



            $("#suggesstions").show();
            $("#suggesstions").html(data);
           // $("#hospital_name").css("background","#FFF");
         
                        }
                    })


    });
});


function selectCountrys(val) {
$("#hospital_name").val(val);
$("#suggesstions").hide();
}


 
</script>


<script>

$(document).ready(function(){
    $("#speciality").keyup(function(){
         var quer = $(this).val();
         var que = $('#search-b').val();
        var q = $('#hospital_name').val();
    
    
          $.ajax({
                        url:"{{ route('homespeciality') }}",
                        type:"get",
                       data: {
           
               keywords:quer,
                key:que,
                spe:q
            },
                        success:function (data) {
             
                            //$("#suggesstion").html(data);



            $("#suggesstionss").show();
            $("#suggesstionss").html(data);
         //   $("#speciality").css("background","#FFF");
         
                        }
                    })


    });
});


function selectCountryss(val) {
$("#speciality").val(val);
$("#suggesstionss").hide();
}


 
</script>


