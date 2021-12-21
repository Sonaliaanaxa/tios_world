@include('front.layouts.header')


      <!-- main-area -->
      <main>

        <!-- breadcrumb-area -->
        <section class="breadcrumb-area breadcrumb-bg" style="background-image:url('{{ asset('/uploads/banner/'.$slider->image) }}');">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-content">
                            <h2 class="title">Return & Refund Policy</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Return & Refund Policy</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- terms-and-conditions-area -->
        <section class="terms-and-conditions-area pt-85 pb-85">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="terms-and-conditions-wrap">
                            <h5>{{$return->title}}</h5>
                            <p>{!!$return->details!!}</p>
                        </div>
                       
                    </div>
                </div>
            </div>
        </section>
        <!-- terms-and-conditions-area-end -->

    </main>
    <!-- main-area-end -->

@include('front.layouts.footer')
        