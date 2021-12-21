@include("home.layouts.header") 

	

<body>
   <!-- Main Wrapper -->
   <div class="main-wrapper">


				<style>
 #imgs {
  width: auto;
  height: auto;
  max-height:200px;
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
						<div class="col-lg-8 col-md-12">
						
							<div class="row blog-grid-row">
							@if($pCount>0)
				@foreach($blogs as $r)
								<div class="col-md-6 col-sm-12">
								
									<!-- Blog Post -->
									<div class="blog grid-blog">

										<div class="blog-image">
											<a href="{{url('/blog-details/'.$r->id)}}">
											    <img class="img-fluid" src="{{asset('public/uploads/blog/'.$r->image)}}" alt="Post Image"  id="imgs"></a>
										</div>
										<div class="blog-content">
											<ul class="entry-meta meta-item">
												<li>
													<div class="post-author">
														<a href="{{url('/doctor-profile/'.$r->user_id)}}"><span>{{ ucfirst(trans($r->user_name))}}</span></a>
													</div>
												</li>
												<li><i class="far fa-clock"></i>&nbsp;{{ $r->created_at->format('d F, Y') }}</li>
											</ul>
											<h3 class="blog-title"><a href="{{url('/blog-details/'.$r->id)}}">{{$r->blog_title}}</a></h3>
											<p class="mb-0">{{$r->short_details}}</p>
										</div>
									</div>
									<!-- /Blog Post -->
									
								</div>
								
								@endforeach	
								@else
                     <div align='center' class='col-md-7 offset-md-2' style='box-shadow:0px 0px 1px 2px whitesmoke;padding:20px;background-color:white;'>
                     <img src="{{ asset('public/material/home') }}/img/blog-search.jpg" style='width:200px;height:200px;'>
                     <h3 align='center' style='padding:10px 100px;color:#0099cc;'> Sorry! No Blog found!</h3>
                     
                     </div>
                     @endif	
					 <br><br>
					 <br><br>
								</div>
								<br><br>
							<!-- Blog Pagination -->
							<div class="row">
								<div class="col-md-12">
									<div class="blog-pagination">
									
									</div>
								</div>
							</div>
							<!-- /Blog Pagination -->
							
						</div>
						
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
								<div class="card-body">
									<ul class="latest-posts">
										@foreach(getBlog12() as $blog)

										<li>
											<div class="post-thumb">
												<a href="{{url('/blog-details/'.$blog->id)}}">
													<img class="img-fluid" src="{{asset('public/uploads/blog/'.$blog->image)}}" alt="">
												</a>
											</div>
											<div class="post-info">
												<h4>
													
													<a href="{{url('/blog-details/'.$blog->id)}}">{{$blog->blog_title}}</a>
												</h4>
												<p>{{ $blog->created_at->format('d F, Y') }}</p>
											</div>
										</li>
										@endforeach
									</ul>
								</div>
							</div>

							
							</div>
							</div>
							
						</div>
						<!-- /Blog Sidebar -->

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
	