


<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>{{ $title ?? "Social Vaidya - Dashboard"}} </title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/material/admin') }}/img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('public/material/admin') }}/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('public/material/admin') }}/css/font-awesome.min.css">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="{{ asset('public/material/admin') }}/css/feathericon.min.css">

    <link rel="stylesheet" href="{{ asset('public/material/admin') }}/plugins/morris/morris.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('public/material/admin') }}/css/style.css">


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
                 <p style='font-size:14px;margin-top:-4px;'>Mobile :  {{ getWeb()->mobile}}</p>
                 <p style='font-size:14px;margin-top:-4px;'>Email:{{ getWeb()->email}}</p><br>
                 <p style='font-size:14px;margin-top:-28px;'>Website :  {{ getWeb()->url}}/</p>
                  <a> <p style='font-size:14px;margin-top:-4px;'>GST No. :  {{ getWeb()->gst}}/</p></a>
                <img src="{{ asset('public/uploads/logo') }}/{{ getWeb()->logo }}" style='height:60px;width:150px;margin-left:10px;box-shadow:0px 6px 10px whitesmoke;margin-top:-90px;' align='right' />
    
                </h3>
              

              </div>
              <div class="card-body">
              @include('admin.layouts.flash_msg')
              <div class="row">
              
                  
                  <div class="col-md-4 col-sm-4" align='left' >
                
                   <span style='color:#0099cc;font-weight:bold;'>Bill To</span><br>
                   @foreach($orders as $s)
                   {{$s->seller_name}}<br>
                   {{$s->seller_email}},<br>
                   {{$s->seller_mobile}}
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
                  <br>
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
                                {{$r->product_name}} 
                                <p style='color:gray;font-size:10px;margin-top:-5px;'>{{ $r->order_no }} </p>
                           </td>
                         
                             <td>
                                  <span style='color:#00cc99;font-size:12px;'> </span><b>{{ $r->price }}  </b>
                                  <p style='color:orange;font-size:10px;margin-top:-2px;'>Saving : {{ $r->saving }}  </p>
                             
                                  <p style='color:gray;font-size:10px;margin-top:-14px;'>MRP : <span style='text-decoration: line-through;'> {{ $r->mrp }} </span> </p>
                                
                             </td>
                             <td>
                                  <b>{{ $r->quantity }}  </b>
                             </td>
                            
                             <td>
                                  <span style='color:#00cc99;font-size:12px;'>Rs </span><b>{{ $r->total_price }}  </b>
                             </td>
                             
                        
                        </tr>
                      @endforeach
                      <tr style='border:2px solid #0099cc;border-bottom:none;'>
                          <td colspan='2' align='center' style='color:#0099cc;font-weight:bolder;'>Subtotal<br>Tax</td>
                          <td   style='color:orange;font-size:10px;font-weight:bolder;'>
                          @foreach($orders as $s)
                         
                          Total Saving : <span style='color:#333333;'>{{ $r->currency }}{{$s->saving}}</span>
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
                            <b><span style='color:#00cc99;font-size:12px;'>{{ $r->currency }} </span>  {{$s->subtotal_price}}</b><br>
                            <b><span style='color:#00cc99;font-size:12px;'>{{ $r->currency }} </span> {{$s->total_taxprice}}</b>
                                    @break
                            @endforeach
                          </td>
                      </tr >
                      
                      <tr  style='border:2px solid #0099cc;font-size:18px;border-top:none;'>
                          <td colspan='4' align='right' style='color:#0099cc;font-weight:bolder;'>Grand Total</td>
                          <td > 
                            @foreach($orders as $s)
                            <b><span style='color:#00cc99;font-size:12px;'>INR </span> {{$s->total_price}}</b>
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

  <script>
$(document).ready(function(){
  window.print();
});
</script>

   <!-- jQuery -->
   <script src="{{ asset('public/material/admin') }}/js/jquery-3.2.1.min.js"></script>

<!-- Bootstrap Core JS -->
<script src="{{ asset('public/material/admin') }}/js/popper.min.js"></script>
<script src="{{ asset('public/material/admin') }}/js/bootstrap.min.js"></script>

<!-- Slimscroll JS -->
<script src="{{ asset('public/material/admin') }}/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="{{ asset('public/material/admin') }}/plugins/raphael/raphael.min.js"></script>
<script src="{{ asset('public/material/admin') }}/plugins/morris/morris.min.js"></script>
<script src="{{ asset('public/material/admin') }}/js/chart.morris.js"></script>

<!-- Custom JS -->
<script src="{{ asset('public/material/admin') }}/js/script.js"></script>

<!-- jQuery -->
<script src="{{ asset('public/material/admin') }}/js/jquery-3.2.1.min.js"></script>

<!-- Bootstrap Core JS -->
<script src="{{ asset('public/material/admin') }}/js/popper.min.js"></script>
<script src="{{ asset('public/material/admin') }}/js/bootstrap.min.js"></script>

<!-- Slimscroll JS -->
<script src="{{ asset('public/material/admin') }}/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="{{ asset('public/material/admin') }}/plugins/raphael/raphael.min.js"></script>
<script src="{{ asset('public/material/admin') }}/plugins/morris/morris.min.js"></script>
<script src="{{ asset('public/material/admin') }}/js/chart.morris.js"></script>

<!-- Custom JS -->
<script src="{{ asset('public/material/admin') }}/js/script.js"></script>
    @stack('js')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script>
    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        });
    </script>
    <script >
     
     $(function()
     {
      $(".select2").select2({ });
    
     });
     $(function()
     {
        $(".select3").select2({ });
     });
     $(function()
     {
      $(".select1").select2({ 
      });
      
    
     });
    
</script>
</body>

</html>