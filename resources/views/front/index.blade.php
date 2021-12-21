
@include('front.layouts.header')
@include('front.layouts.flash-msg')

    @include('front.login')
        <!-- main-area -->
        <main>
    
            <!-- slider-area -->
            <section class="slider-area" style="background-image: url(assets/front/img/bg/slider_area_bg.jpg)"> 
                <div class="container custom-container">
                    <div class="row">
                        <div class="col-12">
                            <div class="slider-active">
                                @foreach($slider as $slide)
                                <div class="single-slider slider-bg" style="background-image:url('{{ asset('/uploads/homeslider/'.$slide->img) }}');">
                                    <div class="slider-content">
                                        <h5 class="sub-title" data-animation="fadeInUp" data-delay=".2s">{{$slide->sub_title}}</h5>
                                        <h2 class="title" data-animation="fadeInUp" data-delay=".4s">{{$slide->title}}</h2>
                                        <p data-animation="fadeInUp" data-delay=".6s">{{$slide->offers}}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                       
                    </div>
                </div>
             </section>
            <!-----------------Slider Area End --------------------------------------->

            <!-- Marqee slider -->
            <!-- special-products-area -->
            <section class="special-products-area gray-bg bgcolor py-3">
                <div class="container">
                    <div class="row align-items-end">
                        <marquee behavior="scroll" > <i class="fas fa-asterisk"></i> <b>18 Hours Delivery of Fresh Vegetable and Fruits From Farm to Your Door.</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-asterisk"></i> <b>3 Level Quality Check Before Delivery.</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-asterisk"></i> <b>Hygienically Packing</b></marquee>
                    </div>
                </div>
            </section>
            <!-- special-products-area-end -->
            <!-- Marqee slider -->

            <!-- special-products-area -->
            <section class="special-products-area gray-bg pt-75 pb-60">
                <div class="container">
                    <div class="row align-items-end mb-50">
                        <div class="col-md-8 col-sm-9">
                            <div class="section-title">
                                <!-- <span class="sub-title">Awesome Shop</span> -->
                                <h2 class="title">Our Products</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-3">
                            <div class="section-btn text-left text-md-right">
                                <!-- <a href="#" class="btn">View All</a> -->
                            </div>
                        </div>
                    </div>
                    <div class="special-products-wrap">
                        <div class="row">
                            <div class="col-12">
                                <div class="row justify-content-center">
                                    @foreach($products as $product)
                                    <div class="col-xl-2 col-md-2 col-sm-6">
                                        <div class="sp-product-item mb-20">
                                            <div class="sp-product-thumb">
                                                <!-- <span class="batch {{$product->discount % 2 == 0 ? 'even':'odd'}}">{{$product->discount}}%</span> -->
                                                <a href="javascript:void(0);"><img src="{{url('uploads/products/'.$product->upload_image)}}" alt=""></a>
                                            </div>
                                            <div class="sp-product-content">
                                                <!-- <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </div> -->
                                                <h6 class="title"><a href="javascript:void(0);">{{$product->name}}</a></h6>
                                                <span class="product-status">@if($product->current_stock >='1')
                                                                            In stock
                                                                            @else <p style="color:red;font-size: 12px;font-weight: 900;">Out Of Stock</p>
                                                                        @endif</span>
                                                <div class="sp-cart-wrap">
                             @php
                             if(Auth::user()) {
                                 $cart = App\Cart::where('products_id',$product->id)->where('user_id', Auth::user()->id)->first();
                                    if($cart){
                                       $quantity = $cart->quantity;
                                     }
                              else{
                                     $quantity = 0;
  
                                 }
                             }
                             else {
                                $quantity = 0;
                             }
                             @endphp
                                                 
                                                        <div class="cart-plus-minus">
                                                        <div class="dec qtybutton" onclick="return decrement('{{$product->id}}')">-</div>
                                                        <div class="inc qtybutton" onclick="return increment('{{$product->id}}')">+</div>
                                                        <input class='qty-{{$product->id}}' type="number" value="{{$quantity}}" min="0" name="quantity">
                                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                                    
                                                        </div>
                                                   
                                                </div>
                                                <p>{{$product->currency}} {{$product->price}} </p>
                                                <div class="weight">
                                                <p> {{$product->weight}} {{$product->unit}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                   
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- special-products-area-end -->

            <!-- discount-area -->
            <!-- <section class="discount-style-two pt-60 pb-50">
                <div class="container">
                    <div class="row">
                          @foreach($banners as $banner)
                        <div class="col-lg-6">
                            <div class="discount-item-two">
                                <div class="discount-thumb">
                                    <img src="{{asset('uploads/banner/'.$banner->image)}}" alt="">
                                </div>
                                <div class="discount-content">
                                    <span>{{$banner->sub_title}}</span>
                                    <h4 class="title"><a href="#">{{$banner->title}}</a></h4>
                                    <p>{{$banner->offers}}</p>
                                    
                                </div>
                            </div>
                        </div>
                            @endforeach
                        
                    </div>
                </div>
            </section> -->
         <!-- discount-area-end -->
         {{--
                            <div class="col-md-12">
                                <div class="avatar-post mt-10 mb-10">
                                    <div class="post-avatar-content">
                                    
                                        <h1><span style="font-weight:bold;"><b>.</b> 18 Hours Delivery of Fresh Vegetable and Fruits From Farm to Your Door.</span></h1><br>

                                        <h1><span style="font-weight:bold;"><b>.</b> 3 Level Quality Check Before Delivery.</span></h1><br>

                                        <h1><span style="font-weight:bold;"><b>.</b> Hygiene packing</span></h1>
                                    </div>
                                </div>
                          
                            </div>
                            --}}

        </main>
        <!-- main-area-end -->

@include('front.layouts.footer')
  <script type="text/javascript">

    // function increment(id){
    //     var qty = $('.qty-'+id).val();
    //     $.ajax({
    //         url: "{{ route('addToCart') }}",
    //         type: 'POST',
    //         data: {proid:id,qty:qty,_token:'{{ csrf_token() }}'},
    //         success: function(response)
    //         {
    //             console.log(response);
    //         }
    //     });
    // }

    // function decrement(id){
    //     var qty = $('.qty-'+id).val();
    //     $.ajax({
    //         url: "{{ route('addToCart') }}",
    //         type: 'POST',
    //         data: {proid:id,qty:qty,_token:'{{ csrf_token() }}'},
    //         success: function(response)
    //         {
    //             console.log(response);
    //         }
    //     });
    // }


    // $(window).on('load', function() {
    //     $('#modalLoginForm').modal('show');
    // });

   $(document).ready(function() {
    $('form input').keyup(function() {

        var empty = false;
        $('form input').each(function() {

            if ($(this).val() == '') {
                empty = true;
            }
        });

        if (empty) {
            $('#validate-phone').attr('disabled', 'disabled'); 
        } else {
            $('#validate-phone').removeAttr('disabled'); 
        }
    });

    $('.inc').click(function(){
        // var id = $('.cart-plus-minus > .inc').attr(id);
        // alert(id);
        // var id = $('.cart-plus-minus > .inc').attr('id');
        var id = $(".inc").parentsUntil(".cart-plus-minus");
        console.log(id);
    })



});

// $(".cart-plus-minus").on('click', function(event) {
//         event.preventDefault();
//         var $button = $(this).parent().find('[name=product_id]').val();
//        alert($button);
//         var data = $(this).serialize();
//         $.ajax({
//             type: "post",
//             url: "{{ route('addToCart') }}",
//             dataType: "json",
//             headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
//             data: data,
//         }).done(function () {
//           $button.prop('disabled', true)
//         });
//     });
    // $('.dec.qtybutton').click(function(){
    //     console.log($(this).parent().find('[name=product_id]').val())
    //     }
    // )



</script>      