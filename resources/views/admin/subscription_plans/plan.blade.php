
@include("admin.layouts.sidebar")
<!-- Page Wrapper -->



        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                        <h3 class="page-title">{{ __($title) }}</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">Total Subscription Plans -  {{ $pCount}}</li>
                                
                            </ul>
                        </div>
                    
                    </div>
                </div>
                @include('admin.layouts.flash_msg')
          
                <!-- /Page Header -->

    <div class="row">
        <?php $i=0; ?>
        @foreach($subscriptionplans as $r)
        <?php $i++; ?>
        <div class="col-md-4">
            <div class="plan-box">
                <div class="plan-header">
                    <div class="plan-icon">
                    @if($r->img)
                                <a href="{{ asset('public/uploads/subscriptionplans') }}/{{ $r->img }}" target='_blank'> <img src="{{ asset('public/uploads/subscriptionplans') }}/{{ $r->img }}" style='height:25px;width:25px;border-radius:5%;'/></a>
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
                <?php  if($r->price >0){ ?>
                    <div class="plan-button mb-3 text-center">
                            <a href="{{route('subscription.plans.detail.view',$r->id)}}" class="plan-btn">Book Now</a>
                    </div>
                <?php  }else { 
                if ($spCount < 1){  ?>
                    <div class="plan-button mb-3 text-center">
                            <a href="{{route('subscription.plans.detail.view',$r->id)}}" class="plan-btn">Book Now</a>
                    </div>
                <?php }else{  ?>
                <div class="plan-button mb-3 text-center">
                           <button class="btn btn-secondary">Already Subscribe</button> 
                    </div>
               <?php } }?>
            </div>
        </div>

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