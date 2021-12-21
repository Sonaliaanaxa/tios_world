


@include("admin.layouts.sidebar")

<!-- Page Wrapper -->
<div class="page-wrapper">
<script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							
            <div class="col-md-12" >
        @include('admin.layouts.flash_msg')
          <div class="card card-chart" >
            <div class="card-header  card-header-default" >
            <h4 class="card-title">{{ __($title) }}
            <a  href="{{route('subscription.plans.update',$id)}}"  class="btn btn-primary float-right" ><i class='fa fa-edit-left mr-1'>  {{ __('Edit') }}</i> </a>
          
        
                </h4>

            </div>
           
           
            <div class="row">
            <div class="col-md-10 offset-1">
          <div class="card card-chart">
           
            <div class="card-body">
            
            <div class="row">
            <div class="col-md-6">
            <table class="table text-center">
                    <thead class=" text-default" style='color:blue;'>
                    <th>  Features </th>
                    <th> Value </th>
                    </thead>
                    <tbody> 
                     <tr>
                        <th> {{__('Plan Name')}} </th>
                         <td> {{ $subscriptionplans->plan_name }}</td>
                       </tr>
                    
                       <tr>
                        <th> {{__('Partner')}} </th>
                         <td> {{ $subscriptionplans->businesspartner_name }}</td>
                       </tr>
                       <tr>
                       
                       <tr>
                        <th> {{__('Price & Tax')}} </th>
                         <td> 
                        <b> <span style='color:#00cc99;font-size:12px;'>Price - </span>{{ $subscriptionplans->currency }}  {{ $subscriptionplans->price }}  
                            <p style='color:orange;font-size:12px;margin-top:-2px;'>Tax : {{ $subscriptionplans->tax }}%  </p>
                            <p style='color:gray;font-size:12px;margin-top:-14px;'>Tax Price : {{ $subscriptionplans->currency }}  {{ $subscriptionplans->tax_price }} </span> </p>
                            <p style='color:gray;font-size:14px;margin-top:-14px;'>Total Price : {{ $subscriptionplans->currency }} {{ $subscriptionplans->total_price }} </span> </p>
                         </b>
                         </td>
                       </tr>
                   
  
                       <th> {{__('Vaild')}} </th>
                         <td> {{ $subscriptionplans->vaild }} Month </td>
                       </tr>
                      
                       <tr>
                        <th> {{__('Status')}} </th>
                         <td> 
                          @if($subscriptionplans->status==1)<i class='fa fa-check-circle' style='color:green;'> {{ __('Active') }}  </i>
                          @else
                           <i class='fa fa-question-circle' style='color:gold;'>{{ __(' Not Active') }} </i> 
                           @endif
                          </td>
                       </tr>
               

                       <tr>
                        <th> {{__('Subscription plans Details')}} </th>
                         <td>   
                         <?php 
                         $p= $subscriptionplans->details;
                         $p= htmlspecialchars_decode($p);
                                echo $p;
                                ?>
                                </td>
                       </tr>

                 
                       <tr>

                        <th> {{__('Created On')}} </th>
                         <td>{{ $subscriptionplans->created_at->format('d F, Y') }}</td>
                     
                       </tr>
                       <tr>
                        <th> {{__('Updated On')}} </th>
                         <td>{{ $subscriptionplans->updated_at->format('d F, Y') }}</td>
                       </tr>
                    </tbody>
                  </table>
            </div>
            <div class="col-md-6">
            <p class="card-category float-right"  style='color:black;'>   <img src="{{ asset('public/uploads/subscriptionplans') }}/{{ $subscriptionplans->img }}" style='height:200;width:200px;'/></p>
          
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
			<!-- /Page Wrapper -->
    <!-- /Main Wrapper -->
  
    @push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush