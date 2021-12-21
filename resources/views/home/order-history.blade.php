@include("home.layouts.header") 
   


    <!-- Main Wrapper -->
    <div class="main-wrapper">

    @include('home.layouts.flash_msg')
        <!-- /Breadcrumb -->
  
        <!-- Page Content -->
        <div class="content">
            <div class="container">
           
                <div class="card card-table">
                    <div class="card-body">
               
                                <div class="shoping__product"><b style="font-size:17px;margin:5px;">Order History</b></div>

                        <div class="table-responsive">
                            <table class="table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                    <th>Receipt ID</th>
                                        <th>Product</th>
                                        <th>Weight</th>
                                     
                                        <th>Price</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-center">Total</th>
                                        <th class="text-center">Invoice</th>
                                      
                                    <th class="text-center">Order Date & Status</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable"> 
                                <?php $totalcart=0; ?>
                                <?php $totalsaving=0; ?>
                                
                              
                             @foreach($cart as $r)
                                    <tr>
                                    <td> <a href="{{route('invoice.orders.print',$r->order_no)}}" > {{$r->order_no}} </a>
                                   
                                   
                                    </td>
                                        <td>
                                            <h2 class="table-avatar">
                                               
                                                <a href="{{route('productDetails',$r->product_id)}}"  class="avatar avatar-sm mr-2">
                                                                <img class="avatar-img" src="{{ asset('public/uploads') }}/products/{{$r->img}}" alt="" >
                                                            
                                                            </a>
                                            </h2>
                                            <a href="{{route('productDetails',$r->product_id)}}">{{$r->product_name}}</a>
                                        </td>
                                        <td>{{$r->weight}} {{$r->unit}}
                                        </td>
                                    
                                        <td> <strong style="font-size: 16px;color:black;">Price: {{ $r->currency }}{{$r->price}}</strong>
                                               <p><span style="font-size: 12px;color:black;">MRP: <strike>{{ $r->currency }}{{$r->mrp}}</strike> | {{$r->discount}}% OFF</span></p></td>
                                        <td class="text-center">{{$r->quantity}}
                                         
                                        </td>
                                       
                                        <td class="text-center">{{ $r->currency }} {{$r->price * $r->quantity}}</td>
                                        <td class="text-center">
                                        @if(($r->status)=='completed')
                                     
                                        <a href="{{route('invoice.orders.print',$r->order_no)}}" target='_blank'  class="btn btn-sm btn-default float-right" style='background-color:white ;color:#0099cc;'><i class='fa fa-print' style='font-size:12px;'>  {{ __('Print') }}</i> </a>
                                   
                                     
                                        @endif
                                         </td>
                                        <td class="text-right" style='color:gray;font-size:14px;'>
                                    {{$r->created_at->format('d F, Y')}}<br>
                                    <span style='font-size:12px; color:black;'>Status : </span> <span style='font-size:12px; color:#00cc77;'> {{$r->status}}</span> 
                                    </td>
                                         
                                        </td>
                                        <?php   $totalcart=$totalcart + ($r->price * $r->quant); ?>
                              <?php   $totalsaving=$totalsaving + $r->saving; ?>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            
               

            </div>
        </div>







    <!-- Shoping Cart Section End -->
    @include("home.layouts.footer")