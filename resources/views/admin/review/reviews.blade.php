@include("admin.layouts.app")
@include("admin.layouts.sidebar")



<style>
.user-menu.nav > li > a {
    color: #060606 !important;
}
</style>
    <!-- Main Wrapper -->
    <div class="main-wrapper">

    
        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Reviews</h3>
                            <!--<ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">Review</li>
                            </ul>-->
                        </div>
                    </div>
                </div>

                
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-sm-12">
                       

                    <!-- <div class="col-md-7 col-lg-8 col-xl-9"> -->
                        <div class="doc-review review-listing">

                            <!-- Review Listing -->
                            <ul class="comments-list">

                                <!-- Comment List -->

                                <?php
foreach($getr as $row){
    $user_id=auth()->user()->id;
       $user_type = Auth::user()->user_type;
/*if($user_type=='admin'){
    echo"ok";
}
else{
    echo"jhj";
}*/
    if($user_id==$row->doctorId){
    ?>

                                <li>
                                    <div class="comment">
                                        <img class="avatar rounded-circle" alt="User Image" src="{{ asset('public/uploads/profile_img/dummy.jpg')}}">
                                        <div class="comment-body">
                                            <div class="meta-data">
                                                <span class="comment-author">{{$row->name}}</span>
                                                <span class="comment-date">Review</span>
                                                <div class="review-count rating">
                                                        
                                                           <?php   
                                            $x=1;
                                                                
$y = 5-$row->point; 
                                         while($x <= $row->point) {
                            
                            
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

                                        
                                                </div>
                                            </div>
                                            <p class="recommended">
<?php
if($row->likes==1){

?>
                                                <i class="far fa-thumbs-up"></i> 
<?php
}else{
    ?>
    <i class="far fa-thumbs-down"></i>
    <?php
}
?>




                                                {{$row->title}}</p>
                                            <p class="comment-content"style="width:800px !important">
                                                {{$row->review}}
                                            </p>
                                            <div class="comment-reply">
                                               <!-- <a class="comment-btn" href="#">
                                                    <i class="fas fa-reply"></i> Reply
                                                </a>-->
                                                <p class="recommend-btn">
                                                    <span>Recommend?</span>
 <a href="#" class="like-btn" onclick="return change_status('{{$row->id}}');" id="status_{{$row->id}}">
    
            <i class="far fa-thumbs-up"></i>
            
 Yes

  
                                                    </a>
                                                    <a href="#" class="dislike-btn" onclick="return change_statuss('{{$row->id}}');" id="status_{{$row->id}}">
                                                        <i class="far fa-thumbs-down"></i> No



  
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Comment Reply -->
                                    <ul class="comments-reply">

                                        <!-- Comment Reply List -->
  
                                        <li>
             <div class="comment">
    <!--<img class="avatar rounded-circle" src="{{ asset('public/uploads/doctors/doctor-thumb-02.jpg')}}">-->

                                                                              <?php
              
    
 
    foreach($replay as $r){
    
if($row->id == $r->commentId){
?>
                                                <div class="comment-body">
                                                    <div class="meta-data">
                                                        <span class="comment-author">{{$r->name}} </span>
                                                        <span class="comment-date">Reviewed 3 Days ago</span>
                                                    </div>
                                                    <p class="comment-content">{{$r->reply}}
                                                    </p>
                                                    <div class="comment-reply">
                                                        <!--<a class="comment-btn" href="#">
                                                            <i class="fas fa-reply"></i> Reply
                                                        </a>-->
                                                    </div>
                                                </div>
                                                <?php

}
}


                                                ?>



                                            </div>
                                        </li>
                                        <!-- /Comment Reply List -->

                                    </ul>
                                    <!-- /Comment Reply -->

                                </li>
                                  <?php
                           

}
}
?>
                                <!-- /Comment List -->


                            </ul>
                            <!-- /Comment List -->

                        </div>
                    <!--</div>-->





                    </div>
                </div>

            </div>
        </div>
        <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.2.8/jquery.form-validator.min.js"></script>
    
    <script>
        function change_status(id){
        
            var chk= $("#status_"+id).is(":checked"); 
            var id = id.replace('status','');
            var value=1;
            if(chk==true){
                value = 1;

            }   
            
            $.ajax({
            url: "{{route('hospitalreviews_like')}}",
            type: 'POST',//dataType: 'json',
            data:{
           "_token": "{{ csrf_token() }}",
                id: id, 
                like:value
            },
            success: function(msg) {

         
                alert('status changed successfully');
             } 
            })           
        }
        </script>


    <script>
        function change_statuss(id){
    
            var chk= $("#status_"+id).is(":checked"); 
            var id = id.replace('status','');
            var value=0;
            if(chk==true){
                value = 1;

            }   
           
            $.ajax({
            url: "{{route('hospitalreviews_like')}}",
            type: 'POST',//dataType: 'json',
            data:{
           "_token": "{{ csrf_token() }}",
                id: id, 
                like:value
            },
            success: function(msg) {

         
                alert('status changed successfully');
             } 
            })           
        }
        </script>
        <!-- /Page Content -->

  