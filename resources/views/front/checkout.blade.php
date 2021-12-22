@include('front.layouts.flash-msg')
@include('front.layouts.header')

<!--checkout-->
<section class="page-content pt-30 pb-30">
    <div class="checkout">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="checkout-form">
                        <form>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h2 class="checkout-title">Billing Address</h2>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="You Name Here">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="street-address" name="street-address" placeholder="Street Address">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="state" name="state" placeholder="State">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="Zip/Postal Code">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <select class="form-select" id="country">
                                        <option>Country</option>
                                        <option>india</option>
                                        <option>bangladesh</option>
                                    </select>
                                </div>
                            </div>
                            <div class="payment-method">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h2 class="checkout-title">Payment Method</h2>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="form-check card-check">
                                                <input class="form-check-input" type="radio" name="card" id="creditcard" value="creditcard" checked="checked">
                                                <label class="form-check-label" for="creditcard"> Credit Card</label>
                                                <div class="input-icon">
                                                    <img src="{{asset('assets/img/payment-method.png')}}" alt="payment-method">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-infor-box">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="card-humber">Card Number</label>
                                                        <input type="text" class="form-control" id="card-humber" name="card-humber" placeholder="0000 0000 0000 0000 ">
                                                        <div class="input-icon">
                                                            <img src="{{asset('assets/img/card-image.png')}}" alt="payment-method">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <label>Expire Date</label>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <select class="form-select" id="Month">
                                                                <option>Month</option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <select class="form-select" id="Year">
                                                                <option>Year</option>
                                                                <option>2020</option>
                                                                <option>2019</option>
                                                                <option>2018</option>
                                                                <option>2017</option>
                                                                <option>2016</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="ccv">ccv</label>
                                                        <input type="text" class="form-control" id="ccv" name="ccv" placeholder="Three Digit ">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check card-check">
                                                <input class="form-check-input" type="radio" name="card" id="paypal" value="paypal">
                                                <label class="form-check-label" for="paypal">Paypal</label>
                                                <div class="input-icon">
                                                    <img src="{{asset('assets/img/paypal.png')}}" alt="paypal">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group form-check terms-agree">
                                            <input type="checkbox" class="form-check-input" id="agree">
                                            <label class="form-check-label" for="agree">By clicking the button you agree to our <a href="#">Terms &amp; Conditions</a></label>
                                        </div>
                                        <button type="button" class="checkout-btn form-btn">Place Order</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="cart-summary">
                        <div class="summary-top d-flex">
                            <h2>Cart Summary</h2>
                        </div>
                        <ul class="cart-product-list">
                            <li class="single-cart-product d-flex justify-content-between">
                                <div class="product-info">
                                    <h3>Indigenous honey</h3>
                                    <p>quantity : 500ml</p>
                                    <p>P. Code: SF5FS4F54FD</p>
                                </div>
                                <div class="price-area">
                                    <h3 class="price">₹50.60</h3>
                                </div>
                            </li>
                            <li class="single-cart-product d-flex justify-content-between">
                                <div class="product-info">
                                    <h3>Indigenous honey</h3>
                                    <p>quantity : 500ml</p>
                                    <p>P. Code: SF5FS4F54FD</p>
                                </div>
                                <div class="price-area">
                                    <h3 class="price">₹50.60</h3>
                                </div>
                            </li>
                        </ul>
                        <ul class="summary-list">
                            <li>Subtotal <span>₹500.50</span></li>
                            <li>Shipping Cost <span>₹15.50</span></li>
                            <li>VAT/Tax 15% <span>₹20.00</span></li>
                        </ul>
                        <div class="total-amount">
                            <h3>Total Cost <span class="float-right">₹20.00</span></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--checkout end-->

@include('front.layouts.footer')