@include('front.layouts.header')


<section class="bpt-50 pt-30 pb-50" id="sample-brand">
    <div class="container">
        <div class="row">
            <div class="col-md-12 my-5">
                <div class="try-samples-heading">
                    <h4><span class="normal-style">all our</span> partner brands </h4>
                    <span class="uppercase">All products </span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                  
                    @foreach($userLogo as $logo)
                    <div class="col col1">
                        <div class="barnd-logo">
                            <img src="{{asset('uploads/profile_img')}}/{{$logo->logo}}" alt="{{$logo->name}}">
                        </div>
                    </div>
                    @endforeach
                  
                </div>
            </div>
           
        </div>
    </div>
</section>
@include('front.layouts.footer')