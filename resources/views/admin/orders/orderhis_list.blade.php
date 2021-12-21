
@include("admin.layouts.sidebar")
<div class="page-wrapper">
            <div class="content container-fluid">


           
              
 <div class="main-panel">
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header card-header-default" >
                <h4 class="card-title" >{{ __($title) }}
                @if(auth()->user()->user_type=='admin')
                <button  class="btn btn-sm btn-default float-right" style='background-color:white ;color:orange;'><i class='fa fa-question-circle' style='font-size:12px;'> Processing :   {{ processingOrders() }}</i> </button>
                <button  class="btn btn-sm btn-default float-right" style='background-color:white ;color:#0099cc;'><i class='fa fa-check-circle' style='font-size:12px;'> Completed :  {{ completedOrders() }}</i> </button>
                <button  class="btn btn-sm btn-default float-right" style='background-color:white ;color:black;'><i class='fa fa-check' style='font-size:12px;'> All Orders :   {{ allOrders() }}</i> </button>
                <button  class="btn btn-sm btn-default float-right" style='background-color:white ;color:green;'><i class='fa fa-shopping-cart' style='font-size:12px;'> New Orders :   {{ newOrders() }}</i> </button>
                @endif
                </h4>
                <!-- <p class="card-category" > {{ __('Here you can manage the products') }}</p> -->
                <p class="card-category" >Total {{ __($title) }} -  {{ $oCount}}</p>

              </div>
              <div class="card-body">
              @include('admin.layouts.flash_msg')
              <div class="row">
              
                  
                  <div class="col-sm-3">
                    <div class="form-group">
                      <input class="form-control" id="myInput" onkeyup="myFunction()"  type="text" placeholder="{{ __('Search..') }}"  aria-required="true"/>
                    </div>
                  
                </div>


                <div class="table-responsive">
                      <table class="table text-center" >
                    <thead class=" text-default" style='color:whitesmoke;'>
                    <th>
                         
                          @sortablelink('id',__('S No')) 
                      </th>
                     
                      <th>
                       @sortablelink('order_no',__('Order ID'))  
                      </th>
                      <th class="text-left">@sortablelink('order_no',__('Product')) </th>
                      <th>
                       @sortablelink('total_price',__('Total Price'))  
                      </th>
                      <th>
                       @sortablelink('quantity',__('Quantity '))  
                      </th>
                     
                     
                 
                      <th>
                      @sortablelink('status',__('Order Status')) 
                    
                      </th>
                     
                    
                      <th>
                      @sortablelink('ordered_at',__('Ordered At')) 
                    
                      </th>
                    
                      <th>
                      @sortablelink('invoice',__('Invoice'))
                     
                      </th>
                    
                     
                    </thead>
                    <tbody id="myTable"> 
                    <?php $i=0; ?>
                      @foreach($orders as $r)
                      <?php $i++; ?>
                        <tr>
                        <td>
                        <?php echo $i; ?>
                          </td>
                            <td>
                                 {{ $r->order_no }} 
                             </td>
                             <td class="text-left">
                                            <h2 class="table-avatar">
                                               
                                                <a href="{{route('productDetails',$r->product_id)}}"  class="avatar avatar-sm mr-2">
                                                                <img class="avatar-img" src="{{ asset('public/uploads') }}/products/{{$r->img}}" alt="" >
                                                            
                                                            </a>
                                            </h2>
                                            <a href="{{route('productDetails',$r->product_id)}}">{{$r->product_name}}</a>
                                        </td>
                             <td>
                                  <span style='font-size:12px;'>{{ $r->currency }} </span><b>{{ $r->total_price }}  </b>
                             </td>
                             <td>
                                  <b>{{$r->quantity}}  </b>
                             </td>
      
                        

                             <td>
                                <b>{{ $r->status }}  </b>
                            
                             </td>
                      
                             <td>
                            
                                  {{ $r->created_at->format('d F,Y') }}  
                             </td>
                             
                             <td class="text-center">
                                 
                                        <a href="{{route('orders.print',$r->order_no)}}" target='_blank'  class="btn btn-sm btn-default float-right" style='background-color:white ;color:#0099cc;'><i class='fa fa-print' style='font-size:12px;'> {{ __('Print') }}</i> </a>
                                   
                                     
                                       <!-- @if(($r->status)=='completed')-->
                                     
                                       <!-- @endif-->
                                         </td>
                                       
                         
                        
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            {!! $orders->appends(request()->except('page'))->render() !!}
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
  </div>



  <script>
        $(document).ready(function() {


              $('.status').on('change', function() {

                var order_no = $(this).attr('id');
                var status =  $(this).val();
              
            
                if (!confirm("Confirm if you want to update status to " + status+ " ?")) {
                    e.preventDefault();
                    return false;
                }
               
                $.ajax({
                    type: 'POST',
                    url:"{{ route('orders.status.update') }}",
                    data: {order_no: order_no,status:status,_token: '{{ csrf_token() }}'},
                    success: function (data) {
                        if (data.success == 1) {
                            
                             swal("Success!", "Order Status Successfully Updated!", "success");
                        }
                        else{
                            
                            swal("Error!", "Error Occurred!", "waring");
                       }
                      //  location.reload();
                       
                    }
                });
            });
//-----------------------------Payment update------------------------------------------
            $('.payment').on('change', function() {

                var order_no = $(this).attr('id');
                var payment =  $(this).val();


                if (!confirm("Confirm if you want to update payment status?")) {
                    e.preventDefault();
                    return false;
                }

                $.ajax({
                    type: 'POST',
                    url:"{{ route('orders.payment.update') }}",
                    data: {order_no: order_no,payment:payment,_token: '{{ csrf_token() }}'},
                    success: function (data) {
                        if (data.success == 1) {
                            
                            swal("Success!", "Payment Status Successfully Updated!", "success");
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