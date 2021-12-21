@include("home.layouts.header")
   
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
 <style>

input {
  box-shadow: 0;
  outline: 0;
}
.range-slider {
  width: 206px;
  margin: auto;
  text-align: center;
  position: relative;
  height: 6em;
}
.range-slider svg,
.range-slider input[type=range] {
  position: absolute;
  left: 0;
  bottom: 0;
}
.range-slider input[type=number] {
  border: 1px solid #ddd;
  text-align: center;
  font-size: 1.6em;
  -moz-appearance: textfield;
    font-size: 16px;
width: 67px;
}
.range-slider input[type=number]::-webkit-outer-spin-button,
input[type=number]::-webkit-inner-spin-button {
  -webkit-appearance: none;
}
.range-slider input[type=number]:invalid,
.range-slider input[type=number]:out-of-range {
  border: 2px solid #ff6347;
}
.range-slider input[type=range] {
  -webkit-appearance: none;
  width: 100%;
}
.range-slider input[type=range]:focus {
  outline: none;
}
.range-slider input[type=range]:focus::-webkit-slider-runnable-track {
  background: #2497e3;
}
.range-slider input[type=range]:focus::-ms-fill-lower {
  background: #2497e3;
}
.range-slider input[type=range]:focus::-ms-fill-upper {
  background: #2497e3;
}
.range-slider input[type=range]::-webkit-slider-runnable-track {
  width: 100%;
  height: 5px;
  cursor: pointer;
  /* animate: 0.2s; */
  background: #2497e3;
  border-radius: 1px;
  box-shadow: none;
  border: 0;
}
.range-slider input[type=range]::-webkit-slider-thumb {
  z-index: 2;
  position: relative;
  box-shadow: 0px 0px 0px #000;
  border: 1px solid #2497e3;
  height: 18px;
  width: 18px;
  border-radius: 25px;
  background: #a1d0ff;
  cursor: pointer;
  -webkit-appearance: none;
  margin-top: -7px;
}
.range-slider input[type=range]::-moz-range-track {
  width: 100%;
  height: 5px;
  cursor: pointer;
  /* animate: 0.2s; */
  background: #2497e3;
  border-radius: 1px;
  box-shadow: none;
  border: 0;
}
.range-slider input[type=range]::-moz-range-thumb {
  z-index: 2;
  position: relative;
  box-shadow: 0px 0px 0px #000;
  border: 1px solid #2497e3;
  height: 18px;
  width: 18px;
  border-radius: 25px;
  background: #a1d0ff;
  cursor: pointer;
}
.range-slider input[type=range]::-ms-track {
  width: 100%;
  height: 5px;
  cursor: pointer;
  /* animate: 0.2s; */
  background: transparent;
  border-color: transparent;
  color: transparent;
}
.range-slider input[type=range]::-ms-fill-lower,
.range-slider input[type=range]::-ms-fill-upper {
  background: #2497e3;
  border-radius: 1px;
  box-shadow: none;
  border: 0;
}
.range-slider input[type=range]::-ms-thumb {
  z-index: 2;
  position: relative;
  box-shadow: 0px 0px 0px #000;
  border: 1px solid #2497e3;
  height: 18px;
  width: 18px;
  border-radius: 25px;
  background: #a1d0ff;
  cursor: pointer;
}
.range-box{
display: flex;
    justify-content: space-evenly;
    align-items: center;
}


</style>


<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">

      

        <!-- Page Content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
            

                    <div class="col-md-12">
                          @include('home.layouts.flash_msg')
   <!-- Page Content -->
   <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12 col-lg-4 col-xl-3 theiaStickySidebar">

                        <!-- Search Filter -->
                        <div class="card search-filter">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Search Filter</h4>
                            </div>
                            
                            <div class="card-body">
                                <div class="filter-widget">
                                    <form action="{{route('searched.dochosdig.min')}}" method="post" style='padding:0px;'> 
                                      @csrf
                                    <div class="range-slider"><span class="range-box">from
                                       <input type="number"  value="0" min="0" max="10000"/> to
                                        <input type="number" value="500" min="0" max="10000"/></span>
                                      <input value="0"name="min" min="0" max="10000" step="500" type="range"/>
                                      <input value="5000" min="0" name="max" max="10000" step="500" type="range"/>
                                      <svg width="100%" height="24">
                                        <line x1="4" y1="0" x2="300" y2="0" stroke="#444" stroke-width="12" stroke-dasharray="1 28"></line>
                                      </svg>

 

                                    </div>
                                    <br>
<input type="submit" name="submit"class="form-control" >
</form>
                                    </div>


                                <!---shailendra end---->

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
                                        <div class="form-group">
                                            <input type="text" id="hospital_name" name="searched" class="form-control"  autocomplete="off">
                                             <span class="form-text">Search Doctors, Clinics, Hospitals</span>
                                             <div id="suggesstions"></div>    
                                        </div>
                                    </form>
                                </div>
                                <div class="filter-widget">
                                    <form action="{{route('searched.dochosdig.speciality')}}" method="post" style='padding:0px;'> 
                                                        @csrf
                                        <div class="form-group">
                                            <input type="text" id="speciality" name="searched" class="form-control"  autocomplete="off">
                                            <span class="form-text">Search Speciality</span>
                              <div id="suggesstionss"></div>
                                        </div>
                                  
                                    </form>
                                </div>
                                
                         
                                <div class="filter-widget">
                                    <h4>Search : </h4>
                                    <div>
                                        <label>
                                        <p><a href="{{route('doctors','doctor')}}" style="color:black;">- Doctor</a></p>	
										</label>
                                        <br>
                                        <label>
                                        <p><a href="{{route('doctors','hospital')}}" style="color:black;">- Hospital</a></p>	
										</label>
                                        <br>
                                        <label>
                                        <p><a href="{{route('doctors','diagonostics')}}" style="color:black;">- Diagonostic</a></p>	
										</label>
                                        <br>
                                        <label>
                                        <p><a href="{{route('category')}}" style="color:black;">- Medicine</a></p>	
										</label>
                                    </div>
                                 
                                </div>
          <!--                        <div class="filter-widget">-->
          <!--                          <h4>Search :</h4>-->
          <!--                          <div>-->
          <!--                          <label class="custom_check">-->
          <!--                              <a href="{{route('doctor')}}"><input type="checkbox" name="select_specialist" ></a>-->
										<!--	<a href="{{route('doctor')}}"><span class="checkmark"></span> Doctor</a>-->
										<!--</label>-->
          <!--                          </div>-->
          <!--                          <br>-->
          <!--                          <div>-->
          <!--                          <label class="custom_check">-->
          <!--                              <a href="{{route('doctors','hospital')}}"><input type="checkbox" name="select_specialist" ></a>-->
										<!--	<a href="{{route('doctors','hospital')}}"><span class="checkmark"></span> Hospital</a>-->
										<!--</label>-->
          <!--                          </div>-->
          <!--                          <br>-->
          <!--                          <div>-->

          <!--                          <label class="custom_check">-->
          <!--                              <a href="{{route('doctors','diagnostic')}}"><input type="checkbox" name="select_specialist" ></a>-->
										<!--	<a href="{{route('doctors','diagnostic')}}"><span class="checkmark"></span> Diagonostic</a>-->
										<!--</label>-->
          <!--                          </div>-->
          <!--                          <br>-->
          <!--                          <div>-->
          <!--                              <label class="custom_check">-->
          <!--                              <a href="{{route('category')}}"><input type="checkbox" name="select_specialist" ></a>-->
										<!--	<a href="{{route('category')}}"><span class="checkmark"></span> Medicine</a>-->
										<!--</label>-->
          <!--                          </div>-->
      
                                   
          <!--                      </div>-->
                            

                        </div>
              </div>
                        <!-- /Search Filter -->

                    </div>
                    <div class="col-md-12 col-lg-8 col-xl-9">
                  
      <?php
   
    if(count($doctor)==''){
     ?>
<h3>No Record Found</h3>
<?php
   }
   ?>

    @foreach($doctor as $doc)

     

                    <div class="card my-3" >
                            <div class="card-body">
                                <div class="doctor-widget">
                                    <div class="doc-info-left">

 
                                        <div class="doctor-img">
                                            <a href="{{url('/doctor-profiles/'.$doc->id)}}">
                                             <?php
                                      if($doc->img!=''){
                                             ?>
                            <img src="{{asset('public/uploads/profile_img/'.$doc->img)}}" class="img-fluid" alt="User Image" style="height:160px;width:100%;">
                            <?php
}else{
 ?>
<img src="{{asset('public/uploads/profile_img/profile_img_1615876483.jpg')}}" class="img-fluid" alt="User Image" style="height:160px;width:100%;">
<?php
}
                            ?>
                                            </a>
                                        </div>
                                        <div class="doc-info-cont">
                                <h4 class="doc-name"><a href="{{url('/doctor-profiles/'.$doc->id)}}">{{$doc->name}} </a></h4>
                                            <!--<p class="doc-speciality"></p>-->
                          <h5 class="doc-department">
                              
                                      
                                  <?php
                 
$arr=json_decode($doc->specialization,true);

if(isset($arr))    {   
foreach($arr as $key=>$value){
    
    echo  $value . ",";
}
}
                            ?>
                              </h5>
                                            
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
     <!--        <ul class="clinic-gallery">-->
     <!--                                               <li>-->
     <!--<a href="{{asset('public/uploads/profile_img/'.$doc->img)}}" data-fancybox="gallery">-->
     <!--             <img src="{{asset('public/doctorprofile/uploads/clinic_img/'.$doc->clinic_image)}}" alt="Feature">-->
     <!--     </a>-->
     <!--                                               </li>-->
     <!--                                           </ul>-->
      <ul class="clinic-gallery">
                                                    <li>
                                                         @if($doc->dec_img1)
                                                        <a href="{{ asset('public/uploads/profile_img') }}/{{ $doc->dec_img1 }}" data-fancybox="gallery">
                                                            <img src="{{ asset('public/uploads/profile_img') }}/{{ $doc->dec_img1 }}" alt="Feature">
                                                        </a>
                                                        @else
                                                     
                                                                @endif
                                                    </li>
                                                    <li>
                                                          @if($doc->dec_img2)
                                                       <a href="{{ asset('public/uploads/profile_img') }}/{{ $doc->dec_img2 }}" data-fancybox="gallery">
                                                            <img src="{{ asset('public/uploads/profile_img') }}/{{ $doc->dec_img2 }}" alt="Feature">
                                                        </a>
                                                          @else
                                                     
                                                                @endif
                                                    </li>
                                                    <li>
                                                           @if($doc->hospital_img1)
                                                      <a href="{{ asset('public/uploads/profile_img') }}/{{ $doc->hospital_img1 }}" data-fancybox="gallery">
                                                            <img src="{{ asset('public/uploads/profile_img') }}/{{ $doc->hospital_img1 }}" alt="Feature">
                                                        </a>
                                                          @else
                                                     
                                                                @endif
                                                    </li>
                                                    <li>
                                                           @if($doc->hospital_img2)
                                                       <a href="{{ asset('public/uploads/profile_img') }}/{{ $doc->hospital_img2 }}" data-fancybox="gallery">
                                                            <img src="{{ asset('public/uploads/profile_img') }}/{{ $doc->hospital_img2 }}" alt="Feature">
                                                        </a>
                                                          @else
                                                     
                                                                @endif
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
  <li><i class="far fa-comment"></i> <?php $reviewCount = DB::table('doctor_reviews')->where(['doctorId'=>$doc->id])->count(); echo $reviewCount ;?> Feedback</li>
   <li><i class="fas fa-map-marker-alt"></i>{{$doc->city}} {{$doc->state}}</li>
    <li><i class="far fa-money-bill-alt"></i> ₹&nbsp;{{$doc->price}} {{$doc->unit}} </li>
                                            </ul>
                                        </div>
           <div class="clinic-booking">
               
               <?php
               //foreach($docs as $u){
                // $iis= $u->u_id;
                 
               
               
               //if($iis==$doc->id){
               ?>
@if (Auth::check())
	<a class="view-pro-btn" href="{{url('/doctor-profiles/'.$doc->id)}}">View Profile</a>
                                         

          <a class="apt-btn" href="{{url('/doctor-bookings/'.$doc->id)}}">Book Appointment</a>
          
@else
	 <a href="" class="view-pro-btn"  data-toggle="modal" data-target="#exampleModal">View Profile</a>   
                         <a href="" class="apt-btn"  data-toggle="modal" data-target="#exampleModal">Book Appointment</a>
@endif
                          
                         
       
         

<?php
// break;
//}}
?>
                                            
                     </div>
                  </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Doctor Widget -->

                        @endforeach
                        {!! $doctor->appends(request()->except('page'))->render() !!}
                        <!--<div class="load-more text-center">
                            <a class="btn btn-primary btn-sm" href="javascript:void(0);">Load More</a>
                        </div>-->
                    </div>
              
                </div>

            </div>

        </div>
        <!-- /Page Content -->

        </div>
    

        </div>
    </div>
    <!-- /Main Wrapper -->
    
    
    <!--Rating script-->
    
    
    
     
               
    
    <!--end Rating script-->
    

</body>


@include("home.layouts.footer")



<style>
#suggesstions #country-list { width: 70px!important;
   /* position: absolute;*/
    /*top: 48px;*/
    max-height: 80px !important;
    overflow: auto !important;
    z-index: 49;
    margin-top: 30px!important; }
#country-list{float:left;list-style:none;margin-top:-3px;padding:0;}
#country-list li{padding: 10px; background: #dddcda; border-bottom: #bbb9b9 1px solid;}
#country-list li:hover{background:#ece3d2;cursor: pointer;}
#search-box{padding: 10px;border: #a8d4b1 1px solid;border-radius:4px;}



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
             alert
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

<script>
    (function() {

var parent = document.querySelector(".range-slider");
if(!parent) return;

var
  rangeS = parent.querySelectorAll("input[type=range]"),
  numberS = parent.querySelectorAll("input[type=number]");

rangeS.forEach(function(el) {
  el.oninput = function() {
    var slide1 = parseFloat(rangeS[0].value),
          slide2 = parseFloat(rangeS[1].value);

    if (slide1 > slide2) {
              [slide1, slide2] = [slide2, slide1];
      // var tmp = slide2;
      // slide2 = slide1;
      // slide1 = tmp;
    }

    numberS[0].value = slide1;
    numberS[1].value = slide2;
  }
});

numberS.forEach(function(el) {
  el.oninput = function() {
          var number1 = parseFloat(numberS[0].value),
                  number2 = parseFloat(numberS[1].value);
          
    if (number1 > number2) {
      var tmp = number1;
      numberS[0].value = number2;
      numberS[1].value = tmp;
    }

    rangeS[0].value = number1;
    rangeS[1].value = number2;

  }
});

})();
</script>