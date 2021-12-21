

@include("admin.layouts.sidebar")

<div class="page-wrapper">
            <div class="content container-fluid">
              
 <div class="main-panel">

  <div class="content">
    <div class="container-fluid">
      
      <div class="row">

        <div class="col-md-12" >
        @include('admin.layouts.flash_msg')
          <div class="card card-chart" >
            <div class="card-header  card-header-default" >

            <h4 class="card-title"  >
          
                            <!-- <p class='text-center' style='padding-top:15px;height:60px;width:60px;border-radius:50%; background-color:#0099cc;color:white;font-size:26px;'>
                            {{ substr($msg->name,0,1) }}
                            </p>
                            -->
             {{ __($msg->name) }}<br> 
             <span style='color:#144179; font-size:14px;'>
            {{ __($msg->mobile) }},
            {{ __($msg->email) }}<br> 
           
            
              </span>     

            <a href="{{route('msg.list')}}"  class="btn btn-sm btn-default float-right" style='background-color:white ;color:#0099cc;'><i class='fa fa-arrow-left' style='font-size:12px;'>  {{ __('Back') }}</i> </a>
                </h4>
                
           
                     

            </div>
           
           
            <div class="row">
            <div class="col-md-10 offset-md-1">
          <div class="card card-chart" style="margin-top:20px;">
           
            <div class="card-body">
            
            <div class="row">
            <div class="col-md-12">
            <div class='text-left' style='font-weight:800;'>
            {{ $msg->subject }} <br>
             
             </div>
            <div class='text-right' style='font-weight:800;'>
            {{ $msg->created_at->format('d, F Y')}}<br>
            
             </div>
            <div class="card-body" style='text-align:justify;font-weight:400;'><br>
           {{$msg->msg}}
            <br>
            </div>
            </div>
            </div>

            
            </div>
          </div>
        </div>
        
          </div>
		 
        </div>
        </div>
  

      </div>
    
    </div>
  </div>

  </div>
  </div>
    </div>


@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush

<style>
tr  th
{
  text-align:left;
}
</style>

@include("admin.layouts.footer")