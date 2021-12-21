@include("home.layouts.header")    
<body>

    <!-- Main Wrapper -->
  <div class="main-wrapper">
    <section class="section-for-doctor">
      <div class="container">
        <div class="row">

          <div class="col-md-12">
            <div class="plan-title text-center p-3">
              <h1>Appointment Book</h1>
            </div>
          </div>

          @foreach(getBusinessPartners4() as $r)
            <div class="col-md-3 mt-3">
              <a  class="button" href="{{$r->link}}" onclick=" return change_status('1');" id="status">
                <div class="card" style=" border: 1px solid #338ce4;">
                  <div class="card-body">
                    <h3 class="card-title text-center subscription-title"> 
                      <a href="{{$r->link}}" target='_blank'">
                        {{$r->name}}
                      </a>
                    </h3>
                    <h4 class="card-traiel text-center">
                      @if($r->img)
                        <a href="{{$r->link}}" target='_blank'> <img src="{{ asset('public/uploads/businesspartners') }}/{{ $r->img }}" style='height:150px;width:200px;border-radius:5%;'/></a>
                        @else
                            <p class='text-center' style='padding-top:15px;height:100px;width:140px;border-radius:50%; background-color:#0099cc;color:white;font-size:26px;'>
                              {{ substr($r->name,0,1) }}
                            </p>
                      @endif
                      <a href="{{$r->link}}" class="btn book-btn1 px-3 py-2 mt-3" tabindex="0">Book Now</a>
                    </h4>
                      
                  </div>
                </div>
              </a>
            </div> 
          @endforeach

        </div> 
      </div> 
    </div> 
  </div> 
</body>
@include("home.layouts.footer")