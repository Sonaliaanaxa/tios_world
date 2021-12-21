

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
                <a href="{{route('orders.print',$order_no)}}" target='_blank'  class="btn btn-sm btn-default float-right" style='background-color:white ;color:#0099cc;'><i class='fa fa-print' style='font-size:12px;'>  {{ __('Print') }}</i> </a>
                
                </h4>
                <!-- <p class="card-category" > {{ __('Here you can manage the products') }}</p> -->
          
                <p class="card-category mb-0" > Order ID -  {{ $order_no}}</p>
                <p class="card-category mb-0" > Order Date - 
                    @foreach($orders as $d)
                    {{$d->created_at->format('d F,Y')}}<br><br>
                 
                    @break;
                    @endforeach
                </p>

              </div>
              <div class="card-body">
              @include('admin.layouts.flash_msg')
              <div class="row">
              
                  
                  <div class="col-md-8 col-sm-6" align='left'>
                  @if(auth()->user()->user_type=='admin')
                   <span style='color:#0099cc;font-weight:bold;'>Bill To</span><br>
                   @foreach($orders as $s)
                   <h5>{{$s->uname}} </h5>
                   {{$s->apartment}},<br>
                   {{$s->city}},<br> {{$s->state}},<br>{{$s->area}},<br>
                   {{$s->pincode}}<br>
                   {{$s->phone}}
                   @break;
                   @endforeach
                   @endif
                </div>
                <div class="col-md-4  col-sm-4">
                   <span style='color:#0099cc;font-weight:bold;'>Seller Details</span><br>
                   <h5>Hygieneherbs Agro Fresh Private Limited</h5>
                   <p class="mb-0">966, Pocket C, Ghazipur, Delhi</p>
                   <p class="mb-0">+91-8920867591</p>
                   <p class="mb-0">contact@hygieneherbs.in</p>
                   <p class="mb-0"><strong>GST No.</strong>07AAFCH8455C1ZL</p>
                   <p class="mb-0"><strong>FSSAI license No.</strong>13321003000320</p>

                </div>


                <div class="table-responsive">
                      <table class="table text-center" >
                    <thead class=" text-default" style='color:whitesmoke;'>
                    <th>
                         
                          @sortablelink('id',__('S No')) 
                      </th>
                      
                      <th>
                       @sortablelink('product_name',__('Product Image'))  
                      </th>
                      <th>
                       @sortablelink('product_name',__('Product Name'))  
                      </th>
                      <th>
                       @sortablelink('price',__('Price'))  
                    
                      </th>
                      <th>
                       @sortablelink('total_item',__('Quantity '))  
                      </th>
                   
                      <th>
                       @sortablelink('total_price',__('Total Price'))  
                      </th>
                     
                   
                     
                    </thead>
                    <tbody id="myTable"> 
                    <?php $i=0; $gtotal = 0; $gsave = 0; ?>
                      @foreach($orders as $r)
                      <?php
                        $i++;
                        $gtotal = $gtotal + $r->total;

                          $totalsave = $r->product_mrp - $r->product_price;
                          $gsave = $gsave + $totalsave;
                         
                      ?>
                        <tr>
                        <td>
                        <?php echo $i; ?>
                          </td>
                         
                          <td>
                              <a href="{{ asset('uploads/products') }}/{{ $r->img }}" target='_blank'> <img src="{{ asset('/uploads/products') }}/{{ $r->img }}" style='height:50px;width:50px;border-radius:5%;'/></a>    
                           </td>
                            <td>
                            <u><a href="{{route('products.view',$r->product_id)}}" target='_blank'>{{ $r->product_name }} </a>  </u>
                                  <p style='color:gray;font-size:10px;margin-top:-5px;'>{{ $r->order_no }} </p>
                             </td>
                             <td>
                                  <span style='color:#00cc99;font-size:12px;'>{{ $r->currency }} </span><b>{{ $r->price }}  </b>
                                  <p style='color:orange;font-size:10px;margin-top:-2px;'>Saving : {{ $r->currency }}  {{ $r->saving }}  </p>
                             
                                  <p style='color:gray;font-size:10px;margin-top:-14px;'>MRP : <span style='text-decoration: line-through;'>{{ $r->currency }}  {{ $r->mrp }} </span> </p>
                                
                             </td>
                             <td>
                                  <b>{{ $r->quantity }}  </b>
                             </td>
                            
                             <td>
                                  <span style='color:#00cc99;font-size:12px;'>{{ $r->currency }} </span><b>{{ $r->total }}  </b>
                             </td>
                             
                        
                        </tr>
                      @endforeach
                      <tr style='border:2px solid #0099cc;'>
                          <td colspan='3' align='center' style='color:#0099cc;font-weight:bolder;'>Subtotal<br>Tax</td>
                          <td   style='color:orange;font-size:10px;font-weight:bolder;'>

                         
                          Total Saving : <span style='color:#333333;'>₹ {{$gsave}}</span>

                            </td>
                         
                      <tr>
                      <tr>
                  
                          <td colspan='5' align='right' style='color:#0099cc;font-weight:bolder;'>Grand Total</td>
                          <td >

                            <b><span style='color:#00cc99;font-size:12px;'>₹ </span> {{$gtotal}}.00 </b>

                          </td>
                      <tr>
                     
                    </tbody>
                  </table>
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


