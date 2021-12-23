@include('front.layouts.header')
@include('front.layouts.flash-msg')

<!--hero banner-->
<section class="banner">
</section>
<!--hero banner end-->
<!--service box-->
<section class="service-box pt-30 pb-30">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="service-group">
                    <div class="service-content">
                        <span class="offer-span">Free</span>
                        <div class="service-right-content">
                            <h6>Any 5 samples</h6>
                            <span>Try <span class="it-style">First,</span> Shipping Rs.100</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-group">
                    <div class="service-content">
                        <span class="offer-span">10% off</span>
                        <div class="service-right-content">
                            <h6>Honey, <span style="font-weight: 300; font-style: italic; font-size: 20px;">Honey</span></h6>
                            <span>ALL honeys, code <span class="it-style">HOney</span></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-group">
                    <div class="service-content">
                        <span class="offer-span">5% off</span>
                        <div class="service-right-content">
                            <h6>HDFC bank </h6>
                            <span>Debit and credit cards</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--service box end-->
<!--Curated collections-->
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
                    <a href="{{route('sample-product')}}" class="common-btn"><span class="normal-style">view all</span>
                        collections</a>
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
<!--Curated collections end-->
<!--try samples-->
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
                    <a href="{{route('sample-product')}}" class="common-btn"><span class="normal-style">view all</span> <span class="it-style ml-0">free sample</span></a>
                </div>
            </div>
            <!--carousel start-->
            <div class="col-md-12 my-5">
                <div class="owl-carousel carousel-main">
                    @foreach($products as $product)
                    <div class="sample-card">
                        <div class="sample-logo">
                            <img src="{{asset('assets/img/sapmple-logo.png')}}" alt="sample-1">
                        </div>
                        <div class="sample-card-image">
                            <img src="{{asset('assets/img/sample-1.png')}}" alt="sample-1" class="sample-image">
                        </div>
                        <div class="sample-content">
                            <h4>{{$product->name}}</h4>
                            <p>Pack of 1 <span class="old-price ">Rs. 80</span> 1 tios points</p>
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
<!--try samples end-->
<!--trending-->
<section class="trending pt-30 pb-30">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="try-samples-heading">
                    <h3><span class="normal-style">trending</span> now</h3>
                    <span>BESTSELLILNG PRODUCTS ON TIOSWORLD</span>
                </div>
            </div>
            <!--carousel start-->
            <div class="col-md-12 my-5">
                <div class="owl-carousel carousel-main">
                    <div class="sample-card">
                        <div class="sample-logo">
                            <img src="{{asset('assets/img/sapmple-logo.png')}}" alt="sample-1">
                        </div>
                        <div class="sample-card-image">
                            <img src="{{asset('assets/img/sample-1.png')}}" alt="sample-1" class="sample-image">
                        </div>
                        <div class="sample-content">
                            <h4>Bamboo toothbrush</h4>
                            <p>Rs 270</p>
                        </div>
                        <div class="sample-footer">
                            <div class="cart-group">
                                <p><a href="{{route('view-cart')}}">Add to <span class="it-style">cart</span></a></p>
                                <span> <a href="{{route('wishlist')}}"><i class="fa fa-heart-o"></i></a></span>
                            </div>
                        </div>
                    </div>
                    <div class="sample-card">
                        <div class="sample-logo">
                            <img src="{{asset('assets/img/sapmple-logo.png')}}" alt="sample-1">
                        </div>
                        <div class="sample-card-image">
                            <img src="{{asset('assets/img/trending-1.png')}}" alt="sample-1" class="sample-image">
                        </div>
                        <div class="sample-content">
                            <h4>Bamboo toothbrush</h4>
                            <p>Rs 270</p>
                        </div>
                        <div class="sample-footer">
                            <div class="cart-group">
                                <p><a href="{{route('view-cart')}}">Add to <span class="it-style">cart</span></a></p>
                                <span> <a href="{{route('wishlist')}}"><i class="fa fa-heart-o"></i></a></span>
                            </div>
                        </div>
                    </div>
                    <div class="sample-card">
                        <div class="sample-logo">
                            <img src="{{asset('assets/img/sapmple-logo.png')}}" alt="sample-1">
                        </div>
                        <div class="sample-card-image">
                            <img src="{{asset('assets/img/trending-1.png')}}" alt="sample-1" class="sample-image">
                        </div>
                        <div class="sample-content">
                            <h4>Bamboo toothbrush</h4>

                            <p>Rs 270</p>
                        </div>
                        <div class="sample-footer">
                            <div class="cart-group">
                                <p><a href="{{route('view-cart')}}">Add to <span class="it-style">cart</span></a></p>
                                <span> <a href="{{route('wishlist')}}"><img src="./{{asset('assets/img/heart.png')}}" alt=""></a></span>
                            </div>
                        </div>
                    </div>
                    <div class="sample-card">
                        <div class="sample-logo">
                            <img src="{{asset('assets/img/sapmple-logo.png')}}" alt="sample-1">
                        </div>
                        <div class="sample-card-image">
                            <img src="{{asset('assets/img/trending-1.png')}}" alt="sample-1" class="sample-image">
                        </div>
                        <div class="sample-content">
                            <h4>Bamboo toothbrush</h4>
                            <p>Rs 270</p>
                        </div>
                        <div class="sample-footer">
                            <div class="cart-group">
                                <p><a href="{{route('view-cart')}}">Add to <span class="it-style">cart</span></a></p>
                                <span> <a href="{{route('wishlist')}}"><i class="fa fa-heart-o"></i></a></span>
                            </div>
                        </div>
                    </div>
                    <div class="sample-card">
                        <div class="sample-logo">
                            <img src="{{asset('assets/img/sapmple-logo.png')}}" alt="sample-1">
                        </div>
                        <div class="sample-card-image">
                            <img src="{{asset('assets/img/trending-1.png')}}" alt="sample-1" class="sample-image">
                        </div>
                        <div class="sample-content">
                            <h4>Bamboo toothbrush</h4>
                            <p>Rs 270</p>
                        </div>
                        <div class="sample-footer">
                            <div class="cart-group">
                                <p><a href="{{route('view-cart')}}">Add to <span class="it-style">cart</span></a></p>
                                <span> <a href="{{route('wishlist')}}"><i class="fa fa-heart-o"></i></a></span>
                            </div>
                        </div>
                    </div>
                    <div class="sample-card">
                        <div class="sample-logo">
                            <img src="{{asset('assets/img/sapmple-logo.png')}}" alt="sample-1">
                        </div>
                        <div class="sample-card-image">
                            <img src="{{asset('assets/img/trending-1.png')}}" alt="sample-1" class="sample-image">
                        </div>
                        <div class="sample-content">
                            <h4>Bamboo toothbrush</h4>
                            <p>Rs 270</p>
                        </div>
                        <div class="sample-footer">
                            <div class="cart-group">
                                <p><a href="{{route('view-cart')}}">Add to <span class="it-style">cart</span></a></p>
                                <span> <a href="{{route('wishlist')}}"><i class="fa fa-heart-o"></i></a></span>
                            </div>
                        </div>
                    </div>
                    <div class="sample-card">
                        <div class="sample-logo">
                            <img src="{{asset('assets/img/sapmple-logo.png')}}" alt="sample-1">
                        </div>
                        <div class="sample-card-image">
                            <img src="{{asset('assets/img/trending-1.png')}}" alt="sample-1" class="sample-image">
                        </div>
                        <div class="sample-content">
                            <h4>Bamboo toothbrush</h4>
                            <p>Rs 270</p>
                        </div>
                        <div class="sample-footer">
                            <div class="cart-group">
                                <p><a href="{{route('view-cart')}}">Add to <span class="it-style">cart</span></a></p>
                                <span> <a href="{{route('wishlist')}}"><i class="fa fa-heart-o"></i></a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--trending end-->
<!--add-->
<section>
    <a href="#"><img src="{{asset('assets/img/add-1.png')}}"></a>

</section>
<!--add end-->
<!--barnd-logo-->
<section class="bpt-30 pt-30 pb-30">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="try-samples-heading" id="partners-heading">
                    <h3><span class="normal-style">trusted</span> partners</h3>
                    <span>CURATED <span class="it-style">156 BRANDS</span> FOR YOU</span>
                </div>
            </div>
            <div class="col-md-3 my-3">
                <div class="collections-btn" id="sapmple-btn">
                    <a href="{{route('sample-product')}}" class="common-btn"><span class="normal-style">view all</span> <span class="it-style ml-0"> brands</span></a>
                </div>
            </div>
            <div class="col-md-12 py-5">
                <div class="row">
                    <div class="col col1">
                        <div class="barnd-logo">
                            <img src="{{asset('assets/img/brand-logo.png')}}" alt="sample-1">
                        </div>
                    </div>
                    <div class="col col2">
                        <div class="barnd-logo">
                            <img src="{{asset('assets/img/brand-logo.png')}}" alt="sample-1">
                        </div>
                    </div>
                    <div class="col col2">
                        <div class="barnd-logo">
                            <img src="{{asset('assets/img/brand-logo.png')}}" alt="sample-1">
                        </div>
                    </div>
                    <div class="col col2">
                        <div class="barnd-logo">
                            <img src="{{asset('assets/img/brand-logo.png')}}" alt="sample-1">
                        </div>
                    </div>
                    <div class="col col2">
                        <div class="barnd-logo">
                            <img src="{{asset('assets/img/brand-logo.png')}}" alt="sample-1">
                        </div>
                    </div>
                </div>
            </div>
            <!--2nd colom-->
            <div class="col col2">
                <div class="barnd-logo">
                    <img src="{{asset('assets/img/brand-logo.png')}}" alt="sample-1">
                </div>
            </div>
            <div class="col col2">
                <div class="barnd-logo">
                    <img src="{{asset('assets/img/brand-logo.png')}}" alt="sample-1">
                </div>
            </div>
            <div class="col col2">
                <div class="barnd-logo">
                    <img src="{{asset('assets/img/brand-logo.png')}}" alt="sample-1">
                </div>
            </div>
            <div class="col col2">
                <div class="barnd-logo">
                    <img src="{{asset('assets/img/brand-logo.png')}}" alt="sample-1">
                </div>
            </div>
            <div class="col col2">
                <div class="barnd-logo">
                    <img src="{{asset('assets/img/brand-logo.png')}}" alt="sample-1">
                </div>
            </div>
        </div>
    </div>
</section>
<!--barnd logo end-->
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
                        <h5>It was so difficult for me to make choice for all my sustainable shopping needs. Tiosworld has done
                            the hard part of me. Plus i’am hooked to using free samples now...Read More</h5>
                        <p>SAKSHI AGARWAL 02 • 02 • 22</p><br>
                        <a href="#" class="common-btn"><span class="normal-style">write your review about us</span></a>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-caption  d-md-block">
                        <h5>It was so difficult for me to make choice for all my sustainable shopping needs. Tiosworld has done
                            the hard part of me. Plus i’am hooked to using free samples now...Read More</h5>
                        <p>SAKSHI AGARWAL 02 • 02 • 22</p><br>
                        <a href="#" class="common-btn"><span class="normal-style">write your review about us</span></a>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-caption  d-md-block">
                        <h5>It was so difficult for me to make choice for all my sustainable shopping needs. Tiosworld has done
                            the hard part of me. Plus i’am hooked to using free samples now...Read More</h5>
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
<!--add-->
<section>
    <a href="#"><img src="{{asset('assets/img/add-2.png')}}"></a>

</section>
<!--add end-->
<!--frame village-->
<section class=" projects pt-30 ">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="projects-heading  pt-20 pb-20">
                    <h2>@tios.world</h2>
                    <span class="recent-amazone-right-heading">
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
                    <img src="{{asset('assets/img/Instagram.png')}}">
                </picture>
            </div>
        </a>
        <a href="#" class="projects-item">
            <div class="projects-item-image">
                <picture class="picture image-cover">
                    <img src="{{asset('assets/img/Instagram1.png')}}">
                </picture>
            </div>
        </a>
        <a href="#" class="projects-item">
            <div class="projects-item-image">
                <picture class="picture image-cover">
                    <img src="{{asset('assets/img/Instagram3.png')}}">
                </picture>
            </div>
        </a>
        <a href="#" class="projects-item">
            <div class="projects-item-image">
                <picture class="picture image-cover">
                    <img src="{{asset('assets/img/Rectangle2.png')}}">
                </picture>
            </div>
        </a>
        <a href="#" class="projects-item">
            <div class="projects-item-image">
                <picture class="picture image-cover">
                    <img src="{{asset('assets/img/Rectangle21.png')}}">
                </picture>
            </div>
        </a>
        <a href="#" class="projects-item">
            <div class="projects-item-image">
                <picture class="picture image-cover">
                    <img src="{{asset('assets/img/Rectangle23.png')}}">
                </picture>
            </div>
        </a>
    </div>
</section>
<!--frame village-end-->
<!-- Footer -->
@include('front.layouts.footer')