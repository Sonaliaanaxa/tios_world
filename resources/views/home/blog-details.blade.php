@include("home.layouts.header") 


<body>

            
            <!-- Breadcrumb -->
            <div class="breadcrumb-bar">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-md-12 col-12">
                            <nav aria-label="breadcrumb" class="page-breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Blog</li>
                                </ol>
                            </nav>
                            <h2 class="breadcrumb-title">Blog Details</h2>
                            <h4 id="contact_formss"style="float:right;color:#FFF;margin-top:-30px">
                                               </h4>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Breadcrumb -->
            
               <!-- Main Wrapper -->
   <div class="main-wrapper">

<!-- Header -->
<div class="header"></div>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"> Send Your Query </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            <form method='post'  action="{{ route('query') }}"  enctype="multipart/form-data">
                    @csrf
                      @include('home.layouts.flash_msg')
<div class="form-group">
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <span class="fa fa-user"></span>
            </span>                    
        </div>
        <input type="text" class="form-control" name="name" placeholder="Name" required="required">
    </div>
</div>
<div class="form-group">
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="fa fa-phone"></i>
            </span>                    
        </div>
        <input type="number" class="form-control" name="mobile" placeholder="Phone Number" required="required">
    </div>
</div>
<div class="form-group">
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="fa fa-paper-plane"></i>
            </span>                    
        </div>
        <input type="email" class="form-control" name="email" placeholder="Email Address" required="required">
    </div>
</div>


<center><div class="form-group">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
</center>
<div class="modal-footer">
<p> Or Mobile No: {{ getWeb()->mobile }},  WhatApp: {{ getWeb()->whatsapp }}<p>
</div>
</form>
</div>

            </div>

        </div>
    </div>
    
<!-- /Header -->

				<style>
 #imgs {
  width: auto;
  height: auto;
  max-height:300px;
   display:block;
    margin:auto;
}
.grid-blog .blog-image {
   
    min-width: 300px;
    min-height: 200px;
}
		</style>
            <!-- Page Content -->
            <div class="content">
                <div class="container">
                
                    <div class="row">
                        


                        <?php

foreach($data as $blogdetails){
   $bid=$blogdetails->id;
   $usid=$blogdetails->user_id;

                        ?>
                        
                        
                        
                        <div class="col-lg-8 col-md-12">
                            <div class="blog-view">
                                <div class="blog blog-single-post">
                                    <div class="blog-image">
                                        <a href="javascript:void(0);">
                                            <img alt="" src="{{asset('public/uploads/blog/'.$blogdetails->image)}}" class="img-fluid"id="imgs"></a>
                                    </div>
                                    <h3 class="blog-title">{{$blogdetails->blog_title}}</h3>
                                    <div class="blog-info clearfix">
                                        <div class="post-left">
                                            <ul>
                                                <li>
                                                    <div class="post-author">
                                                                                                                                                   <?php

                                                    foreach($doimage as $doimg){
                                                      
                                                        if($usid== $doimg->id){
                                                     $bio= $doimg->biography;
                                                        $bioname= $doimg->name;
                                                    
                                                        
                                                       
                                                      
                                                    
                                                                                    ?>
                                                        
                                                        
                                                        <a href="{{url('/doctor-profile/'.$blogdetails->user_id)}}}"><img src="{{asset('public/uploads/profile_img/'.$doimg->img)}}" alt="Post Author"> <span>{{$bioname}}</span></a>
                                                    
                                                         <?php
                                                             break;
                                                                }
                                                                                    }
                                                                                        ?>
                                                    </div>
                                                </li>
                                
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="blog-content">
                                      
                                                      <?php 
                         $p= $blogdetails->details;
                         $p= htmlspecialchars_decode($p);
                                echo $p;
                                ?>
                                    </div>
                                </div>
                        
                                
                               
                                <div class="card author-widget clearfix">
                                <div class="card-header">
                                    <h4 class="card-title">About Author</h4>
                                    </div>
                                <div class="card-body">
                                    <div class="about-author">
                                        <div class="about-author-img">
                                            <div class="author-img-wrap">
                                                                                           <?php

                                        foreach($doimage as $doimg){
                                           $bio= $doimg->biography;
                                            $bioname= $doimg->name;
                                            if($usid== $doimg->id){
                                                
                                           $bio= $doimg->biography;
                                            $bioname= $doimg->name;
                                        
                                                                        ?>
                                                                     <a href="{{url('/doctor-profile/'.$blogdetails->user_id)}}">
                                                    <img class="img-fluid" src="{{asset('public/uploads/profile_img/'.$doimg->img)}}" alt="">
                                                 
                                                   
                                                                                        </a>
                                               
                                                                                    </div>
                                                                                </div>
                                                                                <div class="author-details">
                                                                                    <a href="{{url('/doctor-profile/'.$blogdetails->user_id)}}" class="blog-author-name">{{$bioname}}</a>
                                                                                    <p class="mb-0">{{$bio}}</p>
                                                                                </div>
                                                                                                     <?php
                                                                    
                                            break;
                                            }
                                                                }
                                                                    ?>
                                    </div>
                                </div>
                                </div>
                                <div class="card blog-comments clearfix">



                                                                              <?php
                                                    
                                                         // if(Auth::user()){
                                                           //$user_id = Auth::user()->id;
                                                            
                                                      
                                                        $i=0;
                                                    foreach($getw as $row){
                                                       
                                                       if($bid==$row->bid){
                                                         
                                                        $i++;
                                                    
                                                    
                                                    }
                                                    }
                                                    
                                                    
                                                        ?>
                                    
                                    <div class="card-header">
                                        <h4 class="card-title">Comments ({{$i}})</h4>
                                    </div>
                                                                                <?php 
                                            //}
                                                                                ?>
                                                                                <div class="card-body pb-0">
                                               <!-- Review Listing -->






                                    <ul class="comments-list">

                                                                            <?php
                                                //if(Auth::user()){
                                                  // $user_id = Auth::user()->id;
                                                    
                                              
                                                                        
                                            foreach($getw as $row){
                                                if($bid==$row->bid){
                                            
                                                ?>
                                        <li>
                                            <div class="comment">
                                                <div class="comment-author">
                                                    <img class="avatar" alt="" src="{{ asset('public/uploads/profile_img') }}/{{ $row->img }}">
                                                </div>
                                                <div class="comment-block">
                                                    <span class="comment-by">
                                                        <span class="blog-author-name">{{$row->name}}</span>
                                                    </span>
                                                    
                                                    <p>{{$row->comment}}</p>
                                                    <p class="blog-date">{{date('d-m-Y', strtotime($row->updated_at))}}</p>
                                                    <!--<a class="comment-btn" href="#">
                                                        <i class="fas fa-reply"></i> Reply
                                                    </a>-->
                                                </div>
                                            </div>
                                            <ul class="comments-list reply">
                                                                            <?php
              
    
                                                 
                                                    foreach($replay as $r){
                                                       
                                                if($row->id == $r->commentId){
                                                ?>
                                                <li>
                                                    <div class="comment">
                                                        <div class="comment-author">
                                                            <img class="avatar" alt="" src="{{asset('assets/img/patients/patient5.jpg')}}">
                                                        </div>
                                                        <div class="comment-block">
                                                            <span class="comment-by">
                                                                <span class="blog-author-name">{{$r->name}} </span>
                                                            </span>
                                                            <p>{{$r->reply}}</p>
                                                            <p class="blog-date">{{date('d-m-Y', strtotime($r->updated_at))}}</p>
                                                   <!-- <a class="comment-btn" href="#">
                                                        <i class="fas fa-reply"></i> Reply
                                                    </a>-->
                                                        </div>
                                                    </div>
                                                </li>
                                                        
                                                        <?php
                                                        }
                                                        }
                                                        ?>
                                                        
                                                        
                                                                                                    </ul>
                                                                                                </li>
                                                        
                                                        <?php
                                                        }
                                                        }
                                                        //}
                                                        
                                                        ?>

                                    </ul>
                                </div>
                                </div>
                                
                                <div class="card new-comment clearfix">
                                    <div class="card-header">
                                        <h4 class="card-title">Leave Comment</h4>
                                    </div>
                                    <div class="card-body">
                                        <?php
                                        if(Auth::user()){
                                        $user_ids = Auth::user()->id;
                                        }
                                        else{
                                          $user_ids = 0;  
                                        
                                        }
                                        ?>
                                        <form method="post" action="{{url('/blogcomment')}}" id="blogcomment">
                                            
                                            {!! csrf_field() !!}

                                            <input type="hidden" name="typeId" class="form-control" value="blog">
                                            <input type="hidden" name="bid" id="bid" class="form-control" value="{{ $bid }}">
                                            <input type="hidden" name="usid" id="usid" class="form-control" value="{{ $user_ids }}">
                                            <!--<div class="form-group">
                                                <label>Name <span class="text-danger">*</span></label>
                                                <input type="text" name="name" class="form-control">
                                            </div>-->
                                            
                                            <div class="form-group">
                                                <label>Comments</label>
                                                <textarea rows="4" name="comment" id="comment" class="form-control"></textarea>
                                            </div>
                                            <div class="submit-section">
                                                <button class="btn btn-primary submit-btn" type="submit">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    
                                        <?php
                                        }
                                        
                                        ?>

  
                        <!-- Blog Sidebar -->
                        <div class="col-lg-4 col-md-12 sidebar-right theiaStickySidebar">

                       				<!-- Search -->
							<div class="card search-widget">
								<div class="card-body">
								<form action="{{route('searched.blog')}}" method="post" style='padding:0px;'> 
			         @csrf
										<div class="input-group">
											
											<input type="text" name="searched" id="search-box" placeholder="Search..." class="form-control"  autocomplete="off"/>
											<div class="input-group-append">

												<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
											</div>
										</div>
									</form>
								</div>
							</div>
							<!-- /Search -->

                            <!-- Latest Posts -->
                            <div class="card post-widget">
                                <div class="card-header">
                                    <h4 class="card-title">Latest Posts</h4>
                                </div>
                                	<div class="card-body" style="max-height: 400px;overflow: scroll;  overflow-x: hidden;">
                                <div class="card-body">
                                    <ul class="latest-posts">

	@foreach(getBlog12() as $r)
                                        <li>
                                            <div class="post-thumb">
                                                <a href="{{url('/blog-details/'.$r->id)}}">
                                                    <img class="img-fluid" src="{{asset('public/uploads/blog/'.$r->image)}}" alt="">
                                                </a>
                                            </div>
                                            <div class="post-info">
                                                <h4>
                                                    <a href="{{url('/blog-details/'.$r->id)}}">{{$r->blog_title}}</a>
                                                </h4>
                                                <p>{{date('d-m-Y', strtotime($r->date))}}</p>
                                            </div>
                                        </li>

                                        @endforeach


                                      
                            
                        </div>
                        <!-- /Blog Sidebar -->
                        
                </div>
                </div>

</div>

</div>
            </div>      
            <!-- /Page Content -->
   
      
   

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>




  <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


   $('#blogcomment').submit(function(e) {
    
       e.preventDefault();

usid = $('#usid').val();

comment = $('#comment').val();

if(usid==0){
      alert("Please Login!."); 
}
else{
if(comment==''){

   alert("Field cannot be empty.");
}else{

       let formData = new FormData(this);
       $('#image-input-error').text('');

       $.ajax({
          type:'POST',
          url: "{{route('blogcomment')}}",
           data: formData,
           contentType: false,
           processData: false,
           success: (response) => {
             if (response) {
               this.reset();
              alert('Comment has been added successfully');
               $("#contact_formss").html("<div>Comment has been added successfully</div>");
             }
           },
           error: function(response){
              console.log(response);
                $('#image-input-error').text(response.responseJSON.errors.file);
           }
       });
}

}
  });

</script>



@include("home.layouts.footer")

	<style>
.form-control {
	font-size: 15px;
}
.form-control, .form-control:focus, .input-group-text {
	border-color: #e1e1e1;
}
.form-control, .btn {        
	border-radius: 3px;
}
.signup-form {
	width: 400px;
	margin: 0 auto;
	padding: 30px 0;		
}
.signup-form form {
	color: #999;
	border-radius: 3px;
	margin-bottom: 15px;
	background: #fff;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	padding: 30px;
}
.signup-form h2 {
	color: #333;
	font-weight: bold;
	margin-top: 0;
}
.signup-form hr {
	margin: 0 -30px 20px;
}
.signup-form .form-group {
	margin-bottom: 20px;
}
.signup-form label {
	font-weight: normal;
	font-size: 15px;
}
.signup-form .form-control {
	min-height: 38px;
	box-shadow: none !important;
}	
.signup-form .input-group-addon {
	max-width: 42px;
	text-align: center;
}	
.signup-form .btn, .signup-form .btn:active {        
	font-size: 16px;
	font-weight: bold;
	background: #19aa8d !important;
	border: none;
	min-width: 140px;
}
.signup-form .btn:hover, .signup-form .btn:focus {
	background: #179b81 !important;
}
.signup-form a {
	color: #fff;	
	text-decoration: underline;
}
.signup-form a:hover {
	text-decoration: none;
}
.signup-form form a {
	color: #19aa8d;
	text-decoration: none;
}	
.signup-form form a:hover {
	text-decoration: underline;
}
.signup-form .fa {
	font-size: 21px;
}
.signup-form .fa-paper-plane {
	font-size: 18px;
}
.signup-form .fa-check {
	color: #fff;
	left: 17px;
	top: 18px;
	font-size: 7px;
	position: absolute;
}
</style>

<script>
        $(document).ready(function() {
            $("#exampleModalCenter").modal('show');
        });
    </script>
	<script>

$(document).ready(function(){
	$("#search-box").keyup(function(){
		 var query = $(this).val();
	

          $.ajax({
                        url:"{{ route('search_blog') }}",
                        type:"get",
                       data: {
           
               keyword:query
            },
                        success:function (data) {
             
                            //$("#suggesstion").html(data);



                            $("#suggesstion").show();
			$("#suggesstion").html(data);
			$("#search-box").css("background","#FFF");
         
                        }
                    })


	});
});


function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion").hide();
}


 
</script>

<script>
        $(document).ready(function() {
			if (jQuery.cookie('shown_modal')==undefined) {
           jQuery.cookie('shown_modal', 'true');
           jQuery("#exampleModalCenter").modal('show');
        }
          
        });
    </script>