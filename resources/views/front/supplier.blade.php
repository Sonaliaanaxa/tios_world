@include('front.layouts.header')


<!--product-frams-->
<section class="product-frams pt-30 pb-30">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
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
                <p>{!!$user->about_business!!}</p>
                </div>

            </div>

          
        </div>

    </div>
</section>

<!--product-frams end-->

<!--about honey-->
<section class="about-honey pt-30 pb-30">
    <div class="container py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="suppiler-heading">
                    <h3>founders and their story</h3>
                </div>
            </div>
            <div class="col-md-12 my-3">
            <p>{!!$user->about_founder!!}</p>
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

<!--trending-->
<section class="trending-product pt-30 pb-30 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="curated-collections-heading">
                    <h3><span class="normal-style">Curated</span> collections</h3>
                    <span>HANDPICKED products in each COLLECTION</span>
                </div>
            </div>

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
<!--end trending-->

<!--try sample-->
<section class="try-samples pt-30 pb-30">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="try-samples-heading" id="home-try">
                    <span class="star-logo">
                        <h3>try samples</h3>
                        <figure>
                            <img src="{{ asset('assets/img/star.png')}}" alt="star">
                        </figure>
                    </span>
                    <span>Use your TIOS POINTS to try samples</span>
                </div>
            </div>
            <div class="col-md-3 my-3">
                <div class="collections-btn" id="sapmple-btn">
                    <a href="all-sample-product.html" class="common-btn"><span class="normal-style">view all</span> <span class="common-btn-normal ml-0">Free sample</span></a>
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
                    <img src="assets/img/icon-left.png" class="carousel-control" aria-hidden="true">
                    <span class="sr-only">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
                    <img src="assets/img/icon-right.png" class="carousel-control" aria-hidden="true">
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
                    <img src="assets/img/icon-left.png" class="carousel-control" aria-hidden="true">
                    <span class="sr-only">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
                    <img src="assets/img/icon-right.png" class="carousel-control" aria-hidden="true">
                    <span class="sr-only">Next</span>
                </button>
            </div>

        </div>
    </div>
</section>
<!--testimonial 2 end -->



<!--trending-->
<section class="trending-product pb-30 ">
    <div class="container">
        <div class="row">
            <div class="col-md-12 my-5">
                <div class="trending-samples-heading">
                    <h4>other <em>products</em></h4>
                    <span>ALL HONEYS ON TIOSWORLD</span>
                </div>
            </div>



            <div class="col-md-3 ">
                <div class="sample-card">
                    <div class="sample-logo">
                        <img src="{{asset('assets/img/sapmple-logo.png')}}" alt="sample-1">
                    </div>
                    <div class="sample-card-image">
                        <img src="{{asset('assets/img/sample-1.png')}}" alt="sample-1" class="sample-image">
                    </div>

                    <div class="sample-content">
                        <h4>Bamboo toothbrush</h4>
                        <p>Pack of 1 Rs. 80 1 tios points</p>
                    </div>
                    <div class="sample-footer">
                        <div class="cart-group">
                            <p><a href="view-cart.html">Add to <span class="it-style">cart</span></a></p>
                            <span> <a href="wishlist.html"><img src="./assets/img/heart.png" alt=""></a></span>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-3">
                <div class="sample-card">
                <div class="sample-logo">
                        <img src="{{asset('assets/img/sapmple-logo.png')}}" alt="sample-1">
                    </div>
                    <div class="sample-card-image">
                        <img src="{{asset('assets/img/sample-1.png')}}" alt="sample-1" class="sample-image">
                    </div>

                    <div class="sample-content">
                        <h4>Bamboo toothbrush</h4>
                        <p>Pack of 1 Rs. 80 1 tios points</p>
                    </div>
                    <div class="sample-footer">
                        <div class="cart-group">
                            <p><a href="view-cart.html">Add to <span class="it-style">cart</span></a></p>
                            <span> <a href="wishlist.html"><img src="./assets/img/heart.png" alt=""></a></span>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-3">
                <div class="sample-card">
                <div class="sample-logo">
                        <img src="{{asset('assets/img/sapmple-logo.png')}}" alt="sample-1">
                    </div>
                    <div class="sample-card-image">
                        <img src="{{asset('assets/img/sample-1.png')}}" alt="sample-1" class="sample-image">
                    </div>

                    <div class="sample-content">
                        <h4>Bamboo toothbrush</h4>
                        <p>Pack of 1 Rs. 80 1 tios points</p>
                    </div>
                    <div class="sample-footer">
                        <div class="cart-group">
                            <p><a href="view-cart.html">Add to <span class="it-style">cart</span></a></p>
                            <span> <a href="wishlist.html"><img src="./assets/img/heart.png" alt=""></a></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="sample-card">
                <div class="sample-logo">
                        <img src="{{asset('assets/img/sapmple-logo.png')}}" alt="sample-1">
                    </div>
                    <div class="sample-card-image">
                        <img src="{{asset('assets/img/sample-1.png')}}" alt="sample-1" class="sample-image">
                    </div>

                    <div class="sample-content">
                        <h4>Bamboo toothbrush</h4>
                        <p>Pack of 1 Rs. 80 1 tios points</p>
                    </div>
                    <div class="sample-footer">
                        <div class="cart-group">
                            <p><a href="view-cart.html">Add to <span class="it-style">cart</span></a></p>
                            <span> <a href="wishlist.html"><img src="./assets/img/heart.png" alt=""></a></span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>
<!--end trending-->

<!--projects-->
<section class=" projects pt-30 ">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="projects-heading  pt-20 pb-20">
                    <h2>@tios.world</h2>
                    <span class="recent-amazone-right-heading bg-white">
                        11.5k+ followers on Instagram
                        <img src="{{asset('assets/img/insta-2.png')}}">
                    </span>
                </div>
            </div>
        </div>

    </div>

    <div class="projects-list">
        <a href="#" class="projects-item">
            <div class="projects-item-image">
                <picture class="picture image-cover">
                    <img src="{{asset('assets/img/Instagram5.png')}}">

                </picture>
            </div>

        </a>
        <a href="#" class="projects-item">
            <div class="projects-item-image">
                <picture class="picture image-cover">
                    <img src="{{asset('assets/img/Instagram4.png')}}">

                </picture>
            </div>

        </a>
        <a href="#" class="projects-item">
            <div class="projects-item-image">
                <picture class="picture image-cover">
                    <img src="{{asset('assets/img/Instagram5.png')}}">

                </picture>
            </div>

        </a>
        <a href="#" class="projects-item">
            <div class="projects-item-image">
                <picture class="picture image-cover">
                    <img src="{{asset('assets/img/Instagram5.png')}}">

                </picture>
            </div>

        </a>
        <a href="#" class="projects-item">
            <div class="projects-item-image">
                <picture class="picture image-cover">
                    <img src="{{asset('assets/img/Rc-4.png')}}">

                </picture>
            </div>

        </a>
        <a href="#" class="projects-item">
            <div class="projects-item-image">
                <picture class="picture image-cover">
                    <img src="{{asset('assets/img/Rc-5.png')}}">

                </picture>
            </div>

        </a>
    </div>

</section>

<!--project end-->


<section class="bpt-30 pt-30 ">
    <div class="container">
        <div class="row py-4">
            <div class="col-md-9">
                <div class="try-samples-heading" id="partners-heading">
                    <h3><span class="normal-style">trusted</span> partners</h3>
                    <span>CURATED <span class="it-style">{{$brandCount}} BRANDS</span> FOR YOU</span>
                </div>
            </div>
            <div class="col-md-3 my-3">
                <div class="collections-btn" id="sapmple-btn">
                    <a href="all-sample-product.html" class="common-btn"><span class="normal-style">view all</span> <span class="it-style ml-0"> brands</span></a>
                </div>
            </div>

            <div class="col-md-12 my-3">
                <div class="row">
                    @foreach($brands as $brand)
                    <div class="col col1">
                        <div class="barnd-logo">
                            <img src="{{asset('uploads/profile_img')}}/{{$brand->logo}}" alt="{{$brand->name}}">
                        </div>
                    </div>
                    @endforeach



        </div>
    </div>
</section>

<!--brand logo end-->


<section class="curated-collections pt-30 pb-30">
    <div class="container">
        <div class="row">
            <div class="col-md-9 my-5">
                <div class="curated-collections-heading">
                    <h3><span class="normal-style">Curated</span> collections</h3>
                    <span>HANDPICKED products in each COLLECTION</span>
                </div>
            </div>
            <div class="col-md-3  my-5">
                <div class="collections-btn">
                    <a href="all-samples-page-1.html" class="common-btn"><span class="normal-style">view all</span> collections</a>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="block-1">
                    <div class="col-lg-12">
                        <div class="collection-card-custom">
                            <h4>Toothbrushes</h4>
                            <img src="{{asset('assets/img/collaction-1.png')}}">
                            <button class="btn-collection">View <span class="it-style">products</span></button>

                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="collection-card-custom">
                            <h4>Toothbrushes</h4>
                            <img src="{{asset('assets/img/collaction-1.png')}}">
                            <button class="btn-collection">View <span class="it-style">products</span></button>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="block-2">
                    <div class="col-lg-12">
                        <div class="collection-card-custom">
                            <h4>Toothbrushes</h4>
                            <img src="{{asset('assets/img/collaction-1.png')}}">
                            <button class="btn-collection">View <span class="it-style">products</span></button>

                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="collection-card-custom">
                            <h4>Toothbrushes</h4>
                            <img src="{{asset('assets/img/collaction-1.png')}}">
                            <button class="btn-collection">View <span class="it-style">products</span></button>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="block-3">
                    <div class="col-lg-12">
                        <div class="collection-card-custom">
                            <h4>Toothbrushes</h4>
                            <img src="{{asset('assets/img/collaction-1.png')}}">
                            <button class="btn-collection">View <span class="it-style">products</span></button>

                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="collection-card-custom">
                            <h4>Toothbrushes</h4>
                            <img src="{{asset('assets/img/collaction-1.png')}}">
                            <button class="btn-collection">View <span class="it-style">products</span></button>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="block-4">
                    <div class="col-lg-12">
                        <div class="collection-card-custom">
                            <h4>Toothbrushes</h4>
                            <img src="{{asset('assets/img/collaction-1.png')}}">
                            <button class="btn-collection">View <span class="it-style">products</span></button>

                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="collection-card-custom">
                            <h4>Toothbrushes</h4>
                            <img src="{{asset('assets/img/collaction-1.png')}}">
                            <button class="btn-collection">View <span class="it-style">products</span></button>

                        </div>
                    </div>
                </div>
            </div>



            <!--2nd row end-->
        </div>
    </div>
</section>

@include('front.layouts.footer')