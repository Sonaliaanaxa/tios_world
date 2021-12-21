
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
                                <li class="breadcrumb-item">Total Subscription Plans -  {{ $pCount}}</li>
                                
                            </ul>
                        </div>
                        <div class="col-sm-5 col">
                        <a href="{{route('subscription.plans.create')}}"  class="btn btn-primary float-right mt-2"><i class='fa fa-plus-circle'> {{ __('New') }}</i></a>
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
                                        <thead>
                                            <tr>
                                            <th>
                         
                         @sortablelink('id',__('S No')) 
                     </th>
                     <th>
                      @sortablelink('img',__('Image'))  
                     </th>
                    
                     <th>
                      @sortablelink('plan_name',__('Plan Name'))  
                     </th>
                   
                      <th>
                      @sortablelink('buspart_id',__('Partner'))  
                     </th>
                     <th>
                      @sortablelink('price',__('Price & Tax'))  
                     </th>
                     <th>
                      @sortablelink('vaild',__('Vaild'))  
                     </th>
                 
                     <th>
                     @sortablelink('status',__('Status')) 
                   
                     </th>
                     <th>
                     @sortablelink('action',__('Action')) 
                   
                     </th>
                   
                   
                   
                    
                   </thead>
                   <tbody id="myTable"> 
                   <?php $i=0; ?>
                     @foreach($subscriptionplans as $r)
                     <?php $i++; ?>
                       <tr>
                       <td>
                       <?php echo $i; ?>
                         </td>
                         <td>
                              
                              @if($r->img)
                                <a href="{{ asset('public/uploads/subscriptionplans') }}/{{ $r->img }}" target='_blank'> <img src="{{ asset('public/uploads/subscriptionplans') }}/{{ $r->img }}" style='height:50px;width:50px;border-radius:5%;'/></a>
                               @else
                               <p class='text-center' style='padding-top:15px;height:55px;width:55px;border-radius:50%; background-color:#0099cc;color:white;font-size:26px;'>
                               {{ substr($r->plan_name,0,1) }}
                               </p>
                               @endif 
                          </td>
                           <td>
                                 {{ $r->plan_name }} 
                            </td>
                         
                            <td>
                                {{ $r->business_partners_name }}  
                            </td>
                            <td>
                            <span style='color:#00cc99;font-size:12px;'>Price - </span>{{ $r->currency }}  {{ $r->price }}  
                            <p style='color:orange;font-size:10px;margin-top:-2px;'>Tax : {{ $r->tax }}%  </p>
                            <p style='color:gray;font-size:10px;margin-top:-14px;'>Tax Price : {{ $r->currency }}  {{ $r->tax_price }} </span> </p>
                            <p style='color:gray;font-size:12px;margin-top:-14px;'>Total Price : {{ $r->currency }} {{ $r->total_price }} </span> </p>
                            </td>
                            <td>
                                 {{ $r->vaild }} Month
                            </td>
                          
                            
                          
                    
                        
             
                         <td>
                         @if($r->status==1)
                         
                         <i class='fa fa-check-circle' style='color:green;'> {{ __('Active') }}  </i>
                         @else
                          <i class='fa fa-question-circle' style='color:gold;'>{{ __(' Not Active') }} </i> 
                          @endif
                         </td>
                         <td>
                         
                         <a href="{{route('subscription.plans.view',$r->id)}}"  target='_blank' style='color:#0099cc;font-size:16px;padding-right:15px;' title="Update" data-id="{{$r->id}}">
                        <i class="fa fa-eye"></i></a>
<br>
                          <a href="{{route('subscription.plans.update',$r->id)}}" style='color:#0099cc;font-size:16px;padding-right:15px;' title="Update" data-id="{{$r->id}}">
                        <i class="fa fa-edit"></i></a>
<br>
                        <a href="javascript:;" style='color:#0099cc;font-size:16px;padding-right:15px;' class='delete-plan' title="Delete" data-id="{{$r->id}}">
                        <i class="fa fa-trash"></i>
                        </a>
                         </td>
                       
                       </tr>
                     @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {!! $subscriptionplans->appends(request()->except('page'))->render() !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Wrapper -->


    

    
    </div>
    <!-- /Main Wrapper -->



  <script>
        $(document).ready(function() {
            $('.delete-plan').on('click', function (e) {
                if (!confirm("Are you sure? It can't be undone.")) {
                    e.preventDefault();
                    return false;
                }

                var id = $(this).data('id');
              
                $.ajax({
                    type: 'POST',
                    url:"{{route('subscription.plans.destroy')}}",
                    data: {id: id, _token: '{{ csrf_token() }}'},
                    success: function (data) {
                        if (data.success == 1) {
                        //    selector.closest('tr').hide('slow');
                             swal("Success!", "Product Successfully Deleted!", "success");
                             
                        }

                       location.reload();
                       
                    }
                });
            }); });
  </script>


