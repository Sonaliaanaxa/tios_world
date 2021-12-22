@include('front.layouts.header')

<section class="ec-page-content section-space-p pt-30 pb-30">
    <div class="container">
        <div class="row">
            <div class="ec-cart-leftside col-md-8 ">
                <!-- cart content Start -->
                <form action="#">
                    <div class="table-content table-responsive cart-table-content">
                        <div class="cart-content">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Until Price</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="#"><img src="{{asset('assets/img/Instagram5.png')}}" alt="#"></a>
                                        </td>
                                        <td class="product-name"><a href="#">Indigenous honey</a></td>
                                        <td class="product-price-cart"><span class="amount">₹150.00</span></td>
                                        <td class="product-quantity pro-details-quality">
                                            <div class="control">
                                                <button class="bttn bttn-left" id="minus">
                                                    <span>-</span>
                                                </button>
                                                <input type="number" class="input" id="input">
                                                <button class="bttn bttn-right" id="plus">
                                                    <span>+</span>
                                                </button>
                                            </div>
                                        </td>
                                        <td class="product-subtotal">₹150.00</td>
                                        <td class="product-remove">
                                            <a href="#"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="cart-shiping-update-wrapper">
                                    <div class="cart-shiping-update">
                                        <a href="#">Continue Shopping</a>
                                    </div>
                                    <div class="cart-clear">
                                        <button>Update Cart</button>
                                        <a href="#">Clear Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>

            </div>
            <!--cart content End -->
        </div>


        <!-- Sidebar Area Start -->
        <div class="ec-cart-rightside col-lg-4 ">
            <!-- Sidebar Summary Block -->
            <div class="grand-totall">
                <div class="title-wrap">
                    <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                </div>
                <h5>Total products <span>₹260.00</span></h5>
                <div class="total-shipping">
                    <h5>Total shipping</h5>
                    <ul>
                        <li><input type="checkbox"> Standard <span>₹20.00</span></li>
                        <li><input type="checkbox"> Express <span>₹30.00</span></li>
                    </ul>
                </div>
                <h4 class="grand-totall-title">Grand Total <span>₹260.00</span></h4>
                <a href="{{route('checkout')}}" class="checkbtn">Proceed to Checkout</a>
            </div>
            <!-- Sidebar Summary Block -->
            <div class="grand-coupon">
                <form>
                    <div class="form-group">
                        <label>Coupon code<sup>*</sup>
                        </label>
                        <div class="form-group__content">
                            <input class="form-control" type="text" placeholder="coupon code">

                            <a href="{{route('checkout')}}" class="checkbtn">Apply coupon</a>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</section>

@include('front.layouts.footer')