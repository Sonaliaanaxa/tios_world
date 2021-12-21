@include("home.layouts.header")    
<body>

    <!-- Main Wrapper -->
  <div class="main-wrapper">
    <section class="section-for-doctor">
      <div class="container">
        <div class="row">

          <div class="col-md-12">
            <div class="plan-title text-center p-3">
              <h1> {{$businesspartners->name}} Subscription Plans</h1>
            </div>
          </div>
          
        
          <?php $j=1; ?>
          @foreach(getSubscriptionPlan() as $r)
             @if($r->buspart_id==$buspart_id)
          <div class="col-md-4">
            <div class="plan-box">
                <div class="plan-header">
                    <div class="plan-icon">
                    @if($r->img)
                                <a href="{{ asset('public/uploads/subscriptionplans') }}/{{ $r->img }}"> <img src="{{ asset('public/uploads/subscriptionplans') }}/{{ $r->img }}" style='height:25px;width:25px;border-radius:5%;'/></a>
                               @else
                               <p class='text-center' style='padding-top:5px;height:25px;width:25px;border-radius:50%; background-color:#0099cc;color:white;font-size:6px;'>
                               {{ substr($r->plan_name,0,1) }}
                               </p>
                               @endif 
                    </div>
                    <h3> {{ $r->plan_name }} </h3>
                </div>

                <div class="plan-body">
                    <div class="plan-price">
                        <span class="currency">{{ $r->currency }}  </span>
                        <span class="discountPrice">{{ $r->price }} </span>
                    </div>
                    <div class="plan-description">
                        <ul>
                            <li>Plan Price:{{ $r->currency }}  {{ $r->price }} </li>
                            <li>Registeration Fee</li>
                         
                            <li> {{ $r->vaild }} Month</li>
                        </ul>
                    </div>
                </div>
                    
                      <div class="plan-button mb-3 text-center">
                            <a href="{{route('subscription.plans.detail.view',$r->id)}}" class="plan-btn">Book Now</a>
                    </div> 
             
            </div>
        </div>
        <?php $j=$j+1; ?>
                @endif
        @endforeach


            </div>
        </div>
        <!-- /Page Wrapper -->



<style>

    /*plan card css*/
.plan-box {
    position: relative;
    box-shadow: 0 3px 9px rgb(0 0 0 / 25%);
    padding:0px;
    border-radius: 5px;
    border: 1px solid #fff;
    border-top: 4px solid #00d0f1;
    border-bottom: 4px solid #00d0f1;
    margin-bottom: 10%;
}



.plan-header {
    position: relative;
    bottom: 4px;
    background: #00d0f1;
    /* padding: 6px 75px; */
    width: 100%;
    padding: 10px 3px 2px;
    left: -1px;
	    text-align: center;
}

.plan-header h3{
	font-size: 22px;
    color: #fff;
}
	
	
.plan-header i{
font-size: 22px;
    color: #fff;	
}


.plan-body{
    padding: 14px 11px 10px;
position:relative;
text-align:center;
	
}


.plan-price span{
	    font-size: 29px;
    font-weight: 400;
}

.plan-price{
    border-bottom: 1px solid #ccc;	
	padding-left: 0px;
}

.plan-description ul li{
	list-style: none;
    padding: 14px;
    font-size: 19px;
    letter-spacing: 1px;
    font-weight: 400;
	   border-bottom: 1px solid #ccc;	
}


.plan-description ul{
	padding-left:0px;
}


.plan-btn{
	padding: 10px;
    background-color: #00d0f1;
    text-align: center;
    font-size: 22px;
	text-align:center;
	    color: #fff;
    border-radius: 5px;
}

.plan-btn:hover{
	color:#fff;
}
/*plan card css end*/


/*plan details css */

.plan-details-title{
	  background: #00d0f1;
	  color:#fff;
	  padding: 6px;
}

.plan-details-page{
box-shadow: 0 3px 9px rgb(0 0 0 / 25%);
position: relative;

}

	
.plan-details-description ul li{
	list-style:none;
	padding:10px;
}


.plan-details-description ul{
	padding-left:0px;
}


.plan-details-title h3{
font-size: 24px;
    letter-spacing: 1px;
    padding: 3px;
}


.plan-details-description{
	padding:5px;
}


.plan-details-icon i{
padding: 4px;
    font-size: 26px;	
}


.plan-details-icon{
	display: flex;
    justify-content: left;
    flex-direction: row;
}
/*plan details css end*/

</style>

        </div> 
      </div> 
    </div> 
  </div> 
</body>
@include("home.layouts.footer")