
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
                      @sortablelink('payment',__('Payment'))
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
                               
                            <form method='post'  action="https://medto.in/paytmsub/PaytmKit/TxnTest.php"  enctype="multipart/form-data">
                    @csrf
 
<input type="hidden" value="{{ $r->p_total_price }}" name="price">
<input type="hidden" value="{{ $r->id }}" name="id">

<input type="hidden" value="{{ $r->u_mobile }}" name="phone">
<input type="hidden" value="{{ $r->u_email }}" name="email">

  <div class="plan-checkeout p-3">
                          <!--  <button class="btn btn-primary checkeout-btn" type="submit" name="form_submit" value="submit">Pay Now</button>-->
<input type="submit" name="form_submit" value="Pay Now"  class="btn btn-primary checkeout-btn" >
                        </div>
</form> 
                                 
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


