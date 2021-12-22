@include('front.layouts.header')

<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-wrap text-center">
            <h2 class="page-title">About Us</h2>
            <ul class="breadcrumb-pages">
                <li class="page-item"><a class="page-item-link" href="index.html">Home</a></li>
                <li class="page-item">About Us</li>
            </ul>
        </div>
    </div>
</div>
<!--About-->

<section class="about-page pt-30 pb-30">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="about-image">
                    <img src="{{asset('assets/img/Rc-3.png')}}" alt="">
                </div>

            </div>

            <div class="col-md-6">
                <div class="hero__text-content">
                    <h5>
                        100% Curated collection of organic honeys

                    </h5>
                    <p class="info">
                        Morbi porttitor ligula in nunc varius sagittis. Proin dui nisi, laoreet ut tempor ac, cursus vitae eros. Cras quis ultricies elit. Proin ac lectus arcu. Maecenas aliquet vel tellus at accumsan. Donec a eros
                        non massa vulputate ornare. Vivamus ornare commodo ante, at commodo felis congue vitae.
                    </p>
                </div>
            </div>



        </div>
    </div>
</section>


<!---About end-->


<!--our partner-->
<section class="partner-slider pt-30 pb-50 mb-3">

    <div class="container">
        <div class="row">
            <div class="col-md-12 my-3 text-center">
                <div class="part-heading">
                    <h2>Trusted partners</h2>
                    <p>CURATED 156 brands for you</p>
                </div>
            </div>

            <div class="col-md-12 my-5">
                <div class="owl-carousel carousel-main">


                    <div class="part-logo">
                        <img src="{{asset('assets/img/brand-logo.png')}}">
                    </div>


                    <div class="part-logo">
                        <img src="{{asset('assets/img/brand-logo.png')}}">
                    </div>



                    <div class="part-logo">
                        <img src="{{asset('assets/img/brand-logo.png')}}">
                    </div>


                    <div class="part-logo">
                        <img src="{{asset('assets/img/brand-logo.png')}}">
                    </div>

                    <div class="part-logo">
                        <img src="{{asset('assets/img/brand-logo.png')}}">
                    </div>

                    <div class="part-logo">
                        <img src="{{asset('assets/img/brand-logo.png')}}">
                    </div>
                    <div class="part-logo">
                        <img src="{{asset('assets/img/brand-logo.png">
                    </div>



                </div>
            </div>
        </div>
    </div>
</section>

<!---our partner end-->

@include('front.layouts.footer')