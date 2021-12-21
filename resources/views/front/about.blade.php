@include('front.layouts.header')




         <!-- main-area -->
         <main>

<!-- breadcrumb-area -->
<section class="breadcrumb-area breadcrumb-bg"  style="background-image:url('{{ asset('/uploads/banner/'.$slider->image) }}');">

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <h2 class="title">About Us</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">About us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb-area-end -->

  <!-- ingredients-area -->
            <section class="ingredients-area pt-90 pb-90">
                <div class="container">
                    <div class="ingredients-inner-wrap">
                        <div class="row align-items-center">
                            <div class="col-7">
                                <div class="ingredients-img">
                                    <img src="{{asset('assets/front/img/images/ingredients_img.jpg')}}" alt="">
                                   
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="ingredients-content-wrap">
                                    <div class="ingredients-section-title">
                                    
                                        <h2 class="title"> Director Introduction.</h2>
                                    </div>
                                    <p style="font-size: 24px; line-height: 45px;">Dr. Desh Deepak Singh has more than 20 years of experience in Agriculture, Research, Development and Marketing.</p>
                                    <div class="ingredients-fact">
                                        <ul>
                                            <li>
                                                <div class="icon"><img src="{{asset('assets/front/img/icon/ing_icon01.png')}}" alt=""></div>
                                                <div class="content">
                                                    <h4>128+</h4>
                                                    <span>Awards Winner</span>
                                                </div>
                                            </li>
                                            <li>
                                              <img src="{{asset('assets/front/img/fassi.png')}}" alt="">
                                            </li>
                                        </ul>
                                    </div>
                                  
                                    <div class="ingredients-btn-wrap">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- ingredients-area-end -->

           
            
        
              <!-- services-area -->
              <section class="services-area services-bg">
                <div class="container">
                    <div class="container-inner-wrap">
                        <div class="row justify-content-center">
                            <div class="col-xl-7 col-lg-9">
                                <div class="services-section-title text-center mb-55">
                                    <h2 class="title">What We Provide?</h2>
                                    <p>The Hygiene Herbs provides safe vegetables and fruits to you with the following measures-</p>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center align-self-stretch">
                        
                            <div class="col-md-6">
                                <div class="avatar-post mt-10 mb-10">
                                    <div class="post-avatar-img">
                                        <img src="{{asset('assets/front/img/images/veg-box.jpg')}}" alt="img">
                                    </div>
                                    <div class="post-avatar-content">
                                    
                                        <p>Ozonization Process (the most natural, harmless, effective disinfection and self life enhancing technique) - For the removal of harmful bacteria, fungus, viruses, fertilizers, pesticides, artificial color, wax coating etc. stuck to the surface of the vegetables.</p>
                                      
                                    </div>
                                </div>
                          
                            </div>
                            <!-- <div class="col-md-6"> -->
                                <div class="avatar-post mt-10 mb-10">
                                    <div class="post-avatar-img">
                                        <img src="{{asset('assets/front/img/images/veg-box2.jpg')}}" alt="img">
                                    </div>
                                    <div class="post-avatar-content">
                                    
                                        <p>Use of fresh water for the cleaning of vegetables.</p>
                                      
                                    </div>
                                </div>
                          
                            <!-- </div> -->
                            <div class="col-md-6">
                                <div class="avatar-post mt-10 mb-10">
                                    <div class="post-avatar-img">
                                        <img src="{{asset('assets/front/img/images/veg-box3.jpg')}}" alt="img">
                                    </div>
                                    <div class="post-avatar-content">
                                    
                                        <p>No touching of vegetables with bare hands during the process of cleaning and packaging.</p>
                                      
                                    </div>
                                </div>
                          
                            </div>
                           <!--  <div class="col-md-6"> -->
                                <div class="avatar-post mt-10 mb-10">
                                    <div class="post-avatar-img">
                                        <img src="{{asset('assets/front/img/images/veg-box4.jpg')}}" alt="img">
                                    </div>
                                    <div class="post-avatar-content">
                                    
                                        <p>High quality packing measures to avoid contamination.</p>
                                      
                                    </div>
                                </div>
                          
                            <!-- </div> -->
                       
                          
                        
                     
                        
                        </div>
                    </div>
                </div>
            </section>
          
         

         
         

        </main>
        <!-- main-area-end -->


         

        </main>
        <!-- main-area-end -->


@include('front.layouts.footer')
        