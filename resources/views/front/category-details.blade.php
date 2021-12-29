@include('front.layouts.header')

<section class="trending pt-30 pb-30 smp-card" id="sample-products">
    <div class="container">
        <div class="row">
            <div class="col-md-8 my-5">
                <div class="try-samples-heading collection-heading" id="home-try">
                    <span class="star-logo">
                        <h3>all of <span class="it-style">organic honey</span></h3>
                    </span>
                    <span>ALL PRODUCTS</span>
                </div>
            </div>



            <div class="col-md-2 my-5">
                <div class="collections-btn">
                    <a href="#" class="common-btn"><img src="{{asset('assets/img/short.png')}}"><span>Sort</span></a>
                </div>
            </div>


            <div class="col-md-2 my-5">
                <div class="collections-btn">
                    <a href="#" class="common-btn"><img src="{{asset('assets/img/fliter.png')}}"><span>filter</span></a>
                </div>
            </div>

            @foreach($products as $product)
            <div class="col-md-3">
               
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
                            <p>Add to cart</p>
                            <span><i class="fa fa-heart-o"></i></span>
                        </div>
                    </div>
                </div>
            
            </div>
            @endforeach
        </div>

    </div>
</section>

<!--all sample end-->

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
<!--Curated collections end-->


@include('front.layouts.footer')