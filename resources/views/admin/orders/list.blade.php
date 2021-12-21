
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
               
                <button  class="btn btn-sm btn-default float-right" style='background-color:white ;color:orange;'><i class='fa fa-question-circle' style='font-size:12px;'> Processing :   {{ processingOrders() }}</i> </button>
                <button  class="btn btn-sm btn-default float-right" style='background-color:white ;color:#0099cc;'><i class='fa fa-check-circle' style='font-size:12px;'> Completed :  {{ completedOrders() }}</i> </button>
                <button  class="btn btn-sm btn-default float-right" style='background-color:white ;color:black;'><i class='fa fa-check' style='font-size:12px;'> All Orders :   {{ allOrders() }}</i> </button>
                <button  class="btn btn-sm btn-default float-right" style='background-color:white ;color:green;'><i class='fa fa-shopping-cart' style='font-size:12px;'> New Orders :   {{ newOrders() }}</i> </button>
            
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
                    
                      <th>
                       @sortablelink('final_price',__('Total Pay'))  
                      </th>
                      <th>
                       @sortablelink('total_items',__('Total Items '))  
                      </th>
                     
                      <th>
                       @sortablelink('user_country',__('Country'))  
                      </th>
                    
                      <th>
                      @sortablelink('name',__('Customer'))  
                        
                      </th>
                  
                      <th>
                      @sortablelink('status',__('Order Status')) 
                    
                      </th>
                     
                      <th>
                      @sortablelink('payment',__('Payment')) 
                    
                      </th>
                    
                      <th>
                      @sortablelink('ordered_at',__('Ordered At')) 
                    
                      </th>
                    
                      <th>
                      @sortablelink('detail',__('Details'))
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
                                  <u><a href="{{route('orders.view',$r->order_no)}}">{{ $r->order_no }} </a>  </u>
                             </td>
                             <td>
                                  <span style='color:#00cc99;font-size:12px;'>{{ $r->currency }} </span><b>{{ $r->final_price }}  </b>
                             </td>
                             <td>
                                  <b>{{countOrder($r->order_no)}}  </b>
                             </td>
                             <td>
                                  
                                {{ $r->user_country }}  
                             </td>
                         
                             <td>
                                  {{ $r->user_name }} <br>
                                  {{ $r->user_email }} <br>
                                   {{ $r->user_mobile }}  
                             </td>
                        

                             <td>
                               
                                  <select id="{{ $r->order_no}}" style='width:112px;'  class="custom-select status" name='status'   >
                               
                                    <option value='new' {{ ('new'== $r->status)?'selected':''}}> New </option>  
                                    <option value='processing' {{ ('processing'== $r->status)?'selected':''}}> Processing</option>
                                    <option value='completed' {{ ('completed'== $r->status)?'selected':''}}> Completed</option>
                                    <option value='cancelled' {{ ('cancelled'== $r->status)?'selected':''}}> Cancelled</option>
                                 
                                  </select> 
                             </td>
                           
                             <td>
                               
                                  <select id="{{ $r->order_no}}" style='width:112px;'  class="custom-select payment" name='payment'   >
                                
                                  
                                    <option value='1' {{ ('1'== $r->payment)?'selected':''}}> Completed</option>
                                    <option value='0' {{ ('0'== $r->payment)?'selected':''}}> Pending </option>  
                                    
                                 
                                  </select> 
                             </td>
                        
                             <td>
                            
                                  {{ $r->created_at->format('d F,Y') }}  
                             </td>
                             
                             
                          <td>
                          
                          <a href="{{route('orders.view',$r->order_no)}}"  target='_blank' style='color:#0099cc;font-size:16px;padding-right:15px;' title="View All" data-id="{{$r->order_no}}">
                         <i class="fa fa-eye"></i></a>

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