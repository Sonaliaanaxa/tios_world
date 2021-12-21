

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
                <a href="{{route('seller.orders.print',$order_no)}}" target='_blank'  class="btn btn-sm btn-default float-right" style='background-color:white ;color:#0099cc;'><i class='fa fa-print' style='font-size:12px;'>  {{ __('Print') }}</i> </a>
                
                </h4>
                <!-- <p class="card-category" > {{ __('Here you can manage the products') }}</p> -->
              
                <p class="card-category" > Orders ID -  {{ $order_no}}</p>

              </div>
              <div class="card-body">
              @include('admin.layouts.flash_msg')
              <div class="row">
              
                  
                  <div class="col-md-8 col-sm-6" align='left'>
                  
                   <span style='color:#0099cc;font-weight:bold;'>Bill To</span><br>
                   @foreach($orders as $s)
                   {{$s->seller_name}}<br>
                   {{$s->seller_email}},<br>
                   
                   {{$s->seller_mobile}}
                   @break;
                   @endforeach
                
                </div>
                <div class="col-md-4  col-sm-4" align='right'>
                   <span style='color:#0099cc;font-weight:bold;'>Ordered At</span><br>
                   @foreach($orders as $d)
                   {{$d->created_at->format('d F,Y')}}<br><br>
                 
                   @break;
                   @endforeach
                </div>


                <div class="table-responsive">
                      <table class="table text-center" >
                    <thead class=" text-default" style='color:whitesmoke;'>
                    <th>
                         
                          @sortablelink('id',__('S No')) 
                      </th>
                      <th>
                       
                      </th>
                      <th>
                       @sortablelink('product_name',__('Product'))  
                      </th>
                      <th>
                       @sortablelink('price',__('Price'))  
                    
                      </th>
                      <th>
                       @sortablelink('quantity',__('Quantity '))  
                      </th>
                   
                      <th>
                       @sortablelink('total_price',__('Total Price'))  
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
                               
                               @if($r->img)
                                 <a href="{{ asset('public/uploads/products') }}/{{ $r->img }}" target='_blank'> <img src="{{ asset('public/uploads/products') }}/{{ $r->img }}" style='height:50px;width:50px;border-radius:5%;'/></a>
                                @else
                                <p class='text-center' style='padding-top:15px;height:55px;width:55px;border-radius:50%; background-color:#0099cc;color:white;font-size:26px;'>
                                {{ substr($r->name,0,1) }}
                                </p>
                                @endif 
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
                                  <span style='color:#00cc99;font-size:12px;'>{{ $r->currency }} </span><b>{{ $r->total_price }}  </b>
                             </td>
                             
                        
                        </tr>
                      @endforeach
                      <tr style='border:2px solid #0099cc;'>
                          <td colspan='3' align='center' style='color:#0099cc;font-weight:bolder;'>Subtotal<br>Tax</td>
                          <td   style='color:orange;font-size:10px;font-weight:bolder;'>
                          @foreach($orders as $s)
                         
                          Total Saving : <span style='color:#333333;'>{{ $s->currency }} {{$s->saving}}</span>
                              @break
                            @endforeach
                            </td>
                          <td > 
                            @foreach($orders as $s)
                            <b><span style='color:#00cc99;font-size:12px;'> </span> {{$s->quantity}}</b>
                                    @break
                            @endforeach
                          </td>
                          <td > 
                            @foreach($orders as $s)
                            <b><span style='color:#00cc99;font-size:12px;'>{{ $s->currency }} </span> {{$s->subtotal_price}}</b><br>
                            <b><span style='color:#00cc99;font-size:12px;'>{{ $s->currency }} </span> {{$s->total_taxprice}}</b>
                                    @break
                            @endforeach
                          </td>
                      <tr>
                      <tr>
                  
                          <td colspan='5' align='right' style='color:#0099cc;font-weight:bolder;'>Grand Total</td>
                          <td > 
                            @foreach($orders as $s)
                            <b><span style='color:#00cc99;font-size:12px;'>{{ $r->currency }} </span> {{$s->total_price}}</b>
                                    @break
                            @endforeach
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


