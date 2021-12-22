@include('front.layouts.header')


<section class="wishlist pt-30 pb-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 m-auto">
                <div class="mb-50">
                    <h1 class="heading-2 mb-10">Your Wishlist</h1>
                    <h6 class="text-body my-3">There are <span class="text-brand">2</span> products in this list</h6>
                </div>
                <div class="table-responsive shopping-summery">
                    <table class="table table-wishlist">
                        <thead>
                            <tr class="main-heading">
                                <th class="custome-checkbox start pl-30">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox11" value="">
                                    <label class="form-check-label" for="exampleCheckbox11"></label>
                                </th>
                                <th scope="col" colspan="2">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Stock Status</th>
                                <th scope="col">Action</th>
                                <th scope="col" class="end">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="pt-30">
                                <td class="custome-checkbox pl-30">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="">
                                    <label class="form-check-label" for="exampleCheckbox1"></label>
                                </td>
                                <td class="image product-thumbnail pt-40"><img src="assets/img/Instagram5.png" alt="#"></td>
                                <td class="product-des product-name">
                                    <h6><a class="product-name mb-10" href="#">Indigenous honey
                                        </a></h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 100%">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                </td>
                                <td class="price" data-title="Price">
                                    <h3 class="text-brand">₹222.51</h3>
                                </td>
                                <td class="text-center detail-info" data-title="Stock">
                                    <span class="stock-status in-stock mb-0"> In Stock </span>
                                </td>
                                <td class="text-right wishlist-btn" data-title="Cart">
                                    <button class="btn btn-sm">Add to cart</button>
                                </td>
                                <td class="action text-center" data-title="Remove">
                                    <a href="#" class="text-body"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="custome-checkbox pl-30">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox2" value="">
                                    <label class="form-check-label" for="exampleCheckbox2"></label>
                                </td>
                                <td class="image product-thumbnail"><img src="assets/img/cart-1.png" alt="#"></td>
                                <td class="product-des product-name">
                                    <h6><a class="product-name mb-10" href="#">Indigenous honey
                                        </a></h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 100%">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                </td>
                                <td class="price" data-title="Price">
                                    <h3 class="text-brand">₹ 322.2</h3>
                                </td>
                                <td class="text-center detail-info" data-title="Stock">
                                    <span class="stock-status in-stock mb-0"> In Stock </span>
                                </td>
                                <td class="text-right wishlist-btn" data-title="Cart">
                                    <button class="btn btn-sm">Add to cart</button>
                                </td>
                                <td class="action text-center" data-title="Remove">
                                    <a href="#" class="text-body"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="row">
        <div class="col-md-9 my-5">
            <div class="curated-collections-heading">
                <h3><span class="normal-style">discover all</span> curated collections</h3>
                <span>All PRODUCTS</span>
            </div>
        </div>

        <div class="col-md-3  my-5">
            <div class="collections-btn text-end">
                <a href="#" class="common-btn common-btn-normal"><img src="assets/img/fliter.png"><span>filter</span></a>
            </div>
        </div>


        <div class="col-lg-3">
            <div class="col-lg-12">
                <div class="collection-card-custom">
                    <h4>Toothbrushes</h4>
                    <img src="assets/img/collaction-1.png">
                    <button class="btn-collection">View <span class="it-style">products</span></button>

                </div>
            </div>
            <div class="col-lg-12">
                <div class="collection-card-custom">
                    <h4>Toothbrushes</h4>
                    <img src="assets/img/collaction-1.png">
                    <button class="btn-collection">View <span class="it-style">products</span></button>

                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="col-lg-12">
                <div class="collection-card-custom">
                    <h4>Toothbrushes</h4>
                    <img src="assets/img/collaction-1.png">
                    <button class="btn-collection">View <span class="it-style">products</span></button>

                </div>
            </div>
            <div class="col-lg-12">
                <div class="collection-card-custom">
                    <h4>Toothbrushes</h4>
                    <img src="assets/img/collaction-1.png">
                    <button class="btn-collection">View <span class="it-style">products</span></button>

                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="col-lg-12">
                <div class="collection-card-custom">
                    <h4>Toothbrushes</h4>
                    <img src="assets/img/collaction-1.png">
                    <button class="btn-collection">View <span class="it-style">products</span></button>

                </div>
            </div>
            <div class="col-lg-12">
                <div class="collection-card-custom">
                    <h4>Toothbrushes</h4>
                    <img src="assets/img/collaction-1.png">
                    <button class="btn-collection">View <span class="it-style">products</span></button>

                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="col-lg-12">
                <div class="collection-card-custom">
                    <h4>Toothbrushes</h4>
                    <img src="assets/img/collaction-1.png">
                    <button class="btn-collection">View <span class="it-style">products</span></button>

                </div>
            </div>
            <div class="col-lg-12">
                <div class="collection-card-custom">
                    <h4>Toothbrushes</h4>
                    <img src="assets/img/collaction-1.png">
                    <button class="btn-collection">View <span class="it-style">products</span></button>

                </div>
            </div>
        </div>

        <!--2nd row end-->






    </div>


</div>
</section>
<!--Curated collections end-->
@include('front.layouts.footer')