


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
            <div class="card-header" style="background-color:#fafafa;color:black;margin-bottom:10px;" >
            <h3 class="card-title" >
                {{ getWeb()->name}}
                <br><br>
                 <p style='font-size:14px;margin-top:-4px;'>Mobile :  {{ getWeb()->mobile}}</p>
                 <p style='font-size:14px;margin-top:-4px;'>Email:{{ getWeb()->email}}</p><br>
                 <p style='font-size:14px;margin-top:-28px;'>Website :  {{ getWeb()->url}}/</p>
                <img src="{{ asset('public/uploads/logo') }}/{{ getWeb()->logo }}" style='height:60px;width:150px;margin-left:10px;box-shadow:0px 6px 10px whitesmoke;margin-top:-90px;' align='right' />
    
                </h3>
              

              </div>
              <div class="card-body">
              @include('admin.layouts.flash_msg')
              <div class="row">
              
                  
                  <div class="col-md-6 col-sm-6" align='left' >
                   <span style='color:#0099cc;font-weight:bold;'>All Payments </span><br>
                   <span style='color:black;font-weight:bold;'>Total Amount : Rs {{$pAll}} </span><br>
                   <span style='color:green;font-weight:bold;'>Received Amount : Rs {{$pCompleted }} </span><br>
                   <span style='color:red;font-weight:bold;'>Pending Amount : Rs {{$pPending}} </span><br>

                   
                   
                </div>
              
                <div class="col-md-6  col-sm-6" align='right'>
                   <span style='color:#0099cc;font-weight:bold;'>Date</span><br>
                   <?php echo date('d F, Y') ?>
                </div>

                <div class="table-responsive" style='margin-top:25px;'>
                      <table class="table text-center" >
                      <thead class=" text-default" style='color:whitesmoke;border:1px #000000 solid;'>
                    <th>
                         
                          S No 
                      </th>
                      <th>
                      Ordered Details 
                     </th>

                      <th>
                      Payment
                      </th>
                     
                      <th>
                      Payment Status
                    
                      </th>
                     
                     
                    </thead>
                    <tbody id="myTable"> 
                    <?php $i=0; ?>
                      @foreach($payments as $r)
                      <?php $i++; ?>
                        <tr>
                        <td>
                        <?php echo $i; ?>
                          </td>
                         
                            <td>
                            {{ $r->created_at->format('d F,Y') }} <br>
                                 Order Id:  {{ $r->order_no }}
                             </td>
                             
                             
                             <td>
                             {{ ('1'== $r->payment)?'Completed':'Pending'}}
                               
                             </td>

                             <td>
                                  <span style='color:#00cc99;font-size:12px;'>INR </span><b>{{ $r->final_price }}  </b>
                             </td>
                           
                        
                        </tr>
                      @endforeach
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


  <script>
// $(document).ready(function(){
//   window.print();
// });
</script>
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