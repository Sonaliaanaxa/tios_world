@include('front.layouts.header')


<section class="product-bg" style="background-image:url({{ ('/uploads/subcategory-banner/' .@$subcategory->banner) }})">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="cart-image">
                    <img src="{{ asset('/uploads/products') }}/{{ $product->upload_image }}" alt="cart">
                </div>
            </div>
            <div class="col-md-6">
                <div class="cart-content">
                    <h4>{{$product->name}}</h4>
                    <div class="reating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <p>8,708 ratings on amazon</p>
                    <p>Wildflower Honey</p>
                    <p>Sourced from Gir forest area, Gujarat</p>
                    <p>NMR Tested, Jaivik Bharat</p>
                    <div class="price">
                        <span class="new-price">Rs.{{$product->purchase_price}} </span>
                        <span class="old-price">Rs.{{$product->selling_price}} (-{{$product->discount}}%)</span>
                        <p>{{$product->weight}} {{$product->unit}} (Rs 0.9/g)</p>
                    </div>
                    <div class="cart-btn">
                        <span><a href="#">add to <span class="it-style">cart</span></a></span>
                        <span><a href="" class="float-right">
                                <img src="{{asset('assets/img/Instagram5.png')}}" alt=""></a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--product banner end-->
<!--product-frams-->
<section class="product-frams pt-30 pb-30">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="frams-group">
                    <div class="frams-logo">
                        <figure><img src="{{ asset('/uploads/profile_img') }}/{{ $user->logo }}"></figure>
                    </div>
                    <div class="frams-title">
                        <h4>{{$user->business_title}}</h4>
                        <p>{{$user->tag_line}}</p>
                    </div>
                </div>
                <div class="frams-content">
                    <p>{{$user->about_business}}</p>
                    <div class="collections-btn" id="sapmple-btn">
                        <a href="#" class="common-btn mt-3"><span class="normal-style ml-0">Know more about Anveshan</span> <span class="common-btn-normal ml-0">farms</span></a>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="frams-image">
                    <img src="{{asset('assets/img/farms-1.png')}}" alt="frams-1">
                </div>
            </div>
        </div>
    </div>
</section>
<!--product-frams end-->
<!--about honey-->
<section class="about-honey pt-30 pb-30">
    <div class="container">
        <div class="row">

            <div class="col-md-6">
                <div class="about-content">
                    {!!@$product->origin_details!!}
                </div>
            </div>

            <div class="col-md-6">
                <div class="about-image">
                    <img src="{{ asset('/uploads/map') }}/{{ @$product->map }}" alt="ind-2">
                </div>
            </div>

            <div class="col-md-12 my-3">
                <div class="product-about">
                    <h3>founders and their story</h3>
                    <p>{!!$user->about_founder!!}</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="honey-card">
                    <figure><img src="{{ asset('/uploads/profile_img') }}/{{ @$user->image1 }}" alt="ch-1"></figure>
                    <div class="honey-card-details">
                        <h4>Collection</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="honey-card">
                    <figure><img src="{{ asset('/uploads/profile_img') }}/{{ @$user->image2 }}" alt="ch-1"></figure>
                    <div class="honey-card-details">
                        <h4>Collection</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="honey-card">
                    <figure><img src="{{ asset('/uploads/profile_img') }}/{{ @$user->image3 }}" alt="ch-1"></figure>
                    <div class="honey-card-details">
                        <h4>Collection</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--about honey end-->
<!--testimonial  -->
<section class="testimonial pt-30 pb-30">
    <div class="container">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="carousel-caption  d-md-block">
                        <h5>It was so difficult for me to make choice for all my sustainable shopping needs. Tiosworld has done the hard part of me. Plus i’am hooked to using free samples now...Read More</h5>
                        <p>SAKSHI AGARWAL 02 • 02 • 22</p><br>
                        <a href="#" class="common-btn"><span class="normal-style">write your review about us</span></a>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-caption  d-md-block">
                        <h5>It was so difficult for me to make choice for all my sustainable shopping needs. Tiosworld has done the hard part of me. Plus i’am hooked to using free samples now...Read More</h5>
                        <p>SAKSHI AGARWAL 02 • 02 • 22</p><br>
                        <a href="#" class="common-btn"><span class="normal-style">write your review about us</span></a>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-caption  d-md-block">
                        <h5>It was so difficult for me to make choice for all my sustainable shopping needs. Tiosworld has done the hard part of me. Plus i’am hooked to using free samples now...Read More</h5>
                        <p>SAKSHI AGARWAL 02 • 02 • 22</p><br>
                        <a href="#" class="common-btn"><span class="normal-style">write your review about us</span></a>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
                    <span class="carousel-control fa fa-long-arrow-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
                    <span class="carousel-control fa fa-long-arrow-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </button>
            </div>
        </div>
    </div>
</section>
<!--testimonial end -->
<!--testimonial 2 -->
<section class="testimonial pt-30 pb-30" id="testimonial-2">
    <div class="container">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="carousel-caption  d-md-block">
                        <h5>It was so difficult for me to make choice for all my sustainable shopping needs. Tiosworld has done the hard part of me. Plus i’am hooked to using free samples now...Read More</h5>
                        <p>SAKSHI AGARWAL 02 • 02 • 22</p><br>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-caption  d-md-block">
                        <h5>It was so difficult for me to make choice for all my sustainable shopping needs. Tiosworld has done the hard part of me. Plus i’am hooked to using free samples now...Read More</h5>
                        <p>SAKSHI AGARWAL 02 • 02 • 22</p><br>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-caption  d-md-block">
                        <h5>It was so difficult for me to make choice for all my sustainable shopping needs. Tiosworld has done the hard part of me. Plus i’am hooked to using free samples now...Read More</h5>
                        <p>SAKSHI AGARWAL 02 • 02 • 22</p><br>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
                    <span class="carousel-control fa fa-long-arrow-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
                    <span class="carousel-control fa fa-long-arrow-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </button>
            </div>
        </div>
    </div>
</section>
<!--testimonial 2 end -->
<!--try sample-->
<section class="try-samples pt-30 pb-30">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="try-samples-heading" id="home-try">
                    <span class="star-logo">
                        <h3>try samples</h3>
                        <figure>
                            <img src="{{asset('assets/img/star.png')}}" alt="star">
                        </figure>
                    </span>
                    <span>Use your TIOS POINTS to try samples</span>
                </div>
            </div>
            <div class="col-md-3 my-3">
                <div class="collections-btn" id="sapmple-btn">
                    <a href="{{route('sample-product')}}" class="common-btn"><span class="normal-style">view all</span> <span class="common-btn-normal ml-0">Free sample</span></a>
                </div>
            </div>
            <!--carousel start-->
            <div class="col-md-12 my-5">
                <div class="owl-carousel carousel-main">
                    @foreach($trialProducts as $trialProduct)
                    <div class="sample-card">
                        <div class="sample-logo">
                            <img src="{{ asset('/uploads/categories') }}/{{ $trialProduct->logo }}" alt="sample-1">
                        </div>
                        <div class="sample-card-image">
                            <img src="{{ asset('/uploads/trial_products') }}/{{ $trialProduct->upload_image }}" alt="sample-1" class="sample-image">
                        </div>
                        <div class="sample-content">
                            <h4>{{$trialProduct->name}}</h4>
                            <p>Pack of 1 Rs. {{$trialProduct->selling_price}} {{$trialProduct->tios_points}} tios points</p>
                        </div>
                        <div class="sample-footer">
                            <div class="cart-group">
                                <p><a href="{{route('view-cart')}}">Add to <span class="it-style">cart</span></a></p>
                                <span> <a href="{{route('wishlist')}}"><img src="./{{asset('assets/img/heart.png')}}" alt=""></a></span>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
<!--try sample end-->
<!--add-->

<section>
    <a href="#"><img src="{{asset('assets/img/add-3.png')}}"></a>

</section>

<!--add end-->
<!--trending-->
<section class="trending-product pb-30 ">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="trending-samples-heading">
                    <h4>other <span class="it-style">curated organic</span> {{strtolower($product->name)}}</h4>
                    <span>ALL {{strtoupper($product->name)}} ON TIOSWORLD</span>
                </div>
            </div>
            <!--carousel start-->
            <div class="col-md-12 my-5">
                <div class="owl-carousel carousel-main">
                    @foreach($products as $product)
                    <div class="sample-card">
                        <div class="sample-logo">
                            @php
                            $user_id = $product->user_id;
                            $user = App\User::select('logo')->where('id',$user_id)->first();
                            @endphp
                            <img src="{{ asset('/uploads/profile_img') }}/{{ $user->logo }}" alt="{{$product->name}}">
                        </div>
                        <div class="sample-card-image">
                            <img src="{{ asset('/uploads/products') }}/{{ $product->upload_image }}" alt="{{$product->name}}" class="sample-image">
                        </div>
                        <div class="sample-content">
                            <h4>{{$product->name}}</h4>
                            <p>Pack of 1 Rs. {{$product->selling_price}} 1 tios points</p>
                        </div>
                        <div class="sample-footer">
                            <div class="cart-group">
                                <p><a href="{{route('view-cart')}}">Add to <span class="it-style">cart</span></a></p>
                                <span> <a href="{{route('wishlist')}}"><img src="{{asset('assets/img/heart.png')}}" alt=""></a></span>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
<!--end trending-->
<!--trending 2 -->
<section class="trending-product  pb-30">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="trending-samples-heading">
                    <h4>other <span class="it-style">organic</span> {{strtolower($product->name)}}</h4>
                    <span>ALL {{strtoupper($product->name)}} on tiosworld</span>
                </div>
            </div>
            <!--carousel start-->
            <div class="col-md-12 my-5">
                <div class="owl-carousel carousel-main">
                    @foreach($organicProducts as $product)
                    <div class="sample-card">
                        <div class="sample-logo">
                        @php
                            $user_id = $product->user_id;
                            $user = App\User::select('logo')->where('id',$user_id)->first();
                            @endphp
                            <img src="{{ asset('/uploads/profile_img') }}/{{ $user->logo }}" alt="{{$product->name}}">
                        </div>
                        <div class="sample-card-image">
                            <img src="{{ asset('/uploads/products') }}/{{ $product->upload_image }}" alt="{{$product->name}}" class="sample-image">
                        </div>
                        <div class="sample-content">
                            <h4>{{$product->name}}</h4>
                            <p>Pack of 1 Rs. {{$product->selling_price}} 1 tios points</p>
                        </div>
                        <div class="sample-footer">
                            <div class="cart-group">
                                <p><a href="{{route('view-cart')}}">Add to <span class="it-style">cart</span></a></p>
                                <span> <a href="{{route('wishlist')}}"><img src="{{asset('assets/img/heart.png')}}" alt=""></a></span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                   
                </div>
            </div>
        </div>
    </div>
</section>
<!--trending 2 end-->
<!--Curated collections-->
<section class="curated-collections pt-30 pb-30">
    <div class="container">
        <div class="row">
            <div class="col-md-9 my-5">
                <div class="curated-collections-heading">
                    <h4>Curated collections</h4>
                    <span>HANDPICKED products in each COLLECTION</span>
                </div>
            </div>
            <div class="col-md-3  my-5">
                <div class="collections-btn">
                    <a href="#" class="common-btn">view all collections</a>
                </div>
            </div>
            <div class="col-md-3">
                <div id="block-1">
                    <div id="inner-block">
                        <div class="layer-footer">
                        </div>
                    </div>
                    <div class="layer-footer">
                    </div>
                </div>
                <div id="block-2">
                    <div class="layer-heading">
                        <h5>Toothbrushes</h5>
                    </div>
                    <div class="layer-image">
                        <img src="{{asset('assets/img/collaction-1.png')}}">
                    </div>
                    <div class="layer-footer">
                        <p>View <span class="it-style">products</span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3" id="second-block-down">
                <div id="block-1">
                    <div id="inner-block">
                        <div class="layer-footer">
                        </div>
                    </div>
                    <div class="layer-footer">
                    </div>
                </div>
                <div id="block-2">
                    <div class="layer-heading">
                        <h5>Toothbrushes</h5>
                    </div>
                    <div class="layer-image">
                        <img src="{{asset('assets/img/collaction-1.png')}}">
                    </div>
                    <div class="layer-footer">
                        <p>View <span class="it-style">products</span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div id="block-1">
                    <div id="inner-block">
                        <div class="layer-footer">
                        </div>
                    </div>
                    <div class="layer-footer">
                    </div>
                </div>
                <div id="block-2">
                    <div class="layer-heading">
                        <h5>Toothbrushes</h5>
                    </div>
                    <div class="layer-image">
                        <img src="{{asset('assets/img/collaction-1.png')}}">
                    </div>
                    <div class="layer-footer">
                        <p>View <span class="it-style">products</span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3" id="second-block-down">
                <div id="block-1">
                    <div id="inner-block">
                        <div class="layer-footer">
                        </div>
                    </div>
                    <div class="layer-footer">
                    </div>
                </div>
                <div id="block-2">
                    <div class="layer-heading">
                        <h5>Toothbrushes</h5>
                    </div>
                    <div class="layer-image">
                        <img src="{{asset('assets/img/collaction-1.png')}}">
                    </div>
                    <div class="layer-footer">
                        <p>View <span class="it-style">products</span></p>
                    </div>
                </div>
            </div>
            <!--2nd row start-->
            <div class="col-md-3" id="third1-block-down">
                <div id="block-1">
                    <div id="inner-block">
                        <div class="layer-footer">
                        </div>
                    </div>
                    <div class="layer-footer">
                    </div>
                </div>
                <div id="block-2">
                    <div class="layer-heading">
                        <h5>Toothbrushes</h5>
                    </div>
                    <div class="layer-image">
                        <img src="{{asset('assets/img/collactopn-2.png')}}">
                    </div>
                    <div class="layer-footer">
                        <p>View <span class="it-style">products</span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3" id="third-block-down">
                <div id="block-1">
                    <div id="inner-block">
                        <div class="layer-footer">
                        </div>
                    </div>
                    <div class="layer-footer">
                    </div>
                </div>
                <div id="block-2">
                    <div class="layer-heading">
                        <h5>Toothbrushes</h5>
                    </div>
                    <div class="layer-image">
                        <img src="{{asset('assets/img/collaction-1.png')}}">
                    </div>
                    <div class="layer-footer">
                        <p>View <span class="it-style">products</span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3" id="third2-block-down">
                <div id="block-1">
                    <div id="inner-block">
                        <div class="layer-footer">
                        </div>
                    </div>
                    <div class="layer-footer">
                    </div>
                </div>
                <div id="block-2">
                    <div class="layer-heading">
                        <h5>Toothbrushes</h5>
                    </div>
                    <div class="layer-image">
                        <img src="{{asset('assets/img/collaction-1.png')}}">
                    </div>
                    <div class="layer-footer">
                        <p>View <span class="it-style">products</span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3" id="third-block-down">
                <div id="block-1">
                    <div id="inner-block">
                        <div class="layer-footer">
                        </div>
                    </div>
                    <div class="layer-footer">
                    </div>
                </div>
                <div id="block-2">
                    <div class="layer-heading">
                        <h5>Toothbrushes</h5>
                    </div>
                    <div class="layer-image">
                        <img src="{{asset('assets/img/collactopn-2.png')}}">
                    </div>
                    <div class="layer-footer">
                        <p>View <span class="it-style">products</span></p>
                    </div>
                </div>
            </div>
            <!--2nd row end-->
        </div>
    </div>
</section>
<!--Curated collections end-->

<section>
    <a href="#"><img src="{{asset('assets/img/add-2.png')}}"></a>

</section>
@include('front.layouts.footer')