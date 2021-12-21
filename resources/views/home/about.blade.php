@include("home.layouts.header")



<div class="container-fluid" style="margin-top:20px;">
  <h3>About Us : </h3>

  
  <div class="row">
  <div class="col-md-12">
  <div class="container-fluid" style="margin-top:20px;box-shadow: 1px 2px 10px 4px gainsboro;padding-top: 20px;padding-bottom: 42px;margin-bottom:30px;">
 
  <div class="row">
  <div class="col-md-7" >


          <h5>{{ getAbout()->title}}</h5>
            <p class="font-italic" style=" text-align: justify;
  text-justify: inter-word;">
 
  <?php 
                                            $s= getAbout()->details;
                                            $s= htmlspecialchars_decode($s);
                                                    echo $s;
                                ?>
            </p>
</div>
 
  
  <div class="col-md-5" >
  <img src="{{ asset('public/uploads/about') }}/{{ getAbout()->img }}"  alt="" style='height:500px;width:100%;' class="img-fluid" alt="">
  </div>
  </div>
  </div>
    
    </div>
  </div>
  </div>
    
  </div>
</div>









  
    @include("home.layouts.footer")