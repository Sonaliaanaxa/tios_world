
@include("admin.layouts.sidebar")
<!-- Page Wrapper -->
<div class="page-wrapper">
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-7 col-auto">
                            <h3 class="page-title">{{ __($title) }}</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">Total Subscription Plans -  {{ $spCount}}</li>
                                
                            </ul>
                        </div>
                     
                    </div>
                </div>
                @include('admin.layouts.flash_msg')
              <div class="row">
              
                  
                  <div class="col-sm-3">
                    <div class="form-group">
                      <input class="form-control" id="myInput" onkeyup="myFunction()"  type="text" placeholder="{{ __('Search..') }}"  aria-required="true"/>
                    </div>
                  
                </div>
                </div>
                <!-- /Page Header -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                        
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="datatable table table-hover table-center mb-0">
                                        <thead class=" text-default" style='color:whitesmoke;'>
                                            <tr>
                                            <th>
                         
                         @sortablelink('id',__('S No')) 
                     </th>
                 
                    
                     <th>
                      @sortablelink('plan_name',__('Plan Name'))  
                     </th>
                   
                      <th>
                      @sortablelink('u_name',__('Name'))  
                     </th>
                     @if(auth()->user()->user_type=='admin')
                     <th>
                      @sortablelink('partner',__('User Type'))  
                     </th>
                     @endif
                     <th>
                      @sortablelink('p_price',__('Price & Tax'))  
                     </th>
                     <th>
                      @sortablelink('vaild',__('Vaild')) 
                     </th>
                      <th>
                      @sortablelink('date',__('Expiry Date')) 
                     </th>
                         
                     <th>
                      @sortablelink('status',__('Current Status'))
                     </th>
                       @if(auth()->user()->user_type=='admin')
                       <th>
                      @sortablelink('status',__('Change Status'))
                     </th>
                      @endif
                     <th>
                      @sortablelink('created_at',__('Started At'))   
                     </th>
                     <th>
                      @sortablelink('invoice',__('Invoice'))   
                     </th>
                     <th>
                     @sortablelink('payment_status',__('Payment Status')) 
                   
                     </th>
                  
                   
                   
                    
                   </thead>
                   <tbody id="myTable"> 
                   <?php $i=0; ?>
                     @foreach($subscriptionpayment as $r)
                     <?php $i++; ?>
                       <tr>
                       <td>
                       <?php echo $i; ?>
                         </td>
                  
                           <td>
                                 {{ $r->splan_name }} 
                            </td>
                         
                            <td>
                                {{ $r->u_name }}  
                            </td>
                            @if(auth()->user()->user_type=='admin')
                            <td>
                                {{ $r->partner }}  
                            </td>
                            @endif
                            <td>
                            <span style='color:#00cc99;font-size:12px;'>Price - </span>{{ $r->p_currency }}  {{ $r->p_price }}  
                            <p style='color:orange;font-size:10px;margin-top:-2px;'>Tax : {{ $r->p_tax }}%  </p>
                            <p style='color:gray;font-size:10px;margin-top:-14px;'>Tax Price : {{ $r->p_currency }}  {{ $r->p_tax_price }} </span> </p>
                            <p style='color:gray;font-size:12px;margin-top:-14px;'>Total Price : {{ $r->p_currency }} {{ $r->p_total_price }} </span> </p>
                            </td>
                            <td>
                                 {{ $r->vaild }} Month
                            </td>
 
                             <td>
                                   <?php
                                 $startDate =  $r->created_at->format('d-m-Y') ;
                                 $vailds =  $r->vaild;
                            $currentdate=date("d-m-Y");
                                 $vaildDay= $vailds*30;
                            $date=date_create( $startDate);
                            
                            date_add($date,date_interval_create_from_date_string("$vaildDay days"));
                         
                          
                          
                          
                           // echo date_format($date,"d-m-Y");
                            // $endDate=$date->format('d-m-Y');
                            //  $date1=date_create( $endDate);
                            // date_sub($date1,date_interval_create_from_date_string("15 days"));
                            // echo date_format($date1,"d-m-Y");
                            //print_r($date);die;
                                
                                $endDate=$date->format('d-m-Y');

                            
                              
                                    $currentdate=date("Y-m-d");
                                    $endDate1=$date->format('Y-m-d');
                             //$x=$endDate1-$currentdate;      
                           echo $endDate;      
                                   ?>
                        
                           
                          
</td>
                         
                            
                                     <td>
    @if( $endDate1 > $currentdate )
                              <span style="color:green;">Active</span>
                               @else
                                <span style="color:red;">Expired</span>
                                
                                @endif
                      
                                    </td>
                          
                                  @if(auth()->user()->user_type=='admin')
                                    <td>
                                         <select id="{{ $r->id}}" style='width:112px;'  class="custom-select status" name='status'   >
                             
                               
                             <option value='active' {{ ('active'== $r->status)?'selected':''}}> Active</option>
                             <option value='expired' {{ ('expired'== $r->status)?'selected':''}}> Expired  </option>  
                             
                          
                           </select>
                                </td>
                            @endif
                      
                             

                     
                           
                            <td style='font-size:12px;'>
                          {{ $r->created_at }}
                       
                          </td>
                      
                            <td>
                            <a href="{{route('subscription.payment.invoice',$r->id)}}" target='_blank'  class="btn btn-sm btn-default float-right" style='background-color:white ;color:#0099cc;'><i class='fa fa-print' style='font-size:12px;'>  {{ __('Print') }}</i> </a>  
                            </td>
                            
                            <td>
                                {{ $r->payment_status }}  
                            </td>

                          
                    
                        
             
                   
                       
                       </tr>
                     @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {!! $subscriptionpayment->appends(request()->except('page'))->render() !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Wrapper -->


    

    
    </div>
    <!-- /Main Wrapper -->


    
<script>
        $(document).ready(function() {
$('.status').on('change', function() {

var id = $(this).attr('id');
var status =  $(this).val();


if (!confirm("Confirm if you want to update status?")) {
    e.preventDefault();
    return false;
}

$.ajax({
    type: 'POST',
    url:"{{ route('subscription.payment.status.update') }}",
    data: {id: id,status:status,_token: '{{ csrf_token() }}'},
    success: function (data) {
        if (data.success == 1) {
            
            swal("Success!", "Status Successfully Updated!", "success");
        }
        else{
            
            swal("Error!", "Error Occurred!", "waring");
      }
      //  location.reload();
      
    }
});
});

});
</script>