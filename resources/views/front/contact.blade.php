@include('front.layouts.header')




        <!-- main-area -->
        <main>

            <!-- map-area -->
            <div id="map-bg">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d56025.849904048!2d77.28237809012904!3d28.641280227748016!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce4ccb05bc269%3A0xa37fbd71ecb52fd9!2sGazipur%20Village!5e0!3m2!1sen!2sin!4v1633951117787!5m2!1sen!2sin" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <!-- map-area-end -->

            <!-- contact-area -->
            <section class="contact-area pt-90 pb-90">
                <div class="container">
                    <div class="container-inner-wrap">
                        <div class="row justify-content-center justify-content-lg-between">
                            <div class="col-lg-6 col-md-8 order-2 order-lg-0">
                                <div class="contact-title mb-25">
                                    <h5 class="sub-title">Contact Us</h5>
                                    <h2 class="title">Let's Talk Question<span>.</span></h2>
                                </div>
                                <div class="contact-wrap-content">
                                    <p>Making for software espially of the relating espeially of the face costa when unknown galley of type and scrambled.</p>
                                    <form action="#" class="contact-form">
                                        <div class="form-grp">
                                            <label for="name">Your Name <span>*</span></label>
                                            <input type="text" id="name" placeholder="Jon Deo...">
                                        </div>
                                        <div class="form-grp">
                                            <label for="email">Your Email <span>*</span></label>
                                            <input type="text" id="email" placeholder="info.example@.com">
                                        </div>
                                        <div class="form-grp">
                                            <label for="message">Your Message <span>*</span></label>
                                            <textarea name="message" id="message" placeholder="Opinion..."></textarea>
                                        </div>
                                        <div class="form-grp checkbox-grp">
                                            <input type="checkbox" id="checkbox">
                                            <label for="checkbox">Don’t show your email address</label>
                                        </div>
                                        <button type="button" class="btn rounded-btn">Send Now</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-6 col-md-8">
                                <div class="contact-info-wrap">
                                    <div class="contact-img">
                                        <img src="{{asset('assets/front/img/images/contact_img.png')}}" alt="">
                                    </div>
                                    <div class="contact-info-list">
                                        <ul>
                                            <li>
                                                <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                                                <div class="content">
                                                    <p>966, Pocket C, Ghazipur, Delhi</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="icon"><i class="fas fa-phone-alt"></i></div>
                                                <div class="content">
                                                    <p>+91-8920867591</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="icon"><i class="fas fa-envelope-open"></i></div>
                                                <div class="content">
                                                    <p>contact@thehygieneherbs.in</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="contact-social">
                                        <ul>
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- contact-area-end -->

        </main>
        <!-- main-area-end -->

@include('front.layouts.footer')
        