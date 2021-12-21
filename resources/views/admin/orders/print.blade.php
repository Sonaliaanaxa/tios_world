


<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>{{ $title ?? "Hygieneherbs Agro Fresh Pvt Ltd"}} </title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets\front\img\logo\logo.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('material/admin') }}/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('material/admin') }}/css/font-awesome.min.css">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="{{ asset('material/admin') }}/css/feathericon.min.css">

    <link rel="stylesheet" href="{{ asset('material/admin') }}/plugins/morris/morris.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('material/admin') }}/css/style.css">


</head>

<body onload="window.print()" class="{{ $class ?? '' }}">
         @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
     
        @endauth 

    <!-- Main Wrapper -->
 

    <div class="container-fluid" style="margin:40px;">

            <div class="content container-fluid">
               
              
 <div class="main-panel" style='width:82%;margin-left:5%;margin-right:5%;'>
  <div class="content" style='margin-top:0px;padding:0px;'>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header" style="background-color:#fafafa;color:black;margin-bottom:30px;" >
                <h3 class="card-title" >
                {{ getWeb()->name}}
                <br><br>
                <p style='font-size:14px;margin-top:-4px;'>Address :  {{ getWeb()->address}}</p>
                 <p style='font-size:14px;margin-top:-4px;'>Mobile :  {{ getWeb()->mobile}}</p>
                 <p style='font-size:14px;margin-top:-4px;'>Email:{{ getWeb()->email}}</p><br>
                 <p style='font-size:14px;margin-top:-39px;'>Website :  {{ getWeb()->url}}</p>   
                 <img src="{{ asset('uploads/logo') }}/{{ getWeb()->logo }}" style='height:60px;width:150px;margin-left:10px;box-shadow:0px 6px 10px whitesmoke;margin-top:-155px;' align='right' />
                <p style='font-size:14px;margin-top:-67px;' align='right' >GST No. :  {{ getWeb()->gst}}</p>
                    <p style='font-size:14px;margin-top:0px;' align='right' >Fssai No. :  {{ getWeb()->cin}}</p>
                   
                </h3>
              

              </div>
              <div class="card-body">
              @include('admin.layouts.flash_msg')
              <div class="row">
              
                  
                  <div class="col-md-4 col-sm-4" align='left' >
                
                   <span style='color:#0099cc;font-weight:bold;'>Bill To</span><br>
                   @foreach($orders as $s)
                   <h5>{{$s->uname}} </h5>
                   {{$s->apartment}},<br>
                   {{$s->city}},{{$s->state}},{{$s->area}},<br>
                   {{$s->pincode}}<br>
                   {{$s->phone}}
                   @break;
                   @endforeach
             
                </div>
                <div class="col-md-4 col-sm-4" align='left' >
                   <span style='color:#0099cc;font-weight:bold;'>Receipt ID </span><br>
                   <span style='font-size:18px;'>  {{ $order_no}}</span>
                </div>
                <div class="col-md-4  col-sm-4" align='right'>
                   <span style='color:#0099cc;font-weight:bold;'>Ordered At</span><br>
                   @foreach($orders as $d)
                   {{$d->created_at->format('d F,Y')}}<br>
                
                   @break;
                   @endforeach
                </div>


                <div class="table-responsive" style='margin-top:28px;'>
                      <table class="table text-center" >
                    <thead class=" text-default" style='color:whitesmoke;border:1px #eeeeee solid;'>
                    <th>
                         
                         @sortablelink('id',__('#No')) 
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
                            <td>{{ $r->product_name }} 
                                  
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

  <script>
$(document).ready(function(){
  window.print();
});
</script>

   <!-- jQuery -->
   <script src="{{ asset('material/admin') }}/js/jquery-3.2.1.min.js"></script>

<!-- Bootstrap Core JS -->
<script src="{{ asset('material/admin') }}/js/popper.min.js"></script>
<script src="{{ asset('material/admin') }}/js/bootstrap.min.js"></script>

<!-- Slimscroll JS -->
<script src="{{ asset('material/admin') }}/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="{{ asset('material/admin') }}/plugins/raphael/raphael.min.js"></script>
<script src="{{ asset('material/admin') }}/plugins/morris/morris.min.js"></script>
<script src="{{ asset('material/admin') }}/js/chart.morris.js"></script>

<!-- Custom JS -->
<script src="{{ asset('material/admin') }}/js/script.js"></script>

<!-- jQuery -->
<script src="{{ asset('material/admin') }}/js/jquery-3.2.1.min.js"></script>

<!-- Bootstrap Core JS -->
<script src="{{ asset('material/admin') }}/js/popper.min.js"></script>
<script src="{{ asset('material/admin') }}/js/bootstrap.min.js"></script>

<!-- Slimscroll JS -->
<script src="{{ asset('material/admin') }}/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="{{ asset('material/admin') }}/plugins/raphael/raphael.min.js"></script>
<script src="{{ asset('material/admin') }}/plugins/morris/morris.min.js"></script>
<script src="{{ asset('material/admin') }}/js/chart.morris.js"></script>

<!-- Custom JS -->
<script src="{{ asset('material/admin') }}/js/script.js"></script>

</body>

</html>