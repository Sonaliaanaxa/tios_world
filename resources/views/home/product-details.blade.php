@include("home.layouts.header") 
   
<body>

<!-- Main Wrapper -->
<div class="main-wrapper">
<span style='font-size:16px;'>
                @include('home.layouts.flash_msg')
            </span>
  
    <!--<div class="container-fluid">-->
    <!--            <div class="row align-items-center">-->
    <!--                <div class="col-md-12 col-12">-->
    <!--                    <div class="section-title" style='padding-bottom:20px;padding-top:5px;'>-->
    <!--                        <p style="font-size:13px;"><a href="{{route('category')}}" style="color:black;">All Categories</a></p>-->
                    
    <!--                    </div>  -->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->

  

    <!-- Page Content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-7 col-lg-9 col-xl-9">
                    <!-- Doctor Widget -->
                    <div class="card">
                        <div class="card-body product-description">
                            <div class="doctor-widget">
                                <div class="doc-info-left">
                                    <div class="doctor-img1">
                                    @if($product->img)
                                    <img class="img-fluid" alt="Product image"  src="{{ asset('public/uploads/products') }}/{{ $product->img }}" style='height:380px;width:365px;'/>
                                @else
                                    <p class='text-center' style='padding-top:15px;height:100px;width:140px;border-radius:50%; background-color:#0099cc;color:white;font-size:26px;'>
                                    {{ substr($product->name,0,1) }}
                                    </p>
                                @endif
                                       
                                    </div>
                                    <div class="doc-info-cont">
                                        <h4 class="doc-name mb-2"> {{$product->name}} </h4>
                                       
                                            <div class="review-count rating">
                                                
                                                
                                                @if($avg>=1)
                                                @for($i=1;$i<=$avg;$i++)
                                                <i class="fas fa-star filled"></i>
                                                 @endfor
                                                 @endif
                                                 
                                                 @for($i=1;$i<(6-$avg);$i++)
                                                <i class="fas fa-star"></i>
                                                 @endfor
                                            </div>
                                        <p> <strong>Price : {{ $product->currency }}{{$product->price}}  </strong>
                                
                                <p><span style="text-decoration: line-through;color:#a1a1a1;border-right: 1px solid #e1e1e1;">{{ $product->currency }}{{$product->mrp}}</span> {{$product->discount}}% OFF</p>
                                <p><strong>Saving : </strong>{{ $product->currency }}  {{ $product->saving }}  </p>
                                <p><strong>Weight : </strong>{{$product->weight}} {{$product->unit}}  </p>
                                </p>
                    
                    <h4 class="pt-4"></h4>
                            <hr>
                           

<p>{{$product->short_details}}</p>

                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <!-- /Doctor Widget -->

                   

                </div>

                <div class="col-md-5 col-lg-3 col-xl-3 theiaStickySidebar">

                    <!-- Right Details -->
                    <div class="card search-filter">
                        <div class="card-body">
                            <div class="clini-infos mt-0">
                                <h2>{{ $product->currency }}{{$product->price}} <b class="text-lg strike">{{ $product->currency }}{{$product->mrp}}</b> <span class="text-lg text-success"><b>{{$product->discount}}% off</b></span></h2>
                            </div>
                            <span class="badge badge-primary">In stock</span>
                            <form method='post'  action="{{ route('addCart') }}"  enctype="multipart/form-data" style='padding:0px;'>     
                                               @csrf
                                            
                            <div class="custom-increment pt-4">
                                <div class="input-group1">
                                <select name='quantity'  class="ls_quantity">
                                                        @for($i=1;$i<=100;$i++)
                                                             <option value="{{$i}}" style=''>{{$i}}</option>
                                                        @endfor
                                                    </select>
                                             
                                                   
                                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                                 


                                  
                                
                                </div>
                            </div>
                            
                            <div class="clinic-details mt-4">
                                <div class="clinic-booking">
                                 @if (Auth::check())
         <button type="submit" class="btn btn-info">Add To Cart</button>
                  
        @else
         <button href="" type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Add To Cart</button>
     
        
        @endif
                               
                                   
                                </div>
                            </div>
                            </form> 
                        </div>
                    </div>
                    </div>

                </div>
                
                
                <!--    <div class="card">-->
                <!--            <div class="card-body pt-0">-->

                                <!-- Tab Menu -->
                <!--                <nav class="user-tabs mb-4">-->
                <!--                    <ul class="nav nav-tabs nav-tabs-bottom nav-justified">-->
                <!--                        <li class="nav-item">-->
                <!--                            <a class="nav-link " href="#detail" data-toggle="tab">Details</a>-->
                <!--                        </li>-->

                <!--                        <li class="nav-item">-->
                <!--                            <a class="nav-link active" href="#reviews" data-toggle="tab">Reviews</a>-->
                <!--                        </li>-->

                <!--                    </ul>-->
                <!--                </nav>-->
                                <!-- /Tab Menu -->

                                <!-- Tab Content -->
                <!--                <div class="tab-content pt-0">-->

                                    <!-- Overview Content -->
                <!--                    <div role="tabpanel" id="detail" class="tab-pane fade ">-->
                <!--                        <div class="row">-->
                <!--                            <div class="col-md-12">-->

                                                <!-- About Details -->
                <!--                                <div class="card-body pt-0">-->

                                                    <!-- Tab Menu -->
                <!--                                    <h3 class="pt-4">Product Details</h3>-->
                
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!--                    </div>-->
                                    
                                       <!-- Overview Content -->
                <!--                    <div role="tabpanel" id="reviews" class="tab-pane fade show active">-->
                <!--                        <div class="row">-->
                <!--                            <div class="col-md-12">-->

                                                <!-- About Details -->
                <!--                                <div class="card-body pt-0">-->

                                                    <!-- Tab Menu -->
                <!--                                    <h3 class="pt-4">Product Review</h3>-->
                
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--</div>-->
                <!--</div>-->
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                 <!-- Doctor Details Tab -->
                        <div class="card">
                            <div class="card-body pt-0">

                                <!-- Tab Menu -->
                                <h3 class="pt-4">Product Details</h3>
                                <hr>
                                <!-- /Tab Menu -->

                                <!-- Tab Content -->
                                <div class="tab-content pt-3">

                                    <!-- Overview Content -->
                                    <div role="tabpanel" id="doc_overview" class="tab-pane fade show active">
                                        <div class="row">
                                            <div class="col-md-9">

                                                <!-- About Details -->
                                                <div class="widget about-widget">
                                                    <h4 class="widget-title">Description</h4>
                                               <p> <?php 
                                                        $p= $product->details;
                                                        $p= htmlspecialchars_decode($p);
                                                                echo $p;
                                                ?></p>
                                                </div>
                                                <!-- /About Details -->


                                                
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Overview Content -->

                                </div>
                            </div>
                        </div>
                        <!-- /Doctor Details Tab -->

                        
                      <div class="card">
                    <div class="card-body pt-0">

                        <!-- Tab Menu -->
                        <nav class="user-tabs mb-4">
                            <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#doc_overview" data-toggle="tab">Product Review</a>
                                </li>

                            </ul>


                            </ul>
                        </nav>
                        <!-- /Tab Menu -->






                        <!-- Reviews Content -->
                        <div role="tabpanel" id="doc_overview" class="tab-pane fade show active">

                            <!-- Review Listing -->
                            <div class="widget review-listing">
                                <ul class="comments-list">
        @foreach(getProductComment() as $r)
							<?php
							$bc_id= $r->product_id;
							$b_id= $product->id;
							$ratings= $r->rating;
							
							?>

			@if($bc_id == $b_id )
                                    <!-- Comment List -->
                <li>
                    <div class="comment">
                                           
                        <div class="comment-body">
                            <div class="meta-data">
                                <span class="comment-author"> {{ $r->name}} </span>
                                <span class="comment-date">{{ $r->created_at->format('d F, Y') }}</span>
                                <div class="review-count rating">
                                                    
                                     @for($i=1;$i<=$ratings;$i++)
                                        <i class="fas fa-star filled"></i>
                                         @endfor
                                         @for($i=1;$i<(6-$ratings);$i++)
                                        <i class="fas fa-star"></i>
                                    @endfor
                                                 
                                </div>
                            </div>
                          
                            <p class="comment-content">
                                {{ $r->msg}}
                            </p>
                            
                            <div class="comment-reply">
                                <a class="comment-btn" href="#">
                                    <i class="fas fa-reply"></i> Reply
                                </a>
                                <form method='post'  action="{{ route('product.comment.reply') }}"  enctype="multipart/form-data">
                                   @csrf

                                    <div class="form-group">
                                   
                                        <div class="form-group{{ $errors->has('msg') ? ' has-danger' : '' }}">
                                            <textarea cols="40" rows="1" class="form-control{{ $errors->has('msg') ? ' is-invalid' : '' }}" name="msg" id="input-msg" type="text" placeholder="{{ __(' comment...') }}"  value="{{ old('msg') }}"  aria-required="true" style="padding:10px;"></textarea>
                                            @if ($errors->has('msg'))
                                                <span id="msg-error" class="error text-danger" for="input-msg">Message is Empty!</span>
                                            @endif
							
                                        </div>
                                    </div>
                                    <hr>
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    <input type="hidden" name="comment_id" value="{{$r->id}}">
                                    <div class="submit-section">
                                        <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                                    </div>
                                </form>
                                                   
                                </div>
                            </div>
                        </div>
                    	@foreach(getProductCommentReply() as $s)
    						<?php
    						$bc_id= $r->product_id;
    							$b_id= $product->id;
    						$br_id= $r->id;
    						$brc_id= $s->comment_id;
    
    						?>

						    @if(($bc_id == $b_id ) && ($br_id == $brc_id))
                                        <!-- Comment Reply -->
                                        <ul class="comments-reply">
                                            <li>
                                                <div class="comment">
                                             
                                                    <div class="comment-body">
                                                        <div class="meta-data">
                                                            <span class="comment-author">{{ $s->name}}</span>
                                                            <span class="comment-date">{{ $s->created_at->format('d F, Y') }}</span>
                                                       
                                                        </div>
                                                     
                                                        <p class="comment-content">
                                                           {{ $s->msg}}
                                                            </p>
                                                    
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <!-- /Comment Reply -->

		                    @endif
	                   @endforeach
	                </div>
                </li>
                <!-- /Comment List -->
            @endif
        @endforeach
                    

    </ul>

 </div>
    </div>
                            <!-- /Review Listing -->
	
							
                            <!-- Write Review -->
                            <div class="write-review">
                                <h4>Write a review for <strong></strong></h4>

                                <!-- Write Review Form -->
                                                  <form method='post'  action="{{ route('product.comment') }}"  enctype="multipart/form-data">
                    @csrf
                   
                                    <div class="form-group">
                                        <label>Review</label>
                                        <div class="star-rating">
                                            <input id="star-5" type="radio" name="rating" value="5">
                                            <label for="star-5" title="5 stars">
														<i class="active fa fa-star"></i>
													</label>
                                            <input id="star-4" type="radio" name="rating" value="4">
                                            <label for="star-4" title="4 stars">
														<i class="active fa fa-star"></i>
													</label>
                                            <input id="star-3" type="radio" name="rating" value="3">
                                            <label for="star-3" title="3 stars">
														<i class="active fa fa-star"></i>
													</label>
                                            <input id="star-2" type="radio" name="rating" value="2">
                                            <label for="star-2" title="2 stars">
														<i class="active fa fa-star"></i>
													</label>
                                            <input id="star-1" type="radio" name="rating" value="1">
                                            <label for="star-1" title="1 star">
														<i class="active fa fa-star"></i>
													</label>
                                        </div>
                                    </div>
                          
                                    <div class="form-group">
                                        <label>Your review</label>
                <div class="form-group{{ $errors->has('msg') ? ' has-danger' : '' }}">
                                      <textarea cols="40" rows="1" class="form-control{{ $errors->has('msg') ? ' is-invalid' : '' }}" name="msg" id="input-msg" type="text" placeholder="{{ __(' comment...') }}"  value="{{ old('msg') }}"  aria-required="true" style="padding:10px;"></textarea>
                                      @if ($errors->has('msg'))
                                        <span id="msg-error" class="error text-danger" for="input-msg">Message is Empty!</span>
                                      @endif
							
                               </div>
                                    </div>
                                    <hr>
                                     <input type="hidden" name="product_id" value="{{$product->id}}">
                                    <div class="submit-section">
                                        <button type="submit" class="btn btn-primary submit-btn">Add Review</button>
                                    </div>
                                </form>
                                <!-- /Write Review Form -->

                            </div>
                            <!-- /Write Review -->

                        </div>
                        <!-- /Reviews Content -->

               

 


                 
                    </div>

            </div>



        </div>
    </div>
    <!-- /Page Content -->
 

</div>
<!-- /Main Wrapper -->


</body>

<br>
    @include("home.layouts.footer")