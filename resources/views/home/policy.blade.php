@include("home.layouts.header")

<div class="container" style="margin-top:20px;">

<h3>Privacy Policy : </h3>
  
  <div class="row">
  <div class="col-md-12">
  <div class="container-fluid" style="margin-top:20px;box-shadow: 1px 2px 10px 4px gainsboro;padding-top: 20px;padding-bottom: 42px;margin-bottom:30px;background-color: #ffffff;">
 
  <div class="row">
  <div class="col-md-12" >


          <h5>{{ getPolicy()->title}}</h5>
            <p class="font-italic" style=" text-align: justify;
  text-justify: inter-word;">
 
  <?php 
                                            $s= getPolicy()->details;
                                            $s= htmlspecialchars_decode($s);
                                                    echo $s;
                                ?>
            </p>
</div>
 
  

  </div>
  </div>
    
    </div>
  </div>
  </div>
    
  </div>
</div>









  
    @include("home.layouts.footer")