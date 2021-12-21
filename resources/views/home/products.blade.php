@include("home.layouts.header") 

<body>

    <!-- Main Wrapper -->
        <div class="main-wrapper">
        <span style='font-size:16px;'>
                @include('home.layouts.flash_msg')
            </span>
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-12 col-12">
                        <div class="section-title" style='padding-bottom:20px;padding-top:5px;'>
                            <p style="font-size:13px;"><a href="{{route('category')}}" style="color:black;">All Categories</a></p>
                    
                        </div>  
                    </div>
                </div>
            </div>
    

        <!-- Page Content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-5 col-lg-3 col-xl-3 theiaStickySidebar">

                        <!-- Search Filter -->
                        <div class="card search-filter">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Filter</h4>
                            </div>
                            <div class="card-body">
                            <div class="filter-widget">
                            <h4>Categories</h4>
                            <ul class="navbar-nav">
                                    @foreach(getCategory() as $r)
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('products',$r->id)}}">{{$r->name}}
                                                <i class="icon_plus" aria-hidden="true"></i>
                                            <i class="icon_minus-06" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        @endforeach
                                        </ul>
                                        </div>
                        
 
                            </div>
                        </div>
                        <!-- /Search Filter -->

                    </div>

                    <div class="col-md-7 col-lg-9 col-xl-9">
		    <!-- Search -->
            <div class="search-box ">
            <form action="{{route('searched.product')}}" method="post" style='padding:0px;'> 
			         @csrf
                        <div class="form-group search">
                            
                            <input type="text" name="searched" class="form-control" placeholder="Search Product">
               
                        </div>
                        
                        <button type="submit" class="btn btn-primary search-btn"><i class="fas fa-search"></i> <span>Search</span></button>
                    </form>
                </div>

                <!-- /Search -->
                  

                        <div class="row">
                        @foreach($products as $r)
                            <div class="col-md-12 col-lg-4 col-xl-4 product-custom">
                                <div class="profile-widget">
                                    <div class="doc-img">
                                        <a href="product-description.html" tabindex="-1">
                                        @if($r->img)
                                    <a href="{{route('productDetails',$r->id)}}"> <img class="img-fluid" alt="Product image"  src="{{ asset('public/uploads/products') }}/{{ $r->img }}" style='height:180px;width:265px;'/></a>
                                @else
                                    <p class='text-center' style='padding-top:15px;height:100px;width:140px;border-radius:50%; background-color:#0099cc;color:white;font-size:26px;'>
                                    {{ substr($r->name,0,1) }}
                                    </p>
                                @endif
                                           
                                        </a>
                                    
                                    </div>
                                    <div class="pro-content">
                                        <h3 class="title pb-4">
                                            <a href="{{route('productDetails',$r->id)}}" tabindex="-1">{{$r->name}}</a>
                                        </h3>
                                        <div class="row align-items-center">
                                        <div class="col-lg-8">
                                                <span class="price">{{ $r->currency }}{{$r->price}}</span><br>
                                                <span class="price-strike">{{ $r->currency }}{{$r->mrp}}</span><span> | {{$r->discount}}% OFF</span>
                                            </div>
                                            <div class="col-lg-4 text-right">
                                            <form method='post'  action="{{ route('addCart') }}"  enctype="multipart/form-data" style='padding:0px;'>     
                                            @csrf
                                            <p style="font-size:12px;">
                                                   
                                                    <input type="hidden" name="quantity" value="1">
                                                    <input type="hidden" name="product_id" value="{{$r->id}}">
                                                    
                                                    
         @if (Auth::check())
         <button type='submit' class="cart-icon" ><i class="fas fa-shopping-cart"></i></button>
                  
        @else
         
        <button href="" type="button" class="cart-icon" data-toggle="modal" data-target="#exampleModal" ><i class="fas fa-shopping-cart"></i></button>
        
        @endif
                                                   
                                            </p>
                                        </form>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                           
                         
                        </div>
                        {!! $products->appends(request()->except('page'))->render() !!}
                    </div>
                </div>
            </div>
        </div>



    </div>
    <!-- /Main Wrapper -->

   

</body>

    <!-- Product Section End -->
    @include("home.layouts.footer")