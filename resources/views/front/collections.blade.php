@include('front.layouts.header')


<section class="collaction-honeys-slider pt-50 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-md-9 my-3">
                <div class="try-samples-heading collection-heading" id="home-try">
                    <span class="star-logo">
                        <h3>curated collection of <span class="it-style"> {{strtolower($collection->name)}}</span></h3>
                    </span>
                    <span>HANDPICKED PRODUCTS</span>
                </div>
            </div>
            <div class="col-md-3 my-3">
                <div class="right-logo">
                    <figure><img src="{{ asset('/uploads/collections') }}/{{ $collection->img }}" alt="{{$collection->name}}"></figure>
                </div>
            </div>
            <!--carousel start-->
            <div class="col-md-12 my-5">
                <div class="owl-carousel carousel-main">
                    @foreach($curatedProducts as $product)
                    <div class="sample-card">
                        <div class="sample-logo">
                            <img src="{{asset('assets/img/sapmple-logo.png')}}" alt="sample-1">
                        </div>
                        <div class="sample-card-image">
                            <img src="{{asset('uploads/products')}}/{{$product->upload_image}}" alt="{{$product->name}}" class="sample-image">
                        </div>

                        <div class="sample-content" id="collaction-page-content">
                            <h4>{{$product->name}}</h4>
                            <div class="star-rate">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-o"></i>
                            </div>
                            <p>8,708 ratings on amazon</p>
                            <p>Wildflower Honey</p>

                            <p>Sourced from Gir forest area, Gujarat</p>

                            <p>NMR Tested, Jaivik Bharat</p>


                            <div class="price-rate">
                                <span class="new-price">
                                    Rs.{{$product->purchase_price}}
                                </span>

                                <span class="old-price">
                                    Rs.{{$product->selling_price}} ({{$product->discount}}%)
                                </span>

                                <span>{{$product->weight}} {{$product->unit}} (Rs 0.9/g)</span>
                            </div>

                        </div>
                        <div class="sample-footer" id="collaction-card-footer">
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
<!--organic honeys end-->


<!--add-->

<a href="#">
    <section class="add  pb-30 mb-5" id="add-3">
        <div class="container-fluid">

        </div>
    </section>
</a>
<!--add end-->
<!--try sample-->
<section class="try-samples1 pt-30 pb-30">
    <div class="container">
        <div class="row">
            <div class="col-md-6 py-5">

                <div class="sample-card1">
                    <h5>organic {{strtolower(@$organicCollection->name)}},aha</h5>

                    <div class="sample-content">
                        <p>{{@$organicCollection->organic}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 py-5">
                <div class="sample-card1">
                    <h5>regular {{strtolower(@$regularCollection->name)}}, nah</h5>
                    <div class="sample-content">
                        <p> {{@$regularCollection->regular}}</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!--try sample end-->
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
                    <a href="all-sample-product.html" class="common-btn"><span class="normal-style">view all</span> <span class="it-style ml-0">free sample</span></a>
                </div>
            </div>

            <!--carousel start-->
            <div class="col-md-12 py-5">
                <div class="owl-carousel carousel-main">
                    @foreach($trySamples as $sample)
                    <div class="sample-card">
                        @php
                        $user_id = $sample->user_id;
                        $user = App\User::select('logo')->where('id',$user_id)->first();
                        @endphp
                        <div class="sample-logo">
                            <img src="{{ asset('/uploads/profile_img') }}/{{ $user->logo }}" alt="{{$sample->name}}">
                        </div>
                        <div class="sample-card-image">
                            <img src="{{ asset('/uploads/trial_products') }}/{{ $sample->upload_image }}" alt="{{$sample->name}}" class="sample-image">
                        </div>

                        <div class="sample-content">
                            <h4>{{$sample->name}}</h4>
                            <p>Pack of 1 Rs. {{$sample->selling_price}} {{$sample->tios_points}} tios points</p>
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
<!--try sample end-->




<!--trending-->
<section class="trending-product pt-30 pb-30 ">
    <div class="container">
        <div class="row">
            <div class="col-md-12 my-3">
                <div class="trending-samples-heading">
                    <h4>other <span class="it-style">organic</span> honeys</h4>
                    <span>ALL HONEYS ON TIOSWORLD</span>
                </div>
            </div>
            @foreach($curatedProducts as $product)
            <div class="col-md-3">
                <div class="sample-card">
                    <div class="sample-logo">
                        @php
                        $user_id = $product->user_id;
                        $user = App\User::select('logo')->where('id',$user_id)->first();
                        @endphp
                        <img src="{{ asset('/uploads/profile_img') }}/{{ $user->logo }}" alt="{{$user->logo}}">
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
                            <p><a href="view-cart.html">Add to <span class="it-style">cart</span></a></p>
                            <span> <a href="wishlist.html"><img src="./{{asset('assets/img/heart.png')}}" alt=""></a></span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>
<!--end trending-->


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