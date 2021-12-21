
@include("admin.layouts.sidebar")

<script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">{{ __($title) }}</h3>
                    
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-md-12">
                <form method='post'  action="{{ route('subscription.payment.create') }}"  enctype="multipart/form-data">
                    @csrf
                    @include('admin.layouts.flash_msg')
                    <div class="plan-details-page">
                        <div class="plan-details-title">
                            <div class="plan-details-icon">
                                @if($subscriptionplans->img)
                                    <a href="{{ asset('public/uploads/subscriptionplans') }}/{{ $subscriptionplans->img }}" target='_blank'> <img src="{{ asset('public/uploads/subscriptionplans') }}/{{ $subscriptionplans->img }}" style='height:30px;width:30px;border-radius:5%;'/></a>
                                        @else
                                        <p class='text-center' style='padding-top:5px;height:25px;width:25px;border-radius:50%; background-color:#0099cc;color:white;font-size:6px;'>
                                         {{ substr($subscriptionplans->plan_name,0,1) }}
                                        </p>
                                @endif
                                <h3><b> {{__('Plan Name')}} : {{ $subscriptionplans->plan_name }}</b></h3>
                            </div>
                        </div>
                        <div class="plan-details-description">
                            <ul>
                                <li><b> Plan Price : {{ $subscriptionplans->currency }}  {{ $subscriptionplans->price }}</b></li>
                                <li><b> Registeration Price : Fee</b></li>

                                <li><b> Vaild : {{ $subscriptionplans->vaild }} Month</b></li>
                                <li><b> Tax : {{ $subscriptionplans->tax }}%</b></li>
                                <li><b> Tax Price : {{ $subscriptionplans->currency }}  {{ $subscriptionplans->tax_price }}</b></li>
                                <li><b>   <p style='color:#004953;font-size:24px;margin-top:-14px;'>Total Price : {{ $subscriptionplans->currency }} {{ $subscriptionplans->total_price }} </span></b></li>

                                <li><b><span style="text-decoration: underline;color:blue;"> {{__('Subscription plans Details')}} : </apan></b></li>
                                                        <li>   
                                                        <?php 
                                                        $p= $subscriptionplans->details;
                                                        $p= htmlspecialchars_decode($p);
                                                                echo $p;
                                                                ?>
                                                                </li>
                            </ul>
                        </div>
                        <input type="hidden" name="plan_id" value="{{$subscriptionplans->id}}">
                        <div class="plan-checkeout text-right p-3">
                            <button class="btn btn-primary checkeout-btn" type="submit" name="form_submit" value="submit">Checkout</button>

                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
        <!-- /Page Wrapper -->

</div>
    <!-- /Main Wrapper -->

  
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

  
    @push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush