@include('front.layouts.header')

        <!-- main-area -->
        <main>

            <!-- breadcrumb-area -->
            <section class="breadcrumb-area breadcrumb-bg"  style="background-image:url('{{ asset('/uploads/banner/'.$slider->image) }}');">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="breadcrumb-content">
                                <h2 class="title">Shopping Cart</h2>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                                        </ol>
                                    </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- breadcrumb-area-end -->

            <!-- cart-area -->
            <div class="cart-area pt-90 pb-90">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-7">
                            <div class="cart-wrapper">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th class="product-thumbnail"></th>
                                                <th class="product-name">Product</th>
                                                <th class="product-price">Price</th>
                                                <th class="product-quantity">QUANTITY</th>
                                                <th class="product-subtotal">SUBTOTAL</th>
                                                <th class="product-delete"></th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                        @php
                                            $total = 0;
                                            $delcharge = 0;
                                        @endphp
                                            @foreach($carts as $cart)
                                       
                                            <tr>
                                                <td class="product-thumbnail"><a href="{{route('shop-details')}}"><img src="{{asset('uploads/products/'.$cart->products->upload_image)}}" alt=""></a></td>
                                                <td class="product-name">
                                                    <h4><a href="{{route('shop-details')}}">{{$cart->products->name}}</a></h4>
                                                </td>
                                                <td class="product-price">{{$cart->products->currency}} {{$cart->products->price}}</td>
                                                <td class="product-quantity">
                                                    <div class="cart--plus--minus">
                                                        <form  class="num-block">
                                                            <input type="number" class="in-num qty-{{$cart->products_id}}"  value="{{$cart->quantity}}" readonly="" name="quantity">
                                                            <div class="qtybutton-box">
                                                                <span class="plus" onclick="return increment('{{$cart->products_id}}')"><i class="fas fa-angle-up"></i></span>
                                                                <span class="minus dis" onclick="return decrement('{{$cart->products_id}}')"><i class="fas fa-angle-down"></i></span>
                                                                <input type="hidden" name="products_id" value="{{$cart->products_id}}">
                                                            </div>

                                                        </form>
                                                    </div>
                                                </td>
                                                <td class="product-subtotal"><span>{{$cart->products->currency}}  {{$cart->products->price * $cart->quantity}}.00</span></td>
                                                <td class="product-delete"><a href="{{url('delete-cart/'.$cart->id)}}"><i class="far fa-trash-alt"></i></a></td>
                                            </tr>
                                            @php
                                                $delcharge = $delcharge + $cart->products->delivery_charge;
                                                $price = $cart->quantity *  $cart->products->price;
                                                $total = $total + $price;
                                            @endphp
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- <div class="shop-cart-bottom">
                                <div class="cart-coupon">
                                    <form action="#">
                                        <input type="text" placeholder="Enter Coupon Code...">
                                        <button class="btn">Apply Coupon</button>
                                    </form>
                                </div>
                                <div class="continue-shopping">
                                    <a href="" class="btn">update Cart</a>
                                </div>
                            </div> -->
                        </div>
                        <div class="col-xl-5 col-lg-12">
                            <div class="shop-cart-total">
                                <h3 class="title">Cart Totals</h3>
                                <div class="shop-cart-widget">
                                    <form action="#">
                                        <ul>
                                            <li class="sub-total">
                                                <span>Subtotal</span>
                                                {{$cart->products->currency}} {{$total}}.00 
                                            </li>
                                            
                                            <li class="cart-total-amount">
                                                <span>Delivery Charges</span> 
                                                <del><span class="amount">{{$cart->products->currency}} {{$delivery_charges->delivery_charges}}</span></del>
                                            </li>

                                            <li class="cart-total-amount">
                                                <span>Total Price</span> 
                                                <span class="amount">{{$cart->products->currency}}  {{$total}}.00</span>
                                            </li>
                                        </ul>
                                        <a href="{{route('checkout')}}" class="btn">PROCEED TO CHECKOUT</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- cart-area-end -->

        </main>
        <!-- main-area-end -->


@include('front.layouts.footer')
        